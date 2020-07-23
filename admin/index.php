<?php
session_start();
if(!isset($_SESSION['success-login'])){
    header('location:../404.php');
}
$id = $_SESSION['user_id'];
include('include/connectDB.php');
$con = DB();
$sql = "SELECT * FROM `users` WHERE `id` = $id";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
?>
           
 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/Fonts/css/all.min.css">
    <link rel="stylesheet" href="resources/css/datatable.css">
    <link rel="stylesheet" href="resources/css/style.css">

    <title>Dashboard</title>
  </head>
  <body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
   <div class="container-fluid">
  <a class="navbar-brand" href="../index.php" style="font-family: cursive">SMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="nav-link "><h5 class="mr-3">Hi <span style="font-size:14px"><?=ucwords($row['name'])?></span></h5></a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-link"  data-toggle="modal" data-target="#update"><i class="far fa-edit mr-1"></i>Update Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-link"  data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-eye"></i> View Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-link" href="../user/logout.php"  onclick="return confirm('Are you sure ?')"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </li>
           <li class="nav-item ml-3">
       <div class="user-img-box">
            <a class="nav-link btn btn-link"><img src="../user/user_Image/<?=$row['image']?>" alt="" class="user-img img-rounded"></a>
        </div>
      </li>
    </ul>
</div>
  </div>
</nav>
   
   <!-- VIEW USER PROFILE MODAL -->
   <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View My Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table class="table table-bordered ">
                            <tr>
                                <th colspan="2">Name</th>
                               
                                <td><?=$row['name']?></td>
                            </tr>
                            <tr>
                                <th colspan="2">User Name</th>
                                <td><?=$row['username']?></td>
                            </tr>
                            <tr>
                                <th colspan="2">Email</th>
                                <td><?=$row['email']?></td>
                            </tr>
                            <tr>
                                <th colspan="2">Status</th>
                                <td> <?php
                                if($row['status'] == 'yes'){
                                echo 'Admin';
                            }
                            ?></td>
                            </tr>
                            <tr>
                                <th colspan="2">Joining Date</th>
                                <td><?=$row['date']?></td>
                            </tr>
                            <tr class="mt-1">
                                <td colspan="3" class="text-center">
                                    <img src="../user/user_Image/<?=$row['image']?>" alt="" class="img-fluid w-50 img-thumbnail">
                                </td>
                                
                            </tr>
                        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      <!-- UPDATE USER PROFILE MODAL -->
      
   <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="update">Update My Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="update.php?id=<?php echo $id;?>" enctype="multipart/form-data" method="post">
               
                <div class="form-group">
                   <label for="">Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name" required value="<?= $row['name']?>">
                </div>
                <div class="form-group">
                   <label for="">User Name</label>
                    <input type="text" class="form-control" placeholder="User name" name="username" required value="<?= $row['username']?>">
                </div>
                <div class="form-group">
                   <label for="">Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="email" required value="<?= $row['email']?>">
                </div>
                <div class="form-group">
                   <label for="">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="form-group">
                   <label for="">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                <div class="form-group">
                   <label for="">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirm password" name="conpass" required> 
                </div>
                 <div class="form-group">
                    <input type="submit" class="form-control btn btn-success" value="Update" name="btn">
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <?php if(isset($_SESSION['success-login-alert'])){ ?>
          <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
  <strong>Login success </strong>!!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
     <?php }?>
   <div class="container-fluid mt-1">
       <div class="row">
           <div class="col-3">
               <div class="list-group">
                  <a href="index.php?page=dashboard" class="list-group-item list-group-item-action active">
                   <i class="fas fa-tachometer-alt"></i> Dashboard
                  </a>
                  <a href="index.php?page=addnewStudent" class="list-group-item list-group-item-action"><i class="fas fa-user-plus"></i> Add Student</a>
                  <a href="index.php?page=allStudent" class="list-group-item list-group-item-action"><i class="fas fa-users"></i> All Student</a>
                  <a href="index.php?page=allUser" class="list-group-item list-group-item-action"><i class="fas fa-users"></i> All Users</a>
                </div>
           </div>
           <div class="col-9 border">
               <div class="content">
              <?php 
                   if(isset($_GET['page'])){
                       $page = $_GET['page'] .'.php';
                   }
                   else{
                       $page =  'dashboard.php';
                   }
                   
                   if(file_exists($page)){
                        require_once $page;
                   }else{
                      
                       header("location: ../404.php");
                   } 
                   ?>
            </div>
           </div>
       </div>
   </div>
     <footer class=" py-3 text-center" style="background: rgba(189, 195, 199, 0.8);">
           <p class="m-0">All rights deserved | Design by Shahin with ♥ 2020</p>
       </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="resources/js/datatable.js"></script>
    <script src="resources/js/dtableboot.js"></script>
    <script src="resources/js/main.js"></script>
  </body>
</html>
<?php
unset($_SESSION['success-login-alert']);
unset($_SESSION['add_new_student']);
unset($_SESSION['not_new_student']);
unset($_SESSION['roll_exits']);
unset($_SESSION['delete_student']);
unset($_SESSION['update_sucess']);
unset( $_SESSION['double_user'] );
unset($_SESSION['pass_not_match']);
unset( $_SESSION['update_student'] );
unset($_SESSION['not_update_student'] );
?>