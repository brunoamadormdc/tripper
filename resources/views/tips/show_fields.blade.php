<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Título:') !!}
    <p>{{ $tip->title }}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', 'Descrição:') !!}
    <p>{{ $tip->body }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Foto:') !!}
    <p><img src="{{ $tip->image }}" class="img-responsive" width="300"></p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Postado em:') !!}
    <p>{{ $tip->created_at->format('d/m/Y') }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Alterado em:') !!}
    <p>{{ $tip->updated_at->format('d/m/Y') }}</p>
</div>

