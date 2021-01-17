@if(isset($registrationKey))
<!-- Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('key', 'Chave:') !!}
    <p>{{ $registrationKey->key }}</p>
    <input type="hidden" value="{{$registrationKey->key}}" name="key">
</div>
@else
<!-- Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('key', 'Chave:') !!}
    {!! Form::text('key', null, ['class' => 'form-control']) !!}
</div>
@endif
<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Ativa ?:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', 0) !!}
        {!! Form::checkbox('status', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('registrationKeys.index') }}" class="btn btn-default">Cancelar</a>
</div>
