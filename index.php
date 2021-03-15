
<?php
require_once('connection.php');
session_start();
if ($_SESSION['user_id']) {
	
$uid=$_SESSION['user_id'];


$select="SELECT * FROM `user` WHERE `user_id`='".$uid."'";
$result=mysqli_query($conn,$select);
$row=mysqli_fetch_array($result);


echo 'Welcome '.$row['username'];

?>

<a href="logout.php">Log Out</a>

<?php
}
else{
	header('location:login.php');
}
?>