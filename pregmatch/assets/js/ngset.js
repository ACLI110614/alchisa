/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function setme($scope){
    
    $scope.me = "alfie chiong";
    
}

var myapp = angular.module('myapp',[]);

myapp.controller('firstcontroller',function($scope,$http){
   
   $http.get('http://myci.me/posts/getpost').success(function(data) {
   $scope.posting = data;
  });
    
})
.controller('secondcontroller',function($scope){
   
   $scope.alfie = "iam the second controller";
   
})
.controller('thirdcontroller',function($scope){
   
   $scope.alfie = "iam the third controller";
   
});

myapp.config(function($routeProvider){
    
    $routeProvider
            .when('/page1',{controller:'firstcontroller',
                    templateUrl:'/static/view1.html'
                    })
            .when('/page2',{
                    controller:'firstcontroller',
                    templateUrl:'/static/view2.html'
            })
            .otherwise({redirectTo:'/'});
    
    
});


