<?php
include("connection.php");
$stid = $_POST['s_id'];
$stname = $_POST['s_name'];
$stphone = $_POST['s_number'];
$stemail = $_POST['s_email'];
$stsemester = $_POST['s_semester'];

$query = "UPDATE `tbl_std` SET `name`='$stname',`phone`='$stphone',`email`='$stemail',`semester`='$stsemester' WHERE id = $stid";
$result = mysqli_query($con,$query);

?>