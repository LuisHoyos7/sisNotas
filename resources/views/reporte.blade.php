<!DOCTYPE html>
<html>
<head>
<title>Detalle</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
</head>
<body>
<div class="container">
  

 
    <div class="col-md-8">
      
      <table class="table table-hover table-striped">
        <thead>
                     <tr>
                        
                        <th>Asignatura</th>
                        <th>Grupo</th>
                        <th>Reportes</th>
                         
                    </tr>
                </thead>
        <tbody>
          @foreach($notas as $nota)
          <tr>
            
            <td>{{ $nota->asignatura}}</td>
            <td>{{ $nota->grupo}}</td>

              <td width="10px">
                           
                                <a href="{{ route('informe',[$nota->id_asignatura,$nota->grupo])}}" class="btn btn-sm btn-primary">
                                 reporte
                                </a>
                         
                        </td>
          
          </tr>
          @endforeach

        </tbody>
        
      </table>
     
    </div>
  </div>
        
    </div>
</div>
</body>
</html>
