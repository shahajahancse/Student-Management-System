

    <div class="col-sm-9 clearfix">    <!-- content area -->
      <div class="content">

        <?php

          $connect = require_once('dbcon.php');
          $id = base64_decode($_GET['id']);
          $select = "SELECT * FROM `student_info` WHERE `id` = '$id'";

          $db_info = mysqli_query($link, $select);
          $db_row = mysqli_fetch_assoc($db_info);
          // print_r($db_row);

          if (isset($_POST['update'])) {
            //echo "<pre>";
          //  print_r ($_POST);
            //print_r($_FILES);

            $name = $_POST['name'];
            $roll = $_POST['roll'];
            $class = $_POST['class'];
            $city = $_POST['city'];
            $p_contact = $_POST['p_contact'];
            /*
            $photo = explode('.', $_FILES['photo']['name']);
            $photo_ex = end($photo);
            $photo_name = $roll. '.' .$photo_ex;
            // echo $photo_name;   */

            $insert = "UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`p_contact`='$p_contact'  WHERE `id` ='$id'";
            $result = mysqli_query($link, $insert);

            if ($result) {
              header('location: index.php?page=all-student');
            }
          }


        ?>

        <h1 class="text-primary"><i class="fa fa-pencil-square-o"></i> Update Student <small class="text-dark">update student</small></h1>
         <ol class="breadcrumb">    <!-- breadcrumb  -->
           <li class="breadcrumb-item"><a href="index.php?page=dashboard" class=""> Dashboard</a></li>
           <li class="breadcrumb-item"><a href="index.php?page=all-student" class=""> All-Student</a></li>
           <li class="breadcrumb-item">Update Student</li>
         </ol>

        <div class="row">   <!-- Form  row-->
          <div class="col-md-8 col-lg-6">     <!-- Form -->
            <form action="#" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter the name" required="" value="<?= $db_row['name'] ?>">
              </div>
              <div class="form-group">
                <label for="roll">Student Roll</label> <?php if (isset($roll_error)) { echo $roll_error; } ?>
                <input type="text" class="form-control" name="roll" id="roll" placeholder="Roll" pattern="[0-9]{6}" required="" value="<?= $db_row['roll'] ?>">
              </div>
              <div class="form-group">
                <label for="class">Class</label>
                <select id="class" name="class" class="form-control" required="">
                   <option value="">Select</option>
                   <option <?php echo $db_row['class']=='1st'?'selected=""':''; ?> value="1st">1st</option>
                   <option <?php echo $db_row['class']=='2nd'?'selected=""':''; ?> value="2nd">2nd</option>
                   <option <?php echo $db_row['class']=='3rd'?'selected=""':''; ?> value="3rd">3rd</option>
                   <option <?php echo $db_row['class']=='4th'?'selected=""':''; ?> value="4th">4th</option>
                   <option <?php echo $db_row['class']=='5th'?'selected=""':''; ?> value="5th">5th</option>
                </select>
              </div>
              <div class="form-group">
                <label for="city">City Name</label>
                <input type="text" class="form-control" name="city" id="city" placeholder="city name" required="" value="<?= $db_row['city'] ?>">
              </div>
              <div class="form-group">
                <label for="p_contact">Parent Contact Number</label>
                <input type="text" class="form-control" name="p_contact" id="p_contact" placeholder="01********" pattern="01[1|5|6|7|8|9][0-9]{8}" required="" value="<?= $db_row['p_contact'] ?>">
              </div>
              <div class="">
                <input type="submit" name="update" value="update" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
