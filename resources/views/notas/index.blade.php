@extends('layouts.app')

@section('content')
    <section class="content-header">
      <h1 class="pull">Notas 

      </h1>
    </section>


    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
         <h1>
         
        </h1>
            <div class="box box-header">
            <div class="row ">

            
    
            {{Form::open(['route' => 'notas.index','method'=> 'GET', 'class' => 'form-inline-pull-right'])}}

            <div class="col-md-2">
                <select class="form-control" id="id_asignatura" name="id_asignatura" placeholder = "ASIGNATURA">
                    <option>ASIGNATURA</option>
                    @foreach($detallesList as $filas)
                      <option value="{{ $filas->id_asignatura }}">{{ $filas->asignatura}}</option>
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


            <div class="col-xs-2">
            {{Form::text('parametro1', null,['class' => 'form-control', 'placeholder' =>'NOTA 1'])}}
            </div>

            <div class="col-xs-2">
            {{Form::text('parametro2', null,['class' => 'form-control', 'placeholder' =>'NOTA 1'])}}
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-default">Search
                <span class="glyphicon glyphicon-search"></span>
            </button>

             <a href="{{ route('pdf') }}" type="submit" class="btn btn-default">
                   PDF
              </a>

              <a  type="submit" class="btn btn-default" href="{{route('notas.index')}}">
                <i class="fa fa-fw fa-undo"></i> Resetear
              </a>
            </div>

             
            {{Form::close()}}
            
            </div>
            </div>
            <div class="box-body">
                    @include('notas.table')
            </div>
        </div>
        <div class="text-center">
        

        @include('adminlte-templates::common.paginate', ['records' => $notas])

        </div>
    </div>
@endsection

