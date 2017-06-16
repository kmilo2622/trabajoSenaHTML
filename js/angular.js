var app = angular.module('app', []);

app.filter('splitStringAndGetTheIndex', function() {
	return function(input, splitChar, splitIndex) {
		var inputChar = input.toString();
		return inputChar.split(splitChar)[splitIndex];
	}
});

app.filter('splitString', function() {
	return function(input, splitChar) {
		var inputChar = input.toString();
		return inputChar.split(splitChar);
	}
});

//Hagamos en esta parte todo el JavaScript sin Angular

var jumboHeight = $('.jumbotron').outerHeight();
function parallax(){
	var scrolled = $(window).scrollTop();
	$('.bg').css('height', (jumboHeight-scrolled) + 'px');
}

$(window).scroll(function(e){
	parallax();
});

//Y aquí comencemos toda la parte del angular

app.controller('controllerHeader', function($scope) {
	$scope.page_title = "Actividad de Aprendizaje";
	$scope.nombre_estudiante = "Juan Camilo Arroyave Rico";
	$scope.lenguajes = "HTML, CSS, JavaScript";
});

app.controller('controllerBody', function($scope) {
	var titulo = $('#hiden_input').val();
	$scope.name = titulo;
});

app.controller('alertController', function($scope) {
	$scope.functionClick1 = function(id) {
		var txt;
		if (confirm("¿Está seguro de comenzar a navegar en esta página web?") == true) {
			//txt = "Comencemos!";
			alert("Que mala decisión");
			window.location.assign("servicios.html");
		} else {
			txt = "Buena decisión!";
		}
		//Son dos formas diferentes de hacerlo
		//document.getElementById("demo").innerHTML = txt;
		$('#demo').text(txt);
	}
});

app.controller('valores', function($scope) {
	$scope.valor = "A que no te imaginas en donde estoy...";
	$('#hiden_input').val($scope.valor);
});

app.controller('navigationController', function($scope) {
	$scope.LinkFunc = function(link) {
		window.location.assign(link);
	}
});

app.controller('footerController', function($scope) {
	$scope.routa = location;
});
