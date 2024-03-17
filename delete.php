<?php
include("connection.php");
$sid = $_POST['id'];
$query = "DELETE FROM `tbl_std` WHERE id = $sid";
$result = mysqli_query($con,$query);

?>