<table class="table table-responsive" id="notas2s-table">
    <thead>
        <tr>
            <th>Id Asignatura</th>
        <th>Asignatura</th>
        <th>Grupo</th>
        <th>Docente</th>
        <th>Id Estudiante</th>
        <th>Estudiante</th>
        <th>Corte1</th>
        <th>Corte2</th>
        <th>Corte3</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($notas as $notas2)
        <tr>
            <td>{!! $notas2->id_asignatura !!}</td>
            <td>{!! $notas2->asignatura !!}</td>
            <td>{!! $notas2->grupo !!}</td>
            <td>{!! $notas2->docente !!}</td>
            <td>{!! $notas2->id_estudiante !!}</td>
            <td>{!! $notas2->estudiante !!}</td>
            <td>{!! $notas2->corte1 !!}</td>
            <td>{!! $notas2->corte2 !!}</td>
            <td>{!! $notas2->corte3 !!}</td>
            <td>
                {!! Form::open(['route' => ['notas2s.destroy', $notas2->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('notas2s.show', [$notas2->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>