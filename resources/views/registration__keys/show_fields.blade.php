<!-- Key Field -->
<div class="form-group">
    {!! Form::label('key', 'Chave:') !!}
    <p>{{ $registrationKey->key }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Ativa ?:') !!}
    <p>    
    @if($registrationKey->status)
        <span class="fa fa-check text-success"></span>
    @else
        <span class="fa fa-close text-danger"></span>
    @endif</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $registrationKey->created_at->format('d/m/Y') }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $registrationKey->updated_at->format('d/m/Y') }}</p>
</div>

