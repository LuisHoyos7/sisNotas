<!-- Id Per Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_per', 'Id Per:') !!}
    {!! Form::text('id_per', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Seg Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_seg', 'Nombre Seg:') !!}
    {!! Form::text('nombre_seg', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Seg Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion_seg', 'Descripcion Seg:') !!}
    {!! Form::text('descripcion_seg', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Seg Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_seg', 'Estado Seg:') !!}
    {!! Form::text('estado_seg', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('seguimientos.index') !!}" class="btn btn-default">Cancel</a>
</div>
