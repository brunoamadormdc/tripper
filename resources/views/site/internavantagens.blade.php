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
<section class="container-fluid internas">
<div class="container-fluid internas">
    <div class="bannerSuaviagem" >
        <h1>Sua experiência de <br>
            viagem compartilhada
        </h1>
    </div>

</div>

<section class="container">
    @include('site.menudicas')
</section>
<div class="container-fluid botReserva">
    <div class="container">
        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-3">
                <button onclick="location.href='{{ $post->booking_link }}">Reserve já</button>
            </div>
        </div>
    </div>
</div>
<div class="container bannerVantagens" style="background-image:url({{$post->main_image}})" onclick="openImage('{{$post->main_image}}')">
    
</div>
<section class="container internasPage InternasNovasVantagens pdBox">
@include('flash::message')

 
    <!-- POST -->
    <div class="row">
        <div class="col-sm-12 col-md-12">
           
            <div class="row" style="margin-left:0px; margin-right:0px;">
                    <div class="col-md-12" style="padding-left:20px !important; padding-right:20px !important;">
                       
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                  <div style="padding-left:20px !important; margin-left:30px; padding-right:20px !important; float:right; margin-right:10px; margin-bottom:10px; width:50% !important; display:flex; ">
               <div class="row">
                   <div class="col-md-12 col-xs-12 benefitsDestaques">
                       <div class="row">
                            <h2 class="titulo">
                                    Destaques da Vtripper
                                </h2>
                       </div>
                       <div class="row">
                          
                       @foreach($postsbenefits as $posti)
                            <div class="cardiff col-md-4">
                              <a href="{!! '/'.strtolower($posti->category->name).'/post/'.$posti->id !!}">
                                <div class="bxImage" style="background-image:url({{ $posti->main_image }})">
                                   
                                </div>
                            </a>
                                <div class="bxTexto">
                                    <h5 style='margin-bottom:5px;'>{{ $posti->title }}</h5>
                                        {!! Illuminate\Support\Str::limit($posti->summary,150) !!}
                            </div>

                            </div>
                        @endforeach
                    </div>
                   </div>
              
            </div>
           
               
                                </div>
  <h1 style="display:block; padding-left:0px !important; margin-top:10px; margin-bottom:10px;">{{$post->title}}</h1>
                                {!! $post->body !!}
                              
                            </div>

                    </div>


                    </div>
               
               
           
            </div>


        </div>
    </div>
     <!-- PHOTOS -->
       <div class="row fotorama" style="margin-top:5px; margin-bottom:5px;">
           
        <div class="col-sm-12">
            <div class="card-deck">
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

    <div class="row">
        <div class="col-sm-6">
             <div class="row">
         <div class="col-md-12 paddingGeral" >
                @if(isset($bannercarousel))
    
                <!--Carousel Wrapper-->
    
                <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
                    <!--Indicators-->
    
                    <ol class="carousel-indicators">
                        @foreach($bannercarousel as $bannerindicator)
                        @if($loop->index == 0)
                        <li data-target="#carousel-example-1z" data-slide-to="{{$loop->index}}" class="active"></li>
                        @else
                        <li data-target="#carousel-example-1z" data-slide-to="{{$loop->index}}"></li>
                        @endif
                        @endforeach
                    </ol>
    
                    <!--/.Indicators-->
    
                    <!--Slides-->
    
                    <div class="carousel-inner" role="listbox">
                        @foreach($bannercarousel as $banner)
                        @if($loop->index == 0)
                        <!--First slide-->
                        <div class="carousel-item active" style="background-image:url('{{$banner->image}}'); background-size:cover !important; width:100%; height:370px !important;" >
                            <figure id="img-carousel-home">
    
                            @if($banner->title != null)
                            <div class="titulo">{{$banner->title}}</div>
                            @endif
    
                            @if($banner->body != null)
                            <div class="texto">{!! Illuminate\Support\Str::limit($banner->body,150) !!}</div>
                            @endif
                            @if($banner->link != null)
                            <div class="saibamais"><a href="{{$banner->link}}" target="_blank">Saiba <span>+</span></a>
                            </div>
                            @endif
                            </figure>
                        </div>
                        <!--/First slide-->
                        @else
                        <!--Second slide-->
                        <div class="carousel-item"  style="background-image:url('{{$banner->image}}'); background-size:cover !important; width:100%; height:370px !important;">
                            <figure id="img-carousel-home">
    
                                @if($banner->title != null)
                                <div class="titulo">{{$banner->title}}</div>
                                @endif
                                @if($banner->body != null)
                                <div class="texto">{!! Illuminate\Support\Str::limit($banner->body,150) !!}</div>
                                @endif
                                @if($banner->link != null)
                                <div class="saibamais"><a href="{{$banner->link}}" target="_blank">Saiba <span>+</span></a>
                                </div>
                                @endif
                            </figure>
                        </div>
                        <!--/Second slide-->
                        @endif
                        @endforeach
                    </div>
    
                </div>
    
                <!--/.Carousel Wrapper-->
    
                @endif
    
    
            </div>
    </div> 
        </div>
        <div class="col-sm-6">
             <div class="row">
                <div class="col-md-12">
                    @if(isset($firstbanner))
                    <div class="destaqueBannersespecial" style="margin-top:12px !important;">
                        <div class="bxCarrosselespecial" style="background-image:url('{{$firstbanner->image}}');">
                            @isset($firstbanner->title)
                            <div class="titulo">
                                {{$firstbanner->title}}
                            </div>
                            @endisset
                            @isset($firstbanner->promotion)
                            <div class="desconto">
                                {{$firstbanner->promotion}}
                            </div>
                            @endif
                            @if($firstbanner->link != null)
                            <div class="saiba baixo"><a href="{{$firstbanner->link}}" target="_blank">Saiba <span>+</span></a>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            
        </div>
        
    </div>
    
    <div class="row">
         
       
        <div class="col-md-12 paddingGeral">
            <div class="row">
                @if(isset($packages[0]))
                @forelse($packages[0] as $package)

                <div class="col-md-3">
                    <div class="boxReservas">
                        <h3>{!! Illuminate\Support\Str::limit($package->title, 20) !!}</h3>
                        <a href="{{ $package->external_link ?? '/'.strtolower($package->category->name).'/post/'.$package->id}}">
                            <div class="imagem" style="background-image:url('{{$package->main_image}}')">
                            </div>
                        </a>
                        <p>{!! Illuminate\Support\Str::limit($package->summary,150) !!}</p>
                        <a href="{{$package->booking_link ?? 'http://www.booking.com'}}"><button>{{$package->booking_text ?? 'Reservar'}}</button></a>
                    </div>
                </div>
                @empty

                @endforelse
                @endif
            </div>

        </div>

    </div>

    <!-- FORM TITLE -->
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <h1>Faça um comentário e ajude a comunidade</h1>
        </div>
    </div>

    <!-- FORM AND PACKAGE-->
    <div class="row formDicas" style="margin-bottom:0px;">

        <!-- FORM -->
        <div class="col-sm-12 col-md-12">
            <div style="height:auto; overflow:hidden; padding:10px;">


            <form method="POST" action="{{route('commentpost')}}">
                @csrf
                {!! Form::hidden('post_id', $post->id, ['class' => 'form-control']) !!}
                {!! Form::hidden('user_id', Auth()->user()->id ?? 0, ['class' => 'form-control']) !!}
                {!! Form::hidden('published', 0, ['class' => 'form-control']) !!}
                <div class="row" style="margin-bottom:20px; margin-left:0px !important; margin-right:0px !important;">
                    <div class="col-sm-12 col-md-12">
                        <textarea name="body" id="" rows="14" style="width:100%;"></textarea>
                    </div>

                </div>
                <div class="row" style="margin-bottom:20px; margin-left:0px !important; margin-right:0px !important;">
                   <div class="col-sm-3 col-md-3">
                        <input type="text" name="name" id="" placeholder="Nome" style="width:100%;">
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <input type="text" name="email" id="" placeholder="E-mail" style="width:100%;">
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <input type="text" name="telefone" id="telefone" placeholder="Telefone" style="width:100%;">
                        
                    </div>
                     <div class="col-sm-3 col-md-3">
                       <input type="submit" class="btn btn-primary" style="background-color:#eee !important; color:#000 !important; width:96% !important; " value="Enviar Comentario">
                        
                    </div>
                </div>

            </form>
        </div>
        </div>

      

    </div>

   

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

<!-- CAROUSEL AND PHOTOS SCRIPT -->
<script>

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
</section>
@endsection

@section('footer')
@include('site.footer')
@endsection
