@extends('site.master')

@section('header')
@include('site.header')
@endsection
@section('tags',$seotags)

@section('conteudo')
<div class="container-fluid internas">
    <div class="bannerSuaviagem">
        <h1>Sua experiência de <br>
            viagem compartilhada
        </h1>
    </div>

</div>
<section class="container">
    @include('site.menudicas')
</section>

<section class="container dicas">
    <div class="row">
        @forelse($tips as $tip)
        <div class="col-md-6 paddingGeral" style="padding-bottom:0px !important; padding-top:0px !important;">
            <div class="destaqueSimples">
                <div class="bxDicas">
                <a href="/{{strtolower($tip->category->name)}}/post/{{$tip->id}}">
                    <div class="imagem" style="background-image:url('{{$tip->main_image}}')">
                        <div class="bgTextos"></div>
                        @if($tip->viewtitle == null || $tip->viewtitle == 0)
                        <h3 class="absh3">{{$tip->title}}</h3>
                        @endif
                       
                        <div class="saiba vermelho" 
                             @if($tip->iconcolor != null)
                            style="background-color:{{$tip->iconcolor}} !important">
                            
                             @else
                              style="background-color:{{$tip->postColor()}} !important">
                             @endif
                        </div>
                    </div>
                </a>
                    
                    <p>{!! Illuminate\Support\Str::limit($tip->summary, 200) !!}</p>
                </div>
            </div>
        </div>
        @if($loop->index == 2)
        @if(isset($banners) && $banners->count() > 0)
        <div class="col-md-6 paddingGeral" style="padding-bottom:0px !important; padding-top:0px !important;">
            <!--Carousel Wrapper-->

            <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel" style="margin-top:0px;">
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

                    <div class="carousel-inner" style="height:500px;" role="listbox">
                        @foreach($banners as $banner)
                        @if($loop->index == 0)
                        <!--First slide-->
                        <div class="carousel-item active">
                            <figure id="img-carousel-home">
                            <img class="d-block w-100 img-opacity" src="{{$banner->image}}"
                                alt="First slide" style="min-height:500px !important;">
                            @if($banner->title != null)
                            <figcaption class="titulo">{{$banner->title}}</figcaption>
                            @endif

                            @if($banner->body != null)
                            <figcaption class="texto">{!! Illuminate\Support\Str::limit($banner->summary,50) !!}</figcaption>
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
                            <img class="d-block w-100 img-opacity" src="{{$banner->image}}" alt="Second slide" style="min-height:400px">
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
        @endif
        @endif
        @empty

        @endforelse
    </div>

</section>
 <section class="container">
        <div class="carrosselDestaques dicas">
            <h2 style="padding-left:0px">Destaques</h2>
            <div class="bxCarrossel">

               <div class="row carrosselette">
                @forelse($carrousel  as $carousel_item)
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
@endsection

@section('footer')
@include('site.footer')
@endsection
