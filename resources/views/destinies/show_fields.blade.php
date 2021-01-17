<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Título:') !!}
    <p>{{ $destiny->title }}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', 'Descrição:') !!}
    <p>{{ $destiny->body }}</p>
</div>

<!-- Main Image Field -->
<div class="form-group">
    {!! Form::label('main_image', 'Foto 1:') !!}
    <p><img src="{{ $destiny->main_image }}" class="img-responsive" width="300"></p>
</div>

<!-- Secondary Image Field -->
<div class="form-group">
    {!! Form::label('secondary_image', 'Foto 2:') !!}
    <p><img src="{{ $destiny->secondary_image }}" class="img-responsive" width="300"></p>
</div>

<!-- Published Field -->
<div class="form-group">
    {!! Form::label('published', 'Publicado ?:') !!}
    <p style="font-size:25px;">
    @if($destiny->published)
        <span class="fa fa-check text-success"></span>
    @else
        <span class="fa fa-close text-danger"></span>
    @endif   
    </p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado em:') !!}
    <p>{{ $destiny->created_at->format('d/m/Y') }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Alterado em:') !!}
    <p>{{ $destiny->updated_at->format('d/m/Y') }}</p>
</div>

