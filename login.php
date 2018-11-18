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
	<link rel="stylesheet" type"text/css" href="new2.css"/>
		<body>
			<div class="loginbox">
				<img src="avatar.png" class="avatar">
					<h1>LOGIN HERE</h1>
					<form method="post" action="login.php">
						<p>username</p>
						<input type="username" name="username" placeholder="Enter username">
						<p>password</p>
						<input type="password" name="password1" placeholder="Enter password">
						<button type="submit"  name="login">login</button>
		</form>
		</div>
	</body>
</html>
