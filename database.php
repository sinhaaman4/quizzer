<?php
define('DB_NAME', 'quizzer');
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');

$link = mysqli_connect(DB_HOST,DB_USER,DB_PASS);

if(!$link){
	die('cant connect'.mysqli_error());
}
$db_selected = mysqli_select_db($link,DB_NAME);

if(!$db_selected)
	die('could not connect to the databse'.DB_NAME.mysqli_error($link));

?>