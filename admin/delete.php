<?php
session_start();
$id = $_GET['id']; 
include("include/connectDB.php");
$con = DB();
$sql = "DELETE FROM `students_info` WHERE `students_info`.`id` = $id";
$res = mysqli_query($con,$sql);
if($res)
{
    $_SESSION['delete_student'] = 1;
    header("location:index.php?page=allStudent");
}
?>