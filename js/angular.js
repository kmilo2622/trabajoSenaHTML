var app = angular.module('app', []);

app.controller('controller', function($scope) {
	var titulo = $('#hiden_input').val();
	$scope.name = titulo;
	$scope.page_title = "Actividad de Aprendizaje";
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