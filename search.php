


<?php include "includes/navsearch.php" ?>
<?php  include "includes/db.php"; ?>

<link rel="stylesheet" href="css/navigation.css">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<?php $_SESSION['url'] = $_SERVER['REQUEST_URI'];?>


<style>

 .product_view .modal-dialog{max-width: 800px; width: 100%;}
        .pre-cost{text-decoration: line-through; color: #a5a5a5;}
        .space-ten{padding: 10px 0;}

</style>



<div class="container" style="margin-top: 30px;">
    <div class="row">
    <?php 
//$username=$_SESSION['username'];  

     if(isset($_GET['search'])) {
       $search = $_GET['search'];
       if($search===''){
    echo "<h1>Search Again</h1>";

       }else{

         if(!isset($_SESSION['username'])){
   $query = "SELECT * FROM posts WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
 }else{
  $username=$_SESSION['username'];
  $query ="SELECT * from posts WHERE (title LIKE '%$search%' OR description LIKE '%$search%') and sender <> '$username'";
 }

  $search_query = mysqli_query($connection, $query);
   $count = mysqli_num_rows($search_query);
                    if($count == 0) {
                        echo "<h1>Unable to find '$search'<?h1>";
                    } else {

        
  while($row = mysqli_fetch_assoc($search_query)) {
$id=$row['id'];
$title=$row['title'];
$image=$row['image'];
$sender=$row['sender'];
$price=$row['price'];
$city=$row['city'];
$description=$row['description'];

$querys = "SELECT * FROM users WHERE username='$sender' ";
  $selectusers = mysqli_query($connection, $querys);
  if(!$selectusers){
    printf("Error: %s\n", mysqli_error($connection));
  }
  $row = mysqli_fetch_array($selectusers);
                    $userid=$row['id'];
         ?>
        
    
        <div class="col-md-4">
              <div class="thumbnail">
                <img src="/books/images/<?php echo $image ?>" alt="" class="img-responsive">
                <div class="caption">
                  <h4 class="pull-right">Rs<?php echo $price ?></h4>
                  <h4><a href="#"><?php echo $title ?></a></h4>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
                <div class="ratings">
                  <p>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                     (15 reviews)
                  </p>
                </div>
                <div class="space-ten"></div>
                <div class="btn-ground text-center">
                 
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-id="'.$row['ID'].'" data-target="#product_view<?php echo $id?>"><i class="fa fa-search"></i> Quick View</button>
                </div>
                <div class="space-ten"></div>
              </div>
            </div>
        

           
 
 

<div class="modal fade product_view" id="product_view<?php echo $id ?>">
 
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>

                <h3 class="modal-title"> <?php echo $title ?></h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 product_img">
                        <img src="/books/images/<?php echo $image ?>" class="img-responsive">
                    </div>
                    <div class="col-md-6 product_content">
                        <h4>Product Id: <span><?php echo $id ?></span></h4>
                        <div class="rating">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            (10 reviews)
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <h3 class="cost"><i class="fas fa-rupee-sign"></i>Rs<?php echo $price ?> <small class="pre-cost"> </small></h3>
                        <div class="row">
                            <div >
                               <h3><p> City: <?php echo $city ?></p></h3>
                            </div>
                            <!-- end col -->
                            <div>
                                 <?php if(isset($_SESSION['username'])){
                                     if($_SESSION['username']===$sender){?>
                                     <h3>Thanks for sharing an ad on our website</h3>
                                    <?php }else{ ?> 
                                      <h3>Posted by <a href="users.php?id=<?php echo $userid ?>"><?php echo $sender ?></a></h3>
                                     <?php }}else{?>
                                      <h3>Posted by <?php echo $sender ?></h3>
                                      <?php } ?>

                            </div>
                            <!-- end col -->
                            <div class="col-md-4 col-sm-12">
                               
                            </div>
                            <!-- end col -->
                        </div>
                        <div class="space-ten"></div>
                        <div class="btn-ground">
                          <?php if(isset($_SESSION['username'])){
                                     if($_SESSION['username']===$sender){?>
                                      <button type="button" class="btn btn-success btn-sm"><i class="fa fa-search"></i> Edit</button>
                 
         <button type="button" class="btn btn-danger btn-sm" ><a href="profile.php?delete=<?php echo $id?>" style="color:white";></i> Delete</a></button>
         <?php }else{
                     ?>
                            <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-glyphicon glyphicon-envelope"></span><a href="message.php?id=<?php echo $userid ?>" style="color:white";> Message the person<a></button>
                           <?php  }}else{ ?>
                            <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-glyphicon glyphicon-envelope"></span> <a href="message.php?id=<?php echo $userid ?>" style="color:white";> Login to Chat With <?php echo $sender ?></a></button>
                           <?php } ?>
                           
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
       
</div>

   <?php }}} ?>
   </div>
</div>
<?php }   echo "Showing $count result";  ?>