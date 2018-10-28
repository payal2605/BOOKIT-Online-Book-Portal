
 <?php session_start(); ?>
 <?php ob_start();?>

 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/navigation.css">
<script>
function ajax1(){

    var req=new XMLHttpRequest();
    req.onreadystatechange=function(){
    if(req.readyState==4 && req.status==200){
      //console.log("hiii"+req.responseText);
    document.getElementById('update').innerHTML=req.responseText;

  }

  }
  req.open('GET','notify.php',true);
  req.send();


  }
  setInterval(function(){ajax1()},1000);
</script>

<script>
function ajax2(){

    var req=new XMLHttpRequest();
    req.onreadystatechange=function(){
    if(req.readyState==4 && req.status==200){
     // console.log("hiiizzz"+req.responseText);
    document.getElementById('updates').innerHTML=req.responseText;

  }

  }
  req.open('GET','individual.php',true);
  req.send();


  }
  setInterval(function(){ajax2()},1000);
</script>


 <!-- <div id="updates" onload="ajax2()"></div>   -->
  




<style>

*.icon-blue {color: #0088cc}
*.icon-grey {color: grey}
i {   
    width:100px;
    text-align:center;
    vertical-align:middle;
    position: relative;
}
.badge:after{
    content:"100";
    position: absolute;
    background: rgba(0,0,255,1);
    height:2rem;
    top:1rem;
    right:1.5rem;
    width:2rem;
    text-align: center;
    line-height: 2rem;;
    font-size: 1rem;
    border-radius: 50%;
    color:white;
    border:1px solid blue;
}
.navbar{
  padding:0px;
  margin-bottom: 0px;

}
</style>

<div style="padding-right:0px; padding-left: 0px"; onload="ajax1()">

 <nav class="navbar navbar-inverse" style="margin-bottom: 0px;">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-3">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span> 
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Brand</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse3">
          <ul class="nav navbar-nav navbar-right">
     
            
            <li><a href="main.php">Home</a></li>
          <?php if(!isset($_SESSION['username'])){?>
             <li><a href="login.php">Login</a></li>
          <?php }else{?>
           <li><a href="profile.php">Profile</a></li>

            <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" ><span  class="label label-pill label-danger count" id="update" style="border-radius:10px; display:inline;"></span>Notifications
        <span class="caret"></span></a>
        <ul class="dropdown-menu" id="updates" onload="ajax2()">
         
        </ul>
      </li>
            <!-- <li><a href="inbox.php"> </span>Inbox</a></li> -->
<?php } ?>
            <li>
              <a class="btn btn-default btn-outline btn-circle collapsed"  data-toggle="collapse" href="#nav-collapse3" aria-expanded="false" aria-controls="nav-collapse3">Search</a>
            </li>

          </ul>
          <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse3">
            <form  action="search.php"  class="navbar-form navbar-right" role="search" >
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search"  />
              </div>
              <button type="submit" name="submit" class="btn btn-danger" ><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </form>
          </div>

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
    </div>


<?php ob_end_flush();?>

