@extends('site.master')

@section('header')
@include('site.header')
@endsection
@section('tags',$seotags)

@section('conteudo')
<div class="container-fluid internas">
    <div class="bannerPacotes">
        <h1>Sua experiência de <br>
        viagem compartilhada
        </h1>
    </div>

</div>
<section class="container">
    @include('site.menudicas')
</section>

    <!-- Packages first chunk -->
    <section class="container">
        <div class="row">
            @if(isset($packages[0]))
            @forelse($packages[0] as $package)
            <div class="col-md-3">
                <div class="boxReservas">
                    <h3>{{ Illuminate\Support\Str::limit($package->title, 22) }}</h3>
                    <a href="/{{strtolower($package->category->name)}}/post/{{$package->id}}">
                        <div class="imagem" style="background-image:url('{{$package->main_image}}')">

                        </div>
                    </a>
                    {!! Illuminate\Support\Str::limit($package->summary, 100) !!}
                    <div class="precos">
                        <span class="descricao">À partir de</span>
                        <span class="preco">US$ {{$package->price}}</span>
                    </div>
                    <a href="{{$package->booking_link ?? 'http://www.booking.com'}}"><button class="pacotes">{{ $package->booking_link_text ?? 'Reservar Agora'}}</button></a>
                </div>
            </div>
            @empty

            @endforelse
            @endif
        </div>
    </section>

    
       @if($carrousel_1->count() > 0)
    <section class="container">
        <div class="carrosselDestaques pacotes">
            <h2 style="padding-left:30px">Destaques</h2>
            <div class="bxCarrossel">

               <div class="row carrosselette">
                @forelse($carrousel_1  as $carousel_item)
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
 @endif
    <!-- Packages second chunk -->
    <section class="container">
        <div class="row">
            @if(isset($packages[1]))
        @forelse($packages[1] as $package)
        <div class="col-md-3">
            <div class="boxReservas">
                <h3>{{ Illuminate\Support\Str::limit($package->title, 22) }}</h3>
                <a href="/{{strtolower($package->category->name)}}/post/{{$package->id}}">
                <div class="imagem" style="background-image:url('{{$package->main_image}}')">

                </div>
                </a>
                {!! Illuminate\Support\Str::limit($package->summary, 100) !!}
                <div class="precos">
                    <span class="descricao">À partir de</span>
                    <span class="preco">US$ {{$package->price}}</span>
                </div>
                <a href="{{$package->booking_link ?? 'http://www.booking.com'}}"><button class="pacotes">{{ $package->booking_link_text ?? 'Reservar Agora'}}</button></a>
            </div>
        </div>
        @empty

        @endforelse
        @endif
        </div>
    </section>

    <section class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="pacotesDestinos">
                    <div class="row">
                    <h2>+ Posts</h3>
                </div>
                    <div class="row">
                        @forelse($destinies as $destiny)

                        <div class="col-sm-4">
                            <a href="/{{strtolower($destiny->category->name)}}/post/{{$destiny->id}}">
                            <div class="imagem" style="background-image:url('{{$destiny->main_image}}');"></div>
                            <h5 style="padding-top:5px;">{{$destiny->title}}</h5>
                            <p>
                               
                                {{ Illuminate\Support\Str::limit($destiny->summary,90) }}</p>
                            </a>
                        </div>
                        @empty

                        @endforelse
                    </div>
                </div>
            </div>

            <div class="col-md-6">

                @isset($bannerpacote)
                <div class="destaqueBannersespecial carrosselPacotes">
                    <div class="bxCarrosselespecial" style="background-image:url('{{$bannerpacote->image}}');">
                        @isset($bannerpacote->title)
                        <div class="titulo">
                                {{$bannerpacote->title}}
                        </div>
                        @endisset
                        @isset($bannerpacote->promotion)
                        <div class="desconto">
                            {{$bannerpacote->promotion}}
                        </div>
                        @endisset
                        @isset($bannerpacote->link)
                            <div class="saiba baixo"><a href="{{$bannerpacote->link}}" target="_blank">Saiba <span>+</span></a></div>
                        @endisset
                    </div>
                </div>
                @endisset
            </div>
        </div>
    </section>

    <section class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="bannerSpace2">
                    <iframe src="https://compra.portaldaagencia.com.br/ceotravel" style="border:0px #ffffff none;" name="iframpassagens" scrolling="no" frameborder="0" marginheight="0px" marginwidth="0px" height="400px" width="100%" allowfullscreen></iframe>

                </div>
            </div>
            <div class="col-md-6">
                    <div class="bannerSpace2">
                        <object
                                    data="https://widgets.rentcars.com/widget-v1.html?requestor=2435&locale=pt-br&utm_source=www.vtripper.com.br&utm_medium=afiliado-widget"
                                    width="100%" height="400"></object>
                    </div>
            </div>
        </div>
    </section>
 @if($carrousel_2->count() > 0)
    <section class="container">
        <div class="carrosselDestaques pacotes" style="background-color:#88b0e2;">
            <h2 style="padding-left:30px">Destaques</h2>
            <div class="bxCarrossel">

               <div class="row carrosselette">
                @forelse($carrousel_2  as $carousel_item)
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
 @endif

   
@endsection

@section('footer')
@include('site.footer')
@endsection
