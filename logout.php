/* Destruye la sesión de usuario actual */
<?php
	session_start();
	session_unset($_SESSION['matricula']);
	session_destroy();
	header('location: index.php');
?>
