<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nome:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Role -->
<div class="form-group col-sm-6">
    {!! Form::label('role', 'Permissão:') !!}
    {!! Form::select('role', 
    [
    '0' => 'Usuário',
    '1' => 'Admin',
    '2' => 'Super Admin',        
    ], null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-12">
    {!! Form::label('image', 'Foto de Perfil:') !!}
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Verified At Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    {!! Form::date('email_verified_at', null, ['class' => 'form-control','id'=>'email_verified_at']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#email_verified_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection -->


<!-- Password Field -->
@if(isset($user))
<div class="form-group col-sm-3">
    {!! Form::label('newpassword', 'Nova Senha:') !!}
    {!! Form::password('newpassword', ['class' => 'form-control']) !!}   
</div>
<div class="form-group col-sm-6">    
    <input class="form-control" name="password" type="hidden" value="{!! $user->password !!}" id="password">
</div>
@else
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Senha:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}   
</div>
@endif
<!-- Remember Token Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    {!! Form::text('remember_token', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-default">Cancelar</a>
</div>
