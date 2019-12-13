
<div class="col-sm-9">    <!-- content area -->
  <div class="content">
    <h1 class="text-primary"><i class="fa fa-user"></i> User Profile <small class="text-dark">my profile</small></h1>
     <ol class="breadcrumb">    <!-- breadcrumb  -->
       <li class="breadcrumb-item"><i class=""></i><a href="index.php?page=dashboard" class=""> Dashboard</a></li>
       <li class="breadcrumb-item"><i class=""></i> profile</li>
     </ol>
     <?php

      $session_id = $_SESSION['id'];
      $select = "SELECT * FROM `user_data` WHERE `id`='$session_id'";
      $user_data = mysqli_query($link, $select);
      $user_row = mysqli_fetch_assoc($user_data);
      // print_r($user_row);
    ?>
     <div class="row">
       <div class="col-sm-6">
         <table class="table table-bordered">
           <tr>
             <td>Id</td>
             <td><?php echo $user_row['id']; ?></td>
           </tr>
           <tr>
             <td>Name</td>
             <td><?php echo ucwords($user_row['name']); ?> <a href="index.php?page=update_user" class="pull-right"><i class="fa fa-pencil"></i></a></td>
           </tr>
           <tr>
             <td>Username</td>
             <td><?php echo $user_row['username']; ?></td>
           </tr>
           <tr>
             <td>Email</td>
             <td><?php echo $user_row['email']; ?></td>
           </tr>
           <tr>
             <td>Password</td>
             <td>change password<a href="index.php?page=update-pass" class=""><i class="fa fa-pencil pull-right"></i></a></td>
           </tr>
           <tr>
             <td>Status</td>
             <td><?php echo ucwords($user_row['status']); ?></td>
           </tr>
           <tr>
             <td>Signup Date</td>
             <td><?php echo $user_row['datetime']; ?></td>
           </tr>
        </table>

       </div>
       <div class="col-sm-6">
         <a href="#" class="">
           <img src="img/<?php echo $user_row['photo']; ?>" alt="" class="img-fluid img-thumbnail" style="width:240px">
         </a>

         <?php

          $user_name = $user_row['username'];
          if (isset($_POST['submit'])) {

            $photo = explode('.', $_FILES['photo']['name']);
            $photo = end($photo);
            $photo_name = $user_name.'.'.$photo;

            $update ="UPDATE `user_data` SET `photo`='$photo_name' WHERE username='$user_name'";
            $upload = mysqli_query($link, $update);
            if ($upload) {
            // echo "yes";
              move_uploaded_file($_FILES['photo']['tmp_name'], 'img/'.$photo_name);
            }else {
              echo "no";
            }

          }
         ?>

         <form action="" class="mt-3" enctype="multipart/form-data" method="post">
           <div class="">
             <label for="photo" class="">Profile Picture</label>
             <input type="file" name="photo" id="photo" class="">
           </div>
           <div class="">
             <input type="submit" name="submit" value="Upload" class="btn btn-info btn-sm mt-2">
           </div>
         </form>
       </div>
     </div>

  </div>      <!--  End content class -->
</div>    <!--  End content area -->
