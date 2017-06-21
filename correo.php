<?php

/*
Programa de correos desarrollado por Juan Camilo Arroyave Rico
Para el servicio Nacional de Aprendizaje SENA
en el programa de Producción de Multimedia.
*/

include 'vendor/autoload.php';

$request = $_REQUEST;

//Primero hacemos las validaciones respectivas dado que no todos los campos son requeridos

if (isset($request['nombre'])) {
    $nombre = $request['nombre'];
} else {
    $nombre = "No hay un nombre";
}

if (isset($request['apellido'])) {
    $apellido = $request['apellido'];
} else {
    $apellido = "No hay un apellido";
}

if (isset($request['ocupacion'])) {
    $ocupacion = $request['ocupacion'];
} else {
    $ocupacion = "No hay una ocupación";
}

if (isset($request['edad'])) {
    $edad = $request['edad'];
} else {
    $edad = "No hay una ocupación";
}

if (isset($request['email'])) {
    $email = $request['email'];
} else {
    $email = "No hay una email";
}

//ahora configuramos el email
/*
No pondré contraseñas de correos ni nada por el estilo en este documento
*/

$mailsettings = [
    'host' => 'smtp.gmail.com',
    'port' => '587',
    'fromusername' => 'correo@gmail.com',
    'username' => 'correo@gmail.com',
    'password' => 'contrasena'
];

//$destinatario = $mailsettings['username'];
$destinatario = $email;

$message = file_get_contents('mail-templates/detalle_send.html');
$asunto = 'Inicio de sesion de ' . $nombre . ' ' . $apellido;
$message = str_replace('%asunto%', 'Registro de ' . $nombre . ' ' . $apellido, $message);
$message = str_replace('%fecha%', date('m-d-Y'), $message);
$message = str_replace('%nombre%', $nombre, $message);
$message = str_replace('%apellido%', $apellido, $message);
$message = str_replace('%ocupacion%', $ocupacion, $message);
$message = str_replace('%edad%', $edad, $message);
$message = str_replace('%email%', $email, $message);

//Esta versión comentariada de PHP mailer es la que necesita de contraseña

/*$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Host = "smtp.gmail.com"; //Smtp de 1and1
$mail->Port = 587;
$mail->Username = $mailsettings['username']; //Correo de 1and1
$mail->Password = $mailsettings['password']; //Password del correo
$mail->From = $mailsettings['fromusername'];
$mail->FromName = $mailsettings['fromusername'];
$mail->AddAddress($destinatario, 'Registro');
$mail->IsHTML(true);
$mail->SMTPDebug = 0;
$mail->Subject = $asunto;
$mail->MsgHTML($message);*/

$mail = new PHPMailer;
$mail->setFrom($mailsettings['username'], 'Juan Camilo Arroyave Rico');
$mail->addAddress($destinatario, 'Registro');
$mail->Subject = $asunto;
$mail->Body = 'Hi! This is my first e-mail sent through PHPMailer.';

if(!$mail->Send()) {
    $mensajeria = $mail->ErrorInfo;
} else {
    if (!headers_sent()) { ?>

<script type="text/javascript">
    if (confirm("Mensaje Enviado Exitosamente") == true) {
        window.location.href="index.php?mensaje=1";
        <?php //header('Location: index.php?mensaje=1'); ?>
    } else {
        window.location.href="index.php?mensaje=1";
        <?php //header('Location: index.php?mensaje=1'); ?>
    }
</script>

<noscript>
    <meta http-equiv="refresh" content="0;url='.$url.'" />
</noscript>

<?php } else { ?>

<script type="text/javascript">
    if (confirm("Mensaje Enviado Exitosamente") == true) {
        window.location.href="index.php?mensaje=1";
    } else {
        window.location.href="index.php?mensaje=1";
    }
</script>

<noscript>
    <meta http-equiv="refresh" content="0;url='.$url.'" />
</noscript>

<?php }
}
?>