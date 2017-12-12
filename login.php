<?php include 'database.php';?>
<?php
	session_start();
	if(isset($_POST['login'])){
		$username =$_POST['username'];
		
		$password = $_POST['password1'];
		
		$password = md5($password);
	
		$sql =  "SELECT * FROM register WHERE username='$username' AND password='$password'";
	
		$query = mysqli_query($link,$sql);
	
		$result = mysqli_num_rows($query);

		if($result>0)
		{
			header("Location:index.php");
			$_SESSION['username']=$username;
			
		}
		else{
			echo "wrong credentials";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<body>
		<div class="container">
		<form method="post" action="login.php">
		<div class="form-group">
			<div class="col-md-4 col-md-offset-4"><br><br><br>
				<label for="username">username:</label>
				<input type="username" class="form-control" name="username" placeholder="Enter username">
			</div>
			<div class="col-md-4 col-md-offset-4">
				<label for="password1">Password:</label>
				<input type="password" class="form-control" name="password1" placeholder="Enter password">
			</div>
			<div class="col-md-4 col-md-offset-4">
				<div class="checkbox">
					<label><input type="checkbox"> Remember me</label>
				</div>
				<button type="submit" class="btn btn-info" name="login">login</button>
			</div>
		</form>
		</div>
	</body>
</html>