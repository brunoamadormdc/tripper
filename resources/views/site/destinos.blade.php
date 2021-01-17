@extends('site.master')

@section('header')
@include('site.header')
@endsection
@section('tags',$seotags)


@section('conteudo')
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
<section class="container destiny" style="margin-top:30px;">
    <div class="row" style="margin-left:0px !important; margin-right:0px !important;">

        <div class="col-md-9">

            @forelse($destinies as $destiny_chunk)
            <div class="row">
                @forelse($destiny_chunk as $destiny)
                <div class="col-md-4 imgCont" onclick="location.href='/{{strtolower($destiny->category->name)}}/post/{{$destiny->id}}'">
                    <div class="overlayDestinos"></div>
                    <div class="tituloDestinos">
                        {{$destiny->title}}
                    </div>
                    @if($loop->index == 1)
                    <a href="/{{strtolower($destiny->category->name)}}/post/{{$destiny->id}}"><img src="{{$destiny->main_image}}" class="img-responsive" height="180"></a>
                    @else
                    <a href="/{{strtolower($destiny->category->name)}}/post/{{$destiny->id}}"><img src="{{$destiny->main_image}}" class="img-responsive" height="140"></a>
                    @endif
                </div>
                @empty

                @endforelse
                </div>
            @empty

            @endforelse

        </div>

        <div class="col-md-3 sidebar">

            @forelse($packages as $package)
            <div class="boxReservas">
                <h3>{{$package->title}}</h3>
                <a href="/{{strtolower($package->category->name)}}/post/{{$package->id}}">
                    <div class="imagem" style="background-image:url('{{$package->main_image}}')">
                    </div>
                </a>
                <p>{{ Illuminate\Support\Str::limit($package->summary,150)}}</p>
                <div class="precos">
                    <span class="descricao">À partir de</span>
                    <span class="preco">US$ {{$package->price}}</span>
                </div>
                <a href="{{$package->booking_link ?? 'http://www.booking.com'}}"><button class="pacotes">{{ $package->booking_link_text ?? 'Reservar Agora'}}</button></a>
            </div>
            @empty

            @endforelse
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            
            
        </div>
    </div>
     <div class="row InternasNovas">
        <div class="col-md-12 col-sm-12 bxFrameGrande">
             <iframe src="https://compra.portaldaagencia.com.br/ceotravel" style="border:0px #ffffff none;" name="iframpassagens" scrolling="no" frameborder="0" marginheight="0px" marginwidth="0px" height="400px" width="100%" allowfullscreen></iframe>
            
        </div>
    </div>
    <div class="row InternasNovas">
        <div class="col-md-12 col-sm-12">
              <!-- CAROUSEL -->
    <section class="container">
        <div class="carrosselDestaques destinos">
            <h2 style="padding-left:30px;">Veja Também</h2>
            <div class="bxCarrossel">

               <div class="row carrosselette">
                @forelse($carousel as $carousel_item)
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
        </div>
    </div>
</section>


@endsection

@section('footer')
@include('site.footer')
@endsection
