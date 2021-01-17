@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Dicas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tip, ['route' => ['tips.update', $tip->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('tips.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection