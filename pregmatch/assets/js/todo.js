/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function todoCTRL($scope){
    $scope.totalme =5;
    
    $scope.people =[
        {name:"alfie",age:"29"},
        {name:"arlan",age:"28"},
        {name:"reaver",age:"30"}
    ];
    
}

function listpost($scope, $http) {
  $http.get('http://myci.me/posts/getpost').success(function(data) {
    $scope.bpost = data;
  console.log(data);
  });
 
 // $scope.orderProp = 'age';
}

function postbyid($scope,$http){
  
    $scope.singlepost = function(){
    $http({
    method: 'POST',
    url: "http://myci.me/posts/getpostbyid/"+$scope.meid,
    //data: {id:pid},
    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
}).success(function(data){
   $scope.spost = data; 
   console.log(data);
});
    };
    
    $scope.singlepostauto = function(){
    $http({
    method: 'POST',
    url: "http://myci.me/posts/getpostbyid/"+$scope.meid,
    //data: {id:pid},
    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
}).success(function(data){
    $scope.spost = data;
    return data;
//$scope.spost = data; 
   //console.log(data);
});
    };
    
    
}

