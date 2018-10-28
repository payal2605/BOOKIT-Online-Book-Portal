<?php session_start(); ?>

<?php
 $_SESSION['username']=null;
 $_SESSION['email']=null;

?>


<?php
header("Location:login.php");
?>