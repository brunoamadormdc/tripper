@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            fotos dos destinos
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'destinyPhotos.store', 'files' => true]) !!}

                        @include('destiny_photos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
