@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Vídeo da Publicação
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('post__videos.show_fields')
                    <a href="{{ route('postVideos.index') }}" class="btn btn-default">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
