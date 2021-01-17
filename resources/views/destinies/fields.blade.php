<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Título:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Body Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('body', 'Descrição:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<!-- Main Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('main_image', 'Foto 1:') !!}
    {!! Form::file('main_image') !!}
</div>
<div class="clearfix"></div>

<!-- Secondary Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('secondary_image', 'Foto 2:') !!}
    {!! Form::file('secondary_image') !!}
</div>
<div class="clearfix"></div>

<!-- Tags Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tags', 'Tags (Separadas por vírgula):') !!}    
    @if(isset($tags) && $tags != '')
        <input type="text" name="tags" class="form-control" id="tags" value="{{ $tags }}">
    @elseif(isset($tags) && $tags == "")
        <input type="text" name="tags" class="form-control" id="tags" value="">
    @else
        {!! Form::text('tags', null, ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Published Field -->
<div class="form-group col-sm-6">
    {!! Form::label('published', 'Publicado ?:') !!}
    <label class="checkbox-inline">        
        {!! Form::checkbox('published', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('destinies.index') }}" class="btn btn-default">Cancelar</a>
</div>
