@extends('layouts.app')

@section('content')
    <div class="tab">
        <button id="clickPrimary"class="tablinks" onclick="openCity(event, 'Corte1')">Corte 1</button>
        <button class="tablinks" onclick="openCity(event, 'Corte2')">Corte 2</button>
        <button class="tablinks" onclick="openCity(event, 'Corte3')">Corte 3</button>
      </div>

      <div id="Corte1" class="tabcontent">
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header align-items-center">
              <h3 class="box-title">Estudiantes Reprobados Vs Aprobados por Materias</h3>
              <button class="btn btn-success pull-right" onclick="ocultar();"> Ver Detalles</button>
            </div>
            <!-- /.box-header -->
            
              <div class="box-body table-responsive no-padding " >
                <div class="box-body chart-responsive">
                  <canvas id="bar-chart-grouped" width="900" height="950"></canvas>                
                </div>

        
                  <table class="table table-hover "id = "table">
                    <thead>
                        <tr>
                          <th>Asignatura</th>
                          <th>N° Reprobados</th>
                          
                        </tr>

                    </thead>

                    <tbody>
                      @foreach($reprobados as $reprobado)
                          <tr>

                            <th>{{$reprobado->asignatura}}</th>
                            <th>{{$reprobado->cant_est}}</th>
                          

                          </tr>
                          
                      @endforeach
                    </tbody>
                  </table>
              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </div>
       
        <div class="row">
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Area Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
              <canvas id="pie-chart" width="800" height="450"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          </div>

      </div>
       
      <div id="Corte2" class="tabcontent">
        <h3>Paris</h3>
        <p>Paris is the capital of France.</p> 
      </div>

      <div id="Corte3" class="tabcontent">
        <h3>Tokyo</h3>
        <p>Tokyo is the capital of Japan.</p>
      </div>

       @include('footer')
   

@endsection
