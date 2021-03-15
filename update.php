<?php require_once('connection.php');
session_start();
$id=$_SESSION['user_id'];
$select="SELECT * FROM `user` WHERE `user_id`='".$id."'";
$re=mysqli_query($conn,$select);
$row=mysqli_fetch_array($re);
$db_hobby_array=explode(' ',$row['hobbies']);

if ($_SERVER['REQUEST_METHOD']=="POST") 
{

	if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['address']) && isset($_POST['city'])
		&& isset($_POST['gender'])  && isset($_POST['hobbies']) &&  isset($_POST['password'])){

		if($_FILES['image']['name'] != '')
		{
			$img=$_FILES['image']['name'];
		}
		else{
			$img=$_POST['db_image_name'];
		}

		$user=$_POST['username'];
		$email=$_POST['email'];
		$con=$_POST['contact'];
		$add=$_POST['address'];
		$city=$_POST['city'];
		$gen=$_POST['gender'];
		$hob=$_POST['hobbies'];
		$pass=$_POST['password'];
		$hobbi="";
		
		 foreach ($hob as $chk1) {
		 	$hobbi .= $chk1." ";
		}

		move_uploaded_file($_FILES['image']['tmp_name'],'photos/'.$_POST['db_image_name']);

 //
		if ($user!='' && $email!='' && $con!='' && $add!='' && $city!='' && $gen!=''  &&  $hobbi!='' && $pass!='') {

			echo $sql = "UPDATE `user` SET `username`= '".$user."',`email`= '".$email."',
			`contact`='".$con."',`address`='".$add."',`gender`= '".$gen."',`hobbies`='".$hobbi."',`city`='".$city."',
			`image`='".$img."',`password`='".$pass."' WHERE `user_id`='".$id."' ";
			// echo $insert;
			// $die;

			$result=mysqli_query($conn,$sql);

							
				header('location:select.php');

			

		}
		else{echo "null value";}

	}
	else
		{echo "isset(var)";}

}
else
{
	//echo "method";
}

?>
