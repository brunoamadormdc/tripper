var app = angular.module('vtripper', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('homeController', function($scope, $http, $filter) {
    $scope.tab = 1;

    $scope.setTab = function(newTab){
      $scope.tab = newTab;
      console.log(newTab);
    };

    $scope.isSet = function(tabNum){
        console.log(tabNum);
      return $scope.tab === tabNum;

    };
});

app.controller('controllerGeral', function($scope, $http, $filter) {
    $scope.chaves = 0
    console.log(fotos);
    
    $scope.carregarfotos = function(chave) {
        var altura = window.scrollY;
            console.log(altura);
            fechaImage();
            $('.modalOverlay').show(500);
            $('.modalContent').show(500);
            $('.modalContent').css('top',(altura+5));
            fotos.forEach(function(element){
                if (element.chave == chave) {
                    $('.imgModal').attr('src',element.foto);
                }
            })
           $scope.chaves = chave;
            console.log($scope.chaves);
            
                    
    
    }
    $scope.passafoto = function() {
        console.log($scope.chaves);
        var altura = window.scrollY;
         if ($scope.chaves > (fotos.length - 1)) {
             $scope.chaves = 0
           
            $('.imgModal').attr('src',fotos[$scope.chaves].foto);
         }
         else {
            $scope.chaves = $scope.chaves + 1
            $('.imgModal').attr('src',fotos[$scope.chaves].foto);
         }
    }
    
     $scope.retornafoto = function() {
          console.log($scope.chaves);
        var altura = window.scrollY;
         if ($scope.chaves < fotos.length - 1) {
             $scope.chaves = (fotos.length - 1)
            $('.imgModal').attr('src',fotos[$scope.chaves].foto);
         }
         else {
             $scope.chaves = $scope.chaves - 1
           $('.imgModal').attr('src',fotos[$scope.chaves].foto);
         }
    }
    
    $scope.fecharfotos = function() {
            $('.modalOverlay').css('display','none');
            $('.modalContent').css('display','none');
    }
    
    $scope.fecharfotosevent = function(event) {
        console.log(event)
        if (event.key == 27 ) {
            console.log('fechoooou');
            $('.modalOverlay').css('display','none');
            $('.modalContent').css('display','none');
        }
    }
});

app.directive('escKey', function () {
  return function (scope, element, attrs) {
    element.bind('keydown keypress', function (event) {
      if(event.which === 27) { // 27 = esc key
        scope.$apply(function (){
          scope.$eval(attrs.escKey);
        });

        event.preventDefault();
      }
    });
    scope.$on('$destroy', function() {
        element.unbind('keydown keypress')
    })
  };
})