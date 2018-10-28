<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

    <?php  include "includes/navlogin.php"; ?>
<?php function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
} 

//phpAlert("Message sent");?>
   

<?php if(isset($_POST['submit'])){

$token=$_POST['token'];
$password=$_SESSION['pass'];
$username=$_SESSION['name'];

$query="SELECT password from users where username='$username'";
$selectuser=mysqli_query($connection,$query);

  $row=mysqli_fetch_assoc($selectuser);
         //$username=$row['username'];
        
          $passwords=$row['password'];

          if($token===$passwords){?>

            <script type="text/javascript">
alert("Token matched");
location="updatepass.php";
</script>

          
<?php 
          }

else{
    phpAlert("token not matched");
}

}?>




<div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1> Token</h1>
                    <form role="form" action="resettoken.php" method="post" id="login-form" autocomplete="off">
                   
                        <div class="form-group">
                            <label for="username" class="sr-only">Token</label>
                            <input type="text" name="token" id="username" class="form-control" placeholder="Enter the token sent on your mail">
                        </div>
                       
                        
                   
                   
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Update password ">
                    </form>
                    </div>
                    </div>
                    </div>
                    </div>
                    </section>
                    </div>