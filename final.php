<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP QUIZZER</title>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="style1.css">
	</head>
	<body background="final.jpg">
		<main>
			<div class="container"align="center">
				<h1> <b>you are done!</b></h1><br>
				<p><h3>Congrats  <b><?php echo $_SESSION['username']?></b> ! you completed the test</h3></p><br>
				<p> <h3 style="color:red";>Your score : <?php echo $_SESSION['score'];?></h3></p><br><br>
				<?php $_SESSION['score']=0;?>
				<a href="questions.php?n=1" class="btn btn-info" role="button">Try again</a><br><br><br>
				<a href="index.php" class="btn btn-info" role="button">Take another test</a>
				
			</div>
		</main>
	</body>
</html>
		
