<?php

$mensaje = "";
$tipo_alerta = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre_remitente = htmlspecialchars(trim($_POST["tu_nombre"] ?? ''));
    $email_destinatario = filter_var(trim($_POST["amigo_email"] ?? ''), FILTER_VALIDATE_EMAIL);


    if (!empty($nombre_remitente) && $email_destinatario) {

        $nombre_sitio = "SITIO DE RECOMENDACIÓN";
        $url_sitio = "https://www.recomendacion.com";


        $asunto = "$nombre_remitente te recomienda visitar $nombre_sitio";
        $cuerpo_mensaje = "
        <html>
        <body>
            <h2>¡Hola!</h2>
            <p><strong>$nombre_remitente</strong> quiere recomendarte el sitio <strong>$nombre_sitio</strong>.</p>
            <p>Puedes visitarlo haciendo clic aquí: <a href='$url_sitio'>$url_sitio</a></p>
            <br>
            <p>¡Saludos del equipo de $nombre_sitio!</p>
        </body>
        </html>";


        $headers  = "From: noreply@recomendacion.com\r\n";
        $headers .= "Reply-To: noreply@recomendacion.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";


        if (mail($email_destinatario, $asunto, $cuerpo_mensaje, $headers)) {
            $mensaje = "¡Listo! Tu recomendación fue enviada con éxito.";
            $tipo_alerta = "success";
        } else {
            $mensaje = "Ocurrió un error al enviar el correo. Por favor, intenta nuevamente más tarde.";
            $tipo_alerta = "danger";
        }
    } else {
        $mensaje = "Por favor, completa correctamente todos los campos.";
        $tipo_alerta = "warning";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recomendación enviada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <?php if (!empty($mensaje)): ?>
            <div class="alert alert-<?= $tipo_alerta ?> text-center">
                <?= $mensaje ?>
            </div>
            <div class="text-center mt-4">
                <a href="formulario.html" class="btn btn-primary">Volver al formulario</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
