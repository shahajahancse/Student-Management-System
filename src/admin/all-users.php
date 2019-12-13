    <div class="col-sm-9 clearfix">    <!-- content area -->
      <div class="content">

        <h1 class="text-primary"><i class="fa fa-users"></i> All Users <small class="text-dark"> all users</small></h1>
         <ol class="breadcrumb">    <!-- breadcrumb  -->
           <li class="breadcrumb-item"><a href="index.php?page=dashboard" class=""> Dashboard</a></li>
           <li class="breadcrumb-item">All Users</li>
         </ol>

        <div class="table-responsive">
          <table class="table table-hover table-bordered table-striped" id="example">
            <thead class="">
              <tr class="">
                <th class="">Name</th>
                <th class="">Email</th>
                <th class="">Username</th>
                <th class="">Photo</th>
                <!-- <th class="">Action</th> -->
              </tr>
            </thead>
            <tbody class="">

              <?php

              $select = "SELECT * FROM user_data";
              $db_info = mysqli_query($link, $select);

              while ($row = mysqli_fetch_assoc($db_info)) {

             ?>

              <tr class="">
                <td class=""><?php echo ucwords($row['name']); ?></td>
                <td class=""><?php echo $row['email']; ?></td>
                <td class=""><?php echo $row['username']; ?></td>
                <td class="p-0"><img style="width:100px;" src="img/<?php echo $row['photo']; ?>"/></td>
                <!--<td class="">
                  <a href="index.php?page=update_student&id=<?php /* echo base64_encode($row['id']);?>" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                  <a href="delete.php?id=<?php echo base64_encode($row['id']); */?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>  -->
              </tr>

              <?php  } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th> 
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </tfoot>
          </table>
        </div>

      </div>
    </div>
