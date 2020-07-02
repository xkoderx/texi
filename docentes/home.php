<?php session_start(); ?>
<!doctype html>
<html lang="en">

  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Abdu">

    <link rel="icon" href="img/favicon.ico">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <title>Home</title>
  </head>
  <body class="text-center">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<?php echo "
<nav class='navbar navbar-expand-md navbar-dark bg-dark fixed-top'>
				  <a class='navbar-brand' href='#'>
						<img src='../img/tesi.png' width='85' height='31'>
					</a>

				  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarsExampleDefault' aria-controls='navbarsExampleDefault' aria-expanded='false' aria-label='Toggle navigation'>
				    <span class='navbar-toggler-icon'></span>
				  </button>

				  <div class='collapse navbar-collapse' id='navbarsExampleDefault'>
				    <ul class='navbar-nav mr-auto'>
				      <li class='nav-item active'>
				        <a class='nav-link' href='#'>Inicio <span class='sr-only'>(current)</span></a>
				      </li>
				      <li class='nav-item'>
				        <a class='nav-link' href='#'>Perfil</a>
                      </li>
                      <li class='nav-item'>
				        <a class='nav-link' href='#'>Profesores</a>
				      </li>
				      <li class='nav-item'>
				        <a class='nav-link disabled' href='#' tabindex='-1' aria-disabled='true'>Calificaciones</a>
				      </li>
				    </ul>
				    <form class='form-inline my-2 my-lg-0'>
				      <input class='form-control mr-sm-2' type='text' placeholder='Buscar' aria-label='Search'>
				      <button class='btn btn-secondary my-2 my-sm-0' type='submit'>Buscar</button>
				    </form>
				  </div>
				</nav>

				<main role='main' class='container'>

				  <div class='starter-template'>
				    <h1>Bootstrap starter template</h1>
				    <p class='lead'>Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
				  </div>

				<div class='alert alert-success alert-dismissible fade show' role='alert'>Bienvenid@ Profesor@ " . $_SESSION['matricula'] . "
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button>
				<p><a href='../logout.php'>Cerrar sesión</a></p>
                </div>
				</main><!-- /.container -->
				<div id='top'> 
       <a tabindex='-1' href='#' id='metadata-link' data-target='#exampleModalLong' data-toggle='modal'></a>
    </div>
                
                <!-- Modal -->
<div class='modal hide fade in' id='exampleModalLong' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true' style='display:none;'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLongTitle'>Bienvenido</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        Bienvenid@ Profesor@
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'>Continuar</button>
        <button type='button' class='btn btn-danger' data-dismiss='modal'>Cerrar</button>
      </div>
    </div>
  </div>
</div>
<script>

    $(document).ready(function() {
        $('#top').find('a').trigger('click');

    });
</script>
   </div>

 " ?>
  </body>
</html>