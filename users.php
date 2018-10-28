<?php include "includes/navsearch.php" ?>
<?php  include "includes/db.php"; ?>

<?php if(!isset($_SESSION['username'])){

header("Location:login.php");

      }?>


<?php 

if(isset($_GET['id'])){

$senderid=$_GET['id'];
$query="SELECT * from users where id = $senderid";

$selectquery=mysqli_query($connection,$query);

if(!$selectquery){
	 echo mysqli_error($connection);
}

$row=mysqli_fetch_assoc($selectquery);

$username=$row['username'];
$profileimage=$row['profile'];







}?>


<link rel="stylesheet" href="css/profile.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
* {
    box-sizing: border-box;
}

body {
    background-color:#f5f9fb;
  
    font-family: Arial;
}

/* Center website */
.main {
    max-width: 1000px;
    margin: auto;
}

h1 {
    font-size: 50px;
    word-break: break-all;
}

.row {
    margin: 8px -16px;
}

/* Add padding BETWEEN each column */
.row,
.row > .column {
    padding: 8px;
}

/* Create four equal columns that floats next to each other */
.column {
    float: left;
    width: 25%;
}

/* Clear floats after rows */ 
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Content */
.content {
    background-color: white;
    padding: 10px;
}

/* Responsive layout - makes a two column-layout instead of four columns */
@media screen and (max-width: 900px) {
    .column {
        width: 50%;
    }
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .column {
        width: 100%;
    }
}
.flexMe{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-between;
}

.flexMe li{
    width: 100px; 
    height: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.flexMe li img{
    width: 100%; 
    height: auto;
}
</style>

<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img class="rounded-circle  img-responsive img-center"  src="upload/<?php echo $profileimage ?>" style ="margin-top:10px; background:#F5F5F5; width:200px; height:200px;" alt="" >
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php $_SESSION['username']; ?>
					</div>
					<div class="profile-userbuttons">
				
				</div>
				</div>

						<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							
						</li>
						<li>
							
						</li>
						<li>
							
						</li>
						<li>
						
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>

			<div class="col-md-9">
            <div class="profile-content">
			   <div class="row">
			   <div class="jumbotron jumbotron-fluid" style="background:#f5fcfd">
  <div class="container">
    <h2 class="display-4">You can see <?php echo $username ?>'s other ads</h2>
    <p class="lead"></p>
  </div>
</div>


<div class="container" >
    <div class="row">
  <?php 
	
  $query = "SELECT * FROM posts WHERE sender= '$username'  ";
  $selectpostbyname = mysqli_query($connection, $query);
  while($row = mysqli_fetch_assoc($selectpostbyname)) {
     $id=$row['id'];
  	 $title = $row['title'];
  	 $image=$row['image'];
  	 $price=$row['price'];
  	 $city=$row['city'];
  	 $bookdes=$row['description'];
  	 ?>

        <div >
              <div class="thumbnail" style="width:50%; margin-left: 10%">
                <img src="/books/images/<?php echo $image ?>" alt="" class="img-responsive">
                <div class="caption">
                <h4 class="pull-right">Rs<?php echo $price ?></h4>
                  
                  <h4><a href="#"><?php echo $title ?></a></h4>
                  <p><?php echo $bookdes?></p>
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
                               
                            </div>
                            <!-- end col -->
                            <div class="col-md-4 col-sm-12">
                               
                            </div>
                            <!-- end col -->
                        </div>
                        <div class="space-ten"></div>
                        <div class="btn-ground">
                            <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-glyphicon glyphicon-envelope"></span><a href="message.php?id=<?php echo $senderid ?>"  style="color:white;"> Message the person</a></button>
                           
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
       
</div>

   <?php } ?>
   </div>
</div>
	  
</div>
            </div>
		</div>
	</div>
</div>
<center>
<strong>Powered by <a href="http://j.mp/metronictheme" target="_blank">KeenThemes</a></strong>
</center>
<br>
<br>