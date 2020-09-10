 var app = angular.module('myApp',['ngMaterial']);
 app.controller('MyController',  function($scope){
  $scope.SL=3;
  $scope.tang = function($a){
  	console.log($a);
  };
 
 })
