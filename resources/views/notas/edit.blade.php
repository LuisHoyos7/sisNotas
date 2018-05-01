@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Notas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($notas, ['route' => ['notas.update', $notas->id], 'method' => 'patch']) !!}

                        @include('notas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection