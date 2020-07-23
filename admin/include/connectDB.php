<?php
function DB()
{
    $con = mysqli_connect('localhost','root','','sms');
    return $con;
}
?>