<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Registration page</title>
  </head>
  <body>
    
<nav class="navbar navbar-light bg-light justify-content-between">
 <div class="container">
  <div class="navbar-brand"><a href="../index.php">SMS</a></div>
   <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Admin
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">  
  <a class="dropdown-item " type="button" href="../index.php">Back to Website</a>
  </div>
</div>
</div>
</nav>
   
   <div class="container">
    <div class="main-content">
      <h4 class="text-center py-4">Please Registration</h4>
      <div class="row">
          <div class="col-6 offset-3 border">
           <div class="alert-mgs text-center mt-2">
           <?php 
                    if(isset($_SESSION['insert_sucess'])){?>
                       <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Registration successfully!</strong> Please login . . .
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                       <?php }?>
                  </div>
            <form action="regData.php" enctype="multipart/form-data" method="post">
               
                <div class="form-group">
                   <label for="">Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name" required>
                </div>
                <div class="form-group">
                   <label for="">User Name</label>
                    <input type="text" class="form-control" placeholder="User name" name="username" required>
                    <?php 
                    if(isset($_SESSION['double_user'])){?>
                       <span class="error">Username already exists : )</span>
                       <?php }?>
                </div>
                <div class="form-group">
                   <label for="">Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                </div>
                <div class="form-group">
                   <label for="">Image</label>
                    <input type="file" class="form-control" name="image" required>
                </div>
                <div class="form-group">
                   <label for="">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                <div class="form-group">
                   <label for="">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirm password" name="conpass" required>
                    <?php 
                    if(isset($_SESSION['pass_not_match'])){?>
                       <span class="error">Password doen't match : )</span>
                       <?php }?> 
                </div>
                 <div class="form-group">
                    <input type="submit" class="form-control btn btn-success" value="Submit" name="btn">
                </div>
            </form>
              <a type="button" class="btn btn-info  w-100" data-toggle="modal" data-target="#exampleModalCenter" style="color:#fff">Login </a> 
          </div>
      </div>
  
       </div> <!-- main-content -->
   </div> <!-- container -->
   <hr>
   <footer class=" py-3 text-center">
       <p class="m-0">All rights deserved | Design by Shahin with ♥ 2020</p>
   </footer>
   
   
   
   
   
   
   
   
   
   
   
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
        <form action="login.php" method="post">
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
                <a href="../index.php" class="btn btn-info w-100">Back to Website</a>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
   
   <style>
       .error{
           color: red;
       }
       .main-content{
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
unset($_SESSION['double_user']);
unset($_SESSION['pass_not_match']);
unset($_SESSION['insert_sucess']);

?>