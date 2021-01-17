@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Home Banner 1
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($firstHomeBanner, ['route' => ['firstHomeBanners.update', $firstHomeBanner->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('first_home_banners.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection