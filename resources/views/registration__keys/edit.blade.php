@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Chave de Registro
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($registrationKey, ['route' => ['registrationKeys.update', $registrationKey->id], 'method' => 'patch']) !!}

                        @include('registration__keys.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection