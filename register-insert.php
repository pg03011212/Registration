<?php require_once("connection.php");
$msg1='';
$msg2='';
$msg3='';
$msg4='';
$msg5='';
$msg6='';
$msg7='';
$msg8='';
$msg9='';
if($_SERVER["REQUEST_METHOD"]=="POST")
		{ 
		if(isset($_POST["username"])&& isset($_POST["email"]) && isset($_POST["contact"]) && isset($_POST["address"]) 
			&& isset($_POST["city"])&& isset($_POST["gender"])&&isset($_POST["hobbies"])&& isset($_FILES["image"]["tmp_name"]) && isset($_POST["password"]))
		{
			if($_POST["username"]=="")
		{
			$msg1="please enter username";
		}
		if($_POST["email"]=="")
		{
			$msg2="please enter email";
		}
		if($_POST["contact"]=="")
		{
			$msg3="please enter contact";
		}
		if($_POST["address"]=="")
		{
			$msg4="please enter address";
		}
		if($_POST["city"]=="")
		{
			$msg5="please enter city";
		}
		if($_POST["hobbies"]=="")
		{
			$msg6="please enter hobbies";
		}if($_POST["image"]=="")
		{
			$msg7="please upload image";
		}
		if($_POST["password"]=="")
		{
			$msg8="please enter password";
		}
		if($_POST["gender"]=="")
		{
			$msg9="please enter gender";
		}
				                    
								$uname=$_POST["username"];
								$email=$_POST["email"];
								$con=$_POST["contact"];	
								$add=$_POST["address"];
								$city=$_POST['city'];
								$gen=$_POST["gender"];
								$hob=$_POST['hobbies'];
								$img=$_FILES['image']['name'];
								$pass=$_POST["password"];
         						$hobbi="";
		                        foreach ($hob as $chk1)
								{
		 	                    $hobbi.= $chk1." ";
		                        }
		                        $exp_image_name=explode(".", $img);
		                        $new_image_name = date("YMD_His").'.'.$exp_image_name[1];
		                        move_uploaded_file($_FILES['image']['tmp_name'],'photos/'.$new_image_name);
       
								 
								if($uname!='' &&$email!='' &&$con!='' &&$add!='' &&$city!='' &&$gen!='' &&hob!='' &&$pass!='')
			                    {
			                    $sql="insert into user(username,email,contact,address,city,gender,hobbies,image,password)values
			                    ('".$uname."','".$email."','".$con."','".$add."','".$city."','".$gen."','".$hobbi."','".$new_image_name."','".$pass."')";
								
			                    $result=mysqli_query($conn,$sql);
			                    echo"<meta http-equiv='refresh' content = '0;url=login.php'/>";
		
		}
		
	}
}
?>

<html>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<div class="header">
<h2>Register<h2>
</div>
<form method="post"  enctype="multipart/form-data" action="register-insert.php">
<div class="input-group">
<label>Username</label>
<input type="text" name="username" >
<span style ="color:red"><?php echo $msg1?></span>
</div>
<div class="input-group">
<label>Email</label>
<input type="text" name="email" >
<span style ="color:red"><?php echo $msg2?></span>
</div>
<div class="input-group">
<label>Contact No</label>
<input type="text" name="contact" maxlength="10">
<span style ="color:red"><?php echo $msg3?></span>
</div>
<div class="input-group">
<label>Address</label>
<input type="text" name="address" >
<span style ="color:red"><?php echo $msg4?></span>
</div>

<br>
<label>City :</label>
		<select name="city">
			<option value="Ahmedabad">Ahmedabad</option>
			<option value="Surat">Surat</option>
			<option value="Jamnagar">Jamnagar</option>
		</select>	
		<span style ="color:red"><?php echo $msg5?></span>
<br>
<br>
<label>gender:</label>&nbsp;
<input type="radio" name="gender" value="male">Male &nbsp;
<input type="radio" name="gender" value="female">Female
<span style ="color:red"><?php echo $msg9?></span>
<br><br>
<label>Hobbies :</label>
		<input type="checkbox" name="hobbies[]" value="cricket">Cricket
		<input type="checkbox" name="hobbies[]" value="hoccy">Hoccy
		<br>
	         &nbsp; &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
	    <input type="checkbox" name="hobbies[]" value="hollyball">Hollyball
		<input type="checkbox" name="hobbies[]" value="tennis">Tennis
		<span style ="color:red"><?php echo $msg6?></span>
	<br><br>
	<label>Image :</label> &nbsp; 
	<input type="file" name="image" id="image">
	
	<span style ="color:red"><?php echo $msg7?></span>
	
<div class="input-group">
<label>Password</label>
<input type="text" name="password" >
<span style ="color:red"><?php echo $msg8?></span>
</div>
<div class="input-group">
<button type="submit" name="submit"class="btn" />submit</button>
</div>
<p><a href="login.php">Sign In</p>
</form>
</body>
</html>
	