<?php
include("connection.php");
$sname = $_POST ['name'];
$query = "SELECT * FROM tbl_std where `name` LIKE '%$sname%' ";
$result = mysqli_query($con,$query);
$record ="";
foreach($result as $row){
    $record .="<tr>
    <td>$row[id]</td>
    <td>$row[name]</td>
    <td>$row[phone]</td>
    <td>$row[email]</td>
    <td>$row[semester]</td>
    </tr>";
}
echo $record;

?>