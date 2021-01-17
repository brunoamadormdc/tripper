@extends('site.master')

@section('header')
@include('site.header')
@endsection

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

<section class="container paginasRodape">
<!-- Most recent post about Cambio -->

    <div class="row">
        <div class="col-sm-6">
            <div class="bxFormulario">
                <h2>Solicite o seu chip de celular</h2>
            <form action="" method="post">
                <div class="form-group">                    
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome">                    
                </div>
                <div class="form-group">                    
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Telefone">                    
                </div>
                <div class="form-group">                    
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="E-mail">                    
                </div>
                <div class="form-group">                    
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Destino">                    
                </div>
                <div class="form-group">                    
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Quantos dias de viagem?">  
                    <button type="submit" class="btn btn-primary">Enviar</button>                  
                </div>                
            </form>
                </div>
        </div>
        <div class="col-sm-6">
            <div class="bxImage" style="background-image: url(https://www.queroviajarmais.com/wp-content/uploads/2020/07/voz-dados-america-chip-confiavel.jpg); width:100%;"></div>
        </div>
    </div>

    
    
</section>
<section class="container paginasRodape">
     @if(count($passagens) > 0)
    <div class="row">
        
        
        <div class="col-sm-12">
            <div class="bxTexto" >
                 <div class="bxImage" style="background-image:url({{ $passagens[0]->main_image }});">
                
            </div>
                 <a href="/{{strtolower($passagens[0]->category->name)}}/post/{{$passagens[0]->id}}">
                <h2>{!! $passagens[0]->title !!}</h2>
              {!! $passagens[0]->body !!}
                 </a>
            </div>
        </div>
        
    </div>
     @endif
</section>

<section class="container paginasRodape">
    <div class="row">
         @forelse($passagens as $post)
        <div class="col-sm-4">
             <a href="/{{strtolower($post->category->name)}}/post/{{$post->id}}">
            <div class="cartao">
                <div class="cartaoImg" style="background-image:url({{ $post->main_image }});"></div>
                <div class="cartaoSummary">
                    <h4>{{$post->title}}</h4>    
                    {{ Illuminate\Support\Str::limit($post->summary, 150) }}
                
                </div>
            </div>
             </a>
        </div>
          @empty

        @endforelse
       
    </div>
</section>

@if($carousel->count() > 0)
    <section class="container paginasRodape">
        <div class="carrosselDestaques pacotes">
            <h2 style="padding-left:20px;">Operadoras de Celular</h2>
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
 @endif






@endsection

@section('footer')
@include('site.footer')
@endsection
