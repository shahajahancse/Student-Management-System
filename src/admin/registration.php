<?php
  function message(){
    if (isset($_SESSION['add_user'])) {
    $result = $_SESSION['add_user'];
    $_SESSION['add_user'] = null;
    $result = "<p class ='alert alert-success'>".$result."</p>";
    return $result;
  }
}
 ?>
<?php
  // if (isset($_POST['registration'])) {  echo "<pre>";  print_r($_POST);  print_r($_FILES);  echo "</pre>";  }
session_start();
require_once('dbcon.php');
if (isset($_POST['registration'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $pass = $_POST['pass'];
  $con_pass = $_POST['con_pass'];

  $photo = explode('.', $_FILES['photo']['name']);
  $photo = end($photo);
  $photo_name = $username.'.'.$photo;
  /* echo $photo_name;
  print_r($_FILES);
  exit(); */

  $input_error = array();

if (empty($name)) {
     $input_error['name'] = "<p class='text-danger'>The Name field is required</p>";
  }
  if (empty($email)) {
     $input_error['email'] = "<p class='text-danger'>The Email field is required</p>";
  }
  if (empty($username)) {
     $input_error['username']= "<p class='text-danger'>The Username field is required</p>";
  }
  if (empty($pass)) {
     $input_error['pass'] = "<p class='text-danger'>The Password field is required</p>";
  }
  if (empty($con_pass)) {
     $input_error['con_pass'] = "<p class='text-danger'>The Confirm_pass field is required</p>";
  }

  if (count($input_error) == 0) {
    $query = "SELECT * FROM user_data WHERE email = '$email'";
    $email_check = mysqli_query($link, $query);

    if (mysqli_num_rows($email_check) == 0) {
      $query = "SELECT * FROM `user_data` WHERE username = '$username'";
      $user_check = mysqli_query($link, $query);
      if (mysqli_num_rows($user_check) == 0) {
        if (strlen($username) > 7) {
          if (strlen($pass) > 7) {
            if ($pass == $con_pass) {
              $pass = md5($pass);       // password encrypt   here
              $query = "INSERT INTO user_data(name,email,username,password,photo,status) VALUES ('$name','$email','$username','$pass','$photo_name','active')";

              $result = mysqli_query($link, $query);
                if ($result) {
                  move_uploaded_file($_FILES['photo']['tmp_name'], 'img/'.$photo_name);  // photo upload heree
                  $_SESSION['add_user'] = "Data Insert successfully";

                }else{
                  $_SESSION['add_user'] = "Data not Inserted ";
                }
            }else {
              $con_pass_err = "<span class='text-danger';> Confirm password not match </span>";
            }
          }else {
            $pass_lent = "More than 8 characters needed";
          }
        }else {
          $usernam_lent = "More than 8 characters needed";
        }
      }else {
        $user_error = "This username already exists";
      }
    }else {
      $email_error = "This email address already exists";
    }
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

    <div class="container">
      <br/>
      <h2 class="text-center animated fadeIn">User Registration Form</h2>
      <br/>
      <?php
        echo message();
      ?>

      <div class="row">
        <div class="col-12 offset-lg-2 col-lg-8">
          <form class="" action="" method="post" enctype="multipart/form-data">
            <div class="form-group row mb-0">
              <label for="name" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-6">
                <input type="text" name="name" id="name" placeholder="Enter your name" class="form-control" value="<?php if (isset($name)) { echo $name;  } ?>">
              </div>
              <label class="col-sm-4 col-form-label m-0 p-sm-0 py-0 px-3" for="">
                <?php if (isset($input_error['name'])) { echo $input_error['name'];  } ?>
              </label>
            </div>

            <div class="form-group row my-0 my-sm-3">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-6">
                <input type="text" name="email" id="email" placeholder="Enter you email" class="form-control" value="<?php if (isset($email)) { echo $email; } ?>">
              </div>
              <label class="col-sm-4 col-form-label m-0 p-sm-0 py-0 px-3" for="">
                <?php if (isset($input_error['email'])) { echo $input_error['email'];  } ?>
                <?php if (isset($email_error)) { echo "<span class='text-danger';>" .$email_error."</span>";} ?>
              </label>
            </div>

            <div class="form-group row my-0 my-sm-3">
              <label for="username" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-6">
                <input type="text" name="username" id="username" placeholder="Enter the Username" class="form-control" value="<?php if (isset($username)) { echo $username; } ?>">
              </div>
              <label class="col-sm-4 col-form-label m-0 p-sm-0 py-0 px-3" for="">
                <?php if (isset($input_error['username'])) {  echo $input_error['username'];  } ?>
                <?php if (isset($user_error)) {  echo "<span class='text-danger';>" .$user_error."</span>"; } ?>
                <?php if (isset($usernam_lent)){ echo "<span class='text-danger';>".$usernam_lent."</span>";} ?>
              </label>
            </div>

            <div class="form-group row my-0 my-sm-3">
              <label for="pass" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-6">
                <input type="password" name="pass" id="pass" placeholder="Enter the Password" class="form-control" value="<?php if (isset($pass)) { echo $pass; } ?>">
              </div>
              <label class="col-sm-4 col-form-label m-0 p-sm-0 py-0 px-3" for="">
                <?php if (isset($input_error['pass'])) {  echo $input_error['pass'];  } ?>
                <?php if (isset($pass_lent)) { echo "<span class='text-danger';>" .$pass_lent. "</span>";} ?>
              </label>
            </div>

            <div class="form-group row my-0 my-sm-3">
              <label for="com_pass" class="col-sm-2 col-form-label">Confirm Password</label>
              <div class="col-sm-6">
                <input type="password" name="con_pass" id="com_pass" placeholder="Confirm the Password" class="form-control" value="<?php if (isset($con_pass)) { echo $con_pass; } ?>">
              </div>
              <label class="col-sm-4 col-form-label m-0 p-sm-0 py-0 px-3" for="">
                <?php if (isset($input_error['con_pass'])) {  echo $input_error['con_pass'];  } ?>
                <?php if (isset($con_pass_err)) { echo $con_pass_err; } ?>
              </label>
            </div>

            <div class="form-group row my-sm-0">
              <label for="photo" class="col-sm-2 col-form-label">Photo</label>
              <div class="col-sm-10">
                <input type="file" name="photo" id="photo" class="">
              </div>
            </div>

            <div class="btn-group offset-sm-2 mt-1" role="group">
              <input type="submit" name="registration" value="Registration" class="btn btn-primary mr-md-3 mr-1">
              <p class="">If you have an account? Please Login <a href="login.php">here</a></p>
            </div>
          </form>
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
<?php exit(); ?>
