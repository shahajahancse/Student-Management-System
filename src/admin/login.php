
<?php

session_start();
require_once('dbcon.php');

if (isset($_SESSION['id'])) {
  header('location: index.php');
}

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $pass = md5($_POST['pass']);

  $select = "SELECT * FROM user_data WHERE username = '$username' AND password = '$pass' limit 1";
  $result = mysqli_query($link, $select);
  if (mysqli_num_rows($result) > 0) {
    $result = mysqli_fetch_assoc($result);
    //print_r($result);
    $_SESSION['id'] = $result['id'];
    $_SESSION['username'] = $result['username'];
    $_SESSION['email'] = $result['email'];
    $_SESSION['msg'] = "Your login Successfull";
    header("location: index.php");
    exit();

  }else {
    $user_error = "username or password wrong";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Student management</title>

    <!---  CSS here ----------->

    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>

  <body>
    <!-- // Here Start Student management system   -->

    <div class="container text-center">
      <br/>
      <h1 class="text-center animated fadeIn">Student Management System</h1>
      <div class="row">
        <div class="col-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3">
          <h2 class="my-4">Admin Login Form</h2>
          <form class="" action="" method="post">
            <div class="form-group">
              <input type="text" name="username" placeholder="user name" required class="form-control" value="<?php if (isset($username)) { echo $username; } ?>">
            </div>
            <div class="form-group">
              <input type="password" name="pass" placeholder="password" required class="form-control">
            </div>
            <div class="form-group row col" role="group">
              <input type="submit" name="login" value="Login" class="btn btn-default btn-sm btn-info mr-2">
              <p class="">If you don't have an account? Please registration <a href="registration.php">here</a></p>
            </div>
          </form>
          <?php
            if (isset($user_error)){ echo "<p class='lead text-left alert alert-danger mt-4'>".$user_error."</p>"; }

          ?>
        </div>
      </div>
    </div>


    <footer>
      <div class="container text-center my-4 animated fadeIn text-success">
        <p class="lead">Copyright &copy; 2018 - <?php echo date('Y'); ?> All Rights Reserved.</p>
      </div>
    </footer>
    <!---   JS here ------->

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>

</html>
