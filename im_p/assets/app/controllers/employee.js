
/* ------------------------------------------------------- 

* Filename:     AngularJS Dynamic Form Fields
* Website:      http://www.shanidkv.com
* Description:  Shanidkv AngularJS blog
* Author:       Shanid KV shanidkannur@gmail.com

---------------------------------------------------------*/

// var app = angular.module('angularjs-starter', []);

//   app.controller('MainCtrl', function($scope) {

//   $scope.choices = [{id: 'choice1'}];
  
//   $scope.addNewChoice = function() {
//     var newItemNo = $scope.choices.length+1;
//     $scope.choices.push({'id':'choice'+newItemNo});
//   };
    
//   $scope.removeChoice = function() {
//     var lastItem = $scope.choices.length-1;
//     $scope.choices.splice(lastItem);
//   };
  
// });

var app = angular.module('angularjs-starter', []);

  app.controller('MainCtrl', function($scope) {

  $scope.choices = [{id: 'choice1'}];
  
  $scope.addNewChoice = function() {
    var newItemNo = $scope.choices.length+1;
    $scope.choices.push({'id':'choice'+newItemNo});
  };
    
  $scope.removeChoice = function() {
    var lastItem = $scope.choices.length-1;
    $scope.choices.splice(lastItem);
  };
  
});

app.controller('employee-experience',function($scope){
    $scope.choices=[{'id':'choice1'}];

    $scope.addNewChoice=function(){
    	var newItemNo=$scope.choices.length+1;
    	$scope.choices.push({'id':'choice'+newItemNo});
    }

    $scope.removeChoice=function(){
    	var lastItem= $scope.choices.length-1;
    	$scope.choices.splice(lastItem);
    }
});

app.controller('employee-skills',function($scope){
    $scope.choices=[{'id':'choice1'}];

    $scope.addNewChoice=function(){
        var newItemNo=$scope.choices.length+1;
    	$scope.choices.push({'id':'choice'+newItemNo});
    }

    $scope.removeChoice=function(){
        var lastItem= $scope.choices.length-1;
    	$scope.choices.splice(lastItem);
    }
});

app.controller('employee-relatives',function($scope){
    $scope.choices=[{'id':'choice1'}];

    $scope.addNewChoice=function(){
        var newItemNo=$scope.choices.length+1;
    	$scope.choices.push({'id':'choice'+newItemNo});
    }

    $scope.removeChoice=function(){
        var lastItem= $scope.choices.length-1;
    	$scope.choices.splice(lastItem);
    }
});

app.controller('employee-documents',function($scope){
    $scope.choices=[{'id':'choice1'}];

    $scope.addNewChoice=function(){
        var newItemNo=$scope.choices.length+1;
    	$scope.choices.push({'id':'choice'+newItemNo});
    }

    $scope.removeChoice=function(){
        var lastItem= $scope.choices.length-1;
    	$scope.choices.splice(lastItem);
    }
});  
app.controller('ededucation',function($scope){
    $scope.choices=[{'id':'choice1'}];

    $scope.addNewChoice=function(){
        var newItemNo=$scope.choices.length+1;
        $scope.choices.push({'id':'choice'+newItemNo});
    }

    $scope.removeChoice=function(){
        var lastItem= $scope.choices.length-1;
        $scope.choices.splice(lastItem);
    }
});  

// app.controller('ededucation',function($scope){
//     $scope.choices=[{'id':'choice1'}];

//     $scope.addNewChoice=function(){
//         var newItemNo=$scope.choices.length+1;
//         $scope.choices.push({'id':'choice'+newItemNo});
//     }

//     $scope.removeChoice=function(){
//         var lastItem= $scope.choices.length-1;
//         $scope.choices.splice(lastItem);
//     }
// });  
