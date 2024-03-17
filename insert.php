<?php
include("connection.php");

$sname = $_POST['name'];
$sphone = $_POST['phone'];
$semail = $_POST['email'];
$sem = $_POST['semester'];

$query = "INSERT INTO `tbl_std`(`name`, `phone`, `email`, `semester`) VALUES ('$sname','$sphone','$semail','$sem')";
// if(mysqli_query($con,$query)){
//     echo"<script>alert('Data Inserted')</script>";
// }
if(mysqli_query($con, $query)){
   
}

?>
