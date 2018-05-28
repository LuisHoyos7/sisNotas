@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Notas3
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'notas3s.store']) !!}

                        @include('notas3s.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
