<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nome:') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Foto de Perfil:') !!}
    <p><img src="{{ $user->image }}" class="img-responsive" width="150" height="150"></p>
</div>

<!-- Email Verified At Field -->
<!-- <div class="form-group">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p>{{ $user->email_verified_at }}</p>
</div> -->

<!-- Password Field -->
<!-- <div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $user->password }}</p>
</div> -->

<!-- Remember Token Field -->
<!-- <div class="form-group">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    <p>{{ $user->remember_token }}</p>
</div> -->

