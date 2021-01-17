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
                <h2>Solicite informações para sua Reserva</h2>
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
            <div class="bxImage" style="background-image: url(https://www.theaureview.com/wp-content/uploads/2020/02/Busabout-Croatia-Sailing.jpg); width:100%; min-height:380px !important"></div>
        </div>
    </div>

    
    
</section>






@endsection

@section('footer')
@include('site.footer')
@endsection
