<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

    <?php  include "includes/navlogin.php"; ?>
<?php use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require('vendor/autoload.php'); 
//$mail = new PHPMailer;


?> 
<?php function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
} ?>
   

 <?php if(isset($_POST['submit'])){

$username=$_POST['username'];
$_SESSION['name']=$username;

$query="SELECT email,password from users where username='$username'";
$selectuser=mysqli_query($connection,$query);
//$count=mysqli_num_rows($selectuser);



     $row=mysqli_fetch_assoc($selectuser);
         //$username=$row['username'];
          $email=$row['email']; 
          $password=$row['password'];
          $_SESSION['pass']=$password;
          

require 'vendor/autoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "Your email id";
//Password to use for SMTP authentication
$mail->Password = "Your password";
//Set who the message is to be sent from
$mail->setFrom('Your email id', 'BookStore');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress($email);
//Set the subject line
$mail->Subject = 'Password Reset Token';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
//Replace the plain text body with one created manually
$mail->Body = 'The reset token is '.$password;
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
// if ($mail->send()) {
//     //echo "Mailer Error: " . $mail->ErrorInfo;
//     phpAlert("Message sent");
// } 
//header("Location:resettoken.php");
if (!$mail->send()) {
    //echo "Mailer Error: " . $mail->ErrorInfo;
} else {?>


<script type="text/javascript">
alert("Mail sent");
location="resettoken.php";
</script>

    <!-- echo "Message sent!";
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #} -->
<?php }
}
 ?>



<div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Forgot password</h1>
                    <form role="form" action="forgot.php" method="post" id="login-form" autocomplete="off">
                   
                        <div class="form-group">
                            <label for="username" class="sr-only">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Your Username">
                        </div>
                       
                        
                   
                   
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Send Email for password">
                    </form>