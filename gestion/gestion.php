<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta charset="utf-8">
  <title>Gestionar</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <?php require_once 'proceso.php'; ?>
  <?php
  if (isset($_SESSION['mensaje'])) : ?>
    <div class="alert  alert-<?= $_SESSION['msg_type'] ?> alert-dismissible fade show" role="alert">
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
      <?php
      echo $_SESSION['mensaje'];
      unset($_SESSION['mensaje']);
      ?>
    </div>
  <?php endif ?>
  <div class="container">
    <?php
    $mysqli = new mysqli('localhost', 'root', 'koder', 'texis') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM alumnos") or die($mysqli->error);
    //pre_r($result);
    ?>
    <a href="../gestion/"><svg class="bi bi-backspace-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M15.683 3a2 2 0 00-2-2h-7.08a2 2 0 00-1.519.698L.241 7.35a1 1 0 000 1.302l4.843 5.65A2 2 0 006.603 15h7.08a2 2 0 002-2V3zM5.829 5.854a.5.5 0 11.707-.708l2.147 2.147 2.146-2.147a.5.5 0 11.707.708L9.39 8l2.146 2.146a.5.5 0 01-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 01-.707-.708L7.976 8 5.829 5.854z" clip-rule="evenodd" />
      </svg> Volver </a>
    <div class="row justify-content-center">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>Nombre</th>
            <th>Carrera</th>
            <th colspan="2">Accion</th>
          </tr>
        </thead>
        <?php
        while ($row = $result->fetch_assoc()) :
        ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['carrera']; ?></td>
            <td>
              <a href="gestion.php?editar=<?php echo $row['id']; ?>" class="btn btn-info">Editar</a>
              <a href="proceso.php?borrar=<?php echo $row['id']; ?>" class="btn btn-danger">Borrar</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </table>
    </div>
    <?php

    function pre_r($array)
    {
      echo '<pre>';
      print_r($array);
      echo '</pre>';
    }

    ?>
    <div class="row justify-content-center" class="form-group">
      <form action="proceso.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
          <label for="input">Nombre</label>
          <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" placeholder="Nombre" required autofocus>
        </div>
        <div class="form-group">
          <label>Carrera</label>
          <input type="text" class="form-control" name="carrera" value="<?php echo $carrera; ?>" placeholder="Carrera" required>
        </div>
        <div class="row justify-content-center" class="form-group">
          <?php
          if ($actualizar == true) :
          ?>
            <button type="submit" class="btn btn-success" name="actualizar">Actualizar</button>
          <?php else : ?>
            <button type="submit" class="btn btn-success" name="guardar">Guardar</button>
          <?php endif; ?>
        </div>
      </form>
    </div>
  </div>
</body>

</html>