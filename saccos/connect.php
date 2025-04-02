<?php
// Define database username
$us = 'root';   // Typically the default MySQL username
// Define database password
$pw =''; // Empty password (Note: Not secure for production)

// Attempt to establish database connection to MySQL
// Parameters: host, username, password, [?], [?], database name
$db = mysqli_connect('localhost','root', '', $us, $pw, 'matatu') or die ("unable to connect");

// Output success message if connection is established
echo "connected successfully";
 ?>
