
<?php

  $connect = require_once('dbcon.php');
  /* if ($connect) {
    echo 'connect';
  }else {
    echo 'no';
  }  */

  $id = base64_decode($_GET['id']);
  // echo $id;

  $del = "DELETE FROM `student_info` WHERE `id` = '$id'";

  $dbcon = mysqli_query($link, $del);

  header("location: index.php?page=all-student");
  /* if ($dbcon) {
    echo "yes";
  }else {
    echo "no";
  } */

?>
