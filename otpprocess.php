<?php  include "includes/db.php"; ?>
<?php
session_start();
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
$username=$_SESSION['username'];
$email=$_SESSION['email'];
$number=$_SESSION['phone'];
$otp=$_SESSION['otp'];
$password=$_SESSION ['password'];
   
    if(isset($_POST['submit'])){
      if($_POST["otpvalue"]==$otp){
      	phpAlert( "OTP is matched");
      	$query="INSERT INTO users(username,email,mobileno,password) VALUES ('$username','$email','$number','$password')";

 $result=mysqli_query($connection,$query);

 header("Location:profile.php");


      }
      	else{
      		
      		phpAlert( "OTP is not matched");
      	    echo "sorry your otp doesnt match";
      	}
     }
?>