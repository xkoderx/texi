<!doctype html>
<html lang="en">
	<head>
		<title>Crear cuenta en la base de datos</title>
		<!-- Metaetiquetas requeridas -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/estilos.css"  type="text/css">
    </head>

	<body>
		<div class="container">
			<?php
				include 'db.php';
				$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
				// Verifica la conexión
				if (!$conn) {
					die("La conexión falló: " . mysqli_connect_error());
				}
				// Consulta para verificar si el correo electrónico ya existe
				$checkMatricula = "SELECT * FROM users WHERE matricula = '$_POST[matricula]' ";
				// Variable $result contiene los datos de conexión y la consulta
				$result = $conn-> query($checkMatricula);
				// Variable $count contiene el resultado de la consulta
				$count = mysqli_num_rows($result);
				// Si count == 1 eso significa que la matricula ya está en la base de datos
				if ($count == 1) {
					echo	"<div class='alert alert-warning mt-4' role='alert'>
							<p>Esa matricula ya está en nuestra base de datos.</p>
							<p><a href='index.php'>Por favor inicie sesión aquí</a></p>
							</div>";
				} else {
					/* Si el correo electrónico no existe, los datos del formulario se envían
					a la base de datos y se crea la cuenta */
					$matricula = $_POST['matricula'];
					$password = $_POST['password'];
					// La función password_hash () convierte la contraseña en un hash antes de enviarla a la base de datos
					$passHash = password_hash($password, PASSWORD_DEFAULT);
					// Consulta para enviar hash de nombre, correo electrónico y contraseña a la base de datos
					$query = "INSERT INTO users (matricula, pass) VALUES ('$matricula', '$passHash')";
					if (mysqli_query($conn, $query)) {
						echo	"<div class='alert alert-success mt-4' role='alert'><h3>Registro exitoso.</h3>
								<a class='btn btn-outline-primary' href='index.php' role='button'>Star Session</a></div>";
					} else {
						echo "Error: " . $query . "<br>" . mysqli_error($conn);
					}
				}
				mysqli_close($conn);
			?>
		</div>
	</body>
</html>
