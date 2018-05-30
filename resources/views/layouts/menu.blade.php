
<li class="{{ Request::is('periodos*') ? 'active' : '' }}">
    <a href="{!! route('periodos.index') !!}"><i class="fa fa-edit"></i><span>Periodos</span></a>
</li>

<li class="{{ Request::is('notas*') ? 'active' : '' }}">
    <a href="{!! route('notas.index') !!}"><i class="fa fa-edit"></i><span>Deatalle Notas Cohorte I</span></a>
</li>




<li class="{{ Request::is('notas2s*') ? 'active' : '' }}">
    <a href="{!! route('notas2s.index') !!}"><i class="fa fa-edit"></i><span>Detalle Notas Cohorte II</span></a>
</li>

<li class="{{ Request::is('notas3s*') ? 'active' : '' }}">
    <a href="{!! route('notas3s.index') !!}"><i class="fa fa-edit"></i><span>Detalle Notas Cohorte III</span></a>
</li>

<li class="{{ Request::is('reporte*') ? 'active' : '' }}">
    <a href="{!! route('reportes') !!}"><i class="fa fa-edit"></i><span>Reportes Chorte I</span></a>
</li>

