<!-- Post Id Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('post_id', 'Post Id:') !!} -->
    {!! Form::hidden('post_id', $postComment->post->id ?? $post->id, ['class' => 'form-control']) !!}
<!-- </div> -->

<!-- User Id Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!} -->
    {!! Form::hidden('user_id', Auth()->user()->id, ['class' => 'form-control']) !!}
<!-- </div> -->

<!-- Email Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Name Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Webpage Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('webpage', 'Webpage:') !!}
    {!! Form::text('webpage', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Body Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('body', 'Comentário:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<!-- Published Field -->
<div class="form-group col-sm-6">
    {!! Form::label('published', 'Publicado:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('published', 0) !!}
        {!! Form::checkbox('published', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('postComments.index') }}" class="btn btn-default">Cancelar</a>
</div>
