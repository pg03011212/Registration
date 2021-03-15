<?php 
 
require_once('connection.php');

$uid=$_GET['id'];

$delete="DELETE FROM `user` WHERE `user_id`='".$uid."'";
$result=mysqli_query($conn,$delete);

if ($result) {
	header('location:register-insert.php');
}


?>