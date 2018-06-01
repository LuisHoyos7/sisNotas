@extends('layouts.app')

@section('content')
   <section class="content-header">
      <h1 class="pull">Reportes

      </h1>
    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
          <div class="box box-primary">

             <div class="box box-header">
            <div class="row ">

            
    
            {{Form::open(['route' => 'reportes','method'=> 'GET', 'class' => 'form-inline-pull-right'])}}

            <div class="col-md-2">
                <select class="form-control" id="id_asignatura" name="id_asignatura">
                    <option>ASIGNATURA</option>
                    @foreach($detallesList as $filas)
                      <option value="{{ $filas->id_asignatura }}" id="{{ $filas->id_asignatura }}">{{ $filas->asignatura}}</option>
                      @endforeach
               </select>
            </div>

            <div class="col-md-2" >
                 <select class="form-control" id="grupo" name="grupo" >
                    <option>GRUPO</option>
                    @foreach($detallesList as $filas)
                      <option value="{{ $filas->grupo }}">{{ $filas->grupo}}</option>
                      @endforeach
                </select>
            </div>


            <div class="form-group">
            <button type="submit" class="btn btn-default">Search
                <span class="glyphicon glyphicon-search"></span>
            </button>


              <a  type="submit" class="btn btn-default" href="{{route('reportes')}}">
                <i class="fa fa-fw fa-undo"></i> Resetear
              </a>
            </div>

             
            {{Form::close()}}
            
            </div>
            </div>
            
              <div class="box-body">
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
                          <a href="{{ route('informe',[$nota->id_asignatura,$nota->grupo])}}" class="btn btn-block btn-success">
                          Cohorte I
                          </a>
                    </td>

                       <td width="10px">
                          <a href="{{ route('informe1',[$nota->id_asignatura,$nota->grupo])}}" class="btn btn-block btn-success">
                          Cohorte II
                          </a>
                    </td>
                       <td width="10px">
                          <a href="{{ route('informe',[$nota->id_asignatura,$nota->grupo])}}" class="btn btn-block btn-success">
                       Cohorte III
                          </a>
                    </td>
          
          </tr>
          @endforeach

        </tbody>
        
      </table>
            </div>
        </div>
        <div class="text-center">
        
           @include('adminlte-templates::common.paginate', ['records' => $notas])
        </div>
    </div>
@endsection
