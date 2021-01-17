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

<section class="container pdBox monteSuaviagem">
    <div class="row">
        <div class="col-md-6 pdBox">
            <h1 style="margin-bottom:20px !important; display:block !important;">No Vtripper você é o protagonista!</h1>
            <p>
                Nessa área você pode montar a sua viagem como desejar e de forma personalizada.
                Escolha seus itens como aluguel de carro, hotel, voos, seguro viagem, entre outras coisas.
                Através de nossos sistemas de busca, você conseguirá ótimos valores e poderá ver o que vai adquirir.
                Nossos sistemas são seguros e protegidos. Além disso, nossos usuários contam com a expertise de viagens do nosso time aliando preço com qualidade.<br><br>

                Caso tenha dúvidas entre em contato conosco.
            </p>
        </div>
        <div class="col-md-6 pdBox">
            <object data="https://widgets.rentcars.com/widget-v1.html?requestor=2435&locale=pt-br&utm_source=www.vtripper.com.br&utm_medium=afiliado-widget" width="100%" height="330" ></object>
        </div>
    </div>
</section>

<section class="container pdBox">
    <div class="row">
        <div class="col-md-12">
            <div class="contTabs">
                 <div class="row">
        <div class="col-sm-12 col-md-12">
            <h1>Passagens Aéreas</h1>
        </div>
    </div>
                <div id="hoteis" class="hoteis">
                    <iframe src="http://compra.portaldaagencia.com.br/ceotravel" style="border:0px #ffffff none;" name="iframpassagens" scrolling="no" frameborder="0" marginheight="0px" marginwidth="0px" height="400px" width="100%" allowfullscreen></iframe>
                </div>
                    <div class="row">
        <div class="col-sm-12 col-md-12">
            <h1>Reserva de Hotéis</h1>
        </div>
    </div>
                <div id="hoteis" class="hoteis">
                    <ins class="bookingaff" data-aid="1922369" data-target_aid="1922369" data-prod="nsb" data-width="100%" data-height="330" data-lang="xb" data-df_num_properties="3">
                        <!-- Anything inside will go away once widget is loaded. -->
                            <a href="//www.booking.com?aid=1922369">Booking.com</a>
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
        </div>

    </div>
</section>

<section class="container paginasRodape">

       <div class="row">
        <div class="col-sm-12 col-md-12">
            <h1>Aluguel de carros</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <iframe src="https://iframe.sgrentals.com.br/iframe/home/?idUser=26956" style="border:0px #ffffff none;" name="meuiframe" scrolling="no" frameborder="0" marginheight="0px" marginwidth="0px" height="1100px" width="100%" allowfullscreen></iframe>
        </div>

    </div>
    
</section>



<section class="container paginasRodape">
           <div class="row">
        <div class="col-sm-12 col-md-12">
            <h1>Seguros</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="contTabs">
                <iframe name="iframesegurosviagem" src="https://www.gtawlabel.com.br/sitev2/cotacao/?dataInicio=27/09/2012&dataFim=30/09/2012&nPax=1&destino=2&parceiro=VTRIPPER" width="100%" height="800px" frameborder="0" scrolling="auto">
                </iframe>

            </div>
        </div>

    </div>
</section>

<section class="container paginasRodape">
    <div class="row">
        <div class="col-md-12">
            <div class="contTabs">
                <iframe src="https://www.goaffinity.com.br/VTRIPPER" style="border:0px #ffffff none;" name="meuiframe" scrolling="no" frameborder="0" marginheight="0px" marginwidth="0px" height="800px" width="100%" allowfullscreen></iframe>

            </div>
        </div>

    </div>
</section>

<section class="container paginasRodape">
      <div class="row">
        <div class="col-sm-12 col-md-12">
            <h1>Entre em contato para maiores informações</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="contTabs">
              <form method="POST" action="{{route('commentpost')}}">
                @csrf
                
                <div class="row" style="margin-bottom:20px; margin-left:0px !important; margin-right:0px !important;">
                    <div class="col-sm-12 col-md-12">
                        <textarea name="body" id="" rows="14" style="width:100%;"></textarea>
                    </div>

                </div>
                <div class="row" style="margin-bottom:20px; margin-left:0px !important; margin-right:0px !important;">
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="name" id="" placeholder="Nome" style="width:100%;">
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="email" id="" placeholder="E-mail" style="width:100%;">
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="webpage" id="" placeholder="Site" style="width:100%;"><br>
                        <input type="submit" class="btn btn-primary" style="background-color:#eee !important; color:#000 !important; width:96% !important; margin-top:15px !important;" value="Enviar Comentario">
                    </div>
                </div>

            </form>

            </div>
        </div>

    </div>
</section>



@endsection

@section('footer')
@include('site.footer')
@endsection
