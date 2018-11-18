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
		<link  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"rel="stylesheet" />
		<link rel="stylesheet" type"text/css" href="new.css"/>
	</head>
	<body background="books.jpg">
		<h2>Welcome <?php echo $_SESSION['username']?></h2><br><br>
		<main>
		<div class="container">
			<div class="col-md-2-text-left col-md-8">

			<form method="post" action="questions.php">
				<font color="grey"><h4><label for="sel1">Select category from the list:</label></h4><br></font>
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
		
