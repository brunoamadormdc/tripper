<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Imagem:') !!}
    <p><img src="{{ $firstHomeBanner->image }}" class="img-responsive" width="500"></p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', 'Descrição:') !!}
    <p>{{ $firstHomeBanner->body }}</p>
</div>

<!-- Published Field -->
<div class="form-group">
    {!! Form::label('published', 'Publicado ?:') !!}
    <p>
    @if($firstHomeBanner->published)
        <span class="fa fa-check text-success"></span>
    @else
        <span class="fa fa-close text-danger"></span>
    @endif
    </p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado em:') !!}
    <p>{{ $firstHomeBanner->created_at->format('d/m/Y') }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Alterado em:') !!}
    <p>{{ $firstHomeBanner->updated_at->format('d/m/Y') }}</p>
</div>

