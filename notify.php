<?php session_start(); ?>

<?php
  include "includes/db.php";

  $reciever=$_SESSION['username'];

$query = "SELECT * FROM chats WHERE notify=1 and reciever='$reciever' ";
$result=mysqli_query($connection,$query);
  
  $count = mysqli_num_rows($result);

  echo $count;




 ?>
