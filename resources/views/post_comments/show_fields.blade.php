<!-- Post Id Field -->
<div class="form-group">
    {!! Form::label('post_id', 'Publicação:') !!}
    <p><a href="{{ route('posts.show', [$postComment->post->id]) }}">{{ $postComment->post->title }}</a></p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'Usuário:') !!}
    <p>{{ $postComment->owner->name ?? 'Anônimo'}}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $postComment->owner->email ?? $postComment->email ?? '---' }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nome:') !!}
    <p>{{ $postComment->owner->name ?? $postComment->name ?? 'Anônimo'}}</p>
</div>

<!-- Webpage Field -->
<div class="form-group">
    {!! Form::label('webpage', 'Página da Web:') !!}
    <p>{{ $postComment->webpage ?? '---'}}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', 'Comentário:') !!}
    <p>{{ $postComment->body }}</p>
</div>

<!-- Published Field -->
<div class="form-group">
    {!! Form::label('published', 'Published:') !!}
    <p>
        @if($postComment->published == 1)
            <span class="fa fa-check"></span>
        @else
            <span class="fa fa-times"></span>
        @endif    
    </p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Comentado em:') !!}
    <p>{{ $postComment->created_at->format('d/m/Y') }}</p>
</div>

<!-- Updated At Field -->
<!-- <div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $postComment->updated_at->format('d/m/Y') }}</p>
</div> -->

