<?php include "includes/navsearch.php" ?>
<?php  include "includes/db.php"; ?>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/inbox.css">
<!------ Include the above in your HEAD tag ---------->



  



  </script>
<div class="container">
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
 <div class="mail-box">
                  <aside class="sm-side">
                      <div class="user-head">
                          <a class="inbox-avatar" href="javascript:;">
                              <img  width="64" hieght="60" src="upload/<?php echo $_SESSION['image'] ?>">
                          </a>
                          <div class="user-name">
                              <h5><a href="#"><?php echo $_SESSION['username'] ?></a></h5>
                              <span><a href="#"><?php echo $_SESSION['email'] ?></a></span>
                          </div>
                          <a class="mail-dropdown pull-right" href="javascript:;">
                              <i class="fa fa-chevron-down"></i>
                          </a>
                      </div>
                      <div class="inbox-body">
                         
                          
                      </div>
                      <ul class="inbox-nav inbox-divider">
                          <li class="active">
                              <a href="#"><i class="fa fa-inbox"></i> Inbox <span class="label label-danger pull-right">2</span></a>

                          </li> 
                          
                        
                       
                                </ul>
                     

                      <div class="inbox-body text-center">
                         
                      </div>

                  </aside>
                  <aside class="lg-side">
                      <div class="inbox-head">
                          <h3>Inbox</h3>
                         
                      </div>
                      <div class="inbox-body">
                         <div class="mail-option">
                            
                             
                            
                            
                         </div>
                          <table class="table ">
                            <tbody >
                            <tr style="background-color:#edf4f5";>
                                  <td>
                                     
                                  </td>
                                 
                                  <td class="view-message dont-show">Sender</td>
                                  <!-- <td class="view-message ">Added a new class: Login Class Fast Site</td> -->
                                  <!-- <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td> -->
                                  <td class="view-message">Time</td>
                                  <td class="view-message"><a href="#"></a>
                              </tr>

                            <?php 
                            $sender=$_SESSION['username'];

                                $query = "SELECT DISTINCT sender,reciever  FROM chats t1  WHERE t1.sender > t1.reciever OR NOT EXISTS (  SELECT * FROM chats t2 WHERE t2.sender = t1.reciever AND t2.reciever = t1.sender  ) ";
                            $selectpost = mysqli_query($connection, $query);

                            if(!$selectpost){

    echo "nooooo";
    printf("Error: %s\n", mysqli_error($connection));

  }                           

                          
                            while($row = mysqli_fetch_assoc($selectpost)) {

                               //  print_r($row);
                            //    if($row['reciever']===$reciever || $row['reciever']==$sender){
                            //    }
                            //    else{
                                 
                            //      $reciever=$row['reciever'];
                            //       $query1 = "SELECT id FROM  users Where username='$reciever' ";
                            // $selectquery = mysqli_query($connection, $query1);
                            //   $rows=mysqli_fetch_assoc($selectquery);
                            //       print_r($rows);
                            //         $id=$rows['id'];

                            
                                
                              if($row['reciever']===$sender){
                                  $send=$row['sender'];
                               // echo $send;
                             
                                 $query1 = "SELECT id FROM  users Where username='$send' ";
                                 $query2="SELECT Ds from chats where sender='$send' and reciever='$sender' order by Ds Desc limit 1";
                                 //$query2=   "SELECT id FROM  users Where username='$send' and notify=1 ";
                             $selectquery = mysqli_query($connection, $query1);
                             $selectquery2=mysqli_query($connection,$query2);
                            // $selectusers=mysqli_query($connection, $query2);
                             //$r=mysqli_fetch_assoc($selectusers);
                            // $count = mysqli_num_rows($selectusers);

                                $rows=mysqli_fetch_assoc($selectquery);
                                 $r=mysqli_fetch_assoc($selectquery2);
                              
                                 $id=$rows['id'];

                              
                                  $_SESSION['idsender']=$send;
                          
                                     
                                                 ?>
                                   

                              <tr class="unread">
                                  <td class="inbox-small-cells">
                                      
                                  </td>
                                 
                                  <td class="view-message  dont-show"><span id="updates" style="border-radius:10px; display:inline;"></span><a href="message.php?id=<?php echo $id ?>#comment_form#chats"><?php echo $send ?></a></td>
                                  <!-- <td class="view-message ">Added a new class: Login Class Fast Site</td> -->
                                  <!-- <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td> -->
                                  <td class="view-message  "><?php echo $r['Ds']?></td>
                                
                              </tr>
                              <?php }elseif($row['sender']===$sender){

                                                              
                                    
                              $send=$row['reciever'];
                                

                               
                             
                                 $query1 = "SELECT id FROM  users Where username='$send' ";
                                  $query2="SELECT Ds from chats where sender='$send' and reciever='$sender' order by Ds Desc limit 1";
                             $selectquery = mysqli_query($connection, $query1);
                                        $selectquery2=mysqli_query($connection,$query2);

                                $rows=mysqli_fetch_assoc($selectquery);
                                $r=mysqli_fetch_assoc($selectquery2);
                              
                              
                                 $id=$rows['id']; ?>


                                  <tr class="unread">
                                  <td class="inbox-small-cells">
                                      
                                  </td>
                                 
                                  <td class="view-message  dont-show"><a href="message.php?id=<?php echo $id ?>"><?php echo $send ?></a></td>
                                  <!-- <td class="view-message ">Added a new class: Login Class Fast Site</td> -->
                                  <!-- <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td> -->
                                  <td class="view-message  "><?php echo $r['Ds']?></td>
                                 
                              </tr>
   

                                <?php }}?>
                          </tbody>
                          </table>
                      </div>
                  </aside>
              </div>
</div>