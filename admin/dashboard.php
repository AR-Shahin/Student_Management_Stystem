<?php
$con = DB();
$sql = "SELECT * FROM `students_info`";
$result = mysqli_query($con,$sql);
$total_student = mysqli_num_rows($result);
$sql_user = "SELECT * FROM `users`";
$result_user = mysqli_query($con,$sql_user);
$total_user = mysqli_num_rows($result_user);

?>
                 
 <?php if(isset($_SESSION['update_sucess'])) { ?>
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
  <strong>Update Student Successfully ! </strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php }?>
 <?php if(isset($_SESSION['pass_not_match'])) { ?>
<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
  <strong>Password not match! </strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php }?>
<?php if(isset($_SESSION['double_user'])) { ?>
<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
  <strong>User exists </strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php }?>
                   
                       <h1 class="text-primary"><i class="fas fa-tachometer-alt"></i> Dashboard <span style="font-size : 24px;color:black">Statistics Overview</span></h1>
                  <div class="row">
                      <div class="col-3">
                           <div class="pannel">
                               <div class="pannel-top">
                                   <div class="row">
                                       <div class="col-4 text-center align-self-center">
                                           <i class="fas fa-users"></i>
                                       </div>
                                    
                                       <div class="col-8 text-right">
                                           <span class="d-block digit"><?=$total_student;?></span>
                                           <span class="d-block tag">Total Students</span>
                                       </div>
                                   </div>
                               </div>
                               <div class="pannel-bottom">
                                   <a href="" class="btn btn-link">All Students <i class="fas fa-arrow-circle-right ml-5"></i></a>
                               </div>
                           </div>
                      </div>
                       <div class="col-3">
                           <div class="pannel">
                               <div class="pannel-top">
                                   <div class="row">
                                       <div class="col-4 text-center align-self-center">
                                           <i class="fas fa-users"></i>
                                       </div>
                                    
                                       <div class="col-8 text-right">
                                           <span class="d-block digit"><?=$total_user;?></span>
                                           <span class="d-block tag">Total Users</span>
                                       </div>
                                   </div>
                               </div>
                               <div class="pannel-bottom">
                                   <a href="" class="btn btn-link">All users <i class="fas fa-arrow-circle-right ml-5"></i></a>
                               </div>
                           </div>
                      </div>
                  </div>
                  <hr>
                  <h3 style="font-size:24px;">New Students</h3>
                  <hr>
                  

                  <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped" id="table">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Roll</th>
                              <th>Class</th>
                              <th>Advisor</th>
                              <th>Phone</th>
                              <th>Address</th>
                              <th>Image</th>
                          </tr>
                      </thead>
                      <tbody>
                         <?php while ($row = mysqli_fetch_assoc($result)){ ?>
                          <tr>
                              <td><?=$row['id']?></td>
                              <td><?=ucwords($row['name'])?></td>
                              <td><?=$row['roll']?></td>
                             <td><?=ucwords($row['class'])?></td>
                             <td><?=strtoupper($row['advisor'])?></td>
                              <td><?=$row['pnumber']?></td>
                              <td><?=$row['city']?></td>
                              <td class="text-center">
                                  <img src="student_images/<?=$row['image']?>" alt="" width="50">
                              </td>
                          </tr>
                          <?php }?>
                      </tbody>
                  </table>
                  </div>