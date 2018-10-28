
<!-- <link rel="stylesheet" href="css/profile.css"> -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>


<?php include "includes/navlogin.php" ?>
<?php  include "includes/db.php"; ?>

<!-- src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"> -->
<!-- <script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">></script> -->

<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->



<?php $_SESSION['url'] = $_SERVER['REQUEST_URI'];?>


<?php if(!isset($_SESSION['username'])){

header("Location:login.php");

      }else{

      	$sender=$_SESSION['username'];
      	//echo $sender;
      	}?>


    <?php if(isset($_GET['id'])){
    	$id=$_GET['id'];
    	
    	//$select=mysqli_query($connection,$querys);
    	$querys = "SELECT * FROM users WHERE id='$id' ";
  $selectusers = mysqli_query($connection, $querys);
  if(!$selectusers){
    printf("Error: %s\n", mysqli_error($connection));
  }


  $row = mysqli_fetch_assoc($selectusers);
     $reciever=$row['username'];
     //echo "hiii";
    // echo $reciever;
     $_SESSION['reciever']=$reciever;
     $query="UPDATE chats set notify=0 where sender='$reciever' and reciever='$sender'";
      $selectchats = mysqli_query($connection, $query);
    }
    ?>


    
		
<?php
if (isset($_POST['name'])) {
	echo "hiii";
	$name  = $_POST['name'];
	$msg   = $_POST['msg'];
	date_default_timezone_set('Asia/Kolkata');
	$date=date("Y-m-d H:i:s a");
	//echo $date;
	//echo date("Y-m-d");
	$query = "INSERT INTO chats (sender,reciever,msg,Ds,notify) values ('$name','$reciever','$msg','$date',1)";
	$result=mysqli_query($connection,$query);
	if($result){
		//$a+=1;
		//echo "done";
		//echo $a;
	}
	 // if(!$result){

	 // 	echo "nooooo";
  //   printf("Error: %s\n", mysqli_error($connection));
  // }


 
      


  //header('Location: message.php?id='.$id);

	//$run   = $connection->query($query);
	// if ($run) {
	// 	echo "<embed loop='false' src='chat.wav' hidden='true' autoplay='true'>";
	// }

}
?>







	<link rel="stylesheet" href="css/chat.css">
	<script type="text/javascript">
		function ajax(){
		var req=new XMLHttpRequest();
		req.onreadystatechange=function(){
		if(req.readyState==4 && req.status==200){
	
		document.getElementById('chat').innerHTML=req.responseText;

	}

	}
	req.open('GET','chat.php',true);
	req.send();


	}
	setInterval(function(){ajax()},1000);


	



	</script>


</head>
<!--  -->


<?php $_SESSION['re']=$reciever ?>

<body onload="ajax()">

<div class="chat_window">
<div class="top_menu">
<div class="buttons">
<div class="button close">
  
</div>
<div class="button minimize">
  
</div><div class="button maximize">
  
</div></div><div class="title"><?php echo $reciever ?></div>
</div>
<ul class="messages" id="chat">
	
</ul>
<div class="bottom_wrapper clearfix">
<div class="message_input_wrapper">
<form  id="comment_form"> 
<input type="hidden" name="name" id="name" placeholder="Enter name" value="<?php echo $sender ?>">

<input class="message_input" name="msg" id="msg" placeholder="Type your message here..." / required="true">
</div>

<input   class="send_message" type="submit" name="submit" id="button"  value="send" class="text"></div></div></div>
<div class="icon"></div>
</form> 
<div class="message_template"><li class="message"><div class="avatar"></div><div class="text_wrapper"><div class="text"></div></div></li></div>
</body>
<!-- 	<div id="container">
	<div id="chat_box">
		<div id="chat">
		</div>

	</div>
		<form method="post" action="message.php?id=<?php echo $id?>">
			<input type="hidden" name="name" placeholder="Enter name" value="<?php echo $sender ?>">
			<textarea name="msg" placeholder="Enter your message" required="true"></textarea>
			<input type="submit" name="submit" value="Sendit">

		</form>
		


</div> -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>

<script>

// jQuery(document).ready(function ($) {

//        $('#comment_form').on('submit', function(event){
//   event.preventDefault();

//  // var form_data = $(this).serialize();
//   var name= $("#name").val();
//                 var msg= $("#msg").val();

 
//   // var formData = new FormData($(this)[0])
//   // console.log(formData+"hiii");
//    $.ajax({
  
//     method:"POST",
//       data:{'name':name},
//         dataType: "json",
//           url:"insert.php",
//    //data: "name=" + name+ "&password=" + msg,
//     async: true,
//      cache: false,
//       contentType: false,
//       processData: false,
    

//     success:function(returndata)
//     {
    	
//      alert(returndata);
//     },

//                 error: function(){
//                 alert("error in ajax form submission");
//                                     }
//         });
//         return false;
//     });
// });


$(document).ready(function(){
$('#comment_form').submit(function(){

// show that something is loading
//$('#response').html("<b>Loading response...</b>");

// Call ajax for pass data to other place
$.ajax({
type: 'POST',
url: 'insert.php',
data: $(this).serialize() // getting filed value in serialize form
})
.done(function(data){ // if getting done then call.
console.log(data);
// show the response
//$('#response').html(data);

})
.fail(function() { // if fail then getting message
  $("#msg").val('');
// just in case posting your form failed
//alert( "Posting failed." );

});

// to prevent refreshing the whole page page
return false;

});
});
</script>

  
    </script>


















 <!-- action="message.php?id=<?php echo $id?>" -->
















<?php ob_start();?>