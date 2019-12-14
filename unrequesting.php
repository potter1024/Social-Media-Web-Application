<?php
  $mysqli = mysqli_connect("localhost","root","","project");
// Check connection
  if (!$mysqli) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$sender=$_GET["sender_id"];
$reciever=$_GET["reciever_id"];
$stmt="delete from friend_request where sender_id='$sender' and reciever_id='$reciever';";
$result=mysqli_query($mysqli,$stmt);
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
