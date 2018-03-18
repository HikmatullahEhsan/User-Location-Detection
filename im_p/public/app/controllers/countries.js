app.controller('CountriesController',function ($scope, $http, API_URL) {

  $http.get(API_URL+'CountriesController')
      .success(function (response) {
          $scope.countries=response;
      })
});

$cope.toggle=function (modalstate, id) {
    $scope.modalstate=modalstate;
    switch (modalstate){
        case 'add':
            $scope.form_title =" Add new country";
            break;
        case 'edit':
            $scope.form_title = 'Edit country';
            $scope.id=id;
            $http.get(API_URL+'countries/'+id)
                .success(function (response) {
                    console.log(response);
                    $scope.countries=response;
                });
            break;
        default:
            break;

    }
    console.log(id);
    $('#myModal').modal('show');
};

$scope.save=function (modalstate,id) {
    var url=API_URL+'countries';
    if(modalstate==="edit"){
        url+='/'+id;
    }

    $http({
        method:'post',
        url: url,
        data:$.param($scope,countries),
        headers:{'Content-Type':'application/x-www-form-urlencoded'}
    }).success(function (response) {
        console.log(response);
        location.reload();
    }).error(function (response) {
        console.log(response);
        alert('Error! An Embecing ');
    })
    
};

$scope.confirmDelete=function(id){
    var isConfirmDelete=confirm('Are you sure want to Delete this record?');
    if(isConfirmDelete){
        $http({
            method:'DELETE',
            url:API_URL+'/'.id
        }).success(function (data) {
            console.log(data);
            location.reload();
        }).error(function(data){
            console.log(data);
            alert('Unable to delete');
        })
    }else{
        return false;
    }
}