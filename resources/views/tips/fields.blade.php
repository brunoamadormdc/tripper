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

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Foto:') !!}
    {!! Form::file('image') !!}
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

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('tips.index') }}" class="btn btn-default">Cancelar</a>
</div>
