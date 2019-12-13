
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
    <link rel="stylesheet" href="../css/bootstrap-data-table.min.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>

  <body>      <!-- Navbar  -->

    <nav class="navbar navbar-light bg-light navbar-expand-sm sticky-top">
       <div class="container-fluid">
         <a href="index.php" class="navbar-brand">SMS</a>
         <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
         <din class="collapse navbar-collapse" id="navbarNav">
           <ul class="navbar-nav ml-auto text-capitalize">
             <li class="nav-item">
               <a href="#" class="nav-link"><i class="fa fa-user mr-1"></i>Welcome: md. Ali</a>
             </li>
             <li class="nav-item">
               <a href="#" class="nav-link"><i class="fa fa-user-plus mr-1"></i>Add User</a>
             </li>
             <li class="nav-item">
               <a href="#" class="nav-link"><i class="fa fa-user mr-1"></i>Profiles</a>
             </li>
             <li class="nav-item">
               <a href="logout.php" class="nav-link"><i class="fa fa-power-off mr-1"></i>Logout</a>
             </li>
           </ul>
         </din>   <!--  navbar-collapse   -->
       </div>     <!-- container-fluid  -->
     </nav>

     <!-- Sidebar   -->


         <div class="col-sm-3">    <!-- Left Sidebar start -->
           <div class="clearfix d-none d-sm-inline-block position-fixed col-sm-3">
             <div class="list-group">
                <a href="index.php?page=dashboard" class="list-group-item list-group-item-action active"><i class="fa fa-dashboard"></i>
                  Dashboard
                </a>
                <a href="index.php?page=add-student" class="list-group-item list-group-item-action"><i class="fa fa-user-plus"></i> Add Student</a>
                <a href="index.php?page=all-student" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> All Students</a>
                <a href="index.php?page=all-users" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> All Users</a>
              </div>
           </div>
         </div>    <!-- End left Sidebar  -->

         <div class="col-sm-9">
               <h1 class="text-primary"><i class="fa fa-user-plus"></i> Add Student <small class="text-dark">add new student</small></h1>
                <ol class="breadcrumb">    <!-- breadcrumb  -->
                  <li class="breadcrumb-item"><a href="index.php?page=dashboard" class=""> Dashboard</a></li>
                  <li class="breadcrumb-item">Add Student</li>
                </ol>

               <div class="row">   <!-- Form  row-->
                 <div class="col-md-8 col-lg-6">     <!-- Form -->
                   <form action="#" method="post" enctype="multipart/form-data">
                     <div class="form-group">
                       <label for="name">Student Name</label>
                       <input type="text" class="form-control" name="name" id="name" placeholder="Enter the name" required="" value="<?php if (isset($name)) { echo $name;  } ?>">
                     </div>
                     <div class="form-group">
                       <label for="roll">Student Roll</label>
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

       </div>    <!-- End row  -->
     </div>     <!-- End container-fluid  -->



     <!-- Start footer -->

     <footer class="container-fluid mt-5">
       <div class="text-center bg-primary">
         <p class="lead">Copyright &copy; 2018 - <?php echo date('Y'); ?> All Rights Reserved.</p>
       </div>
     </footer>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/data-table.min.js"></script>
    <script src="../js/jquery-data-table.min.js"></script>
    <script src="../js/custom.js"></script>
  </body>
</html>
