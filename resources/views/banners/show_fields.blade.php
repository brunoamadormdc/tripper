<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Titulo:') !!}
    <p>{{ $banner->title }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Imagem:') !!}
    <p><img src="{{ $banner->image }}" class="img-responsive" width="500"></p>
</div>

<!-- Link Field -->
<div class="form-group">
    {!! Form::label('link', 'Link:') !!}
    <p>{{ $banner->link }}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', 'Descrição:') !!}
    <p>{{ $banner->body }}</p>
</div>

<!-- Promotion Field -->
<div class="form-group">
    {!! Form::label('promotion', 'Promoção:') !!}
    <p>{{ $banner->promotion }}</p>
</div>

<!-- Location Field -->
<div class="form-group">
    {!! Form::label('location', 'Local do Banner:') !!}
    <p>{{ $banner->location }}</p>
</div>

<!-- Published Field -->
<div class="form-group">
    {!! Form::label('published', 'Publicado ?:') !!}
    <p>
    @if($banner->published)
        <span class="fa fa-check text-success"></span>
    @else
        <span class="fa fa-close text-danger"></span>
    @endif  
    </p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado em:') !!}
    <p>{{ $banner->created_at->format('d/m/Y') }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Alterado em:') !!}
    <p>{{ $banner->updated_at->format('d/m/Y') }}</p>
</div>

