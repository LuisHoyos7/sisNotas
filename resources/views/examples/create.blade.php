@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Example
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
<!--hola mundo!-->
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'examples.store']) !!}

                        @include('examples.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
