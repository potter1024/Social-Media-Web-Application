<!DOCTYPE html>
<html lang="en">
   <head>
      <?php
         $mysqli = mysqli_connect("localhost","root","","project");
         
         // Check connection
         if (!$mysqli) {
         echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
         exit();
         }
         else {
         
             $id=$_GET["person_id"];
             $stmt="select * from post where person_id in (
                 select person1_id from friendship where person2_id='$id') order by date_created desc;";
              $result = mysqli_query($mysqli,$stmt);
         
         
             $sss="select name from person where person_id='$id';";
             $result2=mysqli_query($mysqli,$sss);
             $name=mysqli_fetch_row($result2);
             $name=$name[0];
             $name=strtoupper($name);
         
         
         
         }
         ?>
      <title><?php echo $name ?> &mdash; Social Media</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--===============================================================================================-->
      <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="css/util.css">
      <link rel="stylesheet" type="text/css" href="css/main.css">
      <!--===============================================================================================-->
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
      <title>Folio - Personal Portfolio Template</title>
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
   </head>
   <body>
      <ul class="fixedElement">
         <?php
            $mysqli = mysqli_connect("localhost","root","","project");
            // Check connection
            if (!$mysqli) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
            }
            
            $person_id=$_GET["person_id"];
            $name1="select name from person where person_id='$person_id'";
            $result21=mysqli_query($mysqli,$name1);
            $name1=mysqli_fetch_row($result21);
            $name1=strtoupper($name1[0]);
            ?>
         <li>
            <a href="profile.php?person_id=<?php echo $person_id ?>&view_id=<?php echo $person_id ?>"><?php echo $name1 ?></a>
         </li>
         </li>
         <li>
            <a href="notifications.php?person_id=<?php echo $person_id ?>">Notifications</a>
         </li>
         <li>
            <a href="posting.php?person_id=<?php echo $person_id ?>">Post Here</a>
         </li>
         <li>
            <a href="News_feed.php?person_id=<?php echo $person_id ?>">News Feed</a>
         </li>
         <li>
            <a href="people.php?person_id=<?php echo $person_id ?>">People</a>
         </li>
         <li>
            <a href="friends.php?person_id=<?php echo $person_id ?>">Friends</a>
         </li>
         <li>
            <a href="people_you_may_know.php?person_id=<?php echo $person_id ?>">People you may know</a>
         </li>
         <li>
            <a href="friend_request.php?person_id=<?php echo $person_id ?>"><font color=#c4a747>Friend Requests</font></a>
         </li>
         <li>
            <a href="thank_you.php?person_id=<?php echo $person_id ?>">About</a>
         </li>
         <li>
            <a href="index.html">Logout</a>
         </li>
      </ul>
      <br><br>
      <center>
         <table>
            <thead class >
               <tr class="table100-head" >
                  <th class="column1">NAME</th>
                  <th class="column2">NUMBER OF POSTS</th>
                  <th class="column3">NUMBER OF FRIENDS</th>
                  <th class="column4">DATE SENT</th>
                  <th class="column5"></th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $mysqli = mysqli_connect("localhost","root","","project");
                  $id=$_GET['person_id'];
                  // Check connection
                  if (!$mysqli) {
                  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                  exit();
                  }
                  $stmt = "select sender_id,date_sent from friend_request where reciever_id='$id' order by date_sent desc;";
                  $query=mysqli_query($mysqli,$stmt);
                  $count=0;
                  while ($row = mysqli_fetch_row($query)) {
                    $count++;
                    $stmt1 = "select name from person where person_id='$row[0]'";
                    $query1=mysqli_query($mysqli,$stmt1);
                    $row1 = mysqli_fetch_row($query1);
                    $name=strtoupper($row1[0]);
                  
                    $stmt2 = "select count(post_id) from post where person_id='$row[0]';";
                    $query2=mysqli_query($mysqli,$stmt2);
                    $row2 = mysqli_fetch_row($query2);
                  
                  
                    $stmt3 = "select count(person1_id) from friendship where person1_id='$row[0]';";
                    $query3=mysqli_query($mysqli,$stmt3);
                    $row3 = mysqli_fetch_row($query3);
                  
                  
                  ?>
               <tr>
                  <td class="column1"><?php echo $name ?></td>
                  <td class="column2"><?php echo $row2[0]?></td>
                  <td class="column3"><?php echo $row3[0] ?></td>
                  <td class="column4"><?php echo $row[1] ?></td>
                  <td class="column5">
                     <a href="accept.php?person_id=<?php echo $id?>&sender_id=<?php echo $row[0]?>">
                        Accept
                  </td>
               </tr>
               <?php }
                  ?>
            </tbody>
         </table>
         <?php
            if(!$count)
            {
              ?>
         <br><br><br><br>
         <center><h1>NO FRIEND REQUESTS</h1></center>
         <br><br><br><br>
         <?php
            }
            ?>
      </center>
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
      <!--===============================================================================================-->
      <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
      <!--===============================================================================================-->
      <script src="vendor/bootstrap/js/popper.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <!--===============================================================================================-->
      <script src="vendor/select2/select2.min.js"></script>
      <!--===============================================================================================-->
      <script src="js/main.js"></script>
   </body>
</html>