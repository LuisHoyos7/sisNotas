<!-- Id Asignatura Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_asignatura', 'Id Asignatura:') !!}
    {!! Form::text('id_asignatura', null, ['class' => 'form-control']) !!}
</div>

<!-- Asignatura Field -->
<div class="form-group col-sm-6">
    {!! Form::label('asignatura', 'Asignatura:') !!}
    {!! Form::text('asignatura', null, ['class' => 'form-control']) !!}
</div>

<!-- Grupo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grupo', 'Grupo:') !!}
    {!! Form::text('grupo', null, ['class' => 'form-control']) !!}
</div>

<!-- Docente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('docente', 'Docente:') !!}
    {!! Form::text('docente', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Estudiante Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_estudiante', 'Id Estudiante:') !!}
    {!! Form::text('id_estudiante', null, ['class' => 'form-control']) !!}
</div>

<!-- Estudiante Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estudiante', 'Estudiante:') !!}
    {!! Form::text('estudiante', null, ['class' => 'form-control']) !!}
</div>

<!-- Corte1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('corte1', 'Corte1:') !!}
    {!! Form::text('corte1', null, ['class' => 'form-control']) !!}
</div>

<!-- Corte2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('corte2', 'Corte2:') !!}
    {!! Form::text('corte2', null, ['class' => 'form-control']) !!}
</div>

<!-- Corte3 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('corte3', 'Corte3:') !!}
    {!! Form::text('corte3', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('notas3s.index') !!}" class="btn btn-default">Cancel</a>
</div>
