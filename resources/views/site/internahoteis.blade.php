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
    <div class="bannerHotels">
        <h1>Sua experiência de <br>
            viagem compartilhada
        </h1>
    </div>

</div>
<section class="container">
    @include('site.menudicas')
</section>
<section class="container internasPage" style="padding:0px !important;padding-top:20px !important;">
    <!-- TITULO -->
    <div class="row">
        <div class="col-sm-12 botHoteis">
            <div class="row">
                <div class="col-md-6"> <h1>{{$post->title}}</h1></div>
                
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-6">
                            
                        </div>
                        <div class="col-md-6">
                            <button style="width:100%;" onclick="location.href='{{ $post->booking_link }}'">{{$post->booking_link_text ?? 'RESERVE JÁ'}}</button>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    <!-- IMAGENS -->
    <div class="row" style="margin-bottom:20px;">
        <div class="col-sm-6">
             @if($post->main_image != '')
            <div style="padding:5px; min-height:350px; height:350px; overflow:hidden; background-size:cover !important; background-image:url('{{$post->main_image}}');" onclick="openImage('{{$post->main_image}}')"></div>
        @endif
        </div>
        <div class="col-sm-6">
             @if($post->secondary_image != '')
            <div style="padding:5px; min-height:350px; height:350px; overflow:hidden; background-size:cover !important; background-image:url('{{$post->secondary_image}}');" onclick="openImage('{{$post->secondary_image}}')"></div>
            @endif
        </div>
    </div>
    <!-- TEXTO -->
    <div class="row" style="margin-bottom:20px;">
        <div class="col-sm-12">
            {!! $post->body !!}
        </div>
    </div>
    <!-- FOTOS -->
    <div class="row fotorama" style="margin-bottom:5px;">
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
    <section class="container">
            
        
    </section>
  <section class="container">
        <div class="carrosselDestaques hoteis">
            <h2 style="padding-left:30px !important;">Lugares similares para se hospedar</h2>
            <div class="bxCarrossel">

               <div class="row carrosselette">
                @forelse($like_hotels as $carousel_item)
                   <div class="col-md-6">
                       <div class="row" style="margin-left:0px; margin-right:0px;">

                          
                           <div class="col-md-12 imagem"  onclick="location.href='/{{strtolower($carousel_item->category->name)}}/post/{{$carousel_item->id}}'">
                               <div style="margin:20px;background-size:cover; height:200px; background-image:url({{$carousel_item->main_image}});";>
                               
                               </div>

                           </div>

                           <div class="col-md-12 conteudo" onclick="location.href='/{{strtolower($carousel_item->category->name)}}/post/{{$carousel_item->id}}'">
                                <h3 onclick="location.href='/{{strtolower($carousel_item->category->name)}}/post/{{$carousel_item->id}}'">
                                    {{$carousel_item->title}}
                                </h3>
                                <p onclick="location.href='/{{strtolower($carousel_item->category->name)}}/post/{{$carousel_item->id}}'">
                                    {!! Illuminate\Support\Str::limit($carousel_item->summary, 100) !!}
                                </p>
                            </div>
                       </div>
                   </div>
                   @empty

                   @endforelse
               </div>
            </div>
        </div>
    </section>

   

    <div class="row">
        <div class="col-sm-6">
            <section class="container" style="padding:0px !important; padding-top:15px !important;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="contTabs">
                            <div id="hoteis" class="hoteis">
                                 <ins class="bookingaff" data-aid="2066603" data-target_aid="2066603" data-prod="nsb" data-width="100%" data-height="400" data-lang="xb" data-currency="BRL" data-df_num_properties="3">
    <!-- Anything inside will go away once widget is loaded. -->
        <a href="//www.booking.com?aid=2066603">Booking.com</a>
</ins>
<script type="text/javascript">
    (function(d, sc, u) {
      var s = d.createElement(sc), p = d.getElementsByTagName(sc)[0];
      s.type = 'text/javascript';
      s.async = true;
      s.src = u + '?v=' + (+new Date());
      p.parentNode.insertBefore(s,p);
      })(document, 'script', '//aff.bstatic.com/static/affiliate_base/js/flexiproduct.js');
</script>
                            </div>
                            <div id="passagens" class="passagens"></div>
                            <div id="carros" class="carros">

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-sm-6">
        @if(isset($banners))
            <div class="row" style="margin-top:15px;">
                <div class="col-sm-12" >
                    <!--Carousel Wrapper-->

                    <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
                        <!--Indicators-->

                        <ol class="carousel-indicators">
                            @foreach($banners as $bannerindicator)
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
                            @foreach($banners as $banner)
                            @if($loop->index == 0)
                            <!--First slide-->
                            <div class="carousel-item active">
                                <figure id="img-carousel-home">
                                <img class="d-block w-100 img-opacity" src="{{$banner->image}}"
                                    alt="First slide">
                                @if($banner->title != null)
                                <figcaption class="titulo">{{$banner->title}}</figcaption>
                                @endif

                                @if($banner->body != null)
                                <figcaption class="texto">{!! Illuminate\Support\Str::limit($banner->body,50) !!}</figcaption>
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
                            <div class="carousel-item">
                                <figure id="img-carousel-home">
                                <img class="d-block w-100 img-opacity" src="{{$banner->image}}" alt="Second slide">
                                    @if($banner->title != null)
                                    <figcaption class="titulo">{{$banner->title}}</figcaption>
                                    @endif
                                    @if($banner->body != null)
                                    <figcaption class="texto">{!! Illuminate\Support\Str::limit($banner->body,50) !!}</figcaption>
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

                        <!--/.Slides-->

                        <!--Controls-->

                       <!--  <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a> -->

                        <!--/.Controls-->

                    </div>

                <!--/.Carousel Wrapper-->
                </div>
            </div>
            @endif
        </div>
    </div>
    
    
       <!-- FORM TITLE -->
    <div class="row" style="margin-bottom:5px; margin-top:5px;">
        <div class="col-sm-12 col-md-12">
            <h1>Entre em contato para maiores informações</h1>
        </div>
    </div>

    <!-- FORM AND PACKAGE-->
    <div class="row formDicas" style="margin-bottom:5px; margin-top:5px;">

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
                        <textarea name="body" id="" rows="8" style="width:100%;"></textarea>
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

        <!-- PACKAGE -->
          @if(isset($package))
                <div class="col-md-3">
                    <div class="boxReservas">
                        <h3>{{$package->title}}</h3>
                        <a href="/{{strtolower($package->category->name)}}/post/{{$package->id}}">
                            <div class="imagem" style="background-image:url('{{$package->main_image}}')">
                            </div>
                        </a>
                       
                        <div class="precos">
                            <span class="descricao">À partir de</span>
                            <span class="preco">{{$package->price}}</span>
                        </div>
                        <a href="{{$package->booking_link ?? 'http://www.booking.com'}}"><button class="pacotes">{{ $package->booking_link_text ?? 'Reservar Agora'}}</button></a>
                    </div>
                </div>
                @endif

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


<script>

    $('.galeria').slick({
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

<script>

    $('.similares').slick({
    lazyLoad: 'ondemand',
    dots: false,
    infinite: false,
    speed: 500,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
});




</script>

@endsection

@section('footer')
@include('site.footer')
@endsection
