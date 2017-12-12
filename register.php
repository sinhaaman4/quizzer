<?php include'database.php';?>
<?php
	session_start();
	if(isset($_POST['submit'])){
		$username =$_POST['username'];
		$email = $_POST['email'];
		$password1 =$_POST['password1'];
		$password2 =$_POST['password2'];
		
	if($password1==$password2)
		{
		$password1 = md5($password1);
		$sql = "INSERT INTO register(username , email , password) VALUES('$username','$email','$password1')";
		mysqli_query($link,$sql);
		$_SESSION['username']=$username;
		$_SESSION['message']="You have successfully registered";
		echo $_SESSION['message'];
		}
	else{
		$_SESSION['message']="The passwords do not match";
		echo $_SESSION['message'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body> 
	<div id="centralise">
		<div class="container">
			<form method="post" action="register.php">
				<div class="col-md-4 col-md-offset-4">
				<div class="form-group"><br><br><br>
					<label for="username">username:</label>
					<input type="username" class="form-control" name="username" placeholder="Enter username">
				</div>
		
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" class="form-control" name="email" placeholder="Enter email id">
				</div>
			
				<div class="form-group">
					<label for="password1">Password:</label>
					<input type="password" class="form-control" name="password1" placeholder="Enter password">
				</div>
		
				<div class="form-group">
					<label for="password2">Confirm Password:</label>
					<input type="password" class="form-control" name="password2" placeholder="Enter password">
				</div>
				
				<button type="submit" class="btn btn-info" name="submit">register</button>
				<a href="login.php" value="login" class="col-md-offset-6">login</a>
				</div>
			</form>	
		</div>
	</div>
</body>
</html>
	