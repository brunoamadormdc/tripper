@extends('site.master')

@section('header')
@include('site.header')
@endsection
@section('tags',$seotags)

@section('conteudo')
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
<section class="container-fluid paginaHoteis">
    <section class="container" >

        <div class="row">


            <div class="col-md-6">
                <div class="row" style="padding:15px;">

                    @forelse($hotels as $hotel)
                    <div class="col-sm-6" style="margin-bottom:20px;">
                        <div class="card" style="min-height:400px !important; border:0px !important; ">
                            <a href="/{{strtolower($hotel->category->name)}}/post/{{$hotel->id}}">
                            <div style="min-height:190px !important;  height:190px; overflow:hidden; background-image:url('{{$hotel->main_image}}'); background-position:center center; background-size:cover;" ></div>
                        </a>


                            <div class="card-body" style="padding-left:0px !important; padding-right:0px !important; padding-top:0px !important; padding-bottom:0px !important;">
                                <h5 class="card-title" style="text-align:left !important; padding-left:0px !important; padding-right:0px !important;">{{$hotel->title}}</h5>
                                <p class="card-text"  >
                                   {{ Illuminate\Support\Str::limit($hotel->summary, 120) }}...
                                </p>
                            </div>
                        </div>
                    </div>
                    @empty
                        
                    @endforelse

                </div>

            </div>


            <div class="col-md-6 rightSide">

            @if(isset($banners))
            <div class="row" style="margin-bottom:20px;">
                <div class="col-md-12">
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


                    <div class="row">

                        <div class="col-md-12">

                            <div class="row">

                                @forelse($packages as $package)
                                <div class="col-sm-6">
                                    <div class="card" id="packages-card">
                                        <h5 class="card-title" style="text-align:center;">{{Illuminate\Support\Str::limit($package->title, 22)}}</h5>
                                        <a href="/{{strtolower($package->category->name)}}/post/{{$package->id}}">
                                            <img class="card-img-top" src="{{$package->main_image}}" alt="Card image cap">
                                        </a>
                                        <div class="card-body">
                                         
                                            <span style="text-align:center;">
                                                <h4>À partir de</h4>
                                                <h3> {{$package->price}}</h3>
                                            </span>
                                            <div class="col-md-12" style="margin-top:20px;">
                                                <a href="{{$package->booking_link ?? 'http://www.booking.com'}}" target="_blank" class="btn btn-primary w-100">{{$package->booking_link_text ?? 'Reservar Agora'}}</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @empty




                                @endforelse



                            </div>


                        </div>

                    </div>

            </div>
        </div>
    </section>
@if($carousel->count() > 0)
    <section class="container" id="align-to-center" style="padding-left:0px !important; padding-right:0px !important;">
           <div class="carrosselDestaques">
            <h2>Destaques</h2>
            <div class="bxCarrossel">

               <div class="row carrosselette" style="margin-left:0px; margin-right:0px;">
                @forelse($carousel as $carousel_item)
                   <div class="col-md-6">
                       <div class="row" style="margin-left:0px; margin-right:0px;">

                           <div class="col-md-4 imagem" onclick="location.href='/{{strtolower($carousel_item->category->name)}}/post/{{$carousel_item->id}}'" id="img-card-carousel" style="background-image:url('{{$carousel_item->main_image}}'); backgrond-size:cover; min-height:150px !important;">



                           </div>

                           <div class="col-md-8 conteudo">
                                <h3>
                                    {{$carousel_item->title}}
                                </h3>
                                <p>{{$carousel_item->summary}}</p>
                            </div>

                       </div>
                   </div>
                   @empty

                   @endforelse
               </div>
            </div>
        </div>

    </section>
@endif
    @if($spotlight_hotels->count() > 0)
    <section class="container" id="bottom-area">
        <div class="row">
            <div class="col-md-12" id="bottom-blocks">
                <h1>Hoteis de destaques</h1>
                <div class="card-deck">
                    @forelse($spotlight_hotels as $spotlighted_hotel)
                    <div class="card">
                        <a href="/{{strtolower($spotlighted_hotel->category->name)}}/post/{{$spotlighted_hotel->id}}">
                            <img class="card-img-top" src="{{$spotlighted_hotel->main_image}}" alt="Card image cap">
                        </a>
                        <div class="card-body">
                        <h5 class="card-title">{{$spotlighted_hotel->title}}</h5>
                        <p class="card-text">{{$spotlighted_hotel->summary}}</p>

                        </div>
                    </div>
                    @empty

                    @endforelse

                </div>

            </div>
        </div>
    </section>
    @endif

    <section class="container pdBox" style="margin-top:-40px;">
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
</section>


<script>
$('.card-deck').slick({
    lazyLoad: 'ondemand',
    dots: false,
    infinite: false,
    speed: 500,
    prevArrow: "<p class='a-left control-c prev slick-prev'><<<</p>",
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
