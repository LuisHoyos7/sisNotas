<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $periodo->id !!}</p>
</div>

<!-- Estado Per Field -->
<div class="form-group">
    {!! Form::label('estado_per', 'Estado Per:') !!}
    <p>{!! $periodo->estado_per !!}</p>
</div>

<!-- Nombre Per Field -->
<div class="form-group">
    {!! Form::label('nombre_per', 'Nombre Periodo:') !!}
    <p>{!! $periodo->nombre_per !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $periodo->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $periodo->updated_at !!}</p>
</div>

