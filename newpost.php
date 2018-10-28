

<?php  include "includes/db.php"; ?>
<!-- <?php session_start(); ?> -->
<?php include "includes/navigationprofile.php" ?>

<link rel="stylesheet" href="css/profile.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<?php

    if(isset($_POST['submit'])) {

        $booktitle = $_POST['Title'];
       
         $bookimage = $_FILES['Image']['name'];
         $bookimagetemp = $_FILES['Image']['tmp_name'];
        //$bookimage = $_POST['Image'];
        $sender = $_SESSION['username'];
   
        $bookprice = $_POST['Price'];
     
        $bookcity = $_POST['City'];
      
        $bookdes = $_POST['Description'];
       

        move_uploaded_file($bookimagetemp, "images/$bookimage");

$query="INSERT INTO posts(title,image,sender,price,city,description) VALUES ('$booktitle','$bookimage','$sender','$bookprice','$bookcity','$bookdes')";

        $create_post_query = mysqli_query($connection, $query);
        // ConfirmQuery($create_post_query);

        if(!$create_post_query){
        	echo "Done";
        }

        header("Location:profile.php");
        
    }

?>
   



<div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Add new ad</h1>
                    <form role="form" action="newpost.php" method="post" id="login-form" autocomplete="off" enctype="multipart/form-data">
                    
                        <div class="form-group">
                            <label for="username" class="sr-only">Book Title</label>
                            <input type="text"  required="true" name="Title" id="username" class="form-control" placeholder="Post Title">
                        </div>
                       
                        
                         <div class="form-group">
                            <label for="password" class="sr-only">Book Image</label>
                            <input type="File" required="true" name="Image" id="key" class="form-control" placeholder="Upload Image">
                        </div>

                        <div class="form-group">
                            <label for="password" class="sr-only">Book Price</label>
                            <input type="text" required="true" name="Price" id="key" class="form-control" placeholder="Price at you want to sell in Rs">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">City</label>
                            <input type="text" required="true" name="City" id="key" class="form-control" placeholder="City">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Book Description</label>
                             <textarea placeholder="Description about your book" class="form-control" name="Description" id="" cols="30" rows="5"></textarea>
                        </div>
                   
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Add ad">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


<!-- <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>
    
   
    </div>
    
 <div class="form_group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image">
    </div>
    
    <div class="form-group">
        <label for="post_tags">Post Price</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    
    <div class="form-group">
        <label for="post_content">Post Decription</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10">
        </textarea>
    </div>
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>
</form> -->