<?php require_once("connection.php");
$msg1='';
$msg2='';
$invalid='';
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(isset($_POST["email"])&& isset($_POST["password"]))
	{
		if($_POST["email"]=="")
		{
			$msg1="please enter email";
		}
		if($_POST["password"]=="")
		{
			$msg2="please enter password";
		}
	
		$email=$_POST["email"];
		$pass=$_POST["password"];
		if($email!=''&& $pass!='')
		{
			$login = "SELECT * FROM `user` WHERE `email`='".$email."' AND `password`='".$pass."' ";
			
			$result=mysqli_query($conn,$login);
			if(mysqli_num_rows($result)==1)
			{		
		     $row=mysqli_fetch_array($result);
			
            	$_SESSION['user_id']=$row['user_id'];
            	header('location:index.php');
		}
		else 
		{
			$invalid="<span style='color:red';> Invalid Email & Password</span>";
		}
		}
		else
		{
			echo "null value";
		}
	}
}
?>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<div class="header">
<h2>LOG IN<h2>
</div>
<form method="post" action="login.php">

<div class="input-group">
<label>Email</label>
<input type="text" name="email" placeholder="email">
<span style ="color:red"><?php echo $msg1?></span>
</div>
<div class="input-group">
<label>Password</label>
<input type="text" name="password" placeholder="password">
<span style ="color:red"><?php echo $msg2?></span>
<?php echo $invalid;  ?>
</div>
<div class="input-group">
<button type="submit" name="register" class="btn">Log in</button>
</div>
<p><a href="register-insert.php">Sign Up</p>
</form>
</body>
</html>