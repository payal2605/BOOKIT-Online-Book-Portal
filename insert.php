
 <?php session_start(); ?>
<?php  include "includes/db.php"; ?>
<?php $name  = $_POST['name'];
	$msg   = $_POST['msg'];
	$reciever=$_SESSION['re'];
	echo $reciever;

	date_default_timezone_set('Asia/Kolkata');
	$date=date("Y-m-d H:i:s a");

	$query = "INSERT INTO chats (sender,reciever,msg,Ds,notify) values ('$name','$reciever','$msg','$date',1)";
$result=mysqli_query($connection,$query);

header("Content-Type: application/json", true);
	?>