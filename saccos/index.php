<?php
// Include configuration file
include("matatus/config.php");
// Commented out session_destroy() - would end the current session if uncommented
//session_destroy(); LOGOUT

// Check if user is logged in via session variable
if(isset($_SESSION['userLoggedIn'])){
  // Store logged-in username from session
  $userLoggedIn = $_SESSION['userLoggedIn'];
}
else{
  // Redirect to registration page if no user is logged in
  header("Location: register.php");
  exit(); // to prevent further execution
}
?>
<html>
 <head>
  <title>Welcome to php/css/js/MySQL</title>
  <link rel="stylesheet" href="assets/css/style.css">
 </head>
 <body>
 <header>
   <div class="wrapper">
     <div class="logo">
       <image src="assets/images/logo.jpeg" alt="">
     </div>
     <ul class="nav-area">
       <li><a href="">HOME</a></li>
       <li><a href="register.php">ADMIN</a></li>
       <li><a href="">SACCOS</a></li>
       <li><a href="">FIND</a></li>
       <li><a href="">VIEWS</a></li>
       <li><a href="">ABOUT US</a></li>
       <li><a href="">CONTACT US</a></li>
     </ul>
   <div class= "welcome-text">
     <h1>The Simple Demonstration Functionality</h1>
     <a>Play around with the code, debug, conect to db</a>

   </div>

 </header>
</body>
</html>
