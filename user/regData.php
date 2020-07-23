<?php 
session_start();
include('../admin/include/connectDB.php');
$con = DB();
function dataFilter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function userName_Validation($userName)
{
    $con = DB();
    $sql = "SELECT  * FROM `users` WHERE username = '$userName'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0)
    {
        return True;
    }
    else
    {
        return False;
    }
}
function emailValidation($email)
{
    $con = DB();
    $sql = "SELECT  * FROM `users` WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0)
    {
        return True;
    }
    else
    {
        return False;
    }
}
function passValidation($pass, $conPass)
{
    if ($pass === $conPass)
    {
        return True;
    }
    else
    {
        return False;
    }
}
$rand = rand(1,888888);
if(isset($_POST['btn'])){
   $name = dataFilter($_POST['name']);
   $username = dataFilter($_POST['username']);
   $email =$_POST['email'];
   $pass = md5($_POST['password']);
   $conpass = md5($_POST['conpass']);
    if(userName_Validation($username)== TRUE)
    {
       $_SESSION['double_user'] = 1;
        header("location:regUI.php");
    }else{
        if(passValidation($pass, $conpass) == FALSE)
        {
            $_SESSION['pass_not_match'] = 1;
            header("location:regUI.php");
        }else{
            $image =  $_FILES['image']['name'];
            $ext =  pathinfo($image,PATHINFO_EXTENSION);
            $image = $username .$rand. '.' .$ext ;
            $sql = "INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `image`, `status`) VALUES (NULL, '$name', '$username', '$email', '$pass', '$image', 'no')";
            if (mysqli_query($con, $sql))
            {
                $_SESSION['insert_sucess'] = 1;
                $upload ='user_Image/'  . $image;
                 move_uploaded_file($_FILES['image']['tmp_name'], $upload);
                header("Location:regUI.php");
            }else{
                
                echo "something problem in Query!";
            }//query
            
        }//password
    }//username
    
} //isset




?>