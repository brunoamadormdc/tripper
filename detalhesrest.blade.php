@extends('master')
@section('title', $restaurante->seo['title'])
@section('metadescription')
<meta name="description" content="{{$restaurante->seo['description']}}">
@stop
@section('metakeywords')
<meta name="keywords" content="{{$restaurante->seo['keywords']}}">
@stop
@section('header')
@include('header2')
@endsection
@section('conteudo')

<div id="map"></div>
<script>
  // Note: This example requires that you consent to location sharing when
  // prompted by your browser. If you see the error "The Geolocation service
  // failed.", it means you probably did not give permission for the browser to
  // locate you.
  var map, infoWindow;
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -34.397, lng: 150.644},
      zoom: 6
    });
    infoWindow = new google.maps.InfoWindow;

    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };

        infoWindow.setPosition(pos);
        infoWindow.setContent('Location found.');
        infoWindow.open(map);
        map.setCenter(pos);
      }, function() {
        handleLocationError(true, infoWindow, map.getCenter());
      });
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
  }

  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
                          'Error: The Geolocation service failed.' :
                          'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
  }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1ebMqESgWLF3rhMKfd5LyBHL7sbJmIww&callback=initMap">
</script>
<script type="text/javascript">
    var foto = [];
</script>

@if(count($restaurante->fotosgalery()) > 0)
@forelse($restaurante->fotosgalery() as $foto)
@if($foto['idposter'] != '5d1a854243b9fc3a24119d7c')
@if($foto['tipousuario'] == 'usuario' && $foto['excluido'] == false)
<script type="text/javascript">
    var checkdela = true;
    var colordemelosim = 'white';
    var colordemelonao = 'white';
    globfotosusu.push({
            caminho:'{{$foto['foto']}}',
            tipo:'{{$foto['tipousuario']}}'
        });
</script>
@elseif ($foto['excluido'] == false)
<script type="text/javascript">
    globfotos.push({
            caminho:'{{$foto['foto']}}',
            tipo:'{{$foto['tipousuario']}}'
        });
</script>
@endif
@endif

@empty
@endforelse
@endif

