{!! Form::open(['route' => ['periodos.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('seguimientos.index') }}" class='btn btn-primary btn-xs'>
                Segimiento<i class=""></i>
    </a>
    <a href="{{ route('periodos.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('periodos.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('SEGURO QUE DESEAS ELIMINAR ESTE REGISTRO?')"
    ]) !!}
</div>
{!! Form::close() !!}
