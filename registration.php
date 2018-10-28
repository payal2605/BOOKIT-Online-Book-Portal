<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
 <?php  include "includes/navlogin.php"; ?>

 <?php

 if(isset($_POST['submit'])){



    $username=$_POST["username"];

    $query1="SELECT username from users where username='$username'";
    $results=mysqli_query($connection,$query1);
    if(!$results){
      echo "done";
    }
    $count = mysqli_num_rows($results);

    if($count>0){
     
     $message="Username should be unique";

    }
   else{
    $email=$_POST["email"];
     $number=$_POST["no"];

   $password=$_POST["password"];
      $passwordconf=$_POST["passwordconf"];

      if(!empty($username)&& !empty($email)&&!empty($number)&&!empty($password)&&!empty($passwordconf)){

      if($password===$passwordconf){
        $username=mysqli_real_escape_string($connection,$username);
        $email=mysqli_real_escape_string($connection,$email);
        $password=mysqli_real_escape_string($connection,$password);
        $query= "select rand_salt from users ";
        $select_randsalt=mysqli_query($connection,$query);
        $row=mysqli_fetch_array($select_randsalt);

        $salt=$row['rand_salt'];
        $password=crypt($password,$salt);

        $_SESSION['phone']=$number;
        $_SESSION['username']=$username;
        $_SESSION ['password']=$password;
        $_SESSION ['email']=$email;
        
header("Location:process.php");
// $query="INSERT INTO users(username,email,mobileno,password) VALUES ('$username','$email','$number','$password')";

// $result=mysqli_query($connection,$query);

// $_SESSION['username']=$db_username;
// $_SESSION['email']=$db_email;
// $_SESSI0N['id']=  $db_id;


//header("Location:profile.php");


}
else{
$message="Password Confirmation should be same";}

      }


      else{


        $message="Fields must not be remained empty";
      }




 }}
 else{
    $message='';
 }
?>

    <!-- Navigation -->
    
  
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                    <h6><?php echo $message?></h6>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">PhoneNo</label>
                            <input type="text" name="no" id="No" class="form-control" required=10 placeholder="Your phone number">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password Confirmation</label>
                            <input type="password" name="passwordconf" id="key" class="form-control" placeholder=" Confirm Password">
                        </div>
                
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                  <a href="login.php">Already a member? Sign In</a>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
