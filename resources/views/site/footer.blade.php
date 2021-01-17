<div class="container contentFooter" style="background: rgb(2,0,36);
background: linear-gradient(0deg, rgba(2,0,36,1) 0%, rgba(127,0,58,1) 0%, rgba(91,0,77,1) 100%);">
    <div class="row">
        
        <div class="col-md-7 acessos">
            <div class="row">
                <div class="col-md-3 col-12 icons">
                    <img src="{{asset('/imagens/logoinvertido_vtripper.png')}}">
                </div>
                <div class="col-md-2 col-4 icon_redes">
                        <img src="{{asset('/imagens/logo_facebook.png')}}">
                </div>
                <div class="col-md-2 col-4 icon_redes">
                        <img src="{{asset('/imagens/logo_instagram.png')}}">
                </div>
                <div class="col-md-2 col-4 icon_redes">
                        <img src="{{asset('/imagens/logo_whatsapp.png')}}">
                </div>
                <div class="col-md-12 col-12">
                    <img style="display:block; margin-left:auto !important; margin-right:auto !important;" src="{{asset('/imagens/embratur.jpg')}}">
                </div>
            </div>
        </div>
        <div class="col-md-5 col-12 menu">
            <div class="row">
                <div class="col-md-6 col-12">
                    <ul>
                        @foreach($cats as $categorias)
                        @if(!$categorias->informativas && $categorias->deleted_at == null)
                        <li><a style="color:#fff !important; text-decoration:none !important" 
                               @if($categorias->special)
                               href="/{{$categorias->slug}}"
                               @else
                               href="/categorias/{{$categorias->name}}"
                               @endif
                               >{{$categorias->title}}</a></li>
                        @endif
                        @endforeach
                        <li><a style="color:#fff !important; text-decoration:none !important" href='/reservas'>Cotações ou reservas</a></li>
                    </ul>
                </div> 
              <div class="col-md-6 col-12">
                    <ul>
                        @foreach($cats as $categorias)
                        @if($categorias->informativas && $categorias->deleted_at == null)
                        <li><a style="color:#fff !important; text-decoration:none !important" 
                               @if($categorias->special)
                               href="/{{$categorias->slug}}"
                               @else
                               href="/categorias/{{$categorias->name}}"
                               @endif
                               >{{$categorias->title}}</a></li>
                        @endif
                        @endforeach
                         <li><a style="color:#fff !important; text-decoration:none !important" 
                              
                               href="/contato">Contato</a></li>
                        
                    </ul>
                </div> 

              
            </div>
        </div>
    </div>
</div>
