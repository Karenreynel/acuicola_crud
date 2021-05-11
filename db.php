<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'acuicola'
) or die(mysqli_error($mysqli));

?>
