@section('css')
    @include('layouts.datatables_css')
    <link rel="stylesheet" href="/css/hola.css">
@endsection

{!! $dataTable->table(['width' => '100%']) !!}

@section('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endsection