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
    <div class="bannerDicas" >
        <h1>Sua experiência de <br>
            viagem compartilhada
        </h1>
    </div>

</div>

<section class="container">
    @include('site.menudicas')
</section>

<section class="container internasPage pdBox">
@include('flash::message')
    <!-- TITLE -->
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <h1 style="display:block; margin-top:10px; margin-bottom:10px;">{{$post->title}}</h1>
        </div>
    </div>
    <div class="row InternasNovas dics">
        <div class="col-md-12 col-sm-12">
             @if($post->main_image != '')
            <div class="bxImagem" style="background-image:url({{$post->main_image}})" onclick="openImage('{{$post->main_image}}')">
                
            </div>
             @endif
            @if($post->secondary_image != '')
            <div class="bxImagem" style="background-image:url({{$post->secondary_image}})" onclick="openImage('{{$post->secondary_image}}')">
                
            </div>
            @endif
            
            {!! $post->body !!}    
            
        </div>
        
    </div>
   

    <!-- PHOTOS -->
    <div class="row fotorama" style="margin-top:5px; margin-bottom:5px;">
        <div class="col-sm-12 col-md-12">
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
        <div class="row InternasNovas dics underbody" >
        <div class="col-md-12 col-sm-12">
         
            {!! $post->underbody !!} 
        </div>
        
    </div>
    @endif

    <!-- FORM TITLE -->
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <h1>Faça um comentário e ajude a comunidade</h1>
        </div>
    </div>

    <!-- FORM AND PACKAGE-->
    <div class="row formDicas" style="margin-bottom:20px;">

        <!-- FORM -->
        <div class="col-sm-9 col-md-9">
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

    <!-- CAROUSEL -->
    <section class="container">
        <div class="carrosselDestaques dicas">
            <h2 style="padding-left:30px;">Veja Também</h2>
            <div class="bxCarrossel">

               <div class="row carrosselette">
                @forelse($carousel as $carousel_item)
                   <div class="col-md-4">
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
    
</section>

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

@endsection

@section('footer')
@include('site.footer')
@endsection
