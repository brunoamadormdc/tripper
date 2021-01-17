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
            <h2 style="padding-left:20px;">Dicas de Destinos</h2>
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



<section class="container paginasRodape">
    <div class="row">
        <div class="col-md-12">
            <div class="contTabs">
              
    <form action="/Carrinho.aspx" class="box-vitrine-estatico formCambio" id="__primecase_vitrine" method="post">
        <div class="box-vitrine-custom">
            <div class="row d-none">
                <div id="btn-especie" class="btn btn-primary box-vitrine-button col-sm-6 col-md-3  check" data-tipo="1">
                    Moeda<br>Espécie
                </div>
                <div id="btn-cartao" class="btn btn-primary box-vitrine-button col-sm-6 col-md-3" data-tipo="2">
                    Cartão<br>Viagem
                </div>
                <div id="btn-remessa" class="btn btn-primary box-vitrine-button col-sm-6 col-md-3" data-tipo="3">
                    Remessas<br>Internacionais
                </div>
                <div id="btn-seguroViagem" class="btn btn-primary box-vitrine-button col-sm-6 col-md-3" data-tipo="4">
                    Seguro<br>Viagem
                </div>
            </div>
            <br>
            <div id="__primecase_form" class="primecaseForm">
                <input type="hidden" name="idTipoOperacao" id="hidTipoOperacao">
                <input type="hidden" name="isRecarga" id="hidIsRecarga" value="false">
                <div class="row">
                    <div class="col-md-12">
                        <div class="vitrine-produtos form-group d-none">
                            <label class="label-vitrine">Escolha o tipo Operação</label>
                            <select name="agrupadorTipoOperacao" id="agrupadorTipoOperacao" class="form-control custom-form-control"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="upnlLojaCambioPraca" class="col-md-6">
                        <div class="vitrine-produtos form-group">
                            <label class="label-vitrine">Escolha sua região</label>
                            <select name="pracas" id="pracas" class="form-control custom-form-control"></select>
                            <input type="hidden" name="idPraca" id="idPracaSelect">
                        </div>
                    </div>
                    <div id="upnlLojaCambioMoeda" class="col-md-6">
                        <div class="vitrine-produtos form-group">
                            <label class="label-vitrine">Escolha sua moeda</label>
                            <span id="campo-moeda-selecionada" class="form-control custom-form-control dropdown-moeda">
                                <img id="img-moeda-selecionada" src="">
                                <span id="descricao-moeda-selecionada">Dolar Australiano</span>
                            </span>
                            <select id="moedas" class="form-control custom-form-control d-none"></select>
                            <input type="hidden" name="idItemVitrine" id="hidItemVitrine">
                        </div>
                        <ul id="seletorMoedas" class="box-moeda scrollable notShowMoeda"></ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="vitrine-produtos form-group">
                            <label class="label-vitrine">Quantia desejada</label>
                            <input id="quantidadeMoedaEstrangeira" type="text" class="form-control especie-valorME" placeholder="100,00" maxlength="16" name="quantidadeMe">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="vitrine-produtos form-group">
                            <label class="label-vitrine">Total em reais</label>
                            <input id="quantidadeMoedaNacional" name="quantidade-moeda-nacional" type="text" class="form-control especie-valorMN" placeholder="390,86" maxlength="16">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center label-vitrine">
                        <strong>
                            <span id="lblSiglaMoeda" class="lblSiglaMoeda"></span>
                            1,00 = R$ <span id="lblTaxaMoeda"></span>
                        </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <span class="label-vitrine">*Taxa calculada sem IOF</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center mt-2">
                        <input type="submit" name="botaoComprar" id="btn-processar" value="QUERO COMPRAR" class="btn btn-secondary btn-comprar-agora center">
                    </div>

                </div>
            </div>
        </div>
    </form>
    <form action="CheckoutSeguroViagem.aspx" id="__primecase_seguroviagem_form" class="disableVitrine vitrine-seguro-viagem" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="label-vitrine">Origem</label>
                    <select name="idOrigem" id="origemSeguroViagem" class="form-control custom-form-control"></select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="label-vitrine">Destino</label>
                    <select name="idDestino" id="destinoSeguroViagem" class="form-control custom-form-control"></select>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="label-vitrine">Adultos</label>
                    <select name="quantidadePassageirosAdulto" id="numeroPassageirosAdultos" class="form-control custom-form-control">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                    <label id="idadeAdulto" class="labelIdade"></label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="label-vitrine">Crianças</label>
                    <select name="quantidadePassageirosCrianca" id="numeroPassageirosCriancas" class="form-control custom-form-control">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                    <label id="idadeCrianca" class="labelIdade"></label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="label-vitrine">Idosos</label>
                    <select name="quantidadePassageirosIdoso" id="numeroPassageirosIdosos" class="form-control custom-form-control">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                    <label id="idadeIdoso" class="labelIdade"></label>
                </div>
            </div>
        </div>
        <br>
        <div class="row ">
            <div class="col-md-6">
                <div class="input-group date vitrine-produtos form-group" id="datetimepicker1">
                    <label class="label-vitrine">Data de<br> embarque:&nbsp;</label>
                    <input type="text" data-date-format="DD/MM/YYYY" id="dataInicioViagem" class="form-control custom-form-control font-vitrine" name="dataInicioSeguroViagem">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group date vitrine-produtos form-group" id="datetimepicker2">
                    <label class="label-vitrine">Data de<br> desembarque:&nbsp;</label>
                    <input type="text" data-date-format="DD/MM/YYYY" id="dataFimViagem" class="form-control custom-form-control font-vitrine" name="dataFimSeguroViagem">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <div id="espacoPerguntas" class="espacoPerguntas">

        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <input type="submit" name="botaoComprarSeguroViagem" id="btnComprarSeguroViagem" value="COMPRAR AGORA" class="btn btn-secondary btn-comprar-agora center">
            </div>
        </div>
    </form>
 <script src="https://prd-ftd-ljc-web.primecase.com.br/Scripts/VitrineModelo5.js" type="text/javascript"></script>
    <script src="https://prd-ftd-ljc-web.primecase.com.br/Handlers/VitrineJsonModelo5.ashx?idHotsiteFixo=2" type="text/javascript"></script>
    <script type="text/javascript">
        primecaseVitrine.start();
    </script>
            </div>
        </div>

    </div>
</section>





@endsection

@section('footer')
@include('site.footer')
@endsection
