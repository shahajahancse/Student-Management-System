

    <div class="col-sm-9 clearfix">    <!-- content area -->
      <div class="content">

        <?php

          $connect = require_once('dbcon.php');

          $id = $_SESSION['id'];
          $select = "SELECT * FROM `user_data` WHERE `id` = '$id'";
          $db_info = mysqli_query($link, $select);

          $db_row = mysqli_fetch_assoc($db_info);
          $db_password =  $db_row['password'];

          if (isset($_POST['update'])){

            $change_pass = $_POST['change_pass'];
            $confirm_pass = $_POST['confirm_pass'];
            $current_pass = $_POST['current_pass'];

            if ($change_pass==$confirm_pass) {
              $current_pass = md5($current_pass);
              if ($current_pass==$db_password) {
                $change_pass = md5($change_pass);
                $update ="UPDATE `user_data` SET `password`='$change_pass' WHERE `id` ='$id' ";
                $result = mysqli_query($link, $update);
                header('location: index.php?page=profile');
              }else {
                echo "Current password wrong";
              }
            }else {
              echo "confirm password wrong";
            }
          }
        ?>


        <h1 class="text-primary"><i class="fa fa-pencil-square-o"></i> Update User Data <small class="text-dark">update my info</small></h1>
         <ol class="breadcrumb">    <!-- breadcrumb  -->
           <li class="breadcrumb-item"><a href="index.php?page=dashboard" class=""> Dashboard</a></li>
           <li class="breadcrumb-item"><a href="index.php?page=profile" class=""> My Profile</a></li>
           <li class="breadcrumb-item">Update Profile</li>
         </ol>

        <div class="row">   <!-- Form  row-->
          <div class="col-md-8 col-lg-6">     <!-- Form -->
            <form  method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="change_pass">Change Password</label>
                <input type="password" class="form-control"  name="change_pass" id="name" placeholder="Change Password">
              </div>
              <div class="form-group">
                <label for="confirm_pass">Confirm Password</label>
                <input type="password" class="form-control"  name="confirm_pass" id="name" placeholder="Confirm Password">
              </div>
              <div class="form-group">
                <label for="current_pass">Current Password</label>
                <input type="password" class="form-control"  name="current_pass" id="name" placeholder="Current Password" required="">
              </div>
              <div class="">
                <input type="submit" name="update" value="update" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
