<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Foto:') !!}
    <p><img src="{{ $destinyPhoto->image }}" class="img-responsive" width="500"></p>
</div>

<!-- Destiny Id Field -->
<div class="form-group">
    {!! Form::label('destiny_id', 'Destino:') !!}
    <p><a href="{{route('destinies.show', $destinyPhoto->destiny->id )}}">{{ $destinyPhoto->destiny->title }}</a></p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Enviada em:') !!}
    <p>{{ $destinyPhoto->created_at->format('d/m/Y')}}</p>
</div>

<!-- Updated At Field -->
<!-- <div class="form-group">
    {!! Form::label('updated_at', 'Alterada em:') !!}
    <p>{{ $destinyPhoto->updated_at->format('d/m/Y')}}</p>
</div> -->

