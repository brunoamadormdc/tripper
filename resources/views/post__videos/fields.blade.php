<!-- Video Link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('video_link', 'Link do Vídeo (YouTube):') !!}
    {!! Form::text('video_link', null, ['class' => 'form-control', 'placeholder' => 'https://www.youtube.com/watch?v=XxXxXxXx']) !!}
</div>

<!-- Video Id Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('video_id', 'Video Id:') !!}
    {!! Form::text('video_id', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Published Field -->
<div class="form-group col-sm-6">
    {!! Form::label('published', 'Publicado:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('published', 0) !!}
        {!! Form::checkbox('published', '1', null) !!}
    </label>
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


<!-- Post Id Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('post_id', 'Post Id:') !!} -->
    {!! Form::hidden('post_id', $postVideo->post->id ?? $post->id, ['class' => 'form-control']) !!}
<!-- </div> -->

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('postVideos.index') }}" class="btn btn-default">Cancelar</a>
</div>
