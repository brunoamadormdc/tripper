<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Foto:') !!}
    {!! Form::file('image') !!}
</div>
<div class="clearfix"></div>

<!-- Destiny Id Field -->
<div class="form-group col-sm-6">    
    {!! Form::hidden('destiny_id', $destiny->id, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}    
</div>
