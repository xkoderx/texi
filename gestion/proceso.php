<?php

session_start();

$mysqli= new mysqli('localhost','root','koder','texis') or die(mysqli_error($mysqli));

$id=0;
$actualizar=false;
$nombre='';
$carrera='';
if (isset($_POST['guardar'])) {
  $nombre=$_POST['nombre'];
  $carrera=$_POST['carrera'];

  $mysqli->query("INSERT INTO alumnos (nombre,carrera) VALUES ('$nombre', '$carrera')")
      or die ($mysqli-> error);

  $_SESSION['mensaje']="Guardado con éxito!";
  $_SESSION['msg_type']="success";
  header("location: gestion.php");
}

if (isset($_GET['borrar'])) {
  $id=$_GET['borrar'];
  $mysqli->query("DELETE FROM alumnos WHERE id=$id") or die ($mysqli->error());

  $_SESSION['mensaje']="Borrado con éxito!";
  $_SESSION['msg_type']="danger";
  header("location: gestion.php");
}

if (isset($_GET['editar'])) {
  $id=$_GET['editar'];
  $actualizar=true;
  $result=$mysqli->query("SELECT * FROM alumnos WHERE id=$id") or die ($mysqli->error());
  if ($result->num_rows) {
    $row=$result->fetch_array();
    $nombre=$row['nombre'];
    $carrera=$row['carrera'];
  }
}

if (isset($_POST['actualizar'])) {
  $id=$_POST['id'];
  $nombre=$_POST['nombre'];
  $carrera=$_POST['carrera'];

  $mysqli->query("UPDATE alumnos SET nombre='$nombre',carrera='$carrera' WHERE id=$id")
    or die ($mysqli->error);

  $_SESSION['mensaje']="Actualizado con éxito!";
  $_SESSION['msg_type']="warning";

  header('location: gestion.php');
}
