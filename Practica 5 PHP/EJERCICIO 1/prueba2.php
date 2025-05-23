<?php
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$texto = filter_var($_POST['texto'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

// Validación extra: que sea email válido
if (!empty($email) && !empty($nombre) && !empty($texto) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $destino = "MI MAIL";
    $asunto = "Mensaje de contacto desde la web";

    $cuerpo = '
    <html>
    <head>
        <title>Mensaje de contacto</title>  
    </head>
    <body>
        <h1>Mensaje de contacto</h1>
        <p><strong>Nombre:</strong> ' . $nombre . '</p>
        <p>' . $texto . '</p>
    </body>
    </html>';

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    $headers .= "From: $nombre <$email>\r\n";
    $headers .= "Return-Path: $destino\r\n";

    if (mail($destino, $asunto, $cuerpo, $headers)) {
        echo "<p>Mensaje enviado correctamente</p>";
    } else {
        echo "<p>Error al enviar el mensaje.</p>";
    }
} else {
    echo "<p>Por favor, completa todos los campos con datos válidos.</p>";
}
?>
