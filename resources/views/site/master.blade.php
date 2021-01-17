<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/owl/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/owl/assets/owl.theme.default.min.css">

    <link href="{!! asset('css/css.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{!! asset('slick/slick.css') !!}"/>
    <link rel="stylesheet" type="text/css" href="{!! asset('slick/slick-theme.css') !!}"/>
    <link rel="stylesheet" type="text/css" href="{!! asset('css/lightbox.min.css') !!}"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 <script type="text/javascript" src="{!! asset('js/jquery.js') !!}"></script>
   
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.8/angular.min.js">
    </script>
    <script type="text/javascript" src="{!! asset('js/angular-app.js') !!}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{!! asset('slick/slick.min.js') !!}"></script>

<script src="/owl/owl.carousel.min.js"></script>
 <script type="text/javascript" src="{!! asset('js/lightbox.min.js') !!}"></script>
    <meta name="google-signin-client_id" content="451300533926-4du3tcdhvhcfsvmi6skg6v7hkagmv7l8.apps.googleusercontent.com">
    <title>Vtripper @yield('title')</title>
    <meta name="author" content="@yield('author', 'Vtripper')">
    <meta name="description" content="No Vtripper você é o protagonista e pode montar a sua viagem como desejar, escolhendo seus itens como aluguel de carro, hotel, voos, seguro viagem, entre outras coisas.">
    <meta name="keywords" content="@yield('tags','vtripper,viagens,turismo,passeios,diversão,mundo,decolar,Rent a car,pacotes,destinos,hoteis,hotel,quarto,quartos')">
    <script type="text/javascript">
      document.addEventListener('keyup', (e) => {
          
          console.log('evento');
  if (e.key=='Escape'||e.key=='Esc'||e.keyCode==27)       {
     fechaImage(); 
  }
 

  
});
        $(document).ready(function(){
   

            
            $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
    }
})
            $('.carrosselette').slick({
                lazyLoad: 'ondemand',
  slidesToShow: 3,
  slidesToScroll: 1,
arrows: true,
dots: true,
  focusOnSelect: true
});
$('.carHoteis').slick({
                lazyLoad: 'ondemand',
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows: true,
  dots: true,

  focusOnSelect: true
});
        });
      </script>
       <script type="text/javascript">
        $(document).ready(function(){
            $('.carrosseletta').slick({
                lazyLoad: 'ondemand',
  slidesToShow: 3,
  slidesToScroll: 1,

  focusOnSelect: true
});
        });
        
        function openImage(image) {
            var altura = window.scrollY;
            console.log(altura);
            fechaImage();
            $('.modalOverlay').show(500);
            $('.modalContent').show(500);
            $('.modalContent').css('top',(altura+5));
            
            $('.imgModal').attr('src',image);
                    
    if (event.keyCode == 13) {
        fechaImage()
    }

        }
        function fechaImage() {
            $('.modalOverlay').css('display','none');
            $('.modalContent').css('display','none');
        }
        var fotos = [];
      </script>

</head>

<body ng-app="vtripper">
    <div tabindex="0" ng-keyup="fecharfotosevent($event)" ng-controller="controllerGeral" class="modalOverlay" ng-click="fecharfotos()">
       
    </div>
    <div ng-controller="controllerGeral" class="modalContent" ng-click="fechafotos()">
        <div class="setaLeft" ng-click="retornafoto()">
            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDQ5Mi4wMDQgNDkyLjAwNCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMiIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgY2xhc3M9IiI+PGcgdHJhbnNmb3JtPSJtYXRyaXgoLTEsMCwwLDEsNDkyLjAwNDA1ODgzNzg5MDYsMCkiPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTM4Mi42NzgsMjI2LjgwNEwxNjMuNzMsNy44NkMxNTguNjY2LDIuNzkyLDE1MS45MDYsMCwxNDQuNjk4LDBzLTEzLjk2OCwyLjc5Mi0xOS4wMzIsNy44NmwtMTYuMTI0LDE2LjEyICAgIGMtMTAuNDkyLDEwLjUwNC0xMC40OTIsMjcuNTc2LDAsMzguMDY0TDI5My4zOTgsMjQ1LjlsLTE4NC4wNiwxODQuMDZjLTUuMDY0LDUuMDY4LTcuODYsMTEuODI0LTcuODYsMTkuMDI4ICAgIGMwLDcuMjEyLDIuNzk2LDEzLjk2OCw3Ljg2LDE5LjA0bDE2LjEyNCwxNi4xMTZjNS4wNjgsNS4wNjgsMTEuODI0LDcuODYsMTkuMDMyLDcuODZzMTMuOTY4LTIuNzkyLDE5LjAzMi03Ljg2TDM4Mi42NzgsMjY1ICAgIGM1LjA3Ni01LjA4NCw3Ljg2NC0xMS44NzIsNy44NDgtMTkuMDg4QzM5MC41NDIsMjM4LjY2OCwzODcuNzU0LDIzMS44ODQsMzgyLjY3OCwyMjYuODA0eiIgZmlsbD0iI2ZmZmZmZiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjwvZz48L3N2Zz4=" />
        </div>
        <div class="setaRight" ng-click="passafoto()">
            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDQ5Mi4wMDQgNDkyLjAwNCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMiIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgY2xhc3M9IiI+PGc+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+Cgk8Zz4KCQk8cGF0aCBkPSJNMzgyLjY3OCwyMjYuODA0TDE2My43Myw3Ljg2QzE1OC42NjYsMi43OTIsMTUxLjkwNiwwLDE0NC42OTgsMHMtMTMuOTY4LDIuNzkyLTE5LjAzMiw3Ljg2bC0xNi4xMjQsMTYuMTIgICAgYy0xMC40OTIsMTAuNTA0LTEwLjQ5MiwyNy41NzYsMCwzOC4wNjRMMjkzLjM5OCwyNDUuOWwtMTg0LjA2LDE4NC4wNmMtNS4wNjQsNS4wNjgtNy44NiwxMS44MjQtNy44NiwxOS4wMjggICAgYzAsNy4yMTIsMi43OTYsMTMuOTY4LDcuODYsMTkuMDRsMTYuMTI0LDE2LjExNmM1LjA2OCw1LjA2OCwxMS44MjQsNy44NiwxOS4wMzIsNy44NnMxMy45NjgtMi43OTIsMTkuMDMyLTcuODZMMzgyLjY3OCwyNjUgICAgYzUuMDc2LTUuMDg0LDcuODY0LTExLjg3Miw3Ljg0OC0xOS4wODhDMzkwLjU0MiwyMzguNjY4LDM4Ny43NTQsMjMxLjg4NCwzODIuNjc4LDIyNi44MDR6IiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+Cgk8L2c+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPC9nPjwvc3ZnPg==" />
        </div>
        <div class="fechaModal" ng-click="fecharfotos()">

        </div>
        
        <img class="imgModal" src="" ng-click="fecharfotos()"> 
    </div>
    <header class="container-fluid header">
        @yield('header')
    </header>
    <section class="container-fluid conteudo" ng-controller="controllerGeral">
     
        @yield('conteudo')
    </section>
    <footer class="container-fluid footer" style="background: rgb(2,0,36);
background: linear-gradient(0deg, rgba(2,0,36,1) 0%, rgba(127,0,58,1) 0%, rgba(91,0,77,1) 100%);">
        @yield('footer')
    </footer>
    </div>
</body>

</html>
