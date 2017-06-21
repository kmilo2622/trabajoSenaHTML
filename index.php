<?php include 'templates/header.php' ?> 
<div ng-controller="valores">
    <input type="hidden" id="hiden_input">
</div>

<div class="container containerBody1" ng-controller="controllerBody">

    <?php if(isset($_GET['mensaje']) == 1) : ?>
    <div class="alert alert-success">
        <strong>Éxito!</strong> Mensaje Enviado con Éxito.
    </div>
    <?php endif ?>

    <div class="col-md-6">

        <form class="form-horizontal" method="post" action="correo.php">

            <div class="form-group">
                <label class="control-label">Introduzca su nombre:</label>
                <input type="text" class="form-control input-center" name="nombre" ng-model="name">
            </div>

            <div class="form-group">
                <label class="control-label">Introduzca su apellido:</label>
                <input type="text" class="form-control input-center" name="apellido" ng-model="last_name">
            </div>

            <div class="form-group">
                <label class="control-label">Introduzca su correo electrónico *:</label>
                <input type="email" required class="form-control input-center" name="email" ng-model="correo_electronico">
            </div>

            <div class="form-group">
                <label class="control-label">Introduzca su Ocupación Laboral:</label>
                <input type="text" class="form-control input-center" name="ocupacion" ng-model="occupation">
            </div>

            <div class="form-group">
                <label class="control-label">Introduzca su Edad:</label>
                <input type="number" class="form-control input-center" name="edad" ng-change="calcularNacimiento(edad, fecha | date:'yyyy')" ng-model="edad">
            </div>

            <div class="form-group" ng-controller="alertController">
                <button type="submit" class="btn btn-success" ng-click="functionClick1(3)">Enviar</button>
                <p id="demo"></p>
            </div>
        </form>
    </div>

    <div class="col-md-6">

        <p ng-cloak><strong>Fecha Actual:</strong> {{ fecha | date:'yyyy-MM-dd' }} </p>

        <div class="form-group">
            <label class="control-label col-sm-2">Nombre:</label>
            <div class="col-sm-10">
                <p ng-cloak>{{ name }}</p>
            </div>
        </div>

        <br>

        <div class="form-group">
            <label class="control-label col-sm-2">Apellido:</label>
            <div class="col-sm-10">
                <p ng-cloak>{{ last_name }}</p>
            </div>
        </div>

        <br>

        <div ng-if="occupation != null && occupation != ''">
            <div class="form-group">
                <label class="control-label col-sm-2">Ocupación:</label>
                <div class="col-sm-10">
                    <p ng-cloak>{{ occupation }}</p>
                </div>
            </div>
        </div>

        <br>

        <div ng-if="edad != null && edad != ''">
            <div class="form-group">
                <label class="control-label col-sm-2">Año de Nacimiento:</label>
                <div class="col-sm-10">
                    <p ng-cloak>Año {{ brith }}</p>
                </div>
            </div>
        </div>

        <br>

        <div ng-if="correo_electronico != null && correo_electronico != ''">
            <div class="form-group">
                <label class="control-label col-sm-2">Correo Electrónico:</label>
                <div class="col-sm-10">
                    <p ng-cloak>{{ correo_electronico }}</p>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-12">
        <div class="alert alert-info">
            <strong>Información!</strong> Todos los campos marcados con asterisco son requeridos.
        </div>
    </div>
</div>

<?php include 'templates/footer.php' ?> 
