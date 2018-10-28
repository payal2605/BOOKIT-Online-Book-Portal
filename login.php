<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

    <?php  include "includes/navlogin.php"; ?>
 

 <?php 
 if(isset($_POST['submit'])){


   $username=$_POST["username"];
    $password=$_POST["password"];


     $username=mysqli_real_escape_string($connection,$username);
     $password=mysqli_real_escape_string($connection,$password);


     $query="SELECT * from users where username= '$username' or email= '$username'";
     $selectuser=mysqli_query($connection,$query);

     $row=mysqli_fetch_assoc($selectuser);
         $db_username=$row['username'];
         $db_email=$row['email']; 
         $db_password=$row['password'];
         $db_id=$row['id'];
         echo $db_id;

         //$message=$db_password.$password;
      $password=crypt($password,$db_password);

         if( $password!==$db_password){

          $message='Wrong information Try again';
      }
      else{
$_SESSION['username']=$db_username;
$_SESSION['email']=$db_email;
if(isset($_SESSION['url'])) {
   $url = $_SESSION['url'];
    // holds url for last page visited.
header("Location:$url");}
else {
   //$url = "profile.php"

header("Location:profile.php");
}
//header("Location: $url");
   }   

      

     
}
        
 else{

    $message='';
 }
 ?>

 













<div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Login</h1>
                    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="login-form" autocomplete="off">
                    <h6><?php echo $message?></h6>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Your Username or Email">
                        </div>
                       
                        
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                   
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Login">
                    </form>
                 <a href="registration.php">Create an account</a>
                 <a href="forgot.php"  style="margin-left:57%">Forgot Password?</a>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>