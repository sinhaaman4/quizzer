<?php include 'database.php'?>
<?php 
session_start();
$query = "SELECT * FROM questions";

$result = mysqli_query($link,$query);

$total = mysqli_num_rows($result);

$query = "SELECT * FROM categories";

$cat = mysqli_query($link,$query);


?>

<!DOCTYPE html>
<html>
	<head>
		<title>PHP QUIZZER
		</title>
<link  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"rel="stylesheet" />
		<link  href="style1.css"rel="stylesheet"/>
	</head>
	<body>
		<div class="container">
			<div class="col-md-12">
				<div class="jumbotron">
				<h1 align="center">PHP QUIZZER</h1>
				</div>
			</div>
			<h3>Welcome <?php echo $_SESSION['username']?></h3><br><br>
		</div>
		<main>
			<div class="container">
				<div class="col-md-4 col-md-offset-4">
				<form method="post" action="questions.php">
					<h4><label for="sel1">Select category from the list:</label></h4><br>
						<select class="form-control" name="cat_num" id="cat_num" onchange="showDiv('this.value')">
						<option value="" selected>Select category...</option><br>
							<?php while($row = mysqli_fetch_assoc($cat)):?>
								<option value="<?php echo $row['id'];?>"><?php echo $row['category'];?></option>
							<?php endwhile;?>
						</select>
					<br><br>
					<center><button class="btn btn-info" role="button">Start Quiz</button></center>
				</form>
				
				</div>
			</div>
		</main>
		
	</body>
</html>
		