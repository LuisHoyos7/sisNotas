@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Notas2
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($notas2, ['route' => ['notas2s.update', $notas2->id], 'method' => 'patch']) !!}

                        @include('notas2s.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection