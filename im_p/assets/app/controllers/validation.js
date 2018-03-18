var app=angular.module('emp_leave',[]);

app.controller('form-validation',function($scope){
    $scope.ValidateForm=function(){
    //  window.alert('I am clicked for validation');
      // e.preventDefault();
      if(employee_leave.$valid){
        window.alert("It is okay");
      }
    };
});
