<?php include'database.php';?>
<?php
	session_start();
	if(isset($_POST['submit'])){
		$username =$_POST['username'];
		$email = $_POST['email'];
		$password1 =$_POST['password1'];
		$password2 =$_POST['password2'];
		
	if($username&&$email&&$password1&&$password2)
	{
		
	if($password1==$password2)
		{
		$password1 = md5($password1);
		$sql = "INSERT INTO register(username , email , password) VALUES('$username','$email','$password1')";
		mysqli_query($link,$sql);
		$_SESSION['username']=$username;
		echo '<script language="javascript">';
		echo 'alert("you have successfully registered")';
		echo '</script>';
		}
	else{
		$_SESSION['message']="The passwords do not match";
		echo $_SESSION['message'];
		}
	}
	else{
		echo '<script language="javascript">';
		echo 'alert("you have not filled all the details")';
		echo '</script>';
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" type"text/css" href="new2.css"/>
		<body>
			<div class="registerbox">
				<img src="avatar.png" class="avatar">
					<h1>REGISTER HERE</h1>
					<form method="post" action="register.php">
						<p>username</p>
						<input type="username" name="username" placeholder="Enter username">
						<p>email</p>
						<input type="email" name="email" placeholder="Enter email id">
						<p>password</p>
						<input type="password" name="password1" placeholder="Enter password">
						<p>confirm password</p>
						<input type="password" name="password2" placeholder="Enter password again">
				
						<input type="submit" name="submit">
							<center><a href="login.php" value="login" style="color:red">Already registered?Click here to login</a></center>
					</form>
			</div>
		</body>
	</head>
</html>
