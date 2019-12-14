<?php
  $mysqli = mysqli_connect("localhost","root","","project");
// Check connection
  if (!$mysqli) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$sender=$_GET["sender_id"];
$reciever=$_GET["reciever_id"];
$stmt="insert into friend_request(sender_id,reciever_id) values('$sender','$reciever');";
$result=mysqli_query($mysqli,$stmt);
$stmt1="select name from person where person_id='$sender';";
$result1=mysqli_query($mysqli,$stmt1);
$row1=mysqli_fetch_row($result1);
$name=strtoupper($row1[0]);
$disc=$name." sent you a friend request";
$stmt2="insert into notifications(person_id,discription) values('$reciever','$disc');";
$result=mysqli_query($mysqli,$stmt2);

ob_start(); // ensures anything dumped out will be caught
// do stuff here
$url = "profile.php?person_id=$sender&view_id=$reciever"; // this can be set based on whatever

// clear out the output buffer
while (ob_get_status())
{
  ob_end_clean();
}

// no redirect
header( "Location: $url" );
?>
