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
    <div class="bannerPacotes">
        <h1>Sua experiência de <br>
            viagem compartilhada
        </h1>
    </div>

</div>
<section class="container">
    @include('site.menudicas')
</section>
<section class="container InternasNovasPacotes">
      <div class="row">
        <div class="col-md-6 col-sm-6">
            @if($post->main_image != '')
            <div class="bxImagem" style="background-image:url({{$post->main_image}})" onclick="openImage('{{$post->main_image}}')">
                
            </div>
            @endif
           
        </div>
        <div class="col-md-6 col-sm-6">
             @if($post->secondary_image != '')
             <div class="bxImagem" style="background-image:url({{$post->secondary_image}})" onclick="openImage('{{$post->secondary_image}}')">
                
            </div>
             @endif
            
        </div>
    </div>
    <div class="row" style="margin-left:0px !important; margin-right:0px !important;">
        <div class="col-md-12 col-sm-12">
            
        <div style="padding-left:20px !important; margin-left:30px;  float:right;  margin-bottom:0px; width:50% !important; " > 
               
            <div class="row" style=" margin-right:0px !important; margin-bottom:30px;">
                <div class="col-sm-4">
                    <button class="btn btn-success" style="width:100%;" onclick="showPackageInfo()">INFORMACOES</button>
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-success" style="width:100%;" onclick="showPackageVideos()">VIDEOS</button>
                </div>
                <div class="col-sm-4" >
                    <button class="btn btn-success" style="width:100%;" onclick="location.href='{{ $post->booking_link }}'">{{$post->booking_link_text ?? 'RESERVE JA'}}</button>
                </div>
            </div>
         
            
        
        </div>
              <div style="padding-left:20px !important; margin-left:30px;  float:right;  margin-bottom:10px; width:50% !important; display:flex;" > 
                     <div class="row" style="width:100% !important;">
                <div class="col-md-12 col-xs-12">
                     <div class="jumbotron" style="min-height:500px; width:100%; padding-top:20px; ">

                <!--INFORMACOES -->
                <div class="container" id="package_information" style="display:block; height:500px;  width:100% !important;">
                    <h4 class="display-7">Detalhes do pacote</h4>
                    <div style="height:500px;  padding-right:20px;">
                        
                        <div style="height: 480px; overflow-y:scroll; padding-right:10px;">
                                @forelse($post->details as $detail)
                                    {!! $detail->body !!}
                                @empty
                                    <span class="text-danger">Essa publicação não tem detalhes adicionado!</span>
                                @endforelse
                            </div>
                      
                    </div>
                </div>

                <!--VIDEOS -->
                <div class="container" id="package_videos" style="display:none;">
                    <h4 class="display-7">Videos sobre o pacote</h4>
                    <div style="height:500px; padding-right:20px; margin-top:20px; text-align:center; width:100% !important; ">
                    @forelse($post->videos as $video)
                    <iframe width="300" height="300" src="https://www.youtube.com/embed/{{$video->video_id}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="margin-bottom:20px;"></iframe>

                    @empty
                   
                    @endforelse
                    </div>
                </div>

            </div>
                    
                </div>
           
        </div>
                    
              </div>
            <h1>{{$post->title}}</h1>
            <p><i>{{$post->subtitle}}</i></p>
            <p>{!!$post->body!!}</p>  
    </div>
        </div>
    <!-- PHOTOS -->
       <div class="row fotorama">
               <section class="container-fluid conteudo">
       
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
</section>

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
