@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detalhes da Publicação
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($postDetail, ['route' => ['postDetails.update', $postDetail->id], 'method' => 'patch']) !!}

                        @include('post__details.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection