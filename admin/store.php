<?php 
session_start();
include('include/connectDB.php');
$con = DB();
function rollcheck($roll)
{
    $con = DB();
    $sql = "SELECT * FROM `students_info` WHERE roll = $roll";
    $res = mysqli_query($con,$sql);
    if(mysqli_num_rows($res) > 0){
        return TRUE;
    }else{
        return FALSE;
    }
}

if(isset($_POST['btn'])){
     $roll= $_POST['roll'];
    $name =$_POST['studentName'];
    $class =$_POST['class'];
    $phone=  $_POST['pnum'];
    $city=  $_POST['city'];
    $gpa=  $_POST['gpa'];
    $advisor=  $_POST['advisor'];
    $image = $_FILES['image']['name'];
    $img = rand(1,5696) . $image;
    
    if(rollcheck($roll) == TRUE)
    {
        $_SESSION['roll_exits'] = 1;
        header("location:index.php?page=addnewStudent");
    }
    else{
    $sql = "INSERT INTO `students_info` (`id`, `name`, `class`, `roll`, `pnumber`, `city`, `gpa`, `advisor`, `image`) VALUES (NULL,'$name', '$class', '$roll', '$phone', '$city', '$gpa', '$advisor', '$img')";
    
    if(mysqli_query($con,$sql)){
        $_SESSION['add_new_student'] = 1;
        $upload ='student_images/' . $img;
        move_uploaded_file($_FILES['image']['tmp_name'],$upload);
        header("location:index.php?page=addnewStudent");
    }
    else{
         $_SESSION['not_new_student'] = 1;
        header("location:index.php?page=addnewStudent");
    }
    }
}
?>