<?php
session_start();
include('include/connectDB.php');

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

if(isset($_POST['up-btn'])){
    $id = $_POST['id'];
     $roll= $_POST['roll'];
    $name =$_POST['studentName'];
    $class =$_POST['class'];
    $phone=  $_POST['pnum'];
    $city=  $_POST['city'];
    $gpa=  $_POST['gpa'];
    $advisor=  $_POST['advisor'];
    
    $sql = "UPDATE `students_info` SET `name`='$name',`class`='$class',`roll`=$roll,`pnumber`='$phone',`city`='$city',`gpa`='$gpa',`advisor`='$advisor' ";
        
$r = mysqli_query(DB(),"SELECT * FROM students_info WHERE id = $id");
        $data = mysqli_fetch_assoc($r);
    
    if(!empty($_FILES['image']['name'])){
       $image = $_FILES['image']['name'];
        $img = rand(1,5696) . $image;
        $upload = 'student_images/' . $img;
        move_uploaded_file($_FILES['image']['tmp_name'], $upload);
        $sql.= ", `image` = '$img'";
        if(!empty($_FILES['image']['name']) && file_exists('student_images/' .$data['image'])){
            unlink('student_images/'.$data['image']);
        }

        }
        $sql .= " WHERE `id` = $id";
        
}

    $con = DB();
    if(mysqli_query($con,$sql)){
        $_SESSION['update_student'] = 1;
       header("location:index.php?page=allStudent");
    }
    else{
         $_SESSION['not_update_student'] = 1;
       header("location:index.php?page=allStudent");
    }
    


?>