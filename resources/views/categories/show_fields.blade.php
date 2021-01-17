<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nome:') !!}
    <p>{{ $category->name }}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Título:') !!}
    <p>{{ $category->title }}</p>
</div>

<!-- Avaliable Field -->
<div class="form-group">
    {!! Form::label('avaliable', 'Publicado:') !!}
    <p>
        @if($category->avaliable == 1)
            <span class="fa fa-check"></span>
        @else
            <span class="fa fa-times"></span>
        @endif
    </p>
</div>

<!-- Created By Field -->
<div class="form-group">
    {!! Form::label('created_by', 'Criado por:') !!}
    <p>{{ $category->owner->name }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado em:') !!}
    <p>{{ $category->created_at->format('d/m/Y') }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Atualizado em:') !!}
    <p>{{ $category->updated_at->format('d/m/Y') }}</p>
</div>

