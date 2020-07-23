<?php
session_start();
function dataFilter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
include('../admin/include/connectDB.php');
$con = DB();
if(isset($_POST['btn'])){
    $username = dataFilter($_POST['username']);
    $pass = md5($_POST['password']);
    $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$pass'"; 
    $result = mysqli_query($con,$sql);
    $data = mysqli_fetch_assoc($result); 
    if(mysqli_num_rows($result) > 0) {
        if($data['status'] == 'yes'){
            $_SESSION['success-login'] = True;
            $_SESSION['success-login-alert'] = True;
            $_SESSION['user_id'] = $data['id'];
            header("location:../admin/index.php");
        }else{
            $_SESSION['status_not_active'] = 1;
            header("location:../index.php");
        }
       
    }else{
        $_SESSION['invalid_username_pass'] = 1;
        header("location:../index.php");
    }
}

?>