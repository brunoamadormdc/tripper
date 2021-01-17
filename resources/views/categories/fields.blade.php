<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nome:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-3">
    {!! Form::label('title', 'Título:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<!-- Title Field -->
<div class="form-group col-sm-3">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>
<!-- Avaliable Field -->
<div class="form-group col-sm-3">
    {!! Form::label('visible', 'Visível no rodapé:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('visible', 0) !!}
        {!! Form::checkbox('visible', '1', null) !!}
    </label>
</div>

<div class="form-group col-sm-3">
    {!! Form::label('avaliable', 'Available:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('avaliable', 0) !!}
        {!! Form::checkbox('avaliable', '1', null) !!}
    </label>
</div>

<div class="form-group col-sm-3">
    {!! Form::label('special', 'Categoria Especial:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('special', 0) !!}
        {!! Form::checkbox('special', '1', null) !!}
    </label>
</div>

<!-- Avaliable Field -->
<div class="form-group col-sm-3">
    {!! Form::label('avaliable', 'Categoria Informativa:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('informativas', 0) !!}
        {!! Form::checkbox('informativas', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('categories.index') }}" class="btn btn-default">Cancelar</a>
</div>