<div class="row">
    @if(isset($restaurante->socialmedias['youtube']) && $restaurante->socialmedias['youtube'])
    <div class="videoFace" style="display:<% classevideo %>;">
        <div class="close">
            <img ng-click="closebotVideo()"
                src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MDcuMiA1MDcuMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTA3LjIgNTA3LjI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiPgo8Y2lyY2xlIHN0eWxlPSJmaWxsOiNGMTUyNDk7IiBjeD0iMjUzLjYiIGN5PSIyNTMuNiIgcj0iMjUzLjYiLz4KPHBhdGggc3R5bGU9ImZpbGw6I0FEMEUwRTsiIGQ9Ik0xNDcuMiwzNjhMMjg0LDUwNC44YzExNS4yLTEzLjYsMjA2LjQtMTA0LDIyMC44LTIxOS4yTDM2Ny4yLDE0OEwxNDcuMiwzNjh6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNMzczLjYsMzA5LjZjMTEuMiwxMS4yLDExLjIsMzAuNCwwLDQxLjZsLTIyLjQsMjIuNGMtMTEuMiwxMS4yLTMwLjQsMTEuMi00MS42LDBsLTE3Ni0xNzYgIGMtMTEuMi0xMS4yLTExLjItMzAuNCwwLTQxLjZsMjMuMi0yMy4yYzExLjItMTEuMiwzMC40LTExLjIsNDEuNiwwTDM3My42LDMwOS42eiIvPgo8cGF0aCBzdHlsZT0iZmlsbDojRDZENkQ2OyIgZD0iTTI4MC44LDIxNkwyMTYsMjgwLjhsOTMuNiw5Mi44YzExLjIsMTEuMiwzMC40LDExLjIsNDEuNiwwbDIzLjItMjMuMmMxMS4yLTExLjIsMTEuMi0zMC40LDAtNDEuNiAgTDI4MC44LDIxNnoiLz4KPHBhdGggc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIGQ9Ik0zMDkuNiwxMzMuNmMxMS4yLTExLjIsMzAuNC0xMS4yLDQxLjYsMGwyMy4yLDIzLjJjMTEuMiwxMS4yLDExLjIsMzAuNCwwLDQxLjZMMTk3LjYsMzczLjYgIGMtMTEuMiwxMS4yLTMwLjQsMTEuMi00MS42LDBsLTIyLjQtMjIuNGMtMTEuMi0xMS4yLTExLjItMzAuNCwwLTQxLjZMMzA5LjYsMTMzLjZ6Ii8+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
        </div>
        <iframe src="https://www.youtube.com/embed/{{$restaurante->iddovideo()}}" frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

    </div>
    @endif
    <div class="modalImpulsionar mod<% formamodal %>">

        <div class="conteudoModalimpulsionar">
            <div class="row">
                <div class="col-md-12">

                    <div class="col-md-12 modalReservas">
                        <div class="row">
                            <div class=" col-md-12 messageconfirmacao" ng-if="messageconfirmacao">
                                <div class="alert alert-success" role="alert">
                                    <% mensagemdeconfirmacao %>
                                </div>
                            </div>
                            <div class="col-md-12 messageerro" ng-if="messageerro">
                                <div class="alert alert-danger" role="alert">
                                    <% mensagemdeerro %>
                                </div>

                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-3">
                                <img src="<% infomodal.fotos %>" class="imgPerfil">
                            </div>
                            <div class="col-md-8">
                                <h4 ng-if="infomodal.codigo != undefined">Código: <% infomodal.codigo %></h4>
                                <h4><% infomodal.nomedorestaurante %></h4>
                                <p><% infomodal.diadasemana %>, <% infomodal.data %> às <% infomodal.hora %></p>
                                <p>Mesa para <% infomodal.qtdpessoas %></p>

                            </div>

                        </div>
                        <div class="row informacoesModal">
                            <div class="col-md-12">
                                <p><% infomodal.obs %></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="nomereserva">
                                Reserva em nome de <% infomodal.nomeusuario %>
                            </div>




                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Solicitações especiais (opcional)</label>

                                <textarea ng-model="observacao">

           </textarea>
                                <input type="checkbox" style="width:15px;height:15px;" ng-model="aceite" /> <label>Ao
                                    confirmar a reserva, você concorda com nossa política de privacidade e termos de
                                    uso.</label>
                                <button ng-click="makebooking()">Finalizar a reserva</button>
                            </div>
                        </div>


                    </div>

                </div>
            </div>

        </div>
        <div class="overlayModalimp" ng-click="fechaModal()"></div>
    </div>
    <div class="container-fluid detalhesRestaurante">
        <script type="text/javascript">
            let usuario = 'norestaurante';
        let nome = 'norestaurante';
        </script>
        <div class="toastr <%classe%> <%visibilidade%>">
            <%messagetoastr%>
        </div>


        <!-- OVERLAY DE MODAL -->
        <div id="overlay-modal">
        </div>
        <div class="theme-hero-area">
            <div class="theme-hero-area-bg-wrap">
                @if($restaurante->fotos != '' && $restaurante->fotos != null )
                @foreach($restaurante->fotos as $foto)
                @if(!isset($foto['profile']))
                <?php $foto['profile'] = false; ?>
                @endif
                @if(!isset($foto['capa']))
                <?php $foto['capa'] = false; ?>
                @endif
                @if($foto['capa'] && !$foto['excluido'])
                <div class="theme-hero-area-bg"
                    style="background-image:url({{url('/img/caparestaurante/'.$foto['arquivo'])}});">
                </div>
                @break
                @else
                <div class="theme-hero-area-bg" style="background-image:url(../../img/1500x500.png);">
                </div>
                @endif
                @endforeach
                @else
                <div class="theme-hero-area-bg" style="background-image:url(../../img/1500x500.png);">
                </div>
                @endif
                <div class="theme-hero-area-mask theme-hero-area-mask-half">
                </div>
            </div>
            <div class="theme-hero-area-body">
                <div class="container-fluid">
                    <div class="secaoHeader theme-item-page-header _pt-100 _pb-30 theme-item-page-header-white">
                    </div>
                </div>
            </div>
        </div>
        <!-- FIM DO TOPO -->
        <div class="theme-page-section  theme-page-section-dark theme-page-section-lg infoTop">



            @if(isset($restaurante->fotos) && $restaurante->fotos != '')
            @foreach($restaurante->fotos as $fotoperfil)
            @if(!isset($fotoperfil['profile']))
            <?php $fotoperfil['profile'] = false; ?>
            @endif
            @if(!isset($fotoperfil['capa']))
            <?php $fotoperfil['capa'] = false; ?>
            @endif
            @if($fotoperfil['profile'] && !$fotoperfil['excluido'])




            @endif
            @endforeach

            @else


            @endif


            @if(isset($fotoperfil['profile']))
            <div class="container-fluid avatar_rest">
                    <?php $chubiras = 0 ?>
                @if($fotoperfil['profile'] && !$fotoperfil['excluido'])
                <?php $chubiras = 1 ?>
                <div class="theme-account-avatar img_perfilavatar_detalhes circle" style="background-image: url('{{ $fotoperfil['foto'] }}');">
                    <div class="container">
                        <div class="middle">
                            <button class="fa fa-camera-retro change_pic"><button>
                        </div>
                    </div>
                </div>


                @endif
                @if($chubiras == 0)
                <div class="theme-account-avatar img_perfilavatar_detalhes circle">
                        <div class="container">
                            <div class="middle">
                                <button class="fa fa-camera-retro change_pic"><button>
                            </div>
                        </div>
                    </div>
                @endif


                <div class="row socialMeds" style="margin-top:20px;z-index: 2000000;position: relative;">
                    <div class="col-md-1 col-xs-12">
                        <div class="row">
                                @if(isset($restaurante->socialmedias->facebook) && $restaurante->socialmedias->facebook
                                != '')
                            <div class="col-md-3 col-xs-1" style="padding-right:0px !important; padding-left:8px !important;">


                                <a href="{{$restaurante->socialmedias->facebook}}" target="_blank"
                                    rel="noopener noreferrer"><img style="width:100%" src="{{url('/img/ico_face.png')}}"></a>


                            </div>
                            @endif
                            @if(isset($restaurante->socialmedias->instagram) && $restaurante->socialmedias->instagram!= '')
                            <div class="col-md-3 col-xs-1" style="padding-right:0px !important;padding-left:8px !important; ">



                                <a href="{{$restaurante->socialmedias->instagram}}" target="_blank"
                                    rel="noopener noreferrer"><img style="width:100%" src="{{url('/img/ico_insta.png')}}"></a>


                            </div>
                            @endif
                            @if(isset($restaurante->socialmedias->whatsapp) &&
                            $restaurante->socialmedias->whatsapp!= '')
                            <div class="col-md-3 col-xs-1" style="padding-right:0px !important; padding-left:8px !important;">


                                <a href="https://wa.me/+55{{$restaurante->socialmedias->whatsapp}}" target="_blank"
                                    rel="noopener noreferrer"><img style="width:100%" src="{{url('/img/ico_whatsapp.png')}}"></a>


                            </div>
                            @endif
                            @if(isset($restaurante->socialmedias->twitter) &&
                            $restaurante->socialmedias->twitter!= '')
                            <div class="col-md-3 col-xs-1" style="padding-right:0px !important; padding-left:8px !important;">


                                <a href="{{$restaurante->socialmedias->twitter}}" target="_blank"
                                    rel="noopener noreferrer"><img style="width:100%" src="{{url('/img/ico_twitter.png')}}"></a>


                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-11 col-xs-12" style="height:20px; cursor:pointer;" @if(!$restaurante->reinvindicado) onclick="openReivindicar()" @endif></div>
                </div>
            </div>
            @else
            <div class="container-fluid avatar_rest">

            <div class="theme-account-avatar img_perfilavatar_detalhes circle">
                    <div class="container">
                        <div class="middle">
                            <button class="fa fa-camera-retro change_pic"><button>
                        </div>
                    </div>
                </div>



            <div class="row socialMeds" style="margin-top:20px;z-index: 2000000;position: relative;">
                <div class="col-md-1 col-xs-12">
                    <div class="row">
                            @if(isset($restaurante->socialmedias->facebook) && $restaurante->socialmedias->facebook
                            != '')
                        <div class="col-md-3 col-xs-1" style="padding-right:0px !important; padding-left:8px !important;">


                            <a href="{{$restaurante->socialmedias->facebook}}" target="_blank"
                                rel="noopener noreferrer"><img style="width:100%" src="{{url('/img/ico_face.png')}}"></a>


                        </div>
                        @endif
                        @if(isset($restaurante->socialmedias->instagram) && $restaurante->socialmedias->instagram!= '')
                        <div class="col-md-3 col-xs-1" style="padding-right:0px !important;padding-left:8px !important; ">



                            <a href="{{$restaurante->socialmedias->instagram}}" target="_blank"
                                rel="noopener noreferrer"><img style="width:100%" src="{{url('/img/ico_insta.png')}}"></a>


                        </div>
                        @endif
                        @if(isset($restaurante->socialmedias->whatsapp) &&
                        $restaurante->socialmedias->whatsapp!= '')
                        <div class="col-md-3 col-xs-1" style="padding-right:0px !important; padding-left:8px !important;">


                            <a href="https://wa.me/+55{{$restaurante->socialmedias->whatsapp}}" target="_blank"
                                rel="noopener noreferrer"><img style="width:100%" src="{{url('/img/ico_whatsapp.png')}}"></a>


                        </div>
                        @endif
                        @if(isset($restaurante->socialmedias->twitter) &&
                        $restaurante->socialmedias->twitter!= '')
                        <div class="col-md-3 col-xs-1" style="padding-right:0px !important; padding-left:8px !important;">


                            <a href="{{$restaurante->socialmedias->twitter}}" target="_blank"
                                rel="noopener noreferrer"><img style="width:100%" src="{{url('/img/ico_twitter.png')}}"></a>


                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-11 col-xs-12" style="height:20px; cursor:pointer;" @if(!$restaurante->reinvindicado) onclick="openReivindicar()" @endif></div>
            </div>
        </div>

            @endif


            <div class="container-fluid">
                <div class="row info_rest">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="theme-item-page-header-body">
                                    <div ng-init="carregar('{{$restaurante['_id']}}')">

                                        <!-- Modal Reivindicar -->
                                        <div class="" style="z-index:10000000000000000000000;" id="modal-reivindicar">
                                            <span style="float:right; cursor:pointer;"><a
                                                    onclick="closeReivindicar()">X</a></span>
                                            <form action="{{route('reivindicar', $restaurante->_id)}}" method="post">
                                                <div class="form-row-top">
                                                    <label>Nome do solicitante</label>
                                                    <input type="text" name="nomepessoal"
                                                        placeholder="Nome do solicitante" class="form-control">
                                                </div>
                                                <div class="form-row-modal">
                                                    <label>E-mail do solicitante</label>
                                                    <input type="email" name="email" placeholder="E-mail do solicitante"
                                                        class="form-control">
                                                </div>
                                                <div class="form-row-modal">
                                                    <label>Telefone do solicitante</label>
                                                    <input type="text" name="telefone"
                                                        placeholder="Telefone do solicitante" class="form-control">
                                                </div>
                                                <div class="form-row-modal">
                                                    <label>CNPJ</label>
                                                    <input type="text" name="cnpj" placeholder="CNPJ"
                                                        class="form-control">
                                                </div>
                                                <div class="form-row-modal">
                                                    <label>Nome do estabelecimento</label>
                                                    <input type="text" name="nome" placeholder="Nome do estabelecimento"
                                                        class="form-control">
                                                </div>
                                                <div class="form-row-modal">
                                                    <label> Inscrição estadual</label>
                                                    <input type="text" name="inscricao"
                                                        placeholder="Nº de inscrição estadual" class="form-control">
                                                </div>
                                                <div class="form-row-modal">
                                                    <div class="col-md-12 btncadastro">
                                                        <input type="submit" value="Reivindicar agora" id="">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="row informacoesRest">
                                            @include('flash-messages')
                                            <div class="col-md-9 infosPagina">
                                                <h1 class="theme-item-page-header-title _ff-d _fw-200">
                                                    {{$restaurante['nome']}}
                                                    @if($restaurante->premium['ativo'])
                                                    <i class="fa fa-check"
                                                        style="color:#ff6c2d;" title="'As informações são editadas e conferidas pelo restaurante" aria-hidden="true"></i>
                                                        @endif
                                                    </h1>
                                                    @if(!$restaurante->reinvindicado)
                                                <p class="restaurante-seguidores">É seu restaurante? <a
                                                        style="cursor:pointer; text-decoration:underline; color:#fff !important;"
                                                        onclick="openReivindicar()">Clique aqui para reinvindicar</a>
                                                </p>
                                                @endif
                                            </div>
                                            <div class="col-md-3 seguidores">
                                                <span class="numSeguidores"> {{count($restaurante->seguidores)}}
                                                    @if(count($restaurante->seguidores) == 1)
                                                    Seguidor @else Seguidores @endif
                                                </span>
                                                @if(session()->get('usuario'))
                                                <script type="text/javascript">
                                                    usuario = '{{session()->get("usuario")->_id}}';
                                                nome = '{{session()->get("usuario")->nome}}';
                                                console.log(usuario, nome)
                                                </script>
                                                @if(!$restaurante->seguidores()->find(session()->get('usuario')->_id))
                                                <form action="{{route('seguir')}}" method="post">
                                                    <input type="hidden" name="restaurante_id"
                                                        value="{{$restaurante['_id']}}">
                                                    <input type="submit" value="Seguir">
                                                </form>
                                                @else
                                                <form action="{{route('deixarseguir')}}" method="post">
                                                    <input type="hidden" name="restaurante_id"
                                                        value="{{$restaurante['_id']}}">
                                                    <input type="submit" value="Seguindo" style="font-size:13px;">
                                                </form>
                                                @endif
                                                @else
                                                @if(session()->get('restaurante') == null)
                                                <br>
                                                <a href="/login"><button class="btn btn-warning">Seguir</button></a>
                                                @endif
                                                @endif</div>
                                        </div>

                                        <div class="avaliacao">
                                            <div class="row">
                                                <div class="col-md-9"></div>
                                                <div class="col-md-3">
                                                    <ul class="theme-item-page-header-rating-stars">

                                                        @for($i = 0; $i < (int)$restaurante->mediarating0a5(); $i++)
                                                            <li>
                                                                <i class="fa fa-star" style="font-size:30px;"></i>
                                                            </li>
                                                            @endfor
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="informaRest">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <ul>

                                                        @if($restaurante['endereco']) <li class="end">
                                                            {{$restaurante['endereco']}}, {{$restaurante['numero']}}@if($restaurante['complemento']) - {{$restaurante['complemento']}}@endif -
                                                            {{$restaurante['bairro']}} - {{$restaurante['cidade']}} -
                                                            {{$restaurante['estado']}}</li>@endif

                                                        @if(isset($restaurante['telefone']))
                                                            <li class="tel">{{$restaurante['telefone']}}</li>
                                                            @endif
                                                            @if(isset($restaurante['telefonecelular']))
                                                            <li class="celular">{{$restaurante['telefonecelular']}}</li>
                                                            @endif


                                                            @dd($restaurante['faixadepreco'])
                                                            @if($restaurante['faixaprecode'] == 0 && $restaurante['faixaprecoate'] <= 50)
                                                            <li class="fai">
                                                             até R$ {{$restaurante['faixaprecoate']}},00
                                                            </li>
                                                            @elseif($restaurante['faixaprecode'] >=  50 && $restaurante['faixaprecoate'] <= 300)
                                                            <li class="fai">
                                                                de {{$restaurante['faixaprecode']}},00 até R$ {{$restaurante['faixaprecoate']}},00
                                                              </li>
                                                              @elseif($restaurante['faixaprecoate'] > 300)
                                                              <li class="fai">
                                                                Acima de R$ 300,00
                                                              </li>
                                                              @elseif($restaurante['faixaprecoate'] == "" && $restaurante['faixaprecoate'] == "")

                                                              @elseif($restaurante['faixaprecoate'] == null && $restaurante['faixaprecoate'] == null)

                                                              @elseif($restaurante['faixaprecoate'] == "" && $restaurante['faixaprecoate'] == null)

                                                              @elseif($restaurante['faixaprecoate'] == null && $restaurante['faixaprecoate'] == "")

                                                              @else

                                                            @endif
                                                        @if(isset($restaurante->socialmedias->siteoficial))
                                                        <li class="site"><a
                                                                href="{{ $restaurante->socialmedias->siteoficial }}" target="_blank">{{ $restaurante->socialmedias->siteoficial }}</a>
                                                        </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <div class="col-md-6">
                                                    <ul>
                                                        @if($restaurante->tipocozinha)
                                                        <li class="coz">
                                                            {{implode(', ', $restaurante->tipocozinha)}}
                                                        </li>
                                                        @endif
                                                        @if($restaurante->indicadopara)
                                                        <li class="ind">
                                                            {{implode(', ', $restaurante->indicadopara)}}
                                                        </li>
                                                        @endif
                                                        <li class="pec">
                                                            @if($restaurante->socialmedias)
                                                            @if(isset($restaurante->socialmedias->ubereats) ||
                                                            isset($restaurante->socialmedias->ifood) ||
                                                            isset($restaurante->socialmedias->pedidosja) ||
                                                            isset($restaurante->socialmedias->rappi))
                                                            <div id="pecaonline" class="theme-blog-post-social"
                                                                id="onlinepeca">

                                                                <ul class="theme-copyright-social-online midias">
                                                                    @if(isset($restaurante->socialmedias->ubereats))

                                                                    <li><a target="_blank" href="{{$restaurante->socialmedias->ubereats}}"><img src="/img/icos/ico_ubereats.png"></a></li>

                                                                    @endif
                                                                    @if(isset($restaurante->socialmedias->ifood))

                                                                    <li><a target="_blank" href="{{$restaurante->socialmedias->ifood}}"><img src="/img/icos/ico_ifood.png"></a></li>

                                                                    @endif

                                                                    @if(isset($restaurante->socialmedias->rappi))

                                                                    <li><a target="_blank" href="{{$restaurante->socialmedias->rappi}}"><img src="/img/icos/ico_rappi.png"></a></li>

                                                                    @endif
                                                                    @if(isset($restaurante->socialmedias->outros))

                                                                    <li><a target="_blank" href="{{$restaurante->socialmedias->outros}}"><img src="/img/icos/outrosmidia.png"></a></li>

                                                                    @endif
                                                                </ul>
                                                            </div>
                                                            @endif
                                                            @endif
                                                        </li>
                                                        @if(isset($restaurante->socialmedias->email))
                                                        <li class="email"><a
                                                                href="mailto:{{ $restaurante->socialmedias->email }}">{{ $restaurante->socialmedias->email }}</a>
                                                        </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>


                                        </div>



                                        <div class="row galeriaFotosnirest" style="margin: 0 auto !important;">
                                            <div>
                                                <div class="galeriadeFotos inativo" >

                                                    <div class="row">
                                                        <div class="col-md-12">


                                                            <div class="row fotoGrande" ng-if="file6.base64">



                                                                <div ng-if="file6.base64" class="col-md-12"
                                                                    style="background-image:url('data:image/jpeg;base64,<% file6.base64 %>');">
                                                                </div>

                                                            </div>



                                                        </div>

                                                    </div>

                                                </div>
                                        </div>

                                        <div class="row funcionamento inativo">
                                                <div class="row bxMedalhas" style=" height: auto; overflow:hidden; width:75%; margin: 0 auto !important;">
                                                        @isset($restaurante->premios)
                                                          <div class="medals" style="z-index:5000; ">
                                                              <ul class="medalhas-detalhes">
                                                                  @isset($restaurante->premios)
                                                                  @if(count($restaurante->premios) > 0)
                                                                  @foreach($restaurante->premios as $premio)
                                                                  @if(!$premio->excluido)
                                                                  <li>

                                                                      <img
                                                                          src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMS43NiA1MTEuNzYiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMS43NiA1MTEuNzY7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiPgo8cG9seWdvbiBzdHlsZT0iZmlsbDojRTk1NDU0OyIgcG9pbnRzPSIxNTEuMzUyLDIyMS4yNDggMzkuNTkyLDQzMS44MDggMTQxLjA4LDQyMi40MzIgMTkwLjIsNTExLjc0NCAzMDEuOTYsMzAxLjE4NCAiLz4KPGc+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRUQ2MzYyOyIgZD0iTTE2NC4xNTIsNDUwLjQzMmMzLjEzNi02LjczNi0wLjE0NC0xNC43ODQtNi43MDQtMTguMjcybC02LjQzMi0zLjQyNCAgIGMtNi40MzItMy42NjQtOC44OC0xMS44MDgtNS4zNzYtMTguNGMzLjU1Mi02LjcwNCwxMS45MDQtOS4yNjQsMTguNjA4LTUuNzEybDE4LjE3Niw5LjY0OGM1LjYxNiwyLjk3NiwxMi42NTYsMC44MTYsMTUuNTUyLTQuODMyICAgbDAuNDQ4LTAuODY0YzMuMzI4LTUuMzI4LDEuMzYtMTIuMzY4LTQuMTc2LTE1LjI5NmwtNTQuMzY4LTI4Ljg0OGMtNi42MjQtMy41Mi05Ljg3Mi0xMS41MzYtNi43ODQtMTguMjg4ICAgYzMuNDA4LTcuMTg0LDEyLjAxNi0xMC4wMTYsMTguOTQ0LTYuMzM2bDUwLjQzMiwyNi43NjhjNS42MTYsMi45NzYsMTIuNjU2LDAuODE2LDE1LjYzMi00LjhsMC4yODgtMC43MzZsMC4wOC0wLjE2ICAgYzMuMjE2LTUuODg4LDAuOTYtMTMuMjgtNC45NzYtMTYuNDMybC0yOC4yODgtMTUuMDA4Yy02LjYyNC0zLjUyLTkuODcyLTExLjUzNi02LjczNi0xOC4zNjggICBjMy4zNzYtNy4xMDQsMTIuMDE2LTEwLjAxNiwxOC45NDQtNi4zMzZsMzEuMjQ4LDE2LjU5MmM1Ljg0LDMuMTA0LDEyLjgxNiwwLjUxMiwxNS44NC01LjM3NmMwLjA0OC0wLjA4LDAuMDQ4LTAuMDgsMC4wOC0wLjE2ICAgYzAuMDQ4LTAuMDgsMC4wNDgtMC4wOCwwLjA4LTAuMTZjMy4xODQtNS44MDgsMS40MjQtMTMuMDQtNC40MzItMTYuMTI4bC0zMy43MTItMTcuODg4Yy02LjU0NC0zLjQ3Mi05Ljc5Mi0xMS40ODgtNi43MDQtMTguMjQgICBjMy40MDgtNy4xODQsMTIuMDE2LTEwLjAxNiwxOC45NDQtNi4zMzZsODMuMTY4LDQ0LjE0NGwtMTExLjc2LDIxMC41NmwtMzAuOC01NS45ODQgICBDMTYxLjM1Miw0NTQuNDE2LDE2My4wOCw0NTIuNzUyLDE2NC4xNTIsNDUwLjQzMnoiLz4KCTxwb2x5Z29uIHN0eWxlPSJmaWxsOiNFRDYzNjI7IiBwb2ludHM9IjM2MC40MDgsMjIxLjI0OCA0NzIuMTY4LDQzMS44MDggMzcwLjY4LDQyMi40MzIgMzIxLjU2LDUxMS43NDQgMjA5LjgsMzAxLjE4NCAgIi8+CjwvZz4KPHBhdGggc3R5bGU9ImZpbGw6I0U5NTQ1NDsiIGQ9Ik0zNDcuNjA4LDQ1MC40MzJjLTMuMTM2LTYuNzM2LDAuMTQ0LTE0Ljc4NCw2LjcwNC0xOC4yNzJsNi40MzItMy40MjQgIGM2LjQzMi0zLjY2NCw4Ljg4LTExLjgwOCw1LjM3Ni0xOC40Yy0zLjU1Mi02LjcwNC0xMS45MDQtOS4yNjQtMTguNjA4LTUuNzEybC0xOC4xNzYsOS42NDhjLTUuNjE2LDIuOTc2LTEyLjY1NiwwLjgxNi0xNS41NTItNC44MzIgIGwtMC40NDgtMC44NjRjLTMuMzI4LTUuMzI4LTEuMzYtMTIuMzY4LDQuMTc2LTE1LjI5Nmw1NC4zODQtMjguODY0YzYuNjI0LTMuNTIsOS44NzItMTEuNTM2LDYuNzg0LTE4LjI4OCAgYy0zLjQwOC03LjE4NC0xMi4wMTYtMTAuMDE2LTE4Ljk0NC02LjMzNmwtNTAuNDMyLDI2Ljc2OGMtNS42MTYsMi45NzYtMTIuNjU2LDAuODE2LTE1LjYzMi00LjhsLTAuMjg4LTAuNzM2bC0wLjA4LTAuMTYgIGMtMy4yMTYtNS44ODgtMC45Ni0xMy4yOCw0Ljk3Ni0xNi40MzJsMjguMjg4LTE1LjAwOGM2LjYyNC0zLjUyLDkuODcyLTExLjUzNiw2LjczNi0xOC4zNjggIGMtMy4zNzYtNy4xMDQtMTIuMDE2LTEwLjAxNi0xOC45NDQtNi4zMzZsLTMxLjI4LDE2LjYyNGMtNS44NCwzLjEwNC0xMi44MTYsMC41MTItMTUuODQtNS4zNzZjLTAuMDQ4LTAuMDgtMC4wNDgtMC4wOC0wLjA4LTAuMTYgIGMtMC4wNDgtMC4wOC0wLjA0OC0wLjA4LTAuMDgtMC4xNmMtMy4xODQtNS44MDgtMS40MjQtMTMuMDQsNC40MzItMTYuMTI4bDMzLjcxMi0xNy44ODhjNi41NDQtMy40NzIsOS43OTItMTEuNDg4LDYuNzA0LTE4LjI0ICBjLTMuNDA4LTcuMTg0LTEyLjAxNi0xMC4wMTYtMTguOTQ0LTYuMzM2TDIwOS44MTYsMzAxLjJsMTExLjc2LDIxMC41NmwzMC44LTU1Ljk4NEMzNTAuNDA4LDQ1NC40MTYsMzQ4LjY4LDQ1Mi43NTIsMzQ3LjYwOCw0NTAuNDMyICB6Ii8+CjxjaXJjbGUgc3R5bGU9ImZpbGw6I0ZGQ0M1QjsiIGN4PSIyNTUuODgiIGN5PSIxODYuNzM2IiByPSIxODYuNzM2Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNGREJDNEI7IiBkPSJNMjgxLjIwOCwxNjUuMzEySDE2Mi44NzJjLTkuMiwwLTE2Ljc1Mi03LjU1Mi0xNi43NTItMTYuNzUybDAuMTI4LTEuMTUydi0wLjI1NiAgYy0wLjEyOC05LjcxMiw3Ljc5Mi0xNy42NDgsMTcuNTItMTcuNjQ4aDgyLjAxNmMxMC44NjQsMCwyMC40NjQtOC4wNDgsMjEuMTA0LTE4LjkyOEMyNjcuNCw5OS4yLDI1OC4zMjgsODkuNiwyNDYuOTM2LDg5LjZoLTg2Ljg4ICBjLTkuNTg0LDAtMTYuNzUyLTguMDQ4LTE2LjYyNC0xNy42NDhjMC0wLjEyOCwwLTAuMTI4LDAtMC4yNTZzMC0wLjEyOCwwLTAuMjU2Yy0wLjEyOC05LjU4NCw3LjAyNC0xNy42NDgsMTYuNjI0LTE3LjY0OGg5MC45MTIgIGMxMC43MzYsMCwyMC4zMzYtOC4wNDgsMjAuOTc2LTE4LjhjMC41MTItMTEuNTA0LTguNTYtMjAuOTc2LTE5Ljk1Mi0yMC45NzZoLTY2LjU3NkMxMTcuNTI4LDQyLDY5LjY4OCwxMDguNzUyLDY5LjY4OCwxODYuNzM2ICBzNDcuODQsMTQ0LjcyLDExNS43NDQsMTcyLjY3Mmg4NC41MjhjMTAuNzM2LDAsMjAuMzM2LTguMDQ4LDIwLjk3Ni0xOC44YzAuNTEyLTExLjUwNC04LjU2LTIwLjk2LTE5Ljk1Mi0yMC45NmwtOTYuMTYtMC4wMTYgIGMtMTEuMzQ0LDAtMjAuNDgtOS40ODgtMTkuODcyLTIwLjk3NmMwLjU2LTEwLjc1MiwxMC4yMjQtMTguODMyLDIwLjk5Mi0xOC44MzJoMzcuMjhjMTAuNzItMC4zMDQsMTkuMzc2LTkuMDg4LDE5LjM3Ni0xOS44ODggIGMwLTEwLjk5Mi04Ljk0NC0xOS45NTItMTkuOTUyLTE5Ljk1MmgtNTYuNTEyYy05LjIsMC0xNi43NTItNy41MzYtMTYuNjI0LTE2Ljc1MnYtMS40MDhjLTAuNjQtOS4wNzIsNi42NTYtMTYuNzUyLDE1LjcyOC0xNi43NTIgIGgxMjQuODE2YzEwLjg2NCwwLDIwLjQ2NC04LjA0OCwyMS4xMDQtMTguOEMzMDEuNjcyLDE3NC43ODQsMjkyLjU4NCwxNjUuMzEyLDI4MS4yMDgsMTY1LjMxMnoiLz4KPHBhdGggc3R5bGU9ImZpbGw6I0ZGREI3MDsiIGQ9Ik0yNTUuODgsMzIwLjAxNmMtNzMuNTA0LDAtMTMzLjI5Ni01OS44MDgtMTMzLjI5Ni0xMzMuMjk2UzE4Mi4zNzYsNTMuNDQsMjU1Ljg4LDUzLjQ0ICBzMTMzLjI5Niw1OS44MDgsMTMzLjI5NiwxMzMuMjk2UzMyOS4zODQsMzIwLjAxNiwyNTUuODgsMzIwLjAxNnoiLz4KPGc+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRUQ2MzYyOyIgZD0iTTE5MS42NTYsMjM5LjUwNGMtMi4wOTYsMS45MDQtMy4zMjgsNC4xNzYtNC4zMDQsNi41NzZjLTAuOTI4LDIuNDE2LTEuNiw0Ljk2LTEuNDI0LDcuODA4ICAgYzAuMTkyLDIuODY0LDEuMzYsNi4wMTYsMS41Miw4Ljg0OGMwLjAzMiwwLjM2OC0wLjA2NCwwLjcyLTAuMDQ4LDEuMDcyYy01LjM3Ni03LjEwNC05Ljk2OC0xNC42NC0xMy43Ni0yMi40OCAgIGMwLjA5Ni0xLjU4NCwwLjMzNi0zLjA4OCwwLjkxMi00LjQxNmMwLjkyOC0yLjMwNCwyLjg5Ni00LjAzMiw0LjE0NC02LjEyOGMxLjIzMi0yLjA5NiwxLjg0LTQuNDk2LDIuMzY4LTYuOTQ0ICAgYzAuNDgtMi40OCwwLjg2NC00Ljk5MiwwLjYyNC03LjkzNmMtMC4yMjQtMC4xNDQtMC40NjQtMC4yODgtMC42ODgtMC40NDhjLTIuMzg0LDEuMjY0LTQuMDMyLDMuMDQtNS40NzIsNC45OTIgICBjLTEuMzc2LDEuOTg0LTIuNTYsNC4xMjgtMy4wMDgsNi43NTJjLTAuNDE2LDIuNjQsMCw1Ljc2LTAuNDY0LDguMzM2Yy0wLjA4LDAuNDk2LTAuMzA0LDAuOTI4LTAuNDMyLDEuNDA4ICAgYy0zLjQ1Ni03Ljg0LTYuMTQ0LTE1Ljk1Mi04LjA0OC0yNC4yMjRjMC40MzItMS43OTIsMS4wMjQtMy40NTYsMi00Ljc2OGMxLjM0NC0xLjg3MiwzLjU4NC0yLjk3Niw1LjE4NC00LjU3NiAgIGMxLjU4NC0xLjYzMiwyLjYyNC0zLjY4LDMuNTg0LTUuODI0YzAuOTI4LTIuMTkyLDEuNzYtNC40MzIsMi4wNDgtNy4yNDhjLTAuMTkyLTAuMTkyLTAuMzg0LTAuMzg0LTAuNTc2LTAuNTc2ICAgYy0yLjQ5NiwwLjU5Mi00LjQsMS44NTYtNi4xMjgsMy4zMTJjLTEuNjk2LDEuNDg4LTMuMjE2LDMuMjE2LTQuMTYsNS41MDRjLTAuOTEyLDIuMzItMS4xMiw1LjI5Ni0yLjA4LDcuNTM2ICAgYy0wLjI0LDAuNjA4LTAuNjI0LDEuMDcyLTAuOTQ0LDEuNjE2Yy0xLjU2OC04LjE5Mi0yLjM4NC0xNi41MTItMi40MzItMjQuODQ4YzAuODQ4LTEuOTY4LDEuODQtMy43NiwzLjI4LTQuOTQ0ICAgYzEuNjMyLTEuNDA4LDMuOTM2LTEuODU2LDUuNzQ0LTIuOTZjMS43OTItMS4xMiwzLjE1Mi0yLjgxNiw0LjQ0OC00LjU5MmMxLjI2NC0xLjg0LDIuNDQ4LTMuNzc2LDMuMjMyLTYuNCAgIGMtMC4xNDQtMC4yNC0wLjI4OC0wLjQ2NC0wLjQzMi0wLjcwNGMtMi40NjQtMC4wNjQtNC40NjQsMC42ODgtNi4zNTIsMS42MzJjLTEuODU2LDEuMDA4LTMuNjE2LDIuMjI0LTQuOTEyLDQuMTc2ICAgYy0xLjI5NiwxLjk2OC0yLjAzMiw0LjcwNC0zLjM2LDYuNTZjLTAuNDQ4LDAuNjU2LTEuMDA4LDEuMTM2LTEuNTUyLDEuNjQ4YzAuMjg4LTguMTQ0LDEuMjk2LTE2LjI3MiwzLjAyNC0yNC4zMDQgICBjMC4wOC0wLjEyOCwwLjE2LTAuMjQsMC4yNC0wLjM2OGMxLjI5Ni0xLjk2OCwyLjczNi0zLjcxMiw0LjU0NC00LjU5MmMxLjc3Ni0wLjkyOCwzLjk4NC0wLjc1Miw1Ljg3Mi0xLjM2ICAgYzEuODcyLTAuNjI0LDMuNDQtMS45MDQsNC45NzYtMy4zMjhjMS41MDQtMS40NzIsMi45Ni0zLjA1Niw0LjE5Mi01LjQ0Yy0wLjA5Ni0wLjI1Ni0wLjE3Ni0wLjUyOC0wLjI3Mi0wLjggICBjLTIuMjU2LTAuNjU2LTQuMjQtMC40MTYtNi4xNiwwLjAzMmMtMS45MDQsMC41MTItMy43NiwxLjI2NC01LjMyOCwyLjgxNmMtMS41NjgsMS41ODQtMi43ODQsNC4wMzItNC4zNjgsNS40NCAgIGMtMC42ODgsMC42NTYtMS40NCwxLjA4OC0yLjIyNCwxLjUwNGMyLjExMi03Ljk2OCw0Ljk3Ni0xNS44MDgsOC41Ni0yMy40MDhjMC4wNjQsMC4wOTYsMC4xNDQsMC4xNzYsMC4yMDgsMC4yNzIgICBjMC4zMDQtMC4zMiwwLjYyNC0wLjYyNCwwLjkyOC0wLjk0NGMxLjYtMS41ODQsMy4yNjQtMi45MTIsNS4wNzItMy4zMTJjMS44MDgtMC40NjQsMy43NzYsMC4yNTYsNS42LDAuMTEyICAgYzEuODI0LTAuMTYsMy41Mi0xLjA0LDUuMjE2LTIuMDhjMS42OC0xLjEwNCwzLjM0NC0yLjMzNiw0Ljk3Ni00LjQxNmMtMC4wMTYtMC4yODgtMC4wNDgtMC41NzYtMC4wNjQtMC44NDggICBjLTEuOTA0LTEuMTY4LTMuNzQ0LTEuNDA4LTUuNi0xLjQwOGMtMS44NCwwLjA0OC0zLjY4LDAuMzUyLTUuNDQsMS41MDRjLTEuNzYsMS4xODQtMy4zOTIsMy4yOC01LjEyLDQuMjcyICAgYy0wLjg0OCwwLjUyOC0xLjc0NCwwLjgzMi0yLjY0LDEuMDI0YzAuMDMyLTAuMTc2LDAuMDMyLTAuMzM2LDAuMDY0LTAuNTEyYzUuODI0LTEwLjgxNiwxMy4yMzItMjEuMDQsMjIuMjQtMzAuMzUyICAgYy04LjUyOCw4LjI0LTE1Ljc3NiwxNy4zMjgtMjEuNzYsMjcuMDA4YzAuMDE2LTAuMjg4LDAuMTQ0LTAuNjI0LDAuMTQ0LTAuOTEyYzAuMTQ0LTIuMDgsMC4yNC00LjE0NCwwLjA0OC02LjA5NiAgIGMtMC42MjQtMy44MjQtMS42NjQtNy41Mi00LjQ5Ni0xMC42NGMtMC4zMDQsMC4xMTItMC42MDgsMC4yMjQtMC45MTIsMC4zMzZjLTMuMDA4LDUuMjk2LTMuNzkyLDkuOTItMy44MDgsMTQuMTQ0ICAgYzAuMTI4LDIuMDY0LDAuNTkyLDMuOTUyLDEuMjE2LDUuNzZjMC41MTIsMS44NzIsMS40NCwzLjUyLDIuNTkyLDUuMDRjMC4xNiwwLjIyNCwwLjMyLDAuNDMyLDAuNDk2LDAuNjU2ICAgYy0zLjQyNCw2LjUxMi02LjMwNCwxMy4yNjQtOC42MjQsMjAuMTZjLTAuMDE2LTAuMDY0LDAtMC4xNDQtMC4wMTYtMC4yMjRjLTAuNDY0LTIuMTI4LTAuOTEyLTQuMjg4LTEuNi02LjI4OCAgIGMtMS42LTMuODU2LTMuNTUyLTcuNTItNy4xMDQtMTAuMjU2Yy0wLjI3MiwwLjE3Ni0wLjUyOCwwLjM1Mi0wLjgsMC41MjhjLTEuNjE2LDYuMDgtMS4yMzIsMTEuMDU2LTAuMTQ0LDE1LjQ0ICAgYzAuNjQsMi4xMTIsMS42MTYsMy45ODQsMi43MDQsNS43NDRjMC45OTIsMS44NCwyLjM1MiwzLjM3NiwzLjg4OCw0LjczNmMwLjA0OCwwLjAzMiwwLjA5NiwwLjA4LDAuMTI4LDAuMTEyICAgYy0xLjc2LDYuODQ4LTMuMDA4LDEzLjgwOC0zLjcxMiwyMC44MzJjLTAuOTQ0LTIuMDY0LTEuOTA0LTQuMTEyLTMuMDU2LTUuOTUyYy0yLjU5Mi0zLjY4LTUuNDU2LTcuMTItOS42OC05LjMyOCAgIGMtMC4yMjQsMC4yMjQtMC40NDgsMC40NDgtMC42NzIsMC42ODhjLTAuMDk2LDYuNTkyLDEuNTUyLDExLjY0OCwzLjc2LDE1Ljk2OGMxLjIsMi4wNjQsMi42NTYsMy44MDgsNC4yMDgsNS40MDggICBjMS4zNiwxLjU2OCwzLjAwOCwyLjc1Miw0Ljc1MiwzLjgwOGMtMC4xNzYsNi45MjgsMC4xNDQsMTMuODg4LDAuOTkyLDIwLjhjLTEuNDA4LTEuNzkyLTIuOC0zLjYtNC4zMzYtNS4xNTIgICBjLTMuNTY4LTMuMjY0LTcuMzQ0LTYuMjcyLTEyLjE0NC03LjgyNGMtMC4xNzYsMC4yNzItMC4zMzYsMC41NDQtMC41MTIsMC44MTZjMS41MzYsNi43NjgsNC41MTIsMTEuNjQ4LDcuODcyLDE1LjYzMiAgIGMxLjc0NCwxLjg4OCwzLjY4LDMuMzkyLDUuNjgsNC43MmMxLjYsMS4yLDMuMzkyLDEuOTY4LDUuMjE2LDIuNjU2YzEuMzYsNi43NTIsMy4yMzIsMTMuNDI0LDUuNiwxOS45ODQgICBjLTEuODA4LTEuNDQtMy41ODQtMi45MTItNS40NTYtNC4xNDRjLTQuNTEyLTIuNjQtOS4xMzYtNS4wMDgtMTQuNDQ4LTUuNzEyYy0wLjExMiwwLjMwNC0wLjIwOCwwLjYwOC0wLjMyLDAuOTEyICAgYzMuMjgsNi42MDgsNy41NjgsMTEuMDA4LDEyLjA2NCwxNC40YzIuMjg4LDEuNTg0LDQuNjcyLDIuNzIsNy4wODgsMy42OGMxLjc2LDAuOCwzLjYsMS4xNTIsNS40MjQsMS40ODggICBjMi44OCw2LjMwNCw2LjI3MiwxMi40NDgsMTAuMTQ0LDE4LjM2OGMtMi4xNDQtMS4wMjQtNC4yNzItMi4xMTItNi40MTYtMi45MTJjLTUuMzc2LTEuNzYtMTAuNzg0LTMuMjgtMTYuNDY0LTMuMDQgICBjLTAuMDMyLDAuMzM2LTAuMDY0LDAuNjU2LTAuMDk2LDAuOTkyYzUuMDcyLDYuMDgsMTAuNjg4LDkuNjgsMTYuMjU2LDEyLjIwOGMyLjgsMS4xMzYsNS42LDEuODA4LDguMzg0LDIuMjg4ICAgYzEuODI0LDAuNCwzLjYxNiwwLjMzNiw1LjQyNCwwLjM1MmMzLjAwOCwzLjg0LDYuMjU2LDcuNTUyLDkuNzEyLDExLjEzNmMxLjgyNC0xLjgyNCwzLjY2NC0zLjY2NCw1LjQ4OC01LjQ4OCAgIGMtMy45ODQtMy44NC03LjY4LTcuODg4LTExLjEwNC0xMi4wOGMtMC4xNzYtMS4zNzYtMC4yNC0yLjcwNC0wLjA0OC0zLjk2OGMwLjMzNi0yLjY3MiwxLjg1Ni00Ljk3NiwyLjU5Mi03LjQ3MiAgIGMwLjcwNC0yLjUxMiwwLjc1Mi01LjE2OCwwLjcyLTcuODU2Yy0wLjA4LTIuNzA0LTAuMjU2LTUuNDA4LTEuMTItOC40QzE5Mi4xNjgsMjM5LjY5NiwxOTEuOTEyLDIzOS42LDE5MS42NTYsMjM5LjUwNHoiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNFRDYzNjI7IiBkPSJNMzIwLjEwNCwyMzkuNTA0YzIuMDk2LDEuOTA0LDMuMzI4LDQuMTc2LDQuMzA0LDYuNTc2YzAuOTI4LDIuNDE2LDEuNiw0Ljk2LDEuNDI0LDcuODA4ICAgYy0wLjE5MiwyLjg2NC0xLjM2LDYuMDE2LTEuNTIsOC44NDhjLTAuMDMyLDAuMzY4LDAuMDY0LDAuNzIsMC4wNDgsMS4wNzJjNS4zNzYtNy4xMDQsOS45NjgtMTQuNjQsMTMuNzYtMjIuNDggICBjLTAuMDk2LTEuNTg0LTAuMzM2LTMuMDg4LTAuOTEyLTQuNDE2Yy0wLjkyOC0yLjMwNC0yLjg5Ni00LjAzMi00LjE0NC02LjEyOGMtMS4yMzItMi4wOTYtMS44NC00LjQ5Ni0yLjM2OC02Ljk0NCAgIGMtMC40OC0yLjQ4LTAuODY0LTQuOTkyLTAuNjI0LTcuOTM2YzAuMjI0LTAuMTQ0LDAuNDY0LTAuMjg4LDAuNjg4LTAuNDQ4YzIuMzg0LDEuMjY0LDQuMDMyLDMuMDQsNS40NzIsNC45OTIgICBjMS4zNzYsMS45ODQsMi41Niw0LjEyOCwzLjAwOCw2Ljc1MmMwLjQxNiwyLjY0LDAsNS43NiwwLjQ2NCw4LjMzNmMwLjA4LDAuNDk2LDAuMzA0LDAuOTI4LDAuNDMyLDEuNDA4ICAgYzMuNDU2LTcuODQsNi4xNDQtMTUuOTUyLDguMDQ4LTI0LjIyNGMtMC40MzItMS43OTItMS4wMjQtMy40NTYtMi00Ljc2OGMtMS4zNDQtMS44NzItMy41ODQtMi45NzYtNS4xODQtNC41NzYgICBjLTEuNTg0LTEuNjMyLTIuNjI0LTMuNjgtMy41ODQtNS44MjRjLTAuOTI4LTIuMTkyLTEuNzYtNC40MzItMi4wNDgtNy4yNDhjMC4xOTItMC4xOTIsMC4zODQtMC4zODQsMC41NzYtMC41NzYgICBjMi40OTYsMC41OTIsNC40LDEuODU2LDYuMTI4LDMuMzEyYzEuNjk2LDEuNDg4LDMuMjE2LDMuMjE2LDQuMTYsNS41MDRjMC45MTIsMi4zMiwxLjEyLDUuMjk2LDIuMDgsNy41MzYgICBjMC4yNCwwLjYwOCwwLjYyNCwxLjA3MiwwLjk0NCwxLjYxNmMxLjU2OC04LjE5MiwyLjM4NC0xNi41MTIsMi40MzItMjQuODQ4Yy0wLjg0OC0xLjk2OC0xLjg0LTMuNzYtMy4yOC00Ljk0NCAgIGMtMS42MzItMS40MDgtMy45MzYtMS44NTYtNS43NDQtMi45NmMtMS43OTItMS4xMi0zLjE1Mi0yLjgxNi00LjQ0OC00LjU5MmMtMS4yNjQtMS44NC0yLjQ0OC0zLjc3Ni0zLjIzMi02LjQgICBjMC4xNDQtMC4yNCwwLjI4OC0wLjQ2NCwwLjQzMi0wLjcwNGMyLjQ2NC0wLjA2NCw0LjQ2NCwwLjY4OCw2LjM1MiwxLjYzMmMxLjg1NiwxLjAwOCwzLjYxNiwyLjIyNCw0LjkxMiw0LjE3NiAgIGMxLjI5NiwxLjk2OCwyLjAzMiw0LjcwNCwzLjM2LDYuNTZjMC40NDgsMC42NTYsMS4wMDgsMS4xMzYsMS41NTIsMS42NDhjLTAuMjg4LTguMTQ0LTEuMjk2LTE2LjI3Mi0zLjAyNC0yNC4zMDQgICBjLTAuMDgtMC4xMjgtMC4xNi0wLjI0LTAuMjQtMC4zNjhjLTEuMjk2LTEuOTY4LTIuNzM2LTMuNzEyLTQuNTQ0LTQuNTkyYy0xLjc3Ni0wLjkyOC0zLjk4NC0wLjc1Mi01Ljg3Mi0xLjM2ICAgYy0xLjg3Mi0wLjYyNC0zLjQ0LTEuOTA0LTQuOTc2LTMuMzI4Yy0xLjUwNC0xLjQ3Mi0yLjk2LTMuMDU2LTQuMTkyLTUuNDRjMC4wOTYtMC4yNTYsMC4xNzYtMC41MjgsMC4yNzItMC44ICAgYzIuMjU2LTAuNjU2LDQuMjQtMC40MTYsNi4xNiwwLjAzMmMxLjkwNCwwLjUxMiwzLjc2LDEuMjY0LDUuMzI4LDIuODE2YzEuNTY4LDEuNTg0LDIuNzg0LDQuMDMyLDQuMzY4LDUuNDQgICBjMC42ODgsMC42NTYsMS40NCwxLjA4OCwyLjIyNCwxLjUwNGMtMi4wOC03Ljk1Mi00LjkyOC0xNS43OTItOC41MjgtMjMuMzkyYy0wLjA2NCwwLjA5Ni0wLjE0NCwwLjE3Ni0wLjIwOCwwLjI3MiAgIGMtMC4zMDQtMC4zMi0wLjYyNC0wLjYyNC0wLjkyOC0wLjk0NGMtMS42LTEuNTg0LTMuMjY0LTIuOTEyLTUuMDcyLTMuMzEyYy0xLjgwOC0wLjQ2NC0zLjc3NiwwLjI1Ni01LjYsMC4xMTIgICBjLTEuODI0LTAuMTYtMy41Mi0xLjA0LTUuMjE2LTIuMDhjLTEuNjgtMS4xMDQtMy4zNDQtMi4zMzYtNC45NzYtNC40MTZjMC4wMTYtMC4yODgsMC4wNDgtMC41NzYsMC4wNjQtMC44NDggICBjMS45MDQtMS4xNjgsMy43NDQtMS40MDgsNS42LTEuNDA4YzEuODQsMC4wNDgsMy42OCwwLjM1Miw1LjQ0LDEuNTA0YzEuNzYsMS4xODQsMy4zOTIsMy4yOCw1LjEyLDQuMjcyICAgYzAuODQ4LDAuNTI4LDEuNzQ0LDAuODMyLDIuNjQsMS4wMjRjLTAuMDMyLTAuMTYtMC4wNDgtMC4zMzYtMC4wNjQtMC40OTZjLTUuODI0LTEwLjgxNi0xMy4yMzItMjEuMDQtMjIuMjQtMzAuMzUyICAgYzguNTI4LDguMjQsMTUuNzc2LDE3LjMyOCwyMS43NiwyNy4wMDhjLTAuMDE2LTAuMjg4LTAuMTQ0LTAuNjI0LTAuMTQ0LTAuOTEyYy0wLjE0NC0yLjA4LTAuMjQtNC4xNDQtMC4wNDgtNi4wOTYgICBjMC42MjQtMy44MjQsMS42NjQtNy41Miw0LjQ5Ni0xMC42NGMwLjMwNCwwLjExMiwwLjYwOCwwLjIyNCwwLjkxMiwwLjMzNmMzLjAwOCw1LjI5NiwzLjc5Miw5LjkyLDMuODA4LDE0LjE0NCAgIGMtMC4xMjgsMi4wNjQtMC41OTIsMy45NTItMS4yMTYsNS43NmMtMC41MTIsMS44NzItMS40NCwzLjUyLTIuNTkyLDUuMDRjLTAuMTYsMC4yMjQtMC4zMiwwLjQzMi0wLjQ5NiwwLjY1NiAgIGMzLjQyNCw2LjUxMiw2LjMwNCwxMy4yNjQsOC42MjQsMjAuMTZjMC4wMTYtMC4wNjQsMC0wLjE0NCwwLjAxNi0wLjIyNGMwLjQzMi0yLjE2LDAuODgtNC4zMiwxLjU2OC02LjMyICAgYzEuNi0zLjg1NiwzLjU1Mi03LjUyLDcuMTA0LTEwLjI1NmMwLjI3MiwwLjE3NiwwLjU0NCwwLjMzNiwwLjgxNiwwLjUxMmMxLjYxNiw2LjA4LDEuMjMyLDExLjA1NiwwLjE2LDE1LjQ0ICAgYy0wLjY0LDIuMTEyLTEuNjE2LDMuOTg0LTIuNzA0LDUuNzQ0Yy0wLjk5MiwxLjg0LTIuMzUyLDMuMzc2LTMuODg4LDQuNzM2Yy0wLjA0OCwwLjAzMi0wLjA5NiwwLjA4LTAuMTI4LDAuMTEyICAgYzEuNzYsNi44NDgsMy4wMDgsMTMuODA4LDMuNzEyLDIwLjgzMmMwLjk0NC0yLjA2NCwxLjkwNC00LjExMiwzLjA1Ni01Ljk1MmMyLjU5Mi0zLjY4LDUuNDU2LTcuMTIsOS42OC05LjMyOCAgIGMwLjIyNCwwLjIyNCwwLjQ0OCwwLjQ0OCwwLjY3MiwwLjY3MmMwLjA5Niw2LjU5Mi0xLjU1MiwxMS42NDgtMy43NiwxNS45NjhjLTEuMiwyLjA2NC0yLjY1NiwzLjgwOC00LjIwOCw1LjQwOCAgIGMtMS4zNiwxLjU2OC0zLjAwOCwyLjc1Mi00Ljc1MiwzLjgwOGMwLjE3Niw2LjkyOC0wLjE0NCwxMy44ODgtMC45OTIsMjAuOGMxLjQwOC0xLjc5MiwyLjgtMy42LDQuMzM2LTUuMTUyICAgYzMuNTY4LTMuMjY0LDcuMzQ0LTYuMjcyLDEyLjE0NC03LjgyNGMwLjE3NiwwLjI3MiwwLjMzNiwwLjU0NCwwLjUxMiwwLjgxNmMtMS41MzYsNi43NjgtNC41MTIsMTEuNjQ4LTcuODcyLDE1LjYzMiAgIGMtMS43NDQsMS44ODgtMy42OCwzLjM5Mi01LjY4LDQuNzJjLTEuNiwxLjItMy4zOTIsMS45NjgtNS4yMTYsMi42NTZjLTEuMzYsNi43NTItMy4yMzIsMTMuNDI0LTUuNiwxOS45ODQgICBjMS44MDgtMS40NCwzLjU4NC0yLjkxMiw1LjQ1Ni00LjE0NGM0LjUxMi0yLjY0LDkuMTM2LTUuMDA4LDE0LjQ0OC01LjcxMmMwLjExMiwwLjMwNCwwLjIwOCwwLjYwOCwwLjMyLDAuOTEyICAgYy0zLjI4LDYuNjA4LTcuNTY4LDExLjAwOC0xMi4wNjQsMTQuNGMtMi4yODgsMS41ODQtNC42NzIsMi43Mi03LjA4OCwzLjY4Yy0xLjc2LDAuOC0zLjYsMS4xNTItNS40MjQsMS40ODggICBjLTIuODgsNi4zMDQtNi4yNzIsMTIuNDQ4LTEwLjE0NCwxOC4zNjhjMi4xNDQtMS4wMjQsNC4yNzItMi4xMTIsNi40MTYtMi45MTJjNS4zNzYtMS43NiwxMC43ODQtMy4yOCwxNi40NjQtMy4wNCAgIGMwLjAzMiwwLjMzNiwwLjA2NCwwLjY1NiwwLjA5NiwwLjk5MmMtNS4wNzIsNi4wOC0xMC42ODgsOS42OC0xNi4yNTYsMTIuMjA4Yy0yLjgsMS4xMzYtNS42LDEuODA4LTguMzg0LDIuMjg4ICAgYy0xLjgyNCwwLjQtMy42MTYsMC4zMzYtNS40MjQsMC4zNTJjLTMuMDA4LDMuODQtNi4yNTYsNy41NTItOS43MTIsMTEuMTM2Yy0xLjgyNC0xLjgyNC0zLjY2NC0zLjY2NC01LjQ4OC01LjQ4OCAgIGMzLjk4NC0zLjg0LDcuNjgtNy44ODgsMTEuMTA0LTEyLjA4YzAuMTc2LTEuMzc2LDAuMjQtMi43MDQsMC4wNDgtMy45NjhjLTAuMzM2LTIuNjcyLTEuODU2LTQuOTc2LTIuNTkyLTcuNDcyICAgYy0wLjcwNC0yLjUxMi0wLjc1Mi01LjE2OC0wLjcyLTcuODU2YzAuMDgtMi43MDQsMC4yNTYtNS40MDgsMS4xMi04LjRDMzE5LjU5MiwyMzkuNjk2LDMxOS44NDgsMjM5LjYsMzIwLjEwNCwyMzkuNTA0eiIvPgo8L2c+CjxwYXRoIHN0eWxlPSJmaWxsOiNFOTU0NTQ7IiBkPSJNMjUzLjI0LDk4LjQ2NGMtMy44NCwxMC43Mi0xMC45MTIsMjAuMDgtMjEuMjMyLDI4LjEyOGMtNS4yNjQsNC4xMTItMTAuMjI0LDcuMTM2LTE1LjA3Miw5LjgwOHYzMC44ICBjMTAuOTc2LTUuMDU2LDIxLjIzMi0xMS4wNzIsMjkuOTM2LTE5LjIxNnYxMjYuOTkyaDMzLjY5NlY5OC40NjRIMjUzLjI0eiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K">

                                                                      <span
                                                                          class="data" style="color:000!important;"><strong>{{ \Carbon\Carbon::parse($premio->data)->format('Y')}}</strong></span>
                                                                      <span class="texto" style="color:000!important;">{{$premio->nome}}</span>
                                                                      <span class="texto" style="color:000!important;">Por:
                                                                          {{$premio->concedidopor}}</span>

                                                                  </li>
                                                                  @endif
                                                                  @endforeach
                                                                  @endif
                                                                  @endif
                                                              </ul>
                                                          </div>
                                                        @endif



                                                      </div>

                                                @if($restaurante['descricao'] != '')
                                            <div class="col-md-12">

                                                    <h3 style="color:#ff6c2d; font-size:14px; padding-left:20px !important;" class="titHora">Descrição
                                                        </h3>
                                                        <p style="display:block; padding:20px; color:#000; font-size:14px; text-align:justify; font-weight:normal !important; !important;">
                                                                {{$restaurante['descricao']}}
                                                        </p>

                                            </div>
                                            @endif
                                         <div class="col-md-12" style="padding:0px !important">
<div class="row">
    <div class="col-md-10 col-xs-9" style="padding:0px !important">
            <div class="tab-content">
                    <h3 style="color:#ff6c2d; font-size:14px; padding-left:20px !important;" ng-click="situacaohor()" class="titHora2 setaacima">Horário
                    </h3>
                </div>
    </div>
    <div class="col-md-2 col-xs-3" style="padding:0px !important">
            <div class="col-md-12" style="padding:0px !important" @if($restaurante['descricao'] != '') @endif>
                @if(session()->get('usuario'))
                <form enctype="multipart/form-data"
                    action="{{ route('uploadfoto', $restaurante['_id'])}}"
                    method="post">
                    @csrf

                    <label for="image" class="upfoto" style="background-position:130px; top:5px;" @if($restaurante['descricao'] != '') @endif></label>
                    <input type="file" ng-model="file6" base-sixty-four-input
                        required onload="onLoad" name="image" id="image"
                        style="display:none;">
                    <input ng-if="file6.base64" type="submit" value="Salvar" style=" margin:0 auto !important; margin-bottom: 10px; border: 0px;background-color: #e9642b !important; color:#fff !important;">
                </form>
                @else

                <label for="image" class="upfoto" style="background-position:130px; top:5px;" onclick="location.href='https://norestaurante.com.br/login'"></label>
                @endif
                </div>
    </div>
</div>
                                               <div class="row">
                                                   <div class="col-md-12 <%horariotelis%>" style="padding:0px !important">
                                                    <div class="tabbable " ng-if="domingo.length > 0 || segunda.length > 0 || terca.length > 0 || quarta.length > 0 || quinta.length > 0 || sexta.length > 0 || sabado.length > 0"
                                                            style="background-color:#ff6c2d !important;">
                                                            <div class="tab-content funcionamento">
                                                                <script type="text/javascript">
                                                                    var id = '{{$restaurante->id}}';
                                                                </script>
                                                                <div class="col-md-4 cot"
                                                                    style="border-right:1px solid #fff !important;">
                                                                    <div class="bloc" ng-if="domingo.length > 0">
                                                                        <span class="bloc_hor">DOM</span> - <span class="repeater"
                                                                            ng-repeat="dom in domingo">
                                                                            <% dom.horade %> às <% dom.horaate %>
                                                                        </span>
                                                                    </div>

                                                                    <div class="bloc" ng-if="segunda.length > 0">
                                                                        <span class="bloc_hor">SEG</span> - <span class="repeater"
                                                                            ng-repeat="seg in segunda">
                                                                            <% seg.horade %> às <% seg.horaate %>
                                                                        </span>
                                                                    </div>
                                                                    <div class="bloc" ng-if="terca.length > 0">
                                                                        <span class="bloc_hor">TER</span> - <span class="repeater"
                                                                            ng-repeat="ter in terca">
                                                                            <% ter.horade %> às <% ter.horaate %>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 cot"
                                                                    style="border-right:1px solid #fff !important;">
                                                                    <div class="bloc" ng-if="quarta.length > 0">
                                                                        <span class="bloc_hor">QUA</span> - <span class="repeater"
                                                                            ng-repeat="qua in quarta">
                                                                            <% qua.horade %> às <% qua.horaate %>
                                                                        </span>
                                                                    </div>
                                                                    <div class="bloc" ng-if="quinta.length > 0">
                                                                        <span class="bloc_hor">QUI</span> - <span class="repeater"
                                                                            ng-repeat="qui in quinta">
                                                                            <% qui.horade %> às <% qui.horaate %>
                                                                        </span>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-4 cot">
                                                                    <div class="bloc" ng-if="sexta.length > 0">
                                                                        <span class="bloc_hor">SEX</span> - <span class="repeater"
                                                                            ng-repeat="sex in sexta">
                                                                            <% sex.horade %> às <% sex.horaate %>
                                                                        </span>
                                                                    </div>
                                                                    <div class="bloc" ng-if="sabado.length > 0">
                                                                        <span class="bloc_hor">SÁB</span> - <span class="repeater"
                                                                            ng-repeat="sab in sabado">
                                                                            <% sab.horade %> às <% sab.horaate %>
                                                                        </span>
                                                                    </div>


                                                                </div>

                                                            </div>
                                                        </div>
                                               </div>
                                            </div>

                                        </div>

                                        </div>







                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid" style="margin-top:20px; margin-bottom:20px;">

                        <div class="col-md-12">
                            <div class="row row-col-static" id="sticky-parent"
                                style="margin-top:20px; margin-bottom:20px;">



                                <!-- PERIFL DO CHEF E CARRO CHEFE -->

                                    <!-- Serviços -->
                                    <div class="theme-page-section theme-page-section-dark theme-page-section-lg secao_servicos"
                                        style="border-bottom:1px solid #fff !important; padding-bottom:20px;">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="row row-col-gap" data-gutter="20">
                                                    <h5 class="theme-page-section-title-servicos"
                                                        style="display:block; text-align:center; border-bottom:1px solid #fff;padding-bottom:10px;">
                                                        Serviços</h5>
                                                    <div class="row"
                                                        style="border-bottom:1px solid #fff !important; padding-bottom:20px;">
                                                        <div class="col-md-4 ">
                                                            <div class="theme-blog-post-servicos">
                                                                <p><strong>Restaurante:</strong> {{$restaurante->nome}}
                                                                </p>
                                                                @if($restaurante->datainauguracao)
                                                                <p><strong>Data de inauguração:</strong> {{\Carbon\Carbon::parse($restaurante->datainauguracao)->format('d/m/Y')}}
                                                                </p>
                                                                @endif
                                                                <p><strong>Endereço:</strong>
                                                                    {{$restaurante->endereco}}, {{$restaurante->numero}}
                                                                </p>
                                                                <p><strong>Bairro:</strong> {{$restaurante->bairro}}
                                                                </p>
                                                                <p><strong>Cidade:</strong> {{$restaurante->cidade}}</p>
                                                                @if(isset($restaurante->telefone))
                                                            <p><strong>Telefone Fixo:</strong> {{$restaurante->telefone}}</p>
                                                            @endif
                                                            @if(isset($restaurante->telefonecelular))
                                                            <p><strong>Telefone Celular:</strong> {{$restaurante->telefonecelular}}</p>
                                                            @endif
                                                                @if($restaurante->caracteristicas)
                                                                <p><strong>Características:</strong>
                                                                    @foreach($restaurante->caracteristicas as $caraca)
                                                                    {{$caraca['tipo']}} @if($caraca['info']) ({{$caraca['info']}})@endif,
                                                                    @endforeach


                                                                </p>
                                                                @endif

                                                                @if(count($restaurante->servicos) > 0)
                                                                <p>  <strong>Serviços :</strong>




                                                                    @foreach($restaurante->servicos as $servicos)
                                                                {{$servicos['tipo']}} @if($servicos['info']) ({{$servicos['info']}}) @endif ,
                                                                    @endforeach


                                                                @endif




                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="theme-blog-post-servicos">
                                                                @if(count($restaurante->pratos) > 0)
                                                                <p>  <strong>Pratos :</strong>




                                                                    @foreach($restaurante->pratos as $pratos)
                                                                    @if($pratos['excluido']==false)
                                                                    {{$pratos['nome']}} @if($pratos['informacoes']) <small style="font-style: italic;"></i>({{$pratos['informacoes']}}@if($pratos['preco'] != '0') - {{  'R$ '.number_format($pratos['preco'], 2, ',', '.') }} @endif)</i></small> @endif ,
                                                                   @endif
                                                                    @endforeach



                                                                @endif


                                                            </p>
                                                                @if($restaurante->ticketmedio)
                                                                <p><strong>Ticket Médio :</strong> R$
                                                                    {{$restaurante->ticketmedio}} </p>
                                                                @endif
                                                                @if($restaurante->indicadopara)
                                                                <p><strong>Indicado Para:</strong>
                                                                    {{implode(', ', $restaurante->indicadopara)}}</p>
                                                                    @endif
                                                                @if($restaurante->capacidadecasa)
                                                                    <p><strong>Lugares:</strong>
                                                                    {{$restaurante->capacidadecasa}}</p>
                                                                @endif
                                                                @if($restaurante->formasdepagamento)
                                                                <p><strong>Formas de pagamento:</strong><br>

                                                                    @foreach(array_keys((array)$restaurante->formasdepagamento)
                                                                    as $bandeiras)
                                                                     @if($bandeiras == 'mastercard')
                                                                     <img src="{{url('/img/credit-icons/mastercard-straight-64px.png')}}" style="width:40px; height:auto !important;">
                                                                     @endif
                                                                     @if($bandeiras == 'visa')
                                                                     <img src="{{url('/img/credit-icons/visa-straight-64px.png')}}" style="width:40px; height:auto !important;">
                                                                     @endif
                                                                     @if($bandeiras == 'americanexpress')
                                                                     <img src="{{url('/img/credit-icons/american-express-straight-64px.png')}}" style="width:40px; height:auto !important;">
                                                                     @endif
                                                                     @if($bandeiras == 'mercadopago')
                                                                     <img src="{{url('/img/mercado-pago-64px.png')}}" style="width:40px; height:auto !important;">
                                                                     @endif
                                                                     @if($bandeiras == 'hiper')
                                                                     <img src="{{url('/img/hiper.png')}}" style="width:40px; height:auto !important;">
                                                                     @endif
                                                                     @if($bandeiras == 'hipercard')
                                                                     <img src="{{url('/img/hipercard.png')}}" style="width:40px; height:auto !important;">
                                                                     @endif
                                                                     @if($bandeiras == 'vr')
                                                                     <img src="{{url('/img/vr.png')}}" style="width:40px; height:auto !important;">
                                                                     @endif
                                                                     @if($bandeiras == 'ticket')
                                                                     <img src="{{url('/img/ticket.png')}}" style="width:40px; height:auto !important;">
                                                                     @endif
                                                                     @if($bandeiras == 'sodexo')
                                                                     <img src="{{url('/img/sodexo.png')}}" style="width:40px; height:auto !important;">
                                                                     @endif
                                                                     @if($bandeiras == 'elo')
                                                                     <img src="{{url('/img/elo.png')}}" style="width:40px; height:auto !important;">
                                                                     @endif
                                                                     @if($bandeiras == 'alelo')
                                                                     <img src="{{url('/img/alelo.png')}}" style="width:40px; height:auto !important;">
                                                                     @endif
                                                                     @if($bandeiras == 'aura')
                                                                     <img src="{{url('/img/aura.png')}}" style="width:40px; height:auto !important;">
                                                                     @endif
                                                                     @if($bandeiras == 'sorocred')
                                                                     <img src="{{url('/img/sorocred.png')}}" style="width:40px; height:auto !important;">
                                                                     @endif
                                                                     @if($bandeiras == 'bitcoin')
                                                                     <img src="{{url('/img/bitcoin.png')}}" style="width:40px; height:auto !important;">
                                                                     @endif
                                                                     @if($bandeiras == 'diners')
                                                                     <img src="{{url('/img/diners.png')}}" style="width:40px; height:auto !important;">
                                                                     @endif
                                                                     @if($bandeiras == 'cheque')
                                                                     <img src="{{url('/img/chequebranco.png')}}" style="width:40px; height:auto !important;">
                                                                     @endif


                                                                    @endforeach
                                                                </p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 ">
                                                            <div class="theme-blog-post">
                                                                <div class="tab-pane" id="HotelPageTabs-2"
                                                                    role="tab-panel">
                                                                    <div class="theme-item-page-map google-map-rest">
                                                                        @if($restaurante->endereco != "")
                                                                        <iframe
                                                                    src="https://www.google.com/maps?q={{$restaurante->endereco}}, {{$restaurante->numero}}&output=embed"
                                                                            width="400" height="200" frameborder="0"
                                                                            style="border:0;"
                                                                            allowfullscreen=""></iframe>
                                                                            @endif
                                                                    </div>
                                                                </div>



                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fim Serviços -->
                                        <!-- Avaliações -->
                                        <div class="theme-page-section theme-page-section-dark theme-page-section-lg">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="row row-col-gap" data-gutter="20">
                                                        <div class="col-md-3">
                                                            <h5 class="theme-page-section-title-servicos">Avaliações
                                                            </h5>
                                                        </div>

                                                        <div class="col-md-8">
                                                            <div
                                                                class="theme-page-section-header theme-page-section-header-white">
                                                                <h5 class="theme-page-section-title">
                                                                    {{$restaurante->nome}}
                                                                    @if($restaurante->premium['ativo'])
                                                                    <i class="fa fa-check"
                                                                        style="color:#ff6c2d;" aria-hidden="true"></i>
                                                                    @endif

                                                                </h5>
                                                                <ul
                                                                    class="theme-item-page-header-rating-stars-rest-title">
                                                                    @for($i = 0; $i < (int)$restaurante->
                                                                        mediarating0a5(); $i++)
                                                                        <li>
                                                                            <i class="fa fa-star"></i>
                                                                        </li>
                                                                        @endfor
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="row row-col-gap" data-gutter="20">
                                                <div class="col-md-3 ">
                                                    <div class="theme-reviews-score-header">
                                                        <h5 class="theme-reviews-score-title">Nota Geral</h5>
                                                        <p class="theme-reviews-score-subtitle">Avaliações:
                                                            {{count($restaurante->avaliacoes)}}</p>
                                                        <p class="theme-reviews-score-subtitle">Positivas:
                                                            {{$positivas}}</p>
                                                    </div>
                                                    <div class="theme-reviews-score-total-rest">
                                                        <p>{{number_format($rating['nota'], 1)}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="row">
                                                        <div class="col-md-6 reviews-score-rest">
                                                            <div class="theme-reviews-score-item">
                                                                <div class="theme-reviews-score-item-header">
                                                                    <p class="theme-reviews-score-item-title">Preço
                                                                        justo:</p>
                                                                    <p class="theme-reviews-score-item-num">
                                                                        {{number_format($preco['nota'], 1)}}</p>
                                                                </div>
                                                                <div class="theme-reviews-score-item-bar">
                                                                    <div style="width:{{$preco['percent']}}%;"></div>
                                                                </div>
                                                            </div>
                                                            <div class="theme-reviews-score-item">
                                                                <div class="theme-reviews-score-item-header">
                                                                    <p class="theme-reviews-score-item-title">Comida</p>
                                                                    <p class="theme-reviews-score-item-num">
                                                                        {{number_format($comida['nota'], 1)}}</p>
                                                                </div>
                                                                <div class="theme-reviews-score-item-bar">
                                                                    <div style="width:{{$comida['percent']}}%;"></div>
                                                                </div>
                                                            </div>
                                                            <div class="theme-reviews-score-item">
                                                                <div class="theme-reviews-score-item-header">
                                                                    <p class="theme-reviews-score-item-title">
                                                                        Atendimento</p>
                                                                    <p class="theme-reviews-score-item-num">
                                                                        {{number_format($atendimento['nota'], 1)}}</p>
                                                                </div>
                                                                <div class="theme-reviews-score-item-bar">
                                                                    <div style="width:{{$atendimento['percent']}}%;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 reviews-score-rest">
                                                            <div class="theme-reviews-score-item">
                                                                <div class="theme-reviews-score-item-header">
                                                                    <p class="theme-reviews-score-item-title">Ambiente
                                                                    </p>
                                                                    <p class="theme-reviews-score-item-num">
                                                                        {{number_format($ambiente['nota'], 1)}}</p>
                                                                </div>
                                                                <div class="theme-reviews-score-item-bar">
                                                                    <div style="width:{{$ambiente['percent']}}%;"></div>
                                                                </div>
                                                            </div>
                                                            <div class="theme-reviews-score-item">
                                                                <div class="theme-reviews-score-item-header">
                                                                    <p class="theme-reviews-score-item-title">Serviços
                                                                    </p>
                                                                    <p class="theme-reviews-score-item-num">
                                                                        {{number_format($wifi['nota'], 1)}}</p>
                                                                </div>
                                                                <div class="theme-reviews-score-item-bar">
                                                                    <div style="width:{{$wifi['percent']}}%;"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fim avaliação -->
                                    <!--  Comentários -->
                                    <div class="theme-page-section theme-page-section-dark theme-page-section-lg avaliacoesComentarios" ng-controller="paginaDetalhes">
                                        <div class="container-fluid">

                                            <div class="row">
                                                <form method="post" action="{{route('avaliar')}}">
                                                    <div class="col-md-5">
                                                        <div class="row">
                                                            <div class="col-md-6 estrelas">
                                                                <label style="color:white;">Preço justo</label><br>
                                                                <fieldset class="preco">
                                                                    <input type="radio" id="precostar5" name="preco"
                                                                        value="5" /><label class="full" for="precostar5"
                                                                        title="Awesome - 5 precostars"></label>
                                                                    <input type="radio" id="precostar4" name="preco"
                                                                        value="4" /><label class="full" for="precostar4"
                                                                        title="Pretty good - 4 precostars"></label>
                                                                    <input type="radio" id="precostar3" name="preco"
                                                                        value="3" /><label class="full" for="precostar3"
                                                                        title="Meh - 3 precostars"></label>
                                                                    <input type="radio" id="precostar2" name="preco"
                                                                        value="2" /><label class="full" for="precostar2"
                                                                        title="Kinda bad - 2 precostars"></label>
                                                                    <input type="radio" id="precostar1" name="preco"
                                                                        value="1" /><label class="full" for="precostar1"
                                                                        title="Sucks big time - 1 precostar"></label>
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-md-6 estrelas">
                                                                <label style="color:white;">Comida</label><br>
                                                                <fieldset class="comida">
                                                                    <input type="radio" id="comidastar5" name="comida"
                                                                        value="5" /><label class="full"
                                                                        for="comidastar5"
                                                                        title="Awesome - 5 comidastars"></label>
                                                                    <input type="radio" id="comidastar4" name="comida"
                                                                        value="4" /><label class="full"
                                                                        for="comidastar4"
                                                                        title="Pretty good - 4 comidastars"></label>
                                                                    <input type="radio" id="comidastar3" name="comida"
                                                                        value="3" /><label class="full"
                                                                        for="comidastar3"
                                                                        title="Meh - 3 comidastars"></label>
                                                                    <input type="radio" id="comidastar2" name="comida"
                                                                        value="2" /><label class="full"
                                                                        for="comidastar2"
                                                                        title="Kinda bad - 2 comidastars"></label>
                                                                    <input type="radio" id="comidastar1" name="comida"
                                                                        value="1" /><label class="full"
                                                                        for="comidastar1"
                                                                        title="Sucks big time - 1 star"></label>
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-md-6 estrelas">
                                                                <label style="color:white;">Atendimento</label><br>
                                                                <fieldset class="atendimento">
                                                                    <input type="radio" id="atendimentostar5"
                                                                        name="atendimento" value="5" /><label
                                                                        class="full" for="atendimentostar5"
                                                                        title="Awesome - 5 atendimentostars"></label>
                                                                    <input type="radio" id="atendimentostar4"
                                                                        name="atendimento" value="4" /><label
                                                                        class="full" for="atendimentostar4"
                                                                        title="Pretty good - 4 atendimentostars"></label>
                                                                    <input type="radio" id="atendimentostar3"
                                                                        name="atendimento" value="3" /><label
                                                                        class="full" for="atendimentostar3"
                                                                        title="Meh - 3 atendimentostars"></label>
                                                                    <input type="radio" id="atendimentostar2"
                                                                        name="atendimento" value="2" /><label
                                                                        class="full" for="atendimentostar2"
                                                                        title="Kinda bad - 2 atendimentostars"></label>
                                                                    <input type="radio" id="atendimentostar1"
                                                                        name="atendimento" value="1" /><label
                                                                        class="full" for="atendimentostar1"
                                                                        title="Sucks big time - 1 star"></label>
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-md-6 estrelas">
                                                                <label style="color:white;">Ambiente</label><br>
                                                                <fieldset class="ambiente">
                                                                    <input type="radio" id="ambientestar5"
                                                                        name="ambiente" value="5" /><label class="full"
                                                                        for="ambientestar5"
                                                                        title="Awesome - 5 ambientestars"></label>
                                                                    <input type="radio" id="ambientestar4"
                                                                        name="ambiente" value="4" /><label class="full"
                                                                        for="ambientestar4"
                                                                        title="Pretty good - 4 ambientestars"></label>
                                                                    <input type="radio" id="ambientestar3"
                                                                        name="ambiente" value="3" /><label class="full"
                                                                        for="ambientestar3"
                                                                        title="Meh - 3 ambientestars"></label>
                                                                    <input type="radio" id="ambientestar2"
                                                                        name="ambiente" value="2" /><label class="full"
                                                                        for="ambientestar2"
                                                                        title="Kinda bad - 2 ambientestars"></label>
                                                                    <input type="radio" id="ambientestar1"
                                                                        name="ambiente" value="1" /><label class="full"
                                                                        for="ambientestar1"
                                                                        title="Sucks big time - 1 star"></label>
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-md-6 estrelas">
                                                                <label style="color:white;">Serviços</label><br>
                                                                <fieldset class="wifi">
                                                                    <input type="radio" id="wifistar5" name="wifi"
                                                                        value="5" /><label class="full" for="wifistar5"
                                                                        title="Awesome - 5 wifistars"></label>
                                                                    <input type="radio" id="wifistar4" name="wifi"
                                                                        value="4" /><label class="full" for="wifistar4"
                                                                        title="Pretty good - 4 wifistars"></label>
                                                                    <input type="radio" id="wifistar3" name="wifi"
                                                                        value="3" /><label class="full" for="wifistar3"
                                                                        title="Meh - 3 wifistars"></label>
                                                                    <input type="radio" id="wifistar2" name="wifi"
                                                                        value="2" /><label class="full" for="wifistar2"
                                                                        title="Kinda bad - 2 wifistars"></label>
                                                                    <input type="radio" id="wifistar1" name="wifi"
                                                                        value="1" /><label class="full" for="wifistar1"
                                                                        title="Sucks big time - 1 star"></label>

                                                                </fieldset>
                                                            </div>
                                                            <div class="col-md-6 estrelas">
                                                                <div class="recomendar">
                                                                    <label style="color:white;">Recomendar</label>
                                                                   <input type="hidden" name="recomendar" value="<% checked %>">
                                                                    <div class="row">
                                                                        <input type="hidden" value="<% checked %>" name="recomendar">
                                                                        <div class="col-md-1" style="padding-left:0px !important; padding-right:0px !important">
                                                                            <div class="center-me" style="margin-top:5px;">
                                                                                <input id="option1"
                                                                                    type="checkbox"  />
                                                                                <label for="option1">
                                                                                    <i class="fa fa-thumbs-up"  style="color:<% colorsim %>;" ng-click="recomenda(true)"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-1" style="padding-left:0px !important; padding-right:0px !important; margin-left:10px;">
                                                                            <div class="center-me2" style="margin-top:5px;">
                                                                                <input id="option2"  type="checkbox"  />
                                                                                <label for="option2">
                                                                                    <i class="fa fa-thumbs-up" ng-click="recomenda(false)" style="color:<% colornao %>;"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>








                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        @if(session('erro'))
                                                        <div class="alert alert-danger">{{session('erro')}}</div>
                                                        @endif
                                                        @if(session('message'))
                                                        <div class="alert alert-sucess">{{session('message')}}</div>
                                                        @endif
                                                        <div class="col-md-12">
                                                            <label style="color:#fff;">Data da visita:</label>
                                                            <input type="date" name="datadavisita"
                                                                style="width:100%; padding:10px; border-radius:5px; margin-bottom:5px;">
                                                        </div>
                                                        @if(isset(session()->get('usuario')->_id))
                                                        <div class="col-md-12">
                                                            <input type="hidden" name="restaurante_id"
                                                                value="{{$restaurante['_id']}}">
                                                            <input type="hidden" name="usuario_id"
                                                                value="{{session()->get('usuario')->_id}}">
                                                            <textarea name="comentario" id="" class="form-control"
                                                                cols="30" rows="10"
                                                                placeholder="É preciso estar logado para avaliar."></textarea>
                                                        </div>
                                                        @else
                                                        <div class="col-md-12">
                                                            <textarea name="comentario" id="" class="form-control"
                                                                cols="30" rows="10"
                                                                placeholder="Você precisa estar logado para comentar..." disabled></textarea>
                                                        </div>
                                                        @endif



                                                        <div class="col-md-12">
                                                            <input type="submit" value="Avaliar">
                                                        </div>

                                                    </div>

                                            </div>




                                            </form>
                                        </div>



                                    </div>





                                </div>


                                <div class="row comentario_detalhes" >
                                    <div class="row row-col-gap" data-gutter="20">
                                         @if(count($restaurante->avaliacoes) > 0)
                                        <h5 class="theme-page-section-title-servicos">Comentários</h5>
                                        @endif
                                        <div class="col-md-12 detalhes-rest-comentarios">
                                            @foreach($restaurante->avaliacoes as $avaliacao)


                                            <div class="theme-reviews">
                                                <div class="theme-reviews-list">
                                                    <article class="theme-reviews-item">
                                                        <div class="row" data-gutter="10">
                                                            <div class="col-md-1">
                                                                <div class="theme-reviews-item-info">
                                                                    @if(isset($avaliacao->usuario->fotoperfil) &&
                                                                    $avaliacao->usuario->fotoperfil != null)
                                                                    <img class="theme-reviews-item-avatar"
                                                                        src="{{$avaliacao->usuario->fotoperfil['foto']}}"
                                                                        alt="Image Alternative text" title="Image Title"
                                                                        style="width:90%;" />
                                                                    @else
                                                                    <img class="theme-reviews-item-avatar"
                                                                        src="../../img/70x70.png"
                                                                        alt="Image Alternative text" title="Image Title"
                                                                        style="width:90%;" />
                                                                    @endif
                                                                    <p class="theme-reviews-item-date">Avaliado em,
                                                                        {{ date('M', strtotime($avaliacao->created_at))}}
                                                                        {{ date('d', strtotime($avaliacao->created_at))}}
                                                                    </p>
                                                                    <p class="theme-reviews-item-author">por
                                                                        {{$avaliacao->usuario->nome}}</p>
                                                                    @if(session()->get('usuario'))
                                                                    @if($avaliacao->usuario->_id !=
                                                                    session()->get('usuario')->_id)
                                                                    @if(!$avaliacao->usuario->seguindo_usuario()->find(session()->get('usuario')->_id))
                                                                    <form action="{{route('seguirusuario')}}"
                                                                        method="post">
                                                                        <input type="hidden" name="usuario_id"
                                                                            value="{{$avaliacao->usuario->_id}}">
                                                                        <input type="submit" value="Seguir">
                                                                    </form>
                                                                    @else
                                                                    <form action="{{route('deixarseguirusuario')}}"
                                                                        method="post">
                                                                        <input type="hidden" name="usuario_id"
                                                                            value="{{$avaliacao->usuario->_id}}">
                                                                        <input type="submit" value="Seguindo">
                                                                    </form>
                                                                    @endif
                                                                    @endif
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-11">
                                                                <div class="theme-reviews-rating">
                                                                    <ul class="theme-reviews-rating-stars">
                                                                        @for ($i = 0; $i < $avaliacao->rating; $i++)
                                                                            @if($i < $avaliacao->rating)
                                                                                <li class="active">
                                                                                    <i class="fa fa-star"></i>
                                                                                </li>
                                                                                @else
                                                                                <li>
                                                                                    <i class="fa fa-star"></i>
                                                                                </li>
                                                                                @endif
                                                                                @endfor
                                                                    </ul>
                                                                    @if($avaliacao->rating == 1)
                                                                    <h4> Muito ruim </h4>
                                                                    @elseif($avaliacao->rating == 2)
                                                                    <h4> Ruim </h4>
                                                                    @elseif($avaliacao->rating == 3)
                                                                    <h4> Médio </h4>
                                                                    @elseif($avaliacao->rating == 4)
                                                                    <h4> Bom </h4>
                                                                    @else
                                                                    <h4> Excelente </h4>
                                                                    @endif
                                                                </div>
                                                                <div class="theme-reviews-item-body">
                                                                    <p class="theme-reviews-item-text">
                                                                        {{$avaliacao->comentario}}</p>
                                                                    <p class="sugestao">Recomenda Restaurante:
                                                                        @if($avaliacao->recomendar)
                                                                        <i class="fa fa-thumbs-up"
                                                                            style="color:greenyellow; font-size:20px;"></i>
                                                                        @else <i class="fa fa-thumbs-down"
                                                                            style="color:red; font-size:20px;"></i>
                                                                        @endif
                                                                        <span>Data da visita:
                                                                            {{ \Carbon\Carbon::parse($avaliacao->datadavisita)->format('d/m/Y')}}</span>
                                                                    </p>
                                                                    @if($avaliacao->resposta != null &&
                                                                    $avaliacao->resposta != '')
                                                                    <h4>Resposta do Restaurante</h4>
                                                                    <p class="theme-reviews-item-text">
                                                                        {{$avaliacao->resposta}}
                                                                    </p>
                                                                    <p class="sugestao">
                                                                        <span>Data da resposta:
                                                                            {{ \Carbon\Carbon::parse($avaliacao->updated_at)->format('d/m/Y')}}</span>
                                                                    </p>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Fim Comentários -->
                </div>
            </div>
        </div>
        <script>
            var rest = JSON.parse(document.getElementById('restauranteJson').innerHTML)
            rest.diahorareserva['horario']['segunda'].forEach(mostrar)

            function mostrar(item) {}
            document.getElementById("show").innerHTML = rest.nome

            function openReivindicar() {
                document.getElementById("modal-reivindicar").style.display = "block";
                document.getElementById("overlay-modal").style.display = "block";
            }

            function closeReivindicar() {
                document.getElementById("modal-reivindicar").style.display = "none";
                document.getElementById("overlay-modal").style.display = "none";
            }
        </script>
    </div>
    @endsection
    @section('footer')
    @include('footer-home')
    @endsection
