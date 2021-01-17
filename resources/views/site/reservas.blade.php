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
            <h1>Cotações ou reservas</h1>
        </div>
    </div>

    <!-- FORM AND PACKAGE-->
    <div class="row formReservas" style="margin-bottom:0px;">
       
        

        <!-- FORM -->
        <div class="col-sm-12 col-md-12">
            <div style="height:auto; overflow:hidden; padding:10px;">


            <form method="POST" action="">
                @csrf
          
                <div class="row" style="margin-bottom:10px; margin-left:0px !important; margin-right:0px !important;">
                    <div class="col-sm-6 col-md-6">
                        <label>Nome completo</label>
                        <input class="form-control" type="text" name="name" id="" placeholder="Nome Completo">
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <label>Celular com DDD</label>
                        <input class="form-control" type="text" name="telefone" id="" placeholder="Celular com DDD" >
                    </div>
                     <div class="col-sm-6 col-md-6">
                        <label>Email</label>
                        <input class="form-control" type="text" name="email" id="" placeholder="Email" >
                    </div>
                    
                     <div class="col-sm-6 col-md-6">
                        <label>Destino</label>
                        <input class="form-control" type="text" name="destino" id="" placeholder="Destino">
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <label>Data de entrada</label>
                        <input class="form-control" type="date" name="name" id="">
                    </div>
                     <div class="col-sm-4 col-md-4">
                        <label>Data de saída</label>
                        <input class="form-control" type="date" name="name" id="">
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <label>Tipo de acomodação</label>
                        <input class="form-control" type="text" name="acomodacao" id="">
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <label>Nº de adultos</label>
                        <input class="form-control" type="number" name="adultos" id="">
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <label>Nº de crianças</label>
                        <input class="form-control" type="number" name="criancas" id="">
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <label>Idade das crianças</label>
                        <input class="form-control" type="text" name="criancas" id="">
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <label>Tem flexibilidade nas datas mencionadas?</label><br>
                               <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
  <label class="form-check-label" for="inlineRadio1">Sim</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
  <label class="form-check-label" for="inlineRadio2">Não</label>
  <br><br>
</div>

                    </div>
                      <div class="col-sm-6 col-md-6">
                        <label>Gostaria de entrar para nossa lista de benefícios, sem custos?</label><br>
                               <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
  <label class="form-check-label" for="inlineRadio1">Sim</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
  <label class="form-check-label" for="inlineRadio2">Não</label>
  <br><br>
</div>

                    </div>
                     
                    <div class="col-sm-12 col-md-12">
                        <label>Conte-nos um sobre você e o seu perfil como viajante</label>
                        <textarea class="form-control" name="observacoes" id=""></textarea>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <label>Observações</label>
                        <textarea class="form-control" name="observacoes" id=""></textarea>
                    </div>
                    <div class="col-sm-12 col-md-12">
                       <input type="submit" class="btn btn-primary" style="background-color:#eee !important; color:#000 !important; width:100% !important; margin-bottom:10px;" value="Solicitar Reserva">
                        
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
