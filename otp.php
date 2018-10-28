
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/navigation.css">


<?php
session_start();
 //session_start();
// if (isset($_SESSION['email']) == FALSE){
//      header("Location:registration.php");
// } 
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

$phone=$_SESSION['phone'];
phpAlert(   "OTP has been send to $phone"   ); 
// $name=$_SESSION['name'];

// $email=$_SESSION['email'];

// $name=$_SESSION['name'];

//echo $phone."hiii";
$otp=$_SESSION['otp'];
   ?>

<br>
<br>
<br>

 <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                 <h1>OTP</h1>
                    <form role="form" action="otpprocess.php" method="post" id="login-form" autocomplete="off">
                    <div class="form-group">
                            <label for="username" class="sr-only">OTP</label>
                            <input type="text" name="otpvalue" id="otpvalue" class="form-control" placeholder="Enter Otp">
                        </div>
                         <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                    </div>
                    </div>
                    </div>
                    </div>
                    </section>
                    </div>



<!-- <div class="container" id="form1">
  <br>
  <br>
   <form action="otpprocess.php" method="post">
     <div class="form-group">
     <label for="OTP">OTP:</label>
     <input type="text" class="form-control" id="otpvalue" name="otpvalue" required>
    </div>
   <div class="form-check">
   </div>
   <button type="submit" class="btn btn-primary" style="background-color:#26a69a;" name="submit1" value="submit1">Submit</button>
</form>
<br>
<br>
</div>

<?php  //include "footer.php" ?> -->
