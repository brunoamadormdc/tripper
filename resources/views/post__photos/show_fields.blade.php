<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Imagem:') !!}
    <p><img src="{{ $postPhoto->image }}" width="400" class="img-responsive"></p>
</div>

<!-- Post Id Field -->
<div class="form-group">
    {!! Form::label('post_id', 'Publicacao:') !!}
    <p><a href="{{ route('posts.show', [$postPhoto->post->id]) }}">{{ $postPhoto->post->title }}</a></p>
</div>

<!-- Published Field -->
<div class="form-group">
    {!! Form::label('published', 'Publicado:') !!}
    <p>
    @if($postPhoto->published  == 1)
        <span class="fa fa-check"></span>
    @else
        <span class="fa fa-times"></span>
    @endif
    </p>
</div>

<!-- Created By Field -->
<div class="form-group">
    {!! Form::label('created_by', 'Publicado por:') !!}
    <p>{{ $postPhoto->owner->name}}</p>
</div>

<!-- Updated By Field -->
<div class="form-group">
    {!! Form::label('updated_by', 'Atualizado por:') !!}
    <p>{{ $postPhoto->updater->name ?? '--' }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Publicado em:') !!}
    <p>{{ $postPhoto->created_at->format('d/m/Y H:i:s') }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Atualizado em:') !!}
    <p>{{ $postPhoto->updated_at->format('d/m/Y H:i:s') }}</p>
</div>

