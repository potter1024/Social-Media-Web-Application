


 <!DOCTYPE html>
 <html lang="en">

 <head>
   <!-- meta -->

   <style>
   ul {



   list-style-type: none;
   margin: 0;
   padding: 0;
   overflow: hidden;
   background-color: #333;
   position: fixed;
   top: 0;
   width: 100%;
 }

 li {
   float: left;
 }

 li a {
   display: block;
   color: white;
   text-align: center;
   padding: 14px 16px;
   text-decoration: none;
 }

 /* Change the link color to #111 (black) on hover */
 li a:hover {
   background-color: #111;
 }
   </style>

   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">

   <title><?php

     $mysqli = mysqli_connect("localhost","root","","project");

   // Check connection
     if (!$mysqli) {
     echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
     exit();
     }
     else {
         $name=$_GET["name"];
         $name=strtoupper($name);
         echo $name;

}

?>&mdash; Social Media
   </title>
   <meta content="" name="keywords">
   <meta content="" name="description">

   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">

   <!-- Bootstrap CSS File -->
   <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

   <!-- Libraries CSS Files -->
   <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
   <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
   <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
   <link href="lib/hover/hover.min.css" rel="stylesheet">

   <!-- Main Stylesheet File -->
   <link href="css/style.css" rel="stylesheet">

   <!-- Responsive css -->
   <link href="css/responsive.css" rel="stylesheet">

   <!-- Favicon -->
   <link rel="shortcut icon" href="images/favicon.png">



   <!-- =======================================================
     Theme Name: Folio
     Theme URL: https://bootstrapmade.com/folio-bootstrap-portfolio-template/
     Author: BootstrapMade.com
     Author URL: https://bootstrapmade.com
   ======================================================= -->
 </head>

 <body>

   <!-- start section navbar -->

   <?php
     $mysqli = mysqli_connect("localhost","root","","project");

   // Check connection
     if (!$mysqli) {
     echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
     exit();
     }
     else {
         $name=$_GET["name"];
         $email=$_GET["email"];
         $phone=$_GET["phone"];
         $gender=$_GET["gender"];
         $dob=$_GET["dob"];
         $pass=$_GET["password"];
         $stmt="insert into person(date_of_birth,name,email,phone_number,gender,pass_word) values('$dob','$name','$email','$phone','$gender','$pass');";
         $result=mysqli_query($mysqli,$stmt);

         $stmt2="select person_id from person where name='$name' and email='$email';";
         $query=mysqli_query($mysqli,$stmt2);
         $row = mysqli_fetch_row($query);

         if(!$result)
         {

           ?>
           <center>
             <H1> TRY AGAIN </H1>
           </center>
           <?php
           ob_start(); // ensures anything dumped out will be caught

       // do stuff here
           $url = "index.html"; // this can be set based on whatever

       // clear out the output buffer
         while (ob_get_status())
         {
             ob_end_clean();
           }

       // no redirect
         header( "Location: $url" );



         }
     }
    ?>



<ul>


   <li>
    <a href="profile.php?person_id=<?php echo $row[0] ?>&view_id=<?php echo $row[0] ?>"><?php $name=strtoupper($name); echo $name ?></a>
   </li>

   <li>
    <a href="notifications.php?person_id=<?php echo $row[0] ?>">Notifications</a>
   </li>

   <li>
    <a href="posting.php?person_id=<?php echo $row[0] ?>">Post Here</a>
   </li>

   <li>
    <a href="News_feed.php?person_id=<?php echo $row[0] ?>">News Feed</a>
   </li>

   <li>
    <a href="people.php?person_id=<?php echo $row[0] ?>">People</a>
   </li>

   <li>
    <a href="friends.php?person_id=<?php echo $person_id ?>">Friends</a>
   </li>
   
   <li>
    <a href="people_you_may_know.php?person_id=<?php echo $row[0] ?>">People you may know</a>
   </li>

   <li>
    <a href="friend_request.php?person_id=<?php echo $row[0] ?>">Friend Requests</a>
   </li>

   <li>
    <a href="thank_you.php?person_id=<?php echo $row[0] ?>">About</a>
   </li>

   <li>
    <a href="index.html">Logout</a>
   </li>

   </ul>
   </ul>



















 <br><br><br><br><br><br><br><br><br>
   <h1 class="mb-30" align="center">REGISTERED SUCCESSFULLY</h1>
   <br><br><br><br><br><br><br><br><br>



   <div id="services">
     <div class="container">

 <br><br>
         <div class="services-carousel owl-theme">
           <div class="services-block">

             <i class="ion-ios-people-outline"></i>
             <span>Make Friends</span>
             <p class="separator">Make as many friends as you wish by just sending friend requests. </p>

           </div>

           <div class="services-block">

             <i class="ion-ios-albums-outline"></i>
             <span>Share Memes</span>
             <p class="separator">Post a meme and your friends can view them</p>

           </div>

           <div class="services-block">

             <i class="ion-ios-time-outline"></i>
             <span>Enjoy your time</span>
             <p class="separator">Spend quality time by sharing and viewing each other's posts</p>

           </div>

           <div class="services-block">

             <i class="ion-ios-chatboxes"></i>
             <span>Comment on posts</span>
             <p class="separator">You can comment and see other's comments on any posts you are viewing</p>

           </div>

           <div class="services-block">

             <i class="icon ion-ios-star"></i>
               <span>Like posts</span>
             <p class="separator">You can like any posts and see the people who have liked the post</p>

           </div>

           <div class="services-block">

             <i class="icon ion-ios-color-filter"></i>
               <span>Get notifications</span>
             <p class="separator">Get notifications of the friend requests recieved, accepted and when your friends upload a post</p>

           </div>

           <div class="services-block">

             <i class="icon ion-ios-contact"></i>
               <span>Personalised Profile Page</span>
             <p class="separator">Every user has a personalised profile page which will show every activity of the user on the website</p>

           </div>

     </div>

   </div>
   <!-- start section about us -->
   <!-- End section header -->

   <!-- start sectoion contact -->



   <!-- end section about us -->


   <!-- start section services -->

   <!-- end section services -->


   <!-- start section portfolio -->


   <!-- start section footer -->
   <div id="footer" class="text-center">
     <div class="container">


     <!--  <p>&copy; Copyrights Folio. All rights reserved.</p> -->

       <div class="credits">
         <!--
           All the links in the footer should remain intact.
           You can delete the links only if you purchased the pro version.
           Licensing information: https://bootstrapmade.com/license/
           Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Folio
         -->
         <br>
         Created by <a href="http://www.github.com/potter1024">Rishab Kumar</a>
       </div>

     </div>
   </div>
   <!-- End section footer -->

   <!-- JavaScript Libraries -->
   <script src="lib/jquery/jquery.min.js"></script>
   <script src="lib/jquery/jquery-migrate.min.js"></script>
   <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="lib/typed/typed.js"></script>
   <script src="lib/owlcarousel/owl.carousel.min.js"></script>
   <script src="lib/magnific-popup/magnific-popup.min.js"></script>
   <script src="lib/isotope/isotope.pkgd.min.js"></script>

   <!-- Contact Form JavaScript File -->

   <!-- This is a total fucked up line
   <script src="contactform/contactform.js"></script>
   -->
   <!-- Template Main Javascript File -->
   <script src="js/main.js"></script>

 </body>

 </html>
