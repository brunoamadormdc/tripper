@extends('site.master')

@section('header')
@include('site.header')
@endsection
@section('author',$post->owner->name)
@section('tags',$seotags)

@section('conteudo')
<script type='text/javascript'>

@foreach($post->photos as $key => $photo)
   fotos.push({
      'chave': '{{$key}}',
      'foto': '{{$photo->image}}'
   });
@endforeach

</script>
<div class="container-fluid internas">
    <div class="bannerInternadestinos">
        <h1>Sua experiência de <br>
            viagem compartilhada
        </h1>
    </div>

</div>

<section class="container">
    @include('site.menudicas')
</section>

<section class="container internasPage pdBox">

    <!-- TITLE -->
    <div class="row">
        <div class="col-sm-12">
            <h1>{{$post->title}}</h1>
            <h3>{{$post->subtitle}}</h3>
        </div>
    </div>

    <div class="row" style="margin-bottom:30px;">
        <div class="col-sm-6">
             @if($post->main_image != '')
            <img src="{{$post->main_image}}" onclick="openImage('{{$post->main_image}}')" alt="" style="width:100%;">
            @endif
        </div>
        <div class="col-sm-6">
             @if($post->secondary_image != '')
            <img src="{{$post->secondary_image ?? ''}}" onclick="openImage('{{$post->secondary_image}}')" alt="" style="width:100%;">
            @endif
        </div>
    </div>
    <!-- POST -->
    <div class="row">
        <div class="col-sm-12">
            <p>{!! $post->body !!}</p>
        </div>


    </div>

    <!-- PHOTOS -->
    <div class="row fotorama" style="margin-top:5px; margin-bottom:5px;">
        <div class="col-sm-12">
            <div class="card-deck galeria">
                @forelse($post->photos as $key => $photo)
                <div class="card">
                        <img class="card-img-top" ng-click="carregarfotos('{{$key}}')" style="min-height:200px; background-size:cover !important; background-image:url('{{$photo->image}}');">
                </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
    
        @if($post->underbody != null)
        <div class="row InternasNovas dics underbody">
        <div class="col-md-12 col-sm-12">
         
            {!! $post->underbody !!} 
        </div>
        
    </div>
    @endif


</section>
@if($post->iframe1 != null)
    <section class="container iframesParceiros">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                {!! $post->iframe1 !!}                
            </div>
        </div>
    </section>
    @endif
      @if($post->iframe2 != null)
    <section class="container iframesParceiros">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                {!! $post->iframe2 !!}                
            </div>
        </div>
    </section>
    @endif
     @if($post->iframe3 != null)
    <section class="container iframesParceiros">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                {!! $post->iframe3 !!}                
            </div>
        </div>
    </section>
    @endif
    
     @if($post->iframe4 != null)
    <section class="container iframesParceiros">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                {!! $post->iframe4 !!}                
            </div>
        </div>
    </section>
    @endif
    
    @if($post->iframe5 != null)
    <section class="container iframesParceiros">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                {!! $post->iframe5 !!}                
            </div>
        </div>
    </section>
    @endif

<!-- CAROUSEL AND PHOTOS SCRIPT AND DETAILS -->
<script>

    function showPackageInfo(p1, p2) {
        document.getElementById("package_videos").style.display='none';
        document.getElementById("package_information").style.display='block';
    }
    function showPackageVideos(p1, p2) {
        document.getElementById("package_information").style.display='none';
        document.getElementById("package_videos").style.display='block';
    }

    $('.card-deck').slick({
    lazyLoad: 'ondemand',
    dots: false,
    infinite: false,
    speed: 500,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
});


</script>

@endsection

@section('footer')
@include('site.footer')
@endsection
