<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Titulo:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Imagem:') !!}
    {!! Form::file('image') !!}
</div>
<div class="clearfix"></div>

<!-- Link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('link', 'Link:') !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
</div>

<!-- Body Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('body', 'Descricao:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<!-- Promotion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('promotion', 'Promocao:') !!}
    {!! Form::text('promotion', null, ['class' => 'form-control']) !!}
</div>

<!-- Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location', 'Local do banner:') !!}
    {!! Form::select('location', [
        'Home-Banner-1' => 'Home Banner 1',
         'Home-Banner-Carrousel' => 'Home Banner Carousel', 
         'Dicas' => 'Dicas', 
         'Luxo' => 'Luxo',
         'Vantagens' => 'Vantagens',
         'Vantagens Rotativo' => 'Vantagens Rotativo', 
         'Vantagens Carrossel' => 'Vantagens Carrossel', 
         'Destinos-carrousel-1' => 'Destinos Carousel 1',
          'Pacotes' => 'Pacotes',
           'Hoteis' => 'Hoteis',
            'Geral' => 'Geral'],
             null,
              ['class' => 'form-control']) !!}
</div>


<!-- Published Field -->
<div class="form-group col-sm-6">
    {!! Form::label('published', 'Publicado ?:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('published', 0) !!}
        {!! Form::checkbox('published', '1', null) !!}
    </label>
</div>

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
    <a href="{{ route('banners.index') }}" class="btn btn-default">Cancelar</a>
</div>
