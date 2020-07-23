<?php
$con = DB();
$sql = "SELECT * FROM `users`";
$result = mysqli_query($con,$sql);

?>


<h3 style="font-size:24px;">All Users</h3>
<hr>
<div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped" id="table">
                      <thead>
                          <tr>
                              
                              <th>Name</th>
                              <th>Email</th>
                              <th>Status</th>
                              <th>Image</th>
                          </tr>
                      </thead>
                      <tbody>
                         <?php while ($row = mysqli_fetch_assoc($result)){ ?>
                          <tr>
                              <td><?=ucwords($row['name'])?></td>
                              <td><?=$row['email']?></td>
                              <td>
                              
                              <?php 
                            if($row['status'] == 'yes'){
                                echo 'Admin';
                            }
                            ?>
                              </td>
                              <td class="text-center">
                                  <img src="../user/user_Image/<?=$row['image']?>" alt="" width="50">
                              </td>
                          </tr>
                          <?php }?>
                      </tbody>
                  </table>
                  </div>