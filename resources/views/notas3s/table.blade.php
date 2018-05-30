<table class="table table-responsive" id="notas3s-table">
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
    @foreach($notas as $notas3)
        <tr>
            <td>{!! $notas3->id_asignatura !!}</td>
            <td>{!! $notas3->asignatura !!}</td>
            <td>{!! $notas3->grupo !!}</td>
            <td>{!! $notas3->docente !!}</td>
            <td>{!! $notas3->id_estudiante !!}</td>
            <td>{!! $notas3->estudiante !!}</td>
            <td>{!! $notas3->corte1 !!}</td>
            <td>{!! $notas3->corte2 !!}</td>
            <td>{!! $notas3->corte3 !!}</td>
            <td>
                {!! Form::open(['route' => ['notas3s.destroy', $notas3->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('notas3s.show', [$notas3->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>