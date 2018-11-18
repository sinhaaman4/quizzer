<?php include 'database.php';?>
<?php session_start(); ?>
<?php
if(isset($_POST['cat_num'])){

$category = $_POST['cat_num'];
$_SESSION['cat']=$category;
$_SESSION['number'] = 1;
$number=$_SESSION['number'];
}
else{
$category = $_SESSION['cat'];
$_SESSION['number'] = $_SESSION['number'];
$number=$_SESSION['number'];
}
$query = "SELECT * FROM questions where cat_id = $category";

$result = mysqli_query($link,$query);

$total = mysqli_num_rows($result);

$total_time = 0.5;

$query = "SELECT * FROM questions WHERE question_number=$number AND cat_id =$category" ;

$result = mysqli_query($link,$query);

$question = mysqli_fetch_assoc($result);

$query = "SELECT * FROM choices WHERE question_number =$number AND cat_id =$category";

$choice = mysqli_query($link,$query);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>PHP QUIZZER</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="new.css"/>
		<script type="text/javascript">
			var timeleft = <?php echo $total_time?>*60;
		</script>
		<script type="text/javascript">
		function timeout()
		{
			var minute = Math.floor(timeleft/60);
			var second =timeleft%60;
			if(timeleft<=0)
			{
				clearTimeout(tm);
				document.getElementById("action").submit();
			}
			else
			{
				document.getElementById("time").innerHTML=minute+":"+second;
			}
			timeleft = timeleft-1;
			var tm=setTimeout(function(){timeout()},1000);
		}
		</script>
		
			
		
	</head>
	<body onload="timeout()" background="books.jpg">
		<main>
		<div id="time" class="col-md-2-text-left col-md-8"></div>
			<div class="container">
				<div class="col-md-2-text-left col-md-8">
				<div class="questions">
						<h3>Question <?php echo $_SESSION['number'];?> of <?php echo $total;?></h3><br><br>
						<font size="5px"><b><?php echo $question['text'];?></b><br></font>
				</div>
				<form method="post" id="action" action="process.php">
					<ul class="list-group">
						<?php while($row = mysqli_fetch_assoc($choice)):?> 
							<li class="list-group-item"><input name="choice" type="radio" value="<?php echo $row['id'];?>"/><?php echo $row['choices'];?></li>
						<?php endwhile;?>
					</ul>
					<input type="submit" class="btn btn-info" value="Submit">
					<input type="hidden" name="number" value="<?php echo $_SESSION['number']; ?>"/>
				</form>
			</div>
		</div>
		</main>
	</body>
</html>
		
