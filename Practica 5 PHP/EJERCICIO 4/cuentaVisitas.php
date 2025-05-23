<?php

session_start();

if (!isset($_SESSION['visitas'])) {
    $_SESSION['visitas'] = 1;
} else {
    $_SESSION['visitas']++;
}
?>

<html>
<body>
<h1>Contador de visitas</h1>
    <p>Has visitado esta página <?php echo $_SESSION['visitas']; ?> veces.</p>
    <p><a href="cuentaVisitas.php">Recargar página</a></p>    
</body>
</html>