<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $id = $_POST['id'];
  $nombres = $_POST['nombres'];
  $apellidos = $_POST['apellidos'];
  $correo = $_POST['correo'];
  $query = "INSERT INTO aprendiz(id, nombres, apellidos, correo) VALUES ('$id', '$nombres', '$apellidos', '$correo')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
