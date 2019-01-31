<?php
$id=$_GET['id'];
$conn=mysqli_connect('localhost','root','','time_mngmnt_db');
$qry="DELETE FROM main_table WHERE id='{$id}'";
$result=mysqli_query($conn,$qry);
header("location: ./index.php");
?>