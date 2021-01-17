@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Post  Photo
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'postPhotos.store', 'files' => true]) !!}

                        @include('post__photos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
