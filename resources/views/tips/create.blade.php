@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Dicas
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'tips.store', 'files' => true]) !!}

                        @include('tips.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
