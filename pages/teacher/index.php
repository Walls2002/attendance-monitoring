<?php 
session_start();
$conn=mysqli_connect("localhost","root","","attendance");

if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$error_msg="";

	if (!empty($username)&&!empty($password)) 
	{
		$sql="SELECT * FROM teacher WHERE username='$username' AND password='$password'";
		$result=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($result);

		if ($count==1) 
		{
			header("location:teacher_dashboard.php");
			$_SESSION['user-teacher']=$username;
			$_SESSION['pass-teacher']=$password;

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
	<title>Teacher Login | VMC</title>
	<link rel="icon" type="icon" href="../../img/logo-vmc.png">
	<link rel="stylesheet" type="text/css" href="../../css/font.css">
	<link rel="stylesheet" type="text/css" href="../../css/teacher-login.css">
</head>
<body>
<div class="teacher-login">
	<div class="nav">
				<div>
					<img class="nav-logo" src="../../img/logo-vmc1.png">
				</div>
				<div class="nav-time" id="date">
					<script>
						  document.write(new Date().toDateString()); 
					</script>
				</div>
			</div>

			<div class="login-form">
				<div>
					<h4>Teacher Login</h4>

				</div>
				<hr>
				<div>
					<div>
						<h4 style="color: red;">
							<?php if (!empty($error_msg)) 
								{
									echo $error_msg;
									$error_msg="";
								} ?>
						</h4>
						
					</div>

					<form action="" method="POST">
						<table>
							
							<tr>
								<td><input type="text" name="username" placeholder="Username"></td>
							</tr>
							<tr>
								<td><input type="password" name="password" placeholder="Password"></td>
							</tr>
							<tr>
								<td><input type="submit" name="submit" placeholder="Password"></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
	
</div>
</body>
</html>