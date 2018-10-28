 <?php session_start(); ?>

<?php
  include "includes/db.php";
  $reciever=$_SESSION['reciever'];
  $sender=$_SESSION['username'];
  //$date=$row['Ds'];

$query = "SELECT sender,msg, Ds FROM chats WHERE (sender='$sender' AND reciever='$reciever') OR (sender='$reciever' AND reciever='$sender') ORDER BY Ds ASC ";
$result=mysqli_query($connection,$query);
  
  if(!$result){
    printf("Error: %s\n", mysqli_error($connection));
  }
 
 while($row = mysqli_fetch_array($result)){
                    
$Date= new DateTime($row['Ds']);



   ?>

<div>

				<!-- <span style="color:green;"><?php //echo $row['sender'];
?>:</span>
				<span style="color:red;"><?php //echo $row['msg'];
?></span>
				<span style="float:right;"><?php //echo $row['Ds'];
?></span> -->
     <?php if($row['sender']===$reciever){?>
            <span  class="left done"><?php echo $row['msg']?></span>
<div class="clear"> <?php echo $Date->format('d/m-H:i ');?></div>
<?php }else if($row['sender']===$sender){ ?>
<span class="right"><?php echo $row['msg']?></span>
<div class="clear" > 
</div></div>
<?php } ?>

 
<!-- <span class="left">message</span>
<div class="clear"></div>
<span class="right">message</span>
 -->

			</div>
<?php }

?>
<div id="chats"></div>
<style>

span 
            {
                display: inline-block;
                max-width: 200px;
                background-color: white;
                padding: 5px;
                border-radius: 4px;
                position: relative;
                border-width: 1px;
                border-style: solid;
                border-color: grey;
            }

            left
            {
                float: left;
            }

            span.left:after
            {
                content: "";
                display: inline-block;
                position: absolute;
                left: -8.5px;
                top: 7px;
                height: 0px;
                width: 0px;
                border-top: 8px solid transparent;
                border-bottom: 8px solid transparent;
                border-right: 8px solid white;
            }

            span.left:before
            {
                content: "";
                display: inline-block;
                position: absolute;
                left: -9px;
                top: 7px;
                height: 0px;
                width: 0px;
                border-top: 8px solid transparent;
                border-bottom: 8px solid transparent;
                border-right: 8px solid black;
            }

            span.right:after
            {
                content: "";
                display: inline-block;
                position: absolute;
                right: -8px;
                top: 6px;
                height: 0px;
                width: 0px;
                border-top: 8px solid transparent;
                border-bottom: 8px solid transparent;
                border-left: 8px solid #dbedfe;
            }

            span.right:before
            {
                content: "";
                display: inline-block;
                position: absolute;
                right: -9px;
                top: 6px;
                height: 0px;
                width: 0px;
                border-top: 8px solid transparent;
                border-bottom: 8px solid transparent;
                border-left: 8px solid black;
            }

            span.right
            {
                float: right;
                background-color: #dbedfe;
            }

            .clear
            {
                clear: both;
                margin-bottom: 15px;
            }
            </style>
<script>

         
