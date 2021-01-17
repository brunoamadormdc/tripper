@extends('site.master')
@section('header')
@include('site.header')
@endsection

@section('conteudo')
<div class="container-fluid internas">
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6 chamada">
                    <h2>Sua experiência <br>de viagem, compartilhada.</h2>
                </div>
                <div class="col-md-6 tabs">
                    <div class="boxTabs">
                        <ul>
                            <li>Hotéis</li>
                            <li class="inactive">Passagens</li>
                            <li class="inactive">Carros</li>
                        </ul>
                        <div class="contTabs">
                            <div id="hoteis" class="hoteis">
                                <ins class="bookingaff" data-aid="1922369" data-target_aid="1922369" data-prod="nsb"
                                    data-width="500" data-height="330" data-lang="xb" data-df_num_properties="3">
                                    <!-- Anything inside will go away once widget is loaded. -->
                                    <a href="//www.booking.com?aid=1922369">Booking.com</a>
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
                    <div class="bxDestaquesimples">
                        <a href="/{{strtolower($post->category->name)}}/post/{{$post->id}}">
                            <div class="imagem" style="background-image:url('{{$post->main_image}}')">

                            </div>
                        </a>
                        <h3>{{$post->title}}</h3>
                        <p>{!! Illuminate\Support\Str::limit($post->body,150) !!}</p>
                    </div>
                </div>
                @empty

                @endforelse
            </div>
            <div class="col-md-6 paddingGeral">
                <div class="destaqueCarrossel">
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
                </div>
                <div class="destaqueBanners">
                    @if(isset($post_area2))
                    @if($post_area2->external_link != null)
                    <a href="{{$post_area2->external_link}}" target="_blank">
                    @endif
                    <div class="bxDestaquebanner">
                        <div class="imagem" style="background-image:url('{{$post_area2->main_image}}')"></div>
                        <h3>{{$post_area2->summary}}</h3>
                    </div>
                    @if($post_area2->external_link != null)
                    </a>
                    @endif
                    @endif

                </div>
                @if(isset($secondbanner))                
                <div class="destaqueBannersespecial">
                    <div class="bxCarrosselespecial" style="background-image:url('{{$secondbanner->image}}');">
                        @isset($secondbanner->title)
                        <div class="titulo">
                            {{$secondbanner->title}}
                        </div>
                        @endisset
                        @isset($secondbanner->promotion)
                        <div class="desconto">
                            {{$secondbanner->promotion}}
                        </div>
                        @endif
                        @if($secondbanner->link != null)
                        <div class="saiba baixo"><a href="{{$secondbanner->link}}" target="_blank">Saiba <span>+</span></a>
                        </div>
                        @endif
                    </div>
                </div>               
                @endif

            </div>
        </div>
    </section>
    <section class="container">
        @if(isset($packages[0]))
        <h2 class="titDiferenciado">{{$packages[0][0]->category->title}}</h2>
        @endif
        <div class="row">
            <div class="col-md-6 paddingGeral">
                <div class="row">
                    @if(isset($packages[0]))
                    @forelse($packages[0] as $package)
                    <div class="col-md-6">
                        <div class="boxReservas">
                            <h3>{{$package->title}}</h3>
                            <div class="imagem" style="background-image:url('{{$package->main_image}}')">

                            </div>
                            <p>{!! Illuminate\Support\Str::limit($package->body,150) !!}</p>
                            <a href="{{$package->booking_link ?? 'http://www.booking.com'}}"><button>{{$package->booking_text ?? 'Reservar'}}</button></a>
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

                @endif

                <!-- <div class="row carrosseletta">
                @if(isset($bannercarousel))
                @forelse($bannercarousel as $banner)
                <div class="destaqueBannersespecial">
                    <div class="bxCarrosselespecial" style="background-image:url('{{$banner->image}}');">
                        @isset($banner->title)
                        <div class="tituloCursiva">
                            {{$banner->title}}
                        </div>
                        @endisset
                        @isset($banner->body)
                        <div class="textoCursiva">
                            {{Illuminate\Support\Str::limit($package->body,150) ?? ''}}
                        </div>
                        @endisset
                        @if($banner->link != null)
                        <div class="saiba baixo"><a href="{{$banner->link}}" target="_blank">Saiba <span>+</span></a>
                        </div>
                        @endif
                    </div>
                </div>
                @empty

                @endforelse
                @endif
                </div> -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 paddingGeral">
                <object
                    data="https://widgets.rentcars.com/widget-v1.html?requestor=2435&locale=pt-br&utm_source=www.vtripper.com.br&utm_medium=afiliado-widget"
                    width="100%" height="400"></object>

            </div>
            <div class="col-md-6 paddingGeral">
                <div class="row">
                    @if(isset($packages[1]))
                    @forelse($packages[1] as $package)
                    <div class="col-md-6">
                        <div class="boxReservas">
                            <h3>{{$package->title}}</h3>
                            <div class="imagem" style="background-image:url('{{$package->main_image}}')">

                            </div>
                            <p>{!! Illuminate\Support\Str::limit($package->body, 120) !!}</p>
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
@endsection

@section('footer')
@include('site.footer')
@endsection
