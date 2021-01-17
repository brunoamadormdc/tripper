@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Teste
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($teste, ['route' => ['testes.update', $teste->id], 'method' => 'patch']) !!}

                        @include('testes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection