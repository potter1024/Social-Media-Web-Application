<?php
  $mysqli = mysqli_connect("localhost","root","","project");
// Check connection
  if (!$mysqli) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

//$id=$_GET["view_id"];

//$stmt="select * from post where person_id in (select person2_id form friendship where person1_id=74;";
$stmt="select * from post where person_id in (
    select person1_id from friendship where person2_id=74);";
$result=mysqli_query($mysqli,$stmt);
$name=mysqli_fetch_row($result);
echo "under progress";
?>
