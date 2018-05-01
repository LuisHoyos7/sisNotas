@extends('layouts.app')

@section('content')


<div class="content">

	<div class="box box-default">
		<div class="box-header">
		A continuacion suba su archivo en Formato XLSX 
	   </div>
  <div class="box-body"> 
  	<center>
       {!! Form::open(array('route' => 'import.file','method'=>'POST','files'=>'true')) !!}
   <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
		{!! Form::label('sample_file','Select File to Import:',['class'=>'col-md-3']) !!}

         <div class="col-md-8">

          {!! Form::file('sample_file', array('class' => 'form-control')) !!}

          {!! $errors->first('sample_file', '<p class="alert alert-danger">:message</p>') !!}

         

         </div>

  <div class="col-xs-8 col-sm-8 col-md-8"><br>

            {!! Form::submit('Cargar',['class'=>'btn btn-success']) !!}

            </div>

            
        </div>

       {!! Form::close() !!}

 </div>

</div>

</div>
</div>


@endsection