<?php
$mysqli = mysqli_connect("localhost","root","","project");

// Check connection
if (!$mysqli) {
echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
exit();
}
  $liker_id=$_GET["liker_id"];
  $post_id=$_GET["post_id"];
  $poster_id=$_GET["poster_id"];
  $request=$_GET["request"];
  echo $request;
  $s1="select name from person where person_id='$liker_id';";
  $ss1=mysqli_query($mysqli,$s1);
  $sss1=mysqli_fetch_row($ss1);
  $liker_name=strtoupper($sss1[0]);
  $s2="update post set likes=likes+1 where post_id='$post_id'";
  $ss2=mysqli_query($mysqli,$s2);
  $disc=$liker_name." liked your post";
  $s3="insert into notifications(person_id,discription) values('$poster_id','$disc');";
  $ss3=mysqli_query($mysqli,$s3);

  $s4="insert into likes(post_id,liker_id) values('$post_id','$liker_id')";
  $ss4=mysqli_query($mysqli,$s4);

  ob_start(); // ensures anything dumped out will be caught
  // do stuff here
  if($request==1)
  $url = "News_feed.php?person_id=$liker_id"; // this can be set based on whatever
  else {
    // code...
    $url = "profile.php?person_id=$liker_id&view_id=$poster_id";
  }

  // clear out the output buffer
  while (ob_get_status())
  {
    ob_end_clean();
  }

  // no redirect
  header( "Location: $url" );
 ?>
