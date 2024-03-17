<?php
include("connection.php");
$stdid =$_POST['id'];
$query ="SELECT * FROM `tbl_std` WHERE id = $stdid ";
$result = mysqli_query($con,$query);
$record = "";
foreach($result as $row)
{
    $record .= "
    <h1>Update Section</h1>
        <input type='number' readonly id='sid' value='$row[id]'><br><br>
        <input type='text'   id='name' value='$row[name]' ><br><br>
        <input type='number' id='number' value='$row[phone]'><br><br>
        <input type='email'  id='email' value='$row[email]'><br><br>
        <input type='text'   id='semester' value='$row[semester]' ><br><br>
        <input type='button' value='Update' id='updatebtn'>";
}
echo $record;
?>