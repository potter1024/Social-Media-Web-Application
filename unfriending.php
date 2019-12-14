<?php
  $mysqli = mysqli_connect("localhost","root","","project");
// Check connection
  if (!$mysqli) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$person1=$_GET["person1_id"];
$person2=$_GET["person2_id"];
$stmt="delete from friendship where person1_id='$person1' and person2_id='$person2'";
$result=mysqli_query($mysqli,$stmt);
$stmt2="delete from friendship where person1_id='$person2' and person2_id='$person1'";
$result2=mysqli_query($mysqli,$stmt2);
ob_start(); // ensures anything dumped out will be caught
// do stuff here
$url = "profile.php?person_id=$person1&view_id=$person2"; // this can be set based on whatever

// clear out the output buffer
while (ob_get_status())
{
  ob_end_clean();
}

// no redirect
header( "Location: $url" );
?>
