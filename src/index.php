<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Student management</title>

    <!---  CSS here ----------->

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <!-- // Here Start Student management system   -->

    <div class="container">
      <br />
      <h1 class="text-center">Welcome to Student Management System</h1>
      <br />
      <div class="row">   <!-- submit form  row -->
        <div class="col-sm-4 offset-sm-4">    <!-- submit form  -->
            <form class="" action="#" method="post">
              <table class="table table-bordered">
                <tr>
                  <td colspan="2" class="text-center">
                    <label for="">Student Information</label>
                  </td>
                </tr>

                <tr>
                  <td>
                    <label for="choose">Choose Class</label>
                  </td>
                  <td>
                    <select class="" name="choose" id="choose">
                      <option value="">Select</option>
                      <option value="1st">1st</option>
                      <option value="2nd">2nd</option>
                      <option value="3rd">3rd</option>
                      <option value="4th">4th</option>
                      <option value="5th">5th</option>
                    </select>
                  </td>
                </tr>

                <tr>
                  <td>
                    <label for="roll">Roll</label>
                  </td>
                  <td>
                    <input type="text" name="roll" id="roll" value="" pattern="[0-9]{6}" placeholder="Roll" required>
                  </td>
                </tr>

                <tr>
                  <td colspan="2" class="text-center">
                    <input class="btn btn-default" type="submit" name="submit" value="Show info">
                  </td>
                </tr>
              </table>
          </form>
        </div>    <!-- End submit form  -->
      </div>     <!--  End  submit form  row -->

      <?php
         $confirm = require_once('./admin/dbcon.php');
         /*if ($confirm) {
           echo "yes";
         }else {
           echo "no";
         }*/

        if (isset($_POST['submit'])) {
        //print_r($_POST);

          $choose = $_POST['choose'];
          $roll = $_POST['roll'];
          //echo $choose;
           $select = "SELECT * FROM `student_info` WHERE `class`='$choose' AND `roll`='$roll'";
           $result = mysqli_query($link, $select);
           // print_r ($result);
           $result_row = mysqli_num_rows($result);
           // echo $result_row;
           if ($result_row == 1) {
             //echo "yes";
             $result_fetch = mysqli_fetch_assoc($result);

          ?>

             <div class="row mt-2">    <!-- display form  row -->
               <div class="col-md-6 offset-md-3">   <!-- display form  -->
                 <table class="table table-bordered">
                   <tr>
                     <td rowspan="4" colspan="1" style="width:200px; min-height:120px">
                       <img src="admin/student-img/<?php echo $result_fetch['photo']; ?>" alt="image" style="width:200px; min-height:120px" class="img-fluid">
                     </td>
                     <td>Name</td>
                     <td><?php echo ucwords($result_fetch['name']); ?></td>
                   </tr>
                   <tr>
                     <td>Roll</td>
                     <td><?php echo $result_fetch['roll']; ?></td>
                   </tr>
                   <tr>
                     <td>Class</td>
                     <td><?php echo $result_fetch['class']; ?></td>
                   </tr>
                   <tr>
                     <td>City</td>
                     <td><?php echo ucwords($result_fetch['city']); ?></td>
                 </table>
               </div>   <!-- End display form  -->
             </div>    <!-- End display form  row -->

          <?php

          }else {
          ?>
          <script type="text/javascript">
            alert ('Oops! Data not found');
          </script>

          <?php
          }
        }

      ?>

    </div>    <!-- End container -->

    <!-- footer Start -->

    <footer class="container-fluid">
      <div class="text-center text-success">
        <p class="lead">Copyright &copy; 2018 - <?php echo date('Y'); ?> All Rights Reserved.</p>
      </div>
    </footer>


    <!---   JS here ------->

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>

</html>
