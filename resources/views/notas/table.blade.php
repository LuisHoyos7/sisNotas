<table class="table table-responsive" id="notas-table">
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
    @foreach($notas as $notas)
        <tr>
            <td>{!! $notas->id_asignatura !!}</td>
            <td>{!! $notas->asignatura !!}</td>
            <td>{!! $notas->grupo !!}</td>
            <td>{!! $notas->docente !!}</td>
            <td>{!! $notas->id_estudiante !!}</td>
            <td>{!! $notas->estudiante !!}</td>
            <td>{!! $notas->corte1 !!}</td>
            <td>{!! $notas->corte2 !!}</td>
            <td>{!! $notas->corte3 !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('notas.show', [$notas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    
                </div>
                
            </td>
        </tr>
    @endforeach
    </tbody>
</table>