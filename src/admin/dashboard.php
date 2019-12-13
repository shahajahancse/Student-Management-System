
<?php
  $select = "SELECT * FROM `student_info`";
  $total_data =mysqli_query($link, $select);
  $total_student = mysqli_num_rows($total_data);

  $select = "SELECT * FROM `user_data`";
  $total_data =mysqli_query($link, $select);
  $total_user = mysqli_num_rows($total_data);

?>

<div class="col-sm-9">    <!-- content area -->
  <div class="content">
    <h1 class="text-primary"><i class="fa fa-dashboard"></i> Dashboard <small class="text-dark">Statistics Overview</small></h1>
     <ol class="breadcrumb">    <!-- breadcrumb  -->
       <li class="breadcrumb-item"><i class="fa fa-dashboard"></i> Dashboard</li>
     </ol>

     <div class="row pb-4">        <!-- card -->
       <div class="col-md-4">
         <div class="card-group">    <!-- card group -->
           <div class="card border-primary">
             <div class="card-header bg-primary text-light">
               <div class="row">
                 <div class="col-sm-4">
                   <div class="">
                     <i class="fa fa-users fa-5x pt-3 pl-3"></i>
                   </div>
                 </div>
                 <div class="col-sm-8">
                   <div class="pull-right fa-3x pr-4"><?php echo ($total_student); ?></div>
                   <div class="clearfix"></div>
                   <div class="pull-right pb-3 pr-4 lead">All Students</div>
                 </div>
               </div>
             </div>   <!-- End  card-header  -->
             <a href="index.php?page=all-student" class="p-3">
               <span class="pull-Left lead">View All Students</span>
               <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
             </a>
           </div>
         </div>     <!-- End card group -->
       </div>
       <div class="col-md-4">
         <div class="card-group">    <!-- card group -->
           <div class="card border-primary">
             <div class="card-header bg-primary text-light">
               <div class="row">
                 <div class="col-sm-4">
                   <div class="">
                     <i class="fa fa-users fa-5x pt-3 pl-3"></i>
                   </div>
                 </div>
                 <div class="col-sm-8">
                   <div class="pull-right fa-3x pr-4"><?php echo $total_user; ?></div>
                   <div class="clearfix"></div>
                   <div class="pull-right pb-3 pr-4 lead">All Users</div>
                 </div>
               </div>
             </div>   <!-- End  card-header  -->
             <a href="index.php?page=all-users" class="p-3">
               <span class="pull-Left lead">View All Users</span>
               <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
             </a>
           </div>
         </div>     <!-- End card group -->
       </div>
     </div>   <!-- End card row-->

         <!-- Start table  -->
     <hr>
     <h3 class="">New Students</h3>
     <div class="table-responsive">
       <table class="table table-hover table-bordered table-striped" id="example">
         <thead class="">
           <tr class="">
             <th class="">Id</th>
             <th class="">Name</th>
             <th class="">Roll</th>
             <th class="">Class</th>
             <th class="">City</th>
             <th class="">Contact</th>
             <th class="">Photo</th>
           </tr>
         </thead>
         <tbody class="">

           <?php

           $select = "SELECT * FROM student_info";
           $db_info = mysqli_query($link, $select);

           while ($row = mysqli_fetch_assoc($db_info)) {

          ?>

           <tr class="">
             <td class=""><?php echo $row['id']; ?></td>
             <td class=""><?php echo ucwords($row['name']); ?></td>
             <td class=""><?php echo $row['roll']; ?></td>
             <td class=""><?php echo $row['class']; ?></td>
             <td class=""><?php echo ucwords($row['city']); ?></td>
             <td class=""><?php echo $row['p_contact']; ?></td>
             <td class="p-0"><img style="width:100px;" src="student-img/<?php echo $row['photo']; ?>"/></td>
           </tr>

           <?php  } ?>
         </tbody>
         <tfoot>
             <tr>
                 <th>Id</th>
                 <th>Name</th>
                 <th>Position</th>
                 <th>Office</th>
                 <th>Age</th>
                 <th>Start date</th>
                 <th>Salary</th>
             </tr>
         </tfoot>
       </table>
     </div>

  </div>      <!--  End content class -->
</div>    <!--  End content area -->
