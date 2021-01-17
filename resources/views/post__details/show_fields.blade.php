<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', 'Texto:') !!}
    <p>{{ $postDetail->body }}</p>
</div>

<!-- Post Id Field -->
<div class="form-group">
    {!! Form::label('post_id', 'Publicação:') !!}
    <p><a href="{{ route('posts.show', [$postDetail->post->id]) }}">{{ $postDetail->post->title }}</a></p>
</div>

<!-- Published Field -->
<div class="form-group">
    {!! Form::label('published', 'Publicado:') !!}
    <p> 
        @if($postDetail->published == 1)
            <span class="fa fa-check"></span>
        @else
            <span class="fa fa-times"></span>
        @endif
    </p>
</div>

<!-- Created By Field -->
<div class="form-group">
    {!! Form::label('created_by', 'Publicado por:') !!}
    <p>{{ $postDetail->owner->name }}</p>
</div>

<!-- Updated By Field -->
<div class="form-group">
    {!! Form::label('updated_by', 'Atualizado por:') !!}
    <p>{{ $postDetail->updater->name ?? '---'}}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Publicado em:') !!}
    <p>{{ $postDetail->created_at->format('d/m/Y') }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Atualizado em:') !!}
    <p>{{ $postDetail->updated_at->format('d/m/Y') ?? '---' }}</p>
</div>

