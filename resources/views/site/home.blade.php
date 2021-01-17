@extends('site.master')

@section('header')
@include('site.header')
@endsection


@section('conteudo')

<div ng-app="vtripper">
    <div class="container-fluid internas" ng-controller="homeController">
        <div class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 chamada">
                        <h2>Sua experiência <br>de viagem, compartilhada.</h2>
                    </div>
                    <div class="col-md-6 tabs">
                        <div class="boxTabs">
                            <ul>
                                <li ng-click="setTab(1)" ng-class="{ active: isSet(1) }">Hotéis</li>
                                <li ng-click="setTab(2)" ng-class="{ active: isSet(2) }" >Passagens</li>
                                <li ng-click="setTab(3)" ng-class="{ active: isSet(3) }" >Carros</li>
                            </ul>
                            <div class="contTabs">
                                <div id="hoteis" ng-show="isSet(1)" class="hoteis"  >
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
                                <div id="passagens"ng-show="isSet(2)" class="passagens">
                                    <iframe src="https://compra.portaldaagencia.com.br/ceotravel" style="border:0px #ffffff none;" name="iframpassagens" scrolling="no" frameborder="0" marginheight="0px" marginwidth="0px" height="400px" width="100%" allowfullscreen></iframe>
                                </div>
                                <div id="carros" ng-show="isSet(3)" class="carros">
                                    <object
                                    data="https://widgets.rentcars.com/widget-v1.html?requestor=2435&locale=pt-br&utm_source=www.vtripper.com.br&utm_medium=afiliado-widget"
                                    width="100%" height="400"></object>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="container">
            @include('site.menudicas')
        </section>
        <section class="container">
            <div class="row">
                <div class="col-md-6 paddingGeral">
                    @forelse($posts_area1 as $post)
                    <div class="destaqueSimples">
                        <div class="bxDestaquesimples" style="margin-top:5px !important;">

                            <a href="{{ $post->external_link ?? '/'.strtolower($post->category->name).'/post/'.$post->id}}">
                            <!-- <a href="/{{strtolower($post->category->name)}}/post/{{$post->id}}"> -->
                                <div class="imagem" style="background-image:url('{{$post->main_image}}')">
                                    <div class="bgTextos"></div>
                                </div>
                            </a>
                            <h3>{{$post->title}}</h3>
                            <p style="margin-top:5px;">{{ Illuminate\Support\Str::limit($post->summary,150)}}</p>
                        </div>
                    </div>
                    @empty

                    @endforelse
                </div>
                <div class="col-md-6 paddingGeral">
                    <!--<div class="destaqueCarrossel">
                        <div class="row bxCarrossel">

                            <div class="col-md-6">
                                <h2>Minhas Viagens</h2>
                            </div>
                            <div class="col-md-6">
                                <div class="verTudo">
                                    <a href="">Ver tudo</a>
                                </div>
                            </div>
                            <div class="cxCarrossel">
                                <div class="seta esquerda"></div>
                                <div class="seta direita"></div>
                                <div class="conteudo">
                                    <div class="row">
                                        <div class="col-md-4 imagem"
                                            style="background-image:url('{{asset('/imagens/mochilista.png')}}')"></div>
                                        <div class="col-md-8 texto">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque et
                                            ullamcorper dui. Curabitur interdum aliquam luctus. Duis sit amet sem leo. Sed
                                            eget nunc arcu.
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div> -->
                    <div class="destaqueBanners" style="margin-top:0px;">
                        @if(isset($post_area2))
                        @if($post_area2->external_link != null)
                        <a href="{{$post_area2->external_link}}" target="_blank">
                        @endif
                        <div class="bxDestaquebanner">
                            <div class="imagem" style="height:500px; background-image:url('{{$post_area2->main_image}}')"></div>
                            <h3>{{$post_area2->summary}}</h3>
                        </div>
                        @if($post_area2->external_link != null)
                        </a>
                        @endif
                        @endif

                    </div>
                    @if(isset($firstbanner))
                    <div class="destaqueBannersespecial">
                        <div class="bxCarrosselespecial" style="min-height:405px; background-image:url('{{$firstbanner->image}}');">
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
        </section>
        <section class="container" style="margin-top:-30px;">
           
            <div class="row">
                <div class="col-md-6 paddingGeral">
                    <div class="row">
                        @if(isset($packages[0]))
                        @forelse($packages[0] as $package)

                        <div class="col-md-6">
                            <div class="boxReservas">
                                <h3>{!! Illuminate\Support\Str::limit($package->title, 20) !!}</h3>
                                <a href="{{ $package->external_link ?? '/'.strtolower($package->category->name).'/post/'.$package->id}}">
                                    <div class="imagem" style="background-image:url('{{$package->main_image}}')">
                                    </div>
                                </a>
                                <p>{{ Illuminate\Support\Str::limit($package->summary,130) }}</p>
                                <a href="{{$package->booking_link ?? 'https://www.booking.com'}}"><button>{{$package->booking_text ?? 'Reservar'}}</button></a>
                            </div>
                        </div>
                        @empty

                        @endforelse
                        @endif
                    </div>

                </div>

                <div class="col-md-6 paddingGeral">
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
                            <div class="carousel-item active" style="background-image:url('{{$banner->image}}'); background-size:cover !important; width:100%; height:420px !important;" >
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
                            <div class="carousel-item"  style="background-image:url('{{$banner->image}}'); background-size:cover !important; width:100%; height:420px !important;">
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
            <div class="row">
                <div class="col-md-6 paddingGeral">
                    <iframe src="https://compra.portaldaagencia.com.br/ceotravel" style="border:0px #ffffff none;" name="iframpassagens" scrolling="no" frameborder="0" marginheight="0px" marginwidth="0px" height="400px" width="100%" allowfullscreen></iframe>

                </div>
                <div class="col-md-6 paddingGeral">
                    <div class="row">
                        @if(isset($packages[1]))
                        @forelse($packages[1] as $package)
                        <div class="col-md-6">
                            <div class="boxReservas">
                                <h3>{!! Illuminate\Support\Str::limit($package->title, 20) !!}</h3>
                                <a href="/{{strtolower($package->category->name)}}/post/{{$package->id}}">
                                    <div class="imagem" style="background-image:url('{{$package->main_image}}')">
                                    </div>
                                </a>
                                <p>{{ Illuminate\Support\Str::limit($package->summary, 120) }}</p>
                                <a href=""><button>Reservar Agora</button></a>
                            </div>
                        </div>
                        @empty

                        @endforelse


                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection

@section('footer')
@include('site.footer')
@endsection
