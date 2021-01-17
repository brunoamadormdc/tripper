
<script src="/ckeditor/ckeditor.js"></script>
<!-- Title Field -->
<div class="form-group col-sm-10">
    {!! Form::label('title', 'Título:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<!-- Published Field -->
<div class="form-group col-sm-2">
    {!! Form::label('published', 'Esconder título:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('viewtitle', 0) !!}
        {!! Form::checkbox('viewtitle', '1', null) !!}
    </label>
</div>
<!-- Subtitle Field -->
<div class="form-group col-sm-10">
    {!! Form::label('subtitle', 'Subtítulo:') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-2">
    {!! Form::label('iconcolor', 'Cor do ícone:') !!}
    {!! Form::color('iconcolor', null, ['class' => 'form-control']) !!}
</div>

<!-- Summary Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('summary', 'Resumo:') !!}
    {!! Form::textarea('summary', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('body', 'Texto:') !!}
    {!! Form::textarea('body', null, ['id' => 'body-ckeditor','class' => 'form-control']) !!}
</div>
<!-- Body Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('underbody', 'Texto 2 (aparece abaixo da galeria de imagens) :') !!}
    {!! Form::textarea('underbody', null, ['id' => 'body-ckeditor2','class' => 'form-control']) !!}
</div>
<!-- Body Field -->
<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Preço:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Booking Link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('booking_link', 'Link para Reserva:') !!}
    {!! Form::text('booking_link', null, ['class' => 'form-control']) !!}
</div>

<!-- Booking Link Text Field -->
<div class="form-group col-sm-6">
    {!! Form::label('booking_link_text', 'Texto do Link de Reserva:') !!}
    {!! Form::text('booking_link_text', null, ['class' => 'form-control']) !!}
</div>

<!-- External Link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('external_link', 'Link Externo:') !!}
    {!! Form::text('external_link', null, ['class' => 'form-control']) !!}
</div>

<!-- Font Text Field -->
<div class="form-group col-sm-6">
    {!! Form::label('font_text', 'Texto do Link da Fonte:') !!}
    {!! Form::text('font_text', null, ['class' => 'form-control']) !!}
</div>

<!-- Font Link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('font_link', 'Link da Fonte:') !!}
    {!! Form::text('font_link', null, ['class' => 'form-control']) !!}
</div>

<!-- Main Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('main_image', 'Imagem Principal:') !!}
    {!! Form::file('main_image') !!}
</div>
<div class="clearfix"></div>

<!-- Secondary Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('secondary_image', 'Imagem Secundária:') !!}
    {!! Form::file('secondary_image') !!}
</div>
<div class="clearfix"></div>

<!-- Page Field -->
<div class="form-group col-sm-6">
    {!! Form::label('page', 'Página:') !!}
    {!! Form::select('page', 
    [
    'Nenhum' => 'Nenhum',
    'Geral' => 'Geral',
    'Geral - (Carrossel)' => 'Geral - (Carrossel)',
    'Home - Area 1' => 'Home - Area 1',
    'Home - Area 2' => 'Home - Area 2',
    'Dicas - Area 1' => 'Dicas - Area 1',   
    'Dicas Interna - (Carrossel)' => 'Dicas Interna - (Carrossel)',
    'Vantagens - Area 1' => 'Vantagens - Area 1',
    'Vantagens Interna - (Carrossel)' => 'Vantagens Interna - (Carrossel)',
    'Destinos Interna - (Carrossel)' => 'Destinos Interna - (Carrossel)',
    'Luxury - Area 1' => 'Luxury - Area 1',
    'Luxo Interna - (Carrossel)' => 'Luxo Interna - (Carrossel)',
    'Noticias - Area 1' => 'Noticias - Area 1',
    'Pacotes - (Carrossel 1)' => 'Pacotes - (Carrossel 1)',
    'Pacotes - (Carrossel 2)' => 'Pacotes - (Carrossel 2)',
    'Hoteis - (Carrossel)' => 'Hoteis - (Carrossel)',    
    ], null, ['class' => 'form-control']) !!}
</div>


<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Categoria:') !!}
    <!-- {!! Form::select('category_id', [], null, ['class' => 'form-control']) !!} -->
    <select class="form-control" id="category_id" name="category_id">
        @forelse($categories as $category)        
        <option value="{{$category->id}}" @if(isset($post) && $post->category_id == $category->id) selected @endif>{{$category->name}}</option>
        @empty
        <option value="Uncategorized">Nenhuma Categoria</option>
        @endforelse
    </select>    
</div>

<!-- Published Field -->
<div class="form-group col-sm-6">
    {!! Form::label('published', 'Publicado:') !!}
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

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('iframe1', 'Código de parceiro (iframe):') !!}
    {!! Form::textarea('iframe1', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('iframe2', 'Código de parceiro (iframe):') !!}
    {!! Form::textarea('iframe2', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('iframe3', 'Código de parceiro (iframe):') !!}
    {!! Form::textarea('iframe3', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('iframe4', 'Código de parceiro (iframe):') !!}
    {!! Form::textarea('iframe4', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('iframe5', 'Código de parceiro (iframe):') !!}
    {!! Form::textarea('iframe5', null, ['class' => 'form-control']) !!}
</div>
<!-- Created By Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    {!! Form::text('created_by', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Updated By Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('updated_by', 'Updated By:') !!}
    {!! Form::text('updated_by', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('posts.index') }}" class="btn btn-default">Cancelar</a>
</div>


<script>
    CKEDITOR.replace( 'body-ckeditor' );
    CKEDITOR.replace( 'body-ckeditor2' );
    
</script>
