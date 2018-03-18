var app = angular.module('geoApp', ['ngRoute', 'leaflet-directive']);

app.config(function($routeProvider) {
	$routeProvider
	.when('/', {
		controller: 'MainController',
		templateUrl: 'public/angular/views/main.html',
		resolve: {
			coordinates: function (myCoordinates) {
				return myCoordinates;
			}
		}
	})
	.when('/about', {
		controller: 'AboutController',
		templateUrl: 'public/angular/views/about.html'
	})
	.otherwise({
		redirectTo: '/'
	});
	
});