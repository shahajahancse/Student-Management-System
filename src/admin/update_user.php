

    <div class="col-sm-9 clearfix">    <!-- content area -->
      <div class="content">

        <?php

          $connect = require_once('dbcon.php');

          $id = $_SESSION['id'];

          $select = "SELECT * FROM `user_data` WHERE `id` = '$id'";

          $db_info = mysqli_query($link, $select);
          $db_row = mysqli_fetch_assoc($db_info);
          $current_password =  $db_row['password'];


          if (isset($_POST['update'])){

            $name = $_POST['name'];
            /* $email = $_POST['email'];
             $username = $_POST['username'];
             $change_pass = $_POST['change_pass'];
            $current_new_password = $_POST['current_pass'];
            $current_new_password = md5($current_new_password);
            if ($current_new_password == $current_password) { */

              $update ="UPDATE `user_data` SET `name`='$name' WHERE `id` ='$id' ";
              $result = mysqli_query($link, $update);
              header('location: index.php?page=profile');
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
                <label for="name">Name</label>
                <input type="text" class="form-control"  name="name" id="name" value="<?php echo $db_row['name']  ?>">
              </div>
              <div class="">
                <input type="submit" name="update" value="update" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
