<?php include "database.php";?>
<?php session_start(); ?>
<?php

	if(!isset($_SESSION['score'])){
		$_SESSION['score']= 0;
	}
	
	if($_POST){
		$number = $_POST['number'];
		$submitted_choice = $_POST['choice'];
	}
	
	$query = "SELECT * FROM questions where cat_id = '".$_SESSION['cat']."'" ;
	
	$result = mysqli_query($link,$query);
	
	$total = mysqli_num_rows($result);
	
	
	$query = "SELECT * FROM choices 
				WHERE question_number = $number AND is_correct = 1";
	
	$result = mysqli_query($link,$query);
	
	$row = mysqli_fetch_assoc($result);
	
	$correct_choice = $row['id'];
	
	if($correct_choice==$submitted_choice){
		
		$_SESSION['score']=$_SESSION['score']+1;
		
	}
	
	if($number==$total){
		header("Location:final.php");
		$_SESSION['number']=1;
		exit();
	}
	
	else{
		
		$_SESSION['number']=$_SESSION['number']+1;
		header("Location: questions.php");
	}
	?>
		
	