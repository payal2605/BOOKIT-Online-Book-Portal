
<?php session_start(); ?>

<?php
  include "includes/db.php";

  //$sender=$_SESSION['idsender'];

$reciever=$_SESSION['username'];

$query = "SELECT * FROM chats WHERE notify=1 and reciever='$reciever'";
$result=mysqli_query($connection,$query);


  
while($row = mysqli_fetch_array($result)){
                    
    
?>

 <li><b><?php echo $row['sender']?>:</b> <?php echo $row['msg']?></li>
        
<?php }?>


<li><a href="inbox.php">Go to inbox</a></li>
	

