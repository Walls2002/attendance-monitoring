<?php 
$conn=mysqli_connect("localhost","root","","attendance");

if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$error_msg="";


	if (!empty($username)&&!empty($password)) 
	{
		$sql="SELECT * FROM admin WHERE username='$username' AND password='$password'";
		$result=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($result);

		if ($count==1) 
		{
			header("location:pages/dashboard");
		}
		else
		{
			$error_msg="Wrong Username or Password";
		}
	}
	else
	{
		$error_msg="No Username or Password";
	}	
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Villager Monterssori College</title>
	<link rel="icon" type="icon" href="img/logo-vmc.png">
	<link rel="stylesheet" type="text/css" href="css/design.css">
	<link rel="stylesheet" type="text/css" href="css/font.css">
</head>

	<body>

		<div class="main">
			<div class="nav">
				<div>
					<img class="nav-logo" src="img/logo-vmc1.png">
				</div>
				<div class="nav-time" id="date">
					<script>
						 document.write(new Date().toDateString()); 
					</script>
				</div>
				
			</div>
			<div class="sub-main">
				<div class="form-login">
					<h3>Admin Login</h3>

					<div class="form">
						<form method="POST" action="" >
							<table>
								<tr>
									<td><input class="input-form" type="text" name="username" placeholder="Username"></td>
								</tr>
								<tr>
									<td><input class="input-form" type="password" name="password" placeholder="Password"></td>
								</tr>
								<tr>
									<td><input class="submit" type="submit" name="submit"></td>
								</tr>
							</table>
						</form>
					</div>
					<div class="error-form">
					<h3><?php if (!empty($error_msg)) {
						echo $error_msg;
					} ?></h3>
				</div>
				</div>
				
			</div>
			
		</div>
		<div class="footer">
			
		</div>


	</body>
</html>