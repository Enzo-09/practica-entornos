<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $email = htmlspecialchars(trim($_POST['email']));
    $mensaje = htmlspecialchars(trim($_POST['mensaje']));


    // Validar los datos
    if (empty($nombre) || empty($email) || empty($mensaje) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor, completa todos los campos y proporciona un correo electrónico válido.";
        echo "<br><a href='formulario.html'>Volver al formulario</a>";
        exit;
    }

    $para = "masternoob835@gmail.com";
    $asunto = "Nuevo mensaje de contacto";
    $contenido = "Nombre: $nombre\n";
    $contenido .= "Email: $email\n";
    $contenido .= "Mensaje: $mensaje\n";
    $headers = "From: $email\r\nReply-To: $email\r\n";

    if (mail($para, $asunto, $contenido, $headers)) {
        echo "Gracias por tu mensaje, $nombre. Nos pondremos en contacto contigo pronto.";
    } else {
        echo "Lo sentimos, hubo un error al enviar tu mensaje. Por favor, inténtalo de nuevo más tarde.";
    }
    } else {
        header("Location: formulario.html");
        exit;
    }
    ?>