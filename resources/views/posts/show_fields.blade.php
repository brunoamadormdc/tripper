<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Título:') !!}
    <p>{{ $post->title }}</p>
</div>

<!-- Subtitle Field -->
<div class="form-group">
    {!! Form::label('subtitle', 'Subtítulo:') !!}
    <p>{{ $post->subtitle }}</p>
</div>

<!-- Summary Field -->
<div class="form-group">
    {!! Form::label('summary', 'Resumo:') !!}
    <p>{{ $post->summary }}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', 'Texto:') !!}
    <p>{!! $post->body !!}</p>
</div>

<!-- Main Image Field -->
<div class="form-group">
    {!! Form::label('main_image', 'Imagem Principal:') !!}
    <p><img src="{{ $post->main_image }}" width="400px" class="img-responsive"></p>
</div>

<!-- Secondary Image Field -->
<div class="form-group">
    {!! Form::label('secondary_image', 'Imagem Secundária:') !!}
    <p><img src="{{ $post->secondary_image }}" width="400px" class="img-responsive"></p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Preço:') !!}
    <p>{{ $post->price }}</p>
</div>

<!-- Booking Link Field -->
<div class="form-group">
    {!! Form::label('booking_link', 'Link da Reserva:') !!}
    <p>{{ $post->booking_link }}</p>
</div>

<!-- Booking Link Text Field -->
<div class="form-group">
    {!! Form::label('booking_link_text', 'Texto do link da Reserva:') !!}
    <p>{{ $post->booking_link_text }}</p>
</div>

<!-- External Link Field -->
<div class="form-group">
    {!! Form::label('external_link', 'Link Externo:') !!}
    <p>{{ $post->external_link }}</p>
</div>

<!-- Font Text Field -->
<div class="form-group">
    {!! Form::label('font_text', 'Texto do link da Fonte:') !!}
    <p>{{ $post->font_text }}</p>
</div>

<!-- Font Link Field -->
<div class="form-group">
    {!! Form::label('font_link', 'Link da Fonte:') !!}
    <p>{{ $post->font_link }}</p>
</div>

<!-- Page Field -->
<div class="form-group">
    {!! Form::label('page', 'Página:') !!}
    <p>{{ $post->page }}</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', 'Categoria:') !!}
    <p>{{ $post->category->name }}</p>
</div>

<!-- Published Field -->
<div class="form-group">
    {!! Form::label('published', 'Publicado:') !!}
    <p>
        @if($post->published == 1)
            <span class="fa fa-check"></span>
        @else
        <span class="fa fa-times"></span>
        @endif
    </p>
</div>

<!-- Created By Field -->
<div class="form-group">
    {!! Form::label('created_by', 'Publicado por:') !!}
    <p>{{ $post->owner->name }}</p>
</div>

<!-- Updated By Field -->
<div class="form-group">
    {!! Form::label('updated_by', 'Atualizado por:') !!}
    <p>{{ $post->updater->name ?? '--' }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Publicado em:') !!}
    <p>{{ $post->created_at->format('d/m/Y') }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Atualizado em:') !!}
    <p>{{ $post->updated_at->format('d/m/Y') }}</p>
</div>

