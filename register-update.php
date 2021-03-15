<?php require_once("connection.php");
$uid=$_GET['id'];
$sql="select *from user where user_id='".$uid."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$db_hobby_array=explode(' ',$row['hobbies']);

		if ($_SERVER["REQUEST_METHOD"]=="POST")
		{
			if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['contact'])
		&& isset($_POST['address']) && isset($_POST['city']) && isset($_POST['gender'])  && isset($_POST['hobbies']) &&  isset($_POST['password'])) 
							
			{
          if($_FILES['image']['name']!= '')
		{
			$image=$_FILES['image']['name'];
		}
		else
		{
			$image=$_POST['db_image_name'];
		}									 
						
		$uname=$_POST['username'];
		$email=$_POST['email'];
		$con=$_POST['contact'];
		$add=$_POST['address'];
		$city=$_POST['city'];
		$gen=$_POST['gender'];
		$hob=$_POST['hobbies'];
		$pass=$_POST['password'];
		$hobbi="";
		foreach ($hob as $chk1) 
		{
		$hobbi .= $chk1." ";
		}
		move_uploaded_file($_FILES['image']['tmp_name'],'photos/'.$_POST['db_image_name']);
		
		if($uname!='' && $email!='' &&$con!='' &&$add!='' &&$city!='' &&$gen!='' &&$hob!='' &&$pass!='')
								{
									echo $sql="UPDATE user set username='".$uname."',email='".$email."', contact='".$con."',address='".$add."',city='".$city."',
								    gender='".$gen."',hobbies='".$hobbi."',image='".$image."',password='".$pass."' WHERE user_id='".$uid."'";
									//echo $sql;
									//$die;
									$result=mysqli_query($conn,$sql);	   
									if($result)
									{
											echo "<meta http-equiv='refresh'content='0;url=select.php' />";
									}
								}
							}
							else
							{
								echo"value not set";
				}	   
			}
?>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<div class="header">
<h2>UPDATE<h2>
</div>
<form method="post"  enctype="multipart/form-data">

<div class="input-group">
<label>Username</label>
<input type="text" name="username" value="<?php echo $row['username']?>">

</div>
<div class="input-group">
<label>Email</label>
<input type="text" name="email" value="<?php echo $row['email']?>">

</div>
<div class="input-group">
<label>Contact No</label>
<input type="text" name="contact" maxlength="10" value="<?php echo $row['contact']?>">

</div>
<div class="input-group">
<label>Address</label>
<input type="text" name="address" value="<?php echo $row['address']?>">
</div>

<br>
<label>City :</label>
		<select name="city">
			<option value="Ahmedabad" <?php if($row['city']=='Ahmedabad' )
								{echo "selected";}?>>Ahmedabad</option>
			<option value="Surat" <?php if($row['city']=='Surat' )
								{echo "selected";}?>>Surat</option>
			<option value="Jamnagar"<?php if($row['city']=='Jamnagar' )
								{echo "selected";}?>>Jamnagar</option>
		</select>		

<br>
<br>
<label>gender:</label>&nbsp;
<input type="radio" name="gender" value="male" <?php if($row['gender']=='male'){ echo 'checked'; } ?>>Male &nbsp;
<input type="radio" name="gender" value="female" <?php if($row['gender']=='female'){ echo 'checked'; } ?>>Female
<br><br>
<label>Hobbies :</label>
<?php 
			$array_hobby=["Cricket","Hoccy","Hollyball","Tennis"];
			for($i=0;$i<count($array_hobby);$i++)
			{
				$hobby_name=strtolower($array_hobby[$i]);
				$tmp=0;
				for($j=0;$j<count($db_hobby_array);$j++){
					if($hobby_name==$db_hobby_array[$j]){
						$tmp=1;
						break;
					}
				}
				?>
				<input type="checkbox" name="hobbies[]" <?php if($tmp==1){echo "checked";} ?> value="<?php echo $hobby_name ?>" >
				<?php echo $array_hobby[$i]; ?>
				<?php
			}
		?>
		
	<br><br>
	 <label>Image :</label>
<br>        
        <img style="border-radius: 100%; height: 100px" src="photos/<?php echo $row['image']?>">
<br>
		<input type="file" name="image" id="image">
		<input type="hidden" name="db_image_name" value="<?php echo $row['image']?>">
	
<div class="input-group">
<label>Password</label>
<input type="text" name="password" value="<?php echo $row['password']?>">

</div>
<div class="input-group">
<button type="submit" name="submit"class="btn" />submit</button>
</div>
<p><a href="login.php">Sign In</p>
</form>
</body>
</html>