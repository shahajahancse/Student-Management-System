
<?php

  function message(){
    if (isset($_SESSION['add'])) {
    $result = $_SESSION['add'];
    $_SESSION['add'] = null;
    $result = "<p class ='alert alert-success'>".$result."</p>";
    return $result;
  }
}
 ?>

    <div class="col-sm-9 clearfix">    <!-- content area -->
      <div class="content">

        <?php
          if (isset($_POST['add-student'])) {
            //echo "<pre>";
          //  print_r ($_POST);
            //print_r($_FILES);

            $name = $_POST['name'];
            $roll = $_POST['roll'];
            $class = $_POST['class'];
            $city = $_POST['city'];
            $p_contact = $_POST['p_contact'];

            $photo = explode('.', $_FILES['photo']['name']);

            $photo_ex = end($photo);
            $photo_name = $roll. '.' .$photo_ex;
            // echo $photo_name;

            $input_error = array();
            if (empty($roll)) {
                 $input_error['name'] = "<p class='text-danger'>The Name field is required</p>";
              }

          if (count($input_error) == 0) {

            $select = "SELECT * FROM student_info WHERE roll = '$roll'";
            $roll_check = mysqli_query($link, $select);

            if (mysqli_num_rows($roll_check) == 0) {

                $insert = "INSERT INTO student_info(name, roll, class,city,p_contact, photo) VALUES ('$name','$roll','$class','$city','$p_contact','$photo_name')";
                $result = mysqli_query($link, $insert);

                if ($result) {
                  move_uploaded_file($_FILES['photo']['tmp_name'], 'student-img/'.$photo_name);
                  $_SESSION['add'] = "Data Insert successfully";
                }else{
                  $_SESSION['add'] = "Data not Inserted ";
                }
              }else {
                $roll_error = "<p class='text-danger'> This roll number already exists</p>";
              }
            }
          }
        ?>


        <h1 class="text-primary"><i class="fa fa-user-plus"></i> Add Student <small class="text-dark">add new student</small></h1>
         <ol class="breadcrumb">    <!-- breadcrumb  -->
           <li class="breadcrumb-item"><a href="index.php?page=dashboard" class=""> Dashboard</a></li>
           <li class="breadcrumb-item">Add Student</li>
         </ol>
         <?php
           echo message();
         ?>
        <div class="row">   <!-- Form  row-->
          <div class="col-md-8 col-lg-6">     <!-- Form -->
            <form action="#" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter the name" required="" value="<?php if (isset($name)) { echo $name;  } ?>">
              </div>
              <div class="form-group">
                <label for="roll">Student Roll</label> <?php if (isset($roll_error)) { echo $roll_error; } ?>
                <input type="text" class="form-control" name="roll" id="roll" placeholder="Roll" pattern="[0-9]{6}" required="" value="<?php if (isset($roll)) {echo $roll; } ?>">
              </div>
              <div class="form-group">
                <label for="class">Class</label>
                <select id="class" name="class" class="form-control" required="" value="<?php if (isset($class)){echo $class;} ?>">
                  <option value="">Select</option>
                  <option value="1st">1st</option>
                  <option value="2nd">2nd</option>
                  <option value="3rd">3rd</option>
                  <option value="4th">4th</option>
                  <option value="5th">5th</option>
                </select>
              </div>
              <div class="form-group">
                <label for="city">City Name</label>
                <input type="text" class="form-control" name="city" id="city" placeholder="city name" required="" value="<?php if (isset($city)) {echo $city; } ?>">
              </div>
              <div class="form-group">
                <label for="p_contact">Parent Contact Number</label>
                <input type="text" class="form-control" name="p_contact" id="p_contact" placeholder="01********" pattern="01[1|5|6|7|8|9][0-9]{8}" required="" value="<?php if (isset($p_contact)) {echo $p_contact;} ?>">
              </div>
              <div class="form-group">
                <label for="photo">Picture</label> <br>
                <input type="file" name="photo" id="photo" required="" value="<?php if (isset($photo_name)) {echo $photo_name;} ?>">
              </div>
              <div class="">
                <input type="submit" name="add-student" value="Add Student" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
