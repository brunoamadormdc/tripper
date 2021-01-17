<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Título:') !!}
    <p>{{ $package->title }}</p>
</div>

<!-- Subtitle Field -->
<div class="form-group">
    {!! Form::label('subtitle', 'Subtítulo:') !!}
    <p>{{ $package->subtitle }}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', 'Descrição:') !!}
    <p>{{ $package->body }}</p>
</div>

<!-- Main Image Field -->
<div class="form-group">
    {!! Form::label('main_image', 'Foto Principal:') !!}
    <p><img src="{{ $package->main_image }}" class="img-responsive" width="500"></p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Preço:') !!}
    <p>{{ $package->price }}</p>
</div>

<!-- Published Field -->
<div class="form-group">
    {!! Form::label('published', 'Publicado ?:') !!}
    <p>
    @if($package->published)
        <span class="fa fa-check text-success"></span>
    @else
        <span class="fa fa-close text-danger"></span>
    @endif
    </p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado em:') !!}
    <p>{{ $package->created_at->format('d/m/Y') }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Alterado em:') !!}
    <p>{{ $package->updated_at->format('d/m/Y') }}</p>
</div>

