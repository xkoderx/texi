<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
	<title></title>
	<!-- Metaetiquetas requeridas -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<div class="container">
		<?php
		// Información de conexión. archivo
		include 'db.php';
		// Variables de conexión
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
		// Verifica la conexión
		if (!$conn) {
			die("La conexión falló: " . mysqli_connect_error());
		}
		// datos enviados desde el formulario index.php
		$matricula = $_POST['matricula'];
		$pass = $_POST['password'];
		// Consulta enviada a la base de datos
		$result = mysqli_query($conn, "SELECT * FROM users WHERE matricula ='$matricula'");
		// La variable $ row retiene el resultado de la consulta
		$row = mysqli_fetch_assoc($result);
		// La variable $ hash contiene el hash de contraseña en la base de datos
		$hash = $row['pass'];
		// Turn off all error reporting
		error_reporting(0);
		/*
			La función password_Verify () verifica si la contraseña ingresada por el usuario
			coincide con el hash de contraseña en la base de datos. Si todo está bien la sesión
			se crea por un minuto. Cambie 1 en $ _SESSION [inicio] a 5 por una sesión de 5 minutos.
			*/
		if (password_verify($_POST['password'], $hash)) {

			$_SESSION['loggedin'] = true;
			$_SESSION['matricula'] = $row['matricula'];
			$_SESSION['rank'] = $row['rank'];
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
			if ($_SESSION['rank'] == 1) {
				echo "<script> window.location='../docentes/home.php'; </script>";
			} elseif ($_SESSION['rank'] == 2) {
				echo "<script> window.location='../gestion/home.php'; </script>";
			} else {
				echo "<script> window.location='../alumnos/home.php'; </script>";
				//echo $numero;
			}
			//<p><a href='edit-profile.php'>Editar perfil</a></p>
		} else {
			echo "<div class='alert alert-danger' role='alert'>¡La matrícula o la contraseña son incorrectos!
				<p><a href='index.php'><strong>Volver a intentarlo</strong></a></p></div>";
		}

		?>
	</div>

</body>

</html>