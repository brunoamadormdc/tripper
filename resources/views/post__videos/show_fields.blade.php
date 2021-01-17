<!-- Video Link Field -->
<div class="form-group">
    {!! Form::label('video_link', 'Vídeo:') !!}
    <p>
        <iframe width="350" height="250" src="https://www.youtube.com/embed/{{$postVideo->video_id}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="margin-bottom:20px;"></iframe>
    </p>
</div>

<!-- Video Id Field -->
<!-- <div class="form-group">
    {!! Form::label('video_id', 'Video Id:') !!}
    <p>{{ $postVideo->video_id }}</p>
</div> -->

<!-- Published Field -->
<div class="form-group">
    {!! Form::label('published', 'Publicado:') !!}
    <p>
        @if($postVideo->published == 1)
            <span class="fa fa-check"></span>
        @else
            <span class="fa fa-times"></span>
        @endif
    </p>
</div>

<!-- Created By Field -->
<div class="form-group">
    {!! Form::label('created_by', 'Publicado por:') !!}
    <p>{{ $postVideo->owner->name }}</p>
</div>

<!-- Updated By Field -->
<div class="form-group">
    {!! Form::label('updated_by', 'Atualizado por:') !!}
    <p>{{ $postVideo->updater->name ?? '---' }}</p>
</div>

<!-- Post Id Field -->
<div class="form-group">
    {!! Form::label('post_id', 'Publicação:') !!}
    <p><a href="{{ route('posts.show', [$postVideo->post->id]) }}">{{ $postVideo->post->title }}</a></p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Publicado em:') !!}
    <p>{{ $postVideo->created_at->format('d/m/Y') }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Atualizado em:') !!}
    <p>{{ $postVideo->updated_at->format('d/m/Y') ?? '---' }}</p>
</div>

