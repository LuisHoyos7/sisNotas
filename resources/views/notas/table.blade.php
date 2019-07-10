<table class="table table-responsive" id="nota-table">
    <thead>
        
        <tr>
            <th>Id Asignatura</th>
        <th>Asignatura</th>
        <th>Grupo</th>
        <th>Docente</th>
        <th>Id Estudiante</th>
        <th>Estudiante</th>
        <th>Corte1</th>
        <th>Corte2</th>
        <th>Corte3</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($notas as $nota)
        <tr>
            <td>{!! $nota->id_asignatura !!}</td>
            <td>{!! $nota->asignatura !!}</td>
            <td>{!! $nota->grupo !!}</td>
            <td>{!! $nota->docente !!}</td>
            <td>{!! $nota->id_estudiante !!}</td>
            <td>{!! $nota->estudiante !!}</td>
            <td>{!! $nota->corte1 !!}</td>
            <td>{!! $nota->corte2 !!}</td>
            <td>{!! $nota->corte3 !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('notas.show', [$nota->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    
                </div>
                
            </td>
        </tr>
    @endforeach
    </tbody>
</table>