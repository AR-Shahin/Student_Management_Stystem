<?php 
include('admin/include/connectDB.php');
$con = DB();
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Main page</title>
  </head>
  <body>
    <div class="wapping"style ="overflow:hidden">
<nav class="navbar navbar-light bg-light justify-content-between">
 <div class="container">
  <div class="navbar-brand"><a href="index.php" class="navbar-brand" style="font-family: cursive">SMS</a></div>
 <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Admin
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
      <a type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter">Login </a>  
      <a class="dropdown-item " type="button" href="user/regUI.php">Register</a>
      <?php if(isset($_SESSION['success-login'])) {?>
      <a class="dropdown-item " type="button" href="admin/index.php">Dashboard</a> <?php }?>    
  </div>
</div>
</div>
</nav>
  <div class="row">
      <div class="col-12 text-right">
           <?php if(isset($_SESSION['logout_success'])){ ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Logout success </strong>!!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
     <?php }?>
         <?php if(isset($_SESSION['invalid_username_pass'])){ ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Invalid Username or Password : ) </strong>Please try again !!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
     <?php }?>
        <?php if(isset($_SESSION['status_not_active'])){ ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Status isn't active yet : ) </strong>Please  wait a moment !
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
     <?php }?>
      </div>
  </div>
   <!-- LOGIN MODAL -->
   <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h3>Login</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="user/login.php" method="post">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input type="text" placeholder="User name" class="form-control" name="username" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input type="password" placeholder="Password" class="form-control" name="password" required>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input type="submit" value="Login"class="form-control btn btn-success" name="btn">
                    </div>
                </div>
            </div>
        </form>
        <div class="row" style="margin-top : -5px;">
            <div class="col-12">
                <a href="index.php" class="btn btn-info w-100">Back to Website</a>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
   <div class="container text-center">
    <div class="main-content">
     <h2 class="mb-5">Welcome to Student Management system</h2>
      <div class="row">
          <div class="col-6 offset-3">
              <form action="index.php" method="post">
              <table class="table  table-bordered">
                  <tr>
                      <td colspan="2"><h5>Student Informations</h5></td>
                  </tr>
                  <tr>
                      <th><label for="nm">Name</label></th>
                      <td><input type="text" class="form-control" id="nm" name="name" required></td>
                  </tr>
                  <tr>
                      <th><label for="cls">Class</label></th>
                      <td>
                          <select name="class" id="cls" class="form-control" required>
                              <option value="">Select</option>
                              <option value="one">One</option>
                              <option value="two">Two</option>
                              <option value="three">Three</option>
                              <option value="four">Four</option>
                              <option value="five">Five</option>
                          </select>
                      </td>
                  </tr>
                  <tr>
                      <th><label for="Roll">Roll</label></th>
                      <td><input type="text" class="form-control" id="Roll" name="roll" pattern="[0-9]{3}" required></td>
                  </tr>
                   <tr>
                      <td colspan="2"><input type="submit" value="Show Info" class="form-control btn btn-light border" name="btn"></td>
                  </tr>
              </table>
               </form>
          </div>
      </div>
           <?php 
        if(isset($_POST['btn'])){
            $class =  $_POST['class'];
            $name =  $_POST['name'];
            $roll =  $_POST['roll'];
            $sql = "SELECT * FROM `students_info` WHERE `class` = '$class' AND `roll` = $roll AND `name` ='$name' ";
            $result = mysqli_query($con,$sql);
            $data = mysqli_num_rows($result);
            if($data >0)
            {
                $row = mysqli_fetch_assoc($result);?>
                 <hr>
                 <div class="row mt-3 text-left">
          <div class="col-8 offset-2">
                      <table class="table table-bordered  table-hover pt-2">
                          <tr>
                              <th>Name</th>
                              <td><?= ucwords($row['name'])?></td>
                          </tr>
                           <tr>
                              <th>Class</th>
                              <td><?= ucwords($row['class'])?></td>
                          </tr>
                           <tr>
                              <th>Roll</th>
                              <td><?= $row['roll']?></td>
                          </tr>
                          <tr>
                              <th>Advisor</th>
                              <td><?= strtoupper($row['advisor'])?></td>
                          </tr>
                           <tr>
                              <th>Parents Number</th>
                              <td><?= $row['pnumber']?></td>
                          </tr>
                           <tr>
                              <th>City</th>
                              <td><?= $row['city']?></td>
                          </tr>
                          <tr>
                              <th>GPA</th>
                              <td><?= $row['gpa']?></td>
                          </tr>
                          <tr>
                             <th>Image</th>
                              <td >
                                  <img src="admin/student_images/<?= $row['image']?>" alt="" style="width:100px;">
                              </td>
                          </tr>
                      </table>
                  </div>
              </div>
                
             <?php   
            } else{ ?>
               <hr>
               <div class="col-8 offset-2">
                <div class="jumbotron"> 
                
                <p class="lead">Not Found!</p>
                </div>
        </div>
             <?php  
            }
        }
         
        ?>
       </div> <!-- main-content -->
   </div> <!-- container -->
  
   <footer class=" py-3 text-center">
       <p class="m-0">All rights deserved | Design by Shahin with ♥ 2020</p>
   </footer>
   </div>
 <style>
       .main-content{
           margin-top: 85px;
           min-height: 550px;
       }
       footer{
           background: rgba(189, 195, 199, 0.8);
       }
      </style>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
unset($_SESSION['invalid_username_pass']);
unset($_SESSION['status_not_active']);
unset($_SESSION['logout_success']);
?>