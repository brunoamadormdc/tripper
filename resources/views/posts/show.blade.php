@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Publicação
        </h1>
        @include('flash::message')
    </section>   

    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('posts.show_fields')
                    <a href="{{ route('posts.index') }}" class="btn btn-default">Voltar</a>
                </div>
            </div>
        </div>

        <div class="box box-primary" id="photos">
            <div class="box-header">
                <h4>
                    Fotos
                </h4>
            </div>
            <div class="box-body">
            @forelse($post->photos as $photo)
            <a href="{{ route('postPhotos.show', [$photo->id]) }}">
                <img src="{{ $photo->image }}" alt="..." class="img-thumbnail img-responsive" width="200">
            </a>
            @empty
            <span class="text-danger">Essa publicação não tem fotos adicionada!</span>
            @endforelse
            </div>
        </div>

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

        <div class="box box-primary" id="details">
            <div class="box-header">
                <h4>
                    Detalhes
                </h4>
            </div>
            <div class="box-body">
            <ul>
            @forelse($post->details as $detail)
            <a href="{{ route('postDetails.show', [$detail->id]) }}">
                <li>{{$detail->body}}</li>
            </a>
            @empty
            <span class="text-danger">Essa publicação não tem detalhes adicionado!</span>
            @endforelse
            </ul>
            </div>
        </div>

        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'postDetails.store']) !!}

                        @include('post__details.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="box box-primary" id="videos">
            <div class="box-header">
                <h4>
                    Videos
                </h4>
            </div>
            <div class="box-body">
            <ul>
            @forelse($post->videos as $video)
            <iframe width="250" height="150" src="https://www.youtube.com/embed/{{$video->video_id}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <!-- <a href="{{ route('postVideos.show', [$video->id]) }}">
                <li>{{$video->video_link}}</li>
            </a> -->
            @empty
            <span class="text-danger">Essa publicação não tem videos adicionado!</span>
            @endforelse
            </ul>
            </div>
        </div>

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
        
        <!-- Comments -->
        <div class="box box-primary" id="comments">
            <div class="box-header">
                <h4>
                    Comentários
                </h4>
            </div>
            <div class="box-body">
            @forelse($post->comments as $comment)

            <div class="box box-light">
                <div class="card-header">
                    <h5>Usuário: {{ $comment->owner->name ?? $comment->name ?? 'Anônimo'}} - E-mail: <i>{{ $comment->owner->email ?? $comment->email ?? 'Não informado'}}</i> - {{ $comment->created_at->format('d/m/Y')}}</h5>
                </div>
                <div class="card-body">                    
                    <p class="card-text">{{ $comment->body }}</p>
                    <a href="{{ route('postComments.show', [$comment->id]) }}" class="btn btn-primary">Ver</a>
                </div>
            </div>                     
            
            @empty
            <span class="text-danger">Essa publicação não tem nenhum comentário!</span>
            @endforelse
            </div>
        </div>

        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'postComments.store', 'files' => true]) !!}

                        @include('post_comments.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>


    </div>

    
@endsection
