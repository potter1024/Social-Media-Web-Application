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
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="fonts/icomoon/style.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/jquery-ui.css">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="css/jquery.fancybox.min.css">
      <link rel="stylesheet" href="css/bootstrap-datepicker.css">
      <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
      <link rel="stylesheet" href="css/aos.css">
      <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="css/style1.css">
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
      <style>
         .dot {
         height: 25px;
         width: 25px;
         background-color: #34ab3f;
         border-radius: 50%;
         display: inline-block;
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
      <style>
         .dot {
         height: 25px;
         width: 25px;
         background-color: #34ab3f;
         border-radius: 50%;
         display: inline-block;
         }
      </style>
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
         
         $id=$_GET["view_id"];
         $person_id=$_GET["person_id"];
         
         $stmt="select * from post where person_id='$id' order by date_created desc;";
         $result=mysqli_query($mysqli,$stmt);
         $name="select name from person where person_id='$id'";
         $result2=mysqli_query($mysqli,$name);
         $name=mysqli_fetch_row($result2);
         $name=strtoupper($name[0]);
         $name1="select name from person where person_id='$person_id'";
         $result21=mysqli_query($mysqli,$name1);
         $name1=mysqli_fetch_row($result21);
         $name1=strtoupper($name1[0]);
         ?>
      <ul>
         <li>
            <a href="profile.php?person_id=<?php echo $person_id ?>&view_id=<?php echo $person_id ?>"><font color=#c4a747><?php echo $name1 ?></font></a>
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
            <a href="friend_request.php?person_id=<?php echo $person_id ?>">Friend Requests</a>
         </li>
         <li>
            <a href="thank_you.php?person_id=<?php echo $person_id ?>">About</a>
         </li>
         <li>
            <a href="index.html">Logout</a>
         </li>
      </ul>
      <br><br><br>
      <center>
         <h1> <?php echo $name ?></h1>
         <?php
            $friend="select count(person2_id) from friendship where person1_id='$person_id' and person2_id='$id'";
            $friend1=mysqli_query($mysqli,$friend);
            $friend2=mysqli_fetch_row($friend1);
            
            $friends="select count(sender_id) from friend_request where sender_id='$person_id' and reciever_id='$id'";
            $friends1=mysqli_query($mysqli,$friends);
            $friends2=mysqli_fetch_row($friends1);
            if($friends2[0] && $id!=$person_id)
            {
            ?>
         <br>
         <form action="unrequesting.php">
            <div class="row">
               <div class="col-lg-6">
                  <input type="button" class="btn btn-success" value="FRIEND REQUEST SENT &#8987;"></button>
               </div>
               <br>
               <div class="col-lg-6">
                  <input type="submit" class="btn btn-success" value="CANCEL FRIEND REQUEST">
                  <input type="hidden" name="sender_id" value=<?php echo $person_id ?>>
                  <input type="hidden" name="reciever_id" value=<?php echo $id ?>>
               </div>
            </div>
         </form>
         <?php
            }
              else if(!$friend2[0] && $id!=$person_id)
              {
            
               ?>
         <br>
         <form action="friending.php">
            <div class="col-lg-7">
               <input type="submit" class="btn btn-success" value="SEND FRIEND REQUEST">
               <input type="hidden" name="sender_id" value=<?php echo $person_id ?>>
               <input type="hidden" name="reciever_id" value=<?php echo $id ?>>
            </div>
         </form>
         <?php
            }
            
            
            
            
            else if($id!=$person_id) {
            ?>
         <br>
         <form action="unfriending.php">
            <div class="row">
               <div class="col-lg-6">
                  <input type="button" class="btn btn-success" value="FRIENDS  &#x2705;"></button>
               </div>
               <br>
               <div class="col-lg-6">
                  <input type="submit" class="btn btn-success" value="UNFRIEND">
                  <input type="hidden" name="person1_id" value=<?php echo $person_id ?>>
                  <input type="hidden" name="person2_id" value=<?php echo $id ?>>
               </div>
            </div>
         </form>
         <?php
            }
            ?>
      </center>
      <?php
         $count=0;
          $sss="select * from post where person_id ='$id' order by date_created desc;";
           $result = mysqli_query($mysqli,$sss);
           while($post=mysqli_fetch_row($result))
           {
         
         ?>
      <div class="site-section py-0">
         <div class="site-section">
            <div class="container">
               <div class="half-post-entry d-block d-lg-flex bg-light">
                  <div class="img-bg" style="background-image: url('images/home-bg.jpg')"></div>
                  <div class="contents">
                     <h1>
                     <a href="profile.php?view_id=<?php echo $id ?> & person_id=<?php echo $person_id ?>"><span> <span class="dot"></span></span><?php echo " ".$name ?></a>
                     <h2><?php echo $post[4] ?></h2>
                     <p class="mb-3"><?php echo $post[5] ?></p>
                     <div class="post-meta">
                        <span class="date-read">Uploaded on <?php echo $post[3] ?> <span class="mx-1"></span></span>
                     </div>
                     <br>
                     <?php
                        $a="select count(like_id) from likes where liker_id='$person_id' and post_id='$post[1]';";
                        $aa=mysqli_query($mysqli,$a);
                        $aaa=mysqli_fetch_row($aa);
                        if(!$aaa[0])
                        {
                        
                        
                        
                        ?>
                     <div class="post-meta">
                        <span class="date-read">
                           <form action="liking.php">
                              <div class="row">
                                 <div class="col-lg-6">
                                    <h2>
                                       &#128156;
                                       <?php echo "  ".$post[6] ?>
                                    </h2>
                                 </div>
                                 <br>
                                 <?php
                                    $f="select count(person1_id) from friendship where person1_id='$person_id' and person2_id='$id'";
                                    $ff=mysqli_query($mysqli,$f);
                                    $fff=mysqli_fetch_row($ff);
                                    if($fff[0]){
                                    
                                      ?>
                                 <div class="col-lg-6">
                                    <input type="submit" class="btn btn-success" value="LIKE  &#128077;">
                                    <input type="hidden" name="liker_id" value=<?php echo $person_id?>>
                                    <input type="hidden" name="post_id" value=<?php echo $post[1]?>>
                                    <input type="hidden" name="poster_id" value=<?php echo $post[2]?>>
                                    <input type="hidden" name="request" value=2>
                                 </div>
                                 <?php
                                    } ?>
                              </div>
                           </form>
                           <span class="mx-1"></span>
                        </span>
                     </div>
                     <?php  }
                        else
                        {
                          ?>
                     <div class="post-meta">
                        <span class="date-read">
                           <form action="liking.php">
                              <div class="row">
                                 <div class="col-lg-6">
                                    <h2>
                                       &#128156;
                                       <?php echo "  ".$post[6] ?>
                                    </h2>
                                 </div>
                                 <br>
                                 <?php
                                    $g="select count(person1_id) from friendship where person1_id='$person_id' and person2_id='$id';";
                                    $gg=mysqli_query($mysqli,$g);
                                    $ggg=mysqli_fetch_row($gg);
                                    if($ggg[0]){
                                    ?>
                                 <div class="col-lg-6">
                                    <input type="button" class="btn btn-dark" value="LIKED ">
                                 </div>
                                 <?php } ?>
                              </div>
                           </form>
                           <span class="mx-1"></span>
                        </span>
                     </div>
                     <?php
                        }
                        
                        
                        
                          ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php
         $count++;
         
         } ?>
      <?php
         if($count==0)
         {
           ?>
      <br><br><br><br>
      <h2 align="center"> No posts to show</h2>
      <?php
         }
         
         ?>
      <br><br><br><br><br><br><br><br><br>
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
      <div id="loader" class="show fullscreen">
         <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15"/>
         </svg>
      </div>
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/jquery-migrate-3.0.1.min.js"></script>
      <script src="js/jquery-ui.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/jquery.stellar.min.js"></script>
      <script src="js/jquery.countdown.min.js"></script>
      <script src="js/bootstrap-datepicker.min.js"></script>
      <script src="js/jquery.easing.1.3.js"></script>
      <script src="js/aos.js"></script>
      <script src="js/jquery.fancybox.min.js"></script>
      <script src="js/jquery.sticky.js"></script>
      <script src="js/jquery.mb.YTPlayer.min.js"></script>
      <script src="js/main1.js"></script>
   </body>
</html>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- meta -->
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
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
      <!-- start section navbar -->
      <?php
         $mysqli = mysqli_connect("localhost","root","","project");
         // Check connection
         if (!$mysqli) {
         echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
         exit();
         }
         
         $id=$_GET["view_id"];
         $person_id=$_GET["person_id"];
         
         $name="select name from person where person_id='$id'";
         $result2=mysqli_query($mysqli,$name);
         $name=mysqli_fetch_row($result2);
         $name=strtoupper($name[0]);
         $name1="select name from person where person_id='$person_id'";
         $result21=mysqli_query($mysqli,$name1);
         $name1=mysqli_fetch_row($result21);
         $name1=strtoupper($name1[0]);
         ?>
      <ul>
         <li>
            <a href="profile.php?person_id=<?php echo $person_id ?>&view_id=<?php echo $person_id ?>"><?php echo $name1 ?></a>
         </li>
         <li>
            <a href="notifications.php?person_id=<?php echo $person_id ?>">Notifications</a>
         </li>
         <li>
            <a href="posting.php?person_id=<?php echo $person_id ?>"><font color=#c4a747>Post Here</font></a>
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
            <a href="friend_request.php?person_id=<?php echo $person_id ?>">Friend Requests</a>
         </li>
         <li>
            <a href="thank_you.php?person_id=<?php echo $person_id ?>">About</a>
         </li>
         <li>
            <a href="index.html">Logout</a>
         </li>
      </ul>
      <br><br><br><br>
      <h1 align="center"> POST HERE</h1>
      <br><br><br><br>
      <center>
         <form action="successfully_posted.php?person_id=<?php echo $person_id?>&view_id=<?php echo $person_id ?>" method="get" role="form" class="contactForm">
            <div class="col-lg-7">
               <div class="form-group contact-block1">
                  <input type="text" name="title" class="form-control" id="title" placeholder="Name of Post" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
                  <div class="validation"></div>
               </div>
            </div>
            <div class="col-lg-12">
               <div class="form-group contact-block1">
                  <textarea name="discription" class="form-control" id="name" placeholder="Discription of post" style="width:800px; height:100px;"></textarea>
                  <div class="validation"></div>
               </div>
            </div>
            <h3> Upload an Image </h3>
            <br>
            <div class="col-lg-12">
               <div class="form-group contact-block1">
                  <input type="file" name="image" value="image" id="image">
                  <div class="validation"></div>
               </div>
            </div>
            <br>
            <div class="col-lg-12">
               <input type="submit" class="btn btn-success" value="POST">
            </div>
            <input type="hidden" name="person_id" value=<?php echo $person_id ?>>
            <input type="hidden" name="view_id" value=<?php echo $person_id ?>>
         </form>
         <br><br>
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