<?php
  $mysqli = mysqli_connect("localhost","root","","project");
// Check connection
  if (!$mysqli) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }

  $reciever=$_GET["person_id"];
  $sender=$_GET["sender_id"];
  $stmt="delete from friend_request where sender_id='$sender' and reciever_id='$reciever';";
  $result=mysqli_query($mysqli,$stmt);
  $stmt2="insert into friendship(person1_id,person2_id) values('$sender','$reciever');";
  $result2=mysqli_query($mysqli,$stmt2);
  $stmt3="insert into friendship(person1_id,person2_id) values('$reciever','$sender');";
  $result3=mysqli_query($mysqli,$stmt3);
  $s="select name from person where person_id='$reciever';";
  $ss=mysqli_query($mysqli,$s);
  $sss=mysqli_fetch_row($ss);
  $name=strtoupper($sss[0]);
  $disc=$name." has accepted your friend request";
  $result=mysqli_query($mysqli,$stmt);
  $stmt="insert into notifications(person_id,discription) values('$sender','$disc')";
  $result=mysqli_query($mysqli,$stmt);

  ob_start(); // ensures anything dumped out will be caught
  // do stuff here
  $url = "friend_request.php?person_id=$reciever"; // this can be set based on whatever

  // clear out the output buffer
  while (ob_get_status())
  {
    ob_end_clean();
  }

  // no redirect
  header( "Location: $url" );
?>
