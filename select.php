<?php
 require_once('connection.php');

$select="SELECT * FROM `user`";
$result=mysqli_query($conn,$select);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>select</title>
 </head>
 <body>

 	 	<table align="center" cellspacing="0" cellpadding="0" border="1" height="200px" width="400px">
 	 		<caption ><h1>User Data</h1></caption>
 		<tr align="center" style="color: white; background: blue;" >
 			<th>Username</th>
 			<th>Email</th>
 			<th>Contact No</th>
 			<th>Address</th>
 			<th>Gender</th>
 			<th>Hobbies</th>
 			<th>City</th>
 			<th>Image</th>
 			<th>Password</th>
 			<th>Edit</th>
 			<th>Delete</th>
 		</tr>
<?php
while ($row=mysqli_fetch_array($result)) {
	$uid=$row['user_id'];

?>
 		<tr align="center" >
 			<td><?php echo $row['username']?></td>
 			
 			<td><?php echo $row['email']?></td>
 			<td><?php echo $row['contact']?></td>
 			<td><?php echo $row['address']?></td>
 			<td><?php echo $row['gender']?></td>
 			<td><?php echo $row['hobbies']?></td>
 			<td><?php echo $row['city']?></td>
 			<td><img style="border-radius: 100%; height: 100px" src="photos/<?php echo $row['image']?>"></td>
 			<td><?php echo $row['password']?></td>
 			<td><a href="register-update.php?id=<?php echo $uid?>">Edit</a></td>
 			<td><a href="delete.php?id=<?php echo $uid?>">Delete</a></td>
 		</tr>
<?php
}
?>
 	</table>
 
 </body>
 </html>