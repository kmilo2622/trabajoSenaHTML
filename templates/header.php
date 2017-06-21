<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Primero definimos las meta etiquetas -->
        <title>Actividad de HTML5, CSS y JavaScript | Juan Camilo Arroyave Rico</title>
        <meta charset="utf-8">
        <meta name="description" content="Actividad de Aprendizaje para el Servicio Nacional de Aprendizaje SENA, de Juan Camilo Arroyave Rico sobre HTML, CSS y JavaScript">
        <meta name="keywords" content="SENA,CSS,HTML5,JavaScript,Actividad,Aprendizaje">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Ahora Cargamos los Estilos -->
        <!-- Esto es Bootstrap en cdn -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <!-- Carguemos mejor los Scripts importantes al inicio -->
        <!-- Comenzamos con jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Ahora Angular JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        <!-- Ahora el Js de Bootstrap -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <script>
        $(document).ready(function(){

            //Validamos la localización actual de la página

            /*
    Esta función ha sido una de las más complicadas que he hecho hasta ahora
    en JavaScript y puedo jurar que no la he sacado de ningún lado sino que la
    cree por mi propia cuenta
    */

            var locationPage = location.toString();
            var partsOfLocation = locationPage.split('/');
            var parts = partsOfLocation[partsOfLocation.length-1];

            var last = parts.toString();

            var index = $('#startLink');
            var servicios = $('#serviciosLink');

            switch (last) {
                case 'index.php':
                    index.addClass('active');
                    break;
                case 'servicios.php':
                    servicios.addClass('active');
                    break;
                default:
                    index.addClass('active');
                    break;

                        }


            // Este efecto me permite animar ciertos divs para que tengan un fade in
            // fue extraido de la siguiente url https://codepen.io/annalarson/pen/GesqK
            // Tengo que dar credito por ese gran aporte...

            /* Every time the window is scrolled ... */
            $(window).scroll( function(){

                /* Check the location of each desired element */
                $('.showme').each( function(i){

                    var bottom_of_object = $(this).position().top + $(this).outerHeight();
                    var bottom_of_window = $(window).scrollTop() + $(window).height();

                    /* If the object is completely visible in the window, fade it it */
                    if( bottom_of_window > bottom_of_object ){

                        $(this).animate({'opacity':'1'},2500);

                    }

                }); 

            });

        });
    </script>

    <body ng-app="app">

        <header>
            <!-- Esta sería la barra de navegación responsive -->
            <div class="navigation" ng-controller="navigationController">
                <nav class="navbar navbar-inverse navbar-fixed-top">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="" ng-click="LinkFunc('index.php')">Corporación Freya</a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li id="startLink"><a href="" ng-click="LinkFunc('index.php')">Inicio</a></li>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="row">
                <div class="jumbotron text-center background-first" ng-controller="controllerHeader">
                    <!-- Ahora Estamos usando angular para mostrar los elementos en pantalla -->
                    <h1 ng-cloak>{{ page_title }}</h1>
                    <h2 ng-cloak>{{ nombre_estudiante }}</h2>
                    <h3 ng-cloak>{{ lenguajes }}</h3>
                </div>
            </div>
        </header>


