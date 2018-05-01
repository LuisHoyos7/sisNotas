
<!-- Nombre Per Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_per', 'Nombre') !!}
    {!! Form::text('nombre_per', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Per Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_per', 'Estado') !!}
    {!! Form::text('estado_per', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('periodos.index') !!}" class="btn btn-default">Cancel</a>
</div>
