<?php
include("connection.php");
$query = "SELECT * FROM tbl_std";
$result = mysqli_query($con,$query);
$record ="";

foreach($result as $row){
    $record .="<tr>
    <td>$row[id]</td>
    <td>$row[name]</td>
    <td>$row[phone]</td>
    <td>$row[email]</td>
    <td>$row[semester]</td>
    <td><button id='btndelete' rowid='$row[id]'>DELETE</button></td>
    <td><button id='btnupdate' rowid='$row[id]'>UPDATE</button></td>
    </tr>";
}
echo $record;
?>