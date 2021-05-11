<?php
include("db.php");
$id = "";
$nombres = "";
$apellidos = "";
$correo = "";

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM aprendiz WHERE id = $id";
  $result = mysqli_query($conn, $query);

  if ($result !== false && $result->num_rows > 0){
    $row = mysqli_fetch_array($result);
    $nombres = $row['nombres'];
    $apellidos = $row['apellidos'];
    $correo = $row['correo'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombres = $_POST['nombres'];
  $apellidos = $_POST['apellidos'];
  $correo = $_POST['correo'];

  $query = "UPDATE aprendiz set nombres = '$nombres', apellidos = '$apellidos', correo = '$correo' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombres" type="text" class="form-control" value="<?php echo $nombres; ?>" placeholder="Update Title"></div>
        <div class="form-group">
          <input name="apellidos" type="text" class="form-control" value="<?php echo $apellidos; ?>" placeholder="Update Title"></div>
        <div class="form-group">
          <input name="correo" type="text" class="form-control" value="<?php echo $correo; ?>" placeholder="Update Title"></div>
        
        <button class="btn btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
