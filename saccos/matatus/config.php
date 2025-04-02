<?php
     ob_start();    // Start output buffering to prevent headers already sent errors

     session_start(); // Initialize session handling for user data persistence
    
     // Set the default timezone to Nairobi, Kenya (East Africa Time, UTC+3)
     $timezone = date_default_timezone_set("Africa/Nairobi");

    // Establish database connection to MySQL
    // Parameters: host, username, password, database name
     $con = mysqli_connect("localhost", "root", "", "matatu");

     // Check if database connection failed
     if(mysqli_connect_errno()){
      // Display error message with error number if connection fails
       echo"Failed to connect: " . mysqli_connect_errno();
     }
 ?>
