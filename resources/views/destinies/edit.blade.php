@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Destinos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($destiny, ['route' => ['destinies.update', $destiny->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('destinies.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection