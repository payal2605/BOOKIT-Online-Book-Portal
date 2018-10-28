<?php  include "includes/db.php"; ?>
<?php session_start(); ?>
<?php

    if(isset($_POST['submit'])) {

$id= $_SESSION['username'];
echo $id;

 $profileimage = $_FILES['Image']['name'];
         $profileimagetemp = $_FILES['Image']['tmp_name'];

 move_uploaded_file($profileimagetemp, "upload/$profileimage");
 $query="UPDATE users SET profile ='$profileimage' WHERE username ='$id' ";

        $update_post_query = mysqli_query($connection, $query);
if($update_post_query){
    echo "Done";
   header("Location:profile.php");
}

    }

?>
   


<?php include "includes/navigationprofile.php" ?>

<link rel="stylesheet" href="css/profile.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>



<div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Upload profile picture</h1>
                    <form role="form" action="upload.php" method="post" id="login-form" autocomplete="off" enctype="multipart/form-data">
                    
                         <div class="form-group">
                            <label for="password" class="sr-only">	Profile Image</label>
                            <input type="File" required="true" name="Image" id="key" class="form-control" placeholder="Upload Image">
                        </div>
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Upload">
</form>

</div>
</div>
</div>
</div>
</section>
</div>