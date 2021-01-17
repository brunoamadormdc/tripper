@extends('site.master')

@section('header')
@include('site.header')
@endsection
@section('author',$destiny->owner->name)
@section('tags',$seotags)

@section('conteudo')
<script type='text/javascript'>

@foreach($destiny->photos as $key => $photo)
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
<section class="row">
    <section class="container InternasNovasDestinos">
        <div class="row">
        <div class="col-sm-12 col-md-12">
            <h1 style="display:block; margin-top:10px; margin-bottom:10px; padding-left:0px !important;">{{$destiny->title}}</h1>
        </div>
    </div>
        <div class="row InternasNovas dicsdestinos" style="margin-bottom:20px !important;">
            <div class="col-md-12 col-sm-12">
               
                        @if($destiny->main_image != '')
                            <div class="bxImagem" style="background-image:url({{$destiny->main_image}}); margin-right:30px !important;" onclick="openImage('{{$destiny->main_image}}')"></div>
                            @endif
                            @if($destiny->secondary_image != '')
                            <div class="bxImagem" style="background-image:url({{$destiny->secondary_image}}); margin-right:30px !important;" onclick="openImage('{{$destiny->secondary_image}}')"></div>
                            @endif
                            {!! $destiny->body !!}
                        
                 
            </div>
          
               
            
        </div>
    </section>
</section>
   

    <section class="container InternasNovasDestinos">
      <div class="row fotorama">
        <div class="col-sm-12">
            <div class="card-deck">
                @forelse($destiny->photos as $key => $photo)
                <div class="card">
                        <img class="card-img-top" ng-click="carregarfotos('{{$key}}')" style="min-height:200px; background-size:cover !important; background-image:url('{{$photo->image}}');">
                </div>
                @empty
               
                @endforelse

            </div>
        </div>
    </div>
            @if($destiny->underbody != null)
        <div class="row InternasNovas dics underbody">
        <div class="col-md-12 col-sm-12">
         
            {!! $destiny->underbody !!} 
        </div>
        
    </div>
    @endif
     

    </div>
    </div>
    </section>
<section class="container">
      <div class="row InternasNovas dicsdestinos">
                  <div class="col-md-12 col-sm-12">
                <div class="row">
                       @if(isset($package))
                       @foreach($package as $pack)
               <div class="col-md-3 col-sm-3">
                    <div class="boxReservas" style="width:90%;">
                        <h3>{{ Illuminate\Support\Str::limit($pack->title,20)}}</h3>
                        <a href="/{{strtolower($pack->category->name)}}/post/{{$pack->id}}">
                            <div class="imagem" style="background-image:url('{{$pack->main_image}}')">
                            </div>
                        </a>
                         <div class="precos">
                            <span class="descricao">À partir de</span>
                            <span class="preco">{{$pack->price}}</span>
                        </div>
                        <a href="{{$pack->booking_link ?? 'http://www.booking.com'}}"><button class="pacotes">{{ $pack->booking_link_text ?? 'Reservar Agora'}}</button></a>
                    </div>
                </div>
                       @endforeach
                @endif
             
                    
                    
                </div>
                
            </div>
           </div>
</section>
         
           <section class="container">
<section class="row InternasNovas">
        <div class="col-md-12 col-sm-12 bxFrameGrande">
             <iframe src="https://compra.portaldaagencia.com.br/ceotravel" style="border:0px #ffffff none;" name="iframpassagens" scrolling="no" frameborder="0" marginheight="0px" marginwidth="0px" height="400px" width="100%" allowfullscreen></iframe>
            
        </div>
    </div>
</section>
</section>
    <!-- comment -->
     <!-- Carrousel 1 -->
  
     
      <section class="container">
        <div class="carrosselDestaques pacotes">
            <h2 style="padding-left:30px">Destaques</h2>
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
     
     
     
     <section class="container InternasNovasDestinos">
          <div class="row">
        <div class="col-sm-12 col-md-12">
            <h1 style="display:block; margin-top:10px; margin-bottom:10px;">Hotéis</h1>
        </div>
    </div>
         <div class="row">
         @forelse($hotels as $hotel)
                    <div class="col-sm-3" style="margin-bottom:20px;">
                        <div class="card" style="min-height:400px !important; padding:10px!important; border:0px !important; ">
                            <a href="/{{strtolower($hotel->category->name)}}/post/{{$hotel->id}}">
                            <div style="min-height:190px !important;  height:190px; overflow:hidden; background-image:url('{{$hotel->main_image}}'); background-position:center center; background-size:cover;" ></div>
                        </a>


                            <div class="card-body" style="padding-left:0px !important; padding-right:0px !important;">
                                <h5 class="card-title" style="text-align:left !important; padding-left:0px !important; padding-right:0px !important;">{{$hotel->title}}</h5>
                                <p class="card-text"  >
                                    {{$hotel->summary}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @empty
                        <h2>Nenhum Hotel Encontrado</h2>
                    @endforelse
         </div>         
                    
     </section>
     
     
     
     
     <section class="container">
<section class="row InternasNovas">
        <div class="col-md-12 col-sm-12 bxFrameGrande">
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
    </div>
</section>
</section>
     
     @if($destiny->iframe1 != null)
    <section class="container iframesParceiros">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                {!! $destiny->iframe1 !!}                
            </div>
        </div>
    </section>
    @endif
      @if($destiny->iframe2 != null)
    <section class="container iframesParceiros">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                {!! $destiny->iframe2 !!}                
            </div>
        </div>
    </section>
    @endif
     @if($destiny->iframe3 != null)
    <section class="container iframesParceiros">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                {!! $destiny->iframe3 !!}                
            </div>
        </div>
    </section>
    @endif
    
     @if($destiny->iframe4 != null)
    <section class="container iframesParceiros">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                {!! $destiny->iframe4 !!}                
            </div>
        </div>
    </section>
    @endif
    
    @if($destiny->iframe5 != null)
    <section class="container iframesParceiros">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                {!! $destiny->iframe5 !!}                
            </div>
        </div>
    </section>
    @endif
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
