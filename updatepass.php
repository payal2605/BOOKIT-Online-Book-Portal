<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

    <?php  include "includes/navlogin.php"; ?>
<?php function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
} 
?>

<?php if(isset($_POST['submit'])){
$username=$_SESSION['name'];

$password=$_POST['password'];
  $query1= "SELECT rand_salt from users ";
        $select_randsalt=mysqli_query($connection,$query1);
        $row=mysqli_fetch_array($select_randsalt);

        $salt=$row['rand_salt'];
        $password=crypt($password,$salt);


$query="UPDATE users set password='$password' where username ='$username'";

$updateuser=mysqli_query($connection,$query);

if(!$updateuser){

	  echo("Error description: " . mysqli_error($connection));
}else{?>

<script type="text/javascript">
alert("Password updated");
location="login.php";
</script>

<?php }}
?>




















<div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1> Update Password</h1>
                    <form role="form" action="updatepass.php" method="post" id="login-form" autocomplete="off">
                   
                        <div class="form-group">
                            <label for="username" class="sr-only"></label>
                            <input type="text" name="password" id="username" class="form-control" placeholder="Update your password">
                        </div>
                       
                        
                   
                   
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Update password ">
                    </form>
                    </div>
                    </div>
                    </div>
                    </div>
                    </section>
                    </div>