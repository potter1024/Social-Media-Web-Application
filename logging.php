<?php
   $email=$_GET["email"];
   $pass=$_GET["password"];
   $mysqli = mysqli_connect("localhost","root","","project");
   // Check connection
   if (!$mysqli) {
   echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
   exit();
   }
   $sss="select pass_word,count(pass_word),person_id from person where email='$email'";
   $query=mysqli_query($mysqli,$sss);
   $result=mysqli_fetch_row($query);
   if(!$result[1])
   {
     ob_start(); // ensures anything dumped out will be caught
   
   // do stuff here
     $url = "unsuccessfull.php"; // this can be set based on whatever
   
   // clear out the output buffer
   while (ob_get_status())
   {
       ob_end_clean();
     }
   
   // no redirect
   header( "Location: $url" );
   
   }
   else {
     ob_start(); // ensures anything dumped out will be caught
     echo $count;
   // do stuff here
     $url = "News_feed.php?person_id=$result[2]&view_id=$result[2]"; // this can be set based on whatever
   
   // clear out the output buffer
   while (ob_get_status())
   {
       ob_end_clean();
     }
   
   // no redirect
   header( "Location: $url" );
   }
?>