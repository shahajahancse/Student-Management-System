
    <div class="col-sm-9 clearfix">    <!-- content area -->
      <div class="content">

        <h1 class="text-primary"><i class="fa fa-users"></i> All Student <small class="text-dark"> all student</small></h1>
         <ol class="breadcrumb">    <!-- breadcrumb  -->
           <li class="breadcrumb-item"><a href="index.php?page=dashboard" class=""> Dashboard</a></li>
           <li class="breadcrumb-item">All Student</li>
         </ol>

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
                <th class="">Photo</th>a
                <th class="">Actions</th>
              </tr>
            </thead>
            <tbody class="">

              <?php

              $select = "SELECT * FROM student_info";
              $db_info = mysqli_query($link, $select);

              while ($row = mysqli_fetch_assoc($db_info)) {

             ?>

              <tr class="">
                <td class=""><?php echo $row['id'];?></td>
                <td class=""><?php echo ucwords($row['name']); ?></td>
                <td class=""><?php echo $row['roll']; ?></td>
                <td class=""><?php echo $row['class']; ?></td>
                <td class=""><?php echo ucwords($row['city']); ?></td>
                <td class=""><?php echo $row['p_contact']; ?></td>
                <td class="p-0"><img style="width:100px;" src="student-img/<?php echo $row['photo']; ?>"/></td>
                <td class="">
                  <a href="index.php?page=update_student&id=<?php echo base64_encode($row['id']);?>" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                  <a href="delete.php?id=<?php echo base64_encode($row['id']);?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
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

      </div>
    </div>
