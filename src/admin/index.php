
<?php

  session_start();
  require_once('dbcon.php');
  if (!isset($_SESSION['id'])) {
    header('location: login.php');
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
               <a href="registration.php" class="nav-link"><i class="fa fa-user-plus mr-1"></i>Add User</a>
             </li>
             <li class="nav-item">
               <a href="index.php?page=profile" class="nav-link"><i class="fa fa-user mr-1"></i>My Profiles</a>
             </li>
             <li class="nav-item">
               <a href="logout.php" class="nav-link"><i class="fa fa-power-off mr-1"></i>Logout</a>
             </li>
           </ul>
         </din>   <!--  navbar-collapse   -->
       </div>     <!-- container-fluid  -->
     </nav>

     <!-- Sidebar   -->

     <div class="container-fluid" style="min-height: 450px;">   <!--  container-fluid  -->
       <div class="row">
         <div class="col-sm-3 d-none d-sm-inline-block">     <!--  start left Sidebar   -->
           <div class="list-group">
              <a href="index.php?page=dashboard" class="list-group-item list-group-item-action active"><i class="fa fa-dashboard"></i>
                Dashboard
              </a>
              <a href="index.php?page=add-student" class="list-group-item list-group-item-action"><i class="fa fa-user-plus"></i> Add Student</a>
              <a href="index.php?page=all-student" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> All Students</a>
              <a href="index.php?page=all-users" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> All Users</a>
            </div>
         </div>    <!-- End left Sidebar  -->

            <?php
                // $page = $_GET['page'].'.php';
               //  echo $page;

               if (isset($_GET['page'])) {
                 $page = $_GET['page'].'.php';
               }else {
                 $page = 'dashboard.php';
               }

               if (file_exists($page)) {
                 require_once $page;
               }else {
                 require_once './404.php';
               }

             ?>

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
