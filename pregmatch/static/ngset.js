/* 
 * alfiechiong@gmail.com
 * and open the template in the editor.
 */


//module setup
var myapp = angular.module('myapp',[]);
var profiles = data;
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
   
}).controller('animatedcontroller',function($scope){
	   $scope.profiles = profiles;
	   $scope.alfie = "animated";
	   $scope.selected = function(fname,lname,id){
		  $scope.alfie =fname+" "+lname;
		  $scope.id=id;
	   };
	   
});


//routes configuration

myapp.config(function($routeProvider){
    
    $routeProvider
            .when('/page1',{controller:'firstcontroller',
                    templateUrl:'/static/view1.html'
            })
            .when('/page2',{
                    controller:'firstcontroller',
                    templateUrl:'/static/view2.html'
            })
             .when('/page3',{
                    controller:'secondcontroller',
                    templateUrl:'/static/view3.html'
            }) 
            .when('/page4',{
                controller:'animatedcontroller',
                templateUrl:'/static/view4.html'
            })
             .when('/page5',{
                controller:'animatedcontroller',
                templateUrl:'/static/view5.html'
            })
            .otherwise({redirectTo:'/'});
    
    
});


