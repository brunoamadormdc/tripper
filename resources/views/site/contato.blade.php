@extends('site.master')

@section('header')
@include('site.header')
@endsection


@section('conteudo')
<script type='text/javascript'>


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
    
  
    <!-- FORM TITLE -->
    <div class="row">
        <div class="col-md-12 div col-sm-12">
            <h1>Entre em contato conosco para maiores informações</h1>
        </div>
    </div>

    <!-- FORM AND PACKAGE-->
    <div class="row formDicas" style="margin-bottom:0px;">
       
        

        <!-- FORM -->
        <div class="col-sm-12 col-md-12">
            <div style="height:auto; overflow:hidden; padding:10px;">


            <form method="POST" action="{{route('commentpost')}}">
                @csrf
          
                <div class="row" style="margin-bottom:10px; margin-left:0px !important; margin-right:0px !important;">
                    <div class="col-sm-12 col-md-12">
                        <textarea name="body" id="" rows="8" style="width:100%;"></textarea>
                    </div>

                </div>
                <div class="row" style="margin-bottom:20px; margin-left:0px !important; margin-right:0px !important;">
                    <div class="col-sm-12 col-md-12">
                        <input type="text" name="name" id="" placeholder="Nome" style="width:100% !important;margin-bottom:10px;">
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <input type="text" name="email" id="" placeholder="E-mail" style="width:100% !important; margin-bottom:10px;">
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <input type="text" name="telefone" id="telefone" placeholder="Telefone" style="width:100% !important; margin-bottom:10px;">
                        
                    </div>
                     <div class="col-sm-12 col-md-12">
                       <input type="submit" class="btn btn-primary" style="background-color:#eee !important; color:#000 !important; width:100% !important; margin-bottom:10px;" value="Enviar Comentario">
                        
                    </div>
                </div>

            </form>
        </div>
        </div>

     

    </div>

  
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
