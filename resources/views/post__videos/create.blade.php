@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Vídeo da Publicação
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'postVideos.store']) !!}

                        @include('post__videos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
