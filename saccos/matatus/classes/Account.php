<?php
       class Account{
         private $con;          // Database connection object
         private $errorArray;   // Array to store validation errors

         // Constructor to initialize database connection and error array
         public function __construct($con) {  
            $this->con = $con;                // Set database connection
            $this->errorArray = array();      // Initialize empty error array
         }

         // Login function to authenticate user
         public function login($un, $pw){
           $pw = md5($pw);        // Encrypt password using MD5 (Note: MD5 is outdated, consider stronger hashing)
           // Query to check if username and password match (Note: Vulnerable to SQL injection)
           $query = mysqli_query($this->con, "SELECT * FROM users WHERE username = '$un' AND password = 'pw'");
           if(mysqli_num_rows($query) == 1){    // If exactly one record is found
             return true;                       // Login successful
           }
           else {
             array_push($this->errorArray,Constants::$loginFailed); // Add login failed error
             return false;            // Login failed
           }
         }

         // Registration function to handle new user signup
          public function register($un, $fn, $ln, $em, $em2, $pw, $pw2) {
            $this->validateUsername($un);   // Validate username
            $this->validateFirstName($fn);  // Validate first name
            $this->validateLastName($ln);   // Validate last name)
            $this->validateEmails($em, $em2); // Validate emails
            $this->validatePasswords($pw, $pw2);  // Validate passwords

            if(empty($this->errorArray) == true){ // If no validation errors
              // Insert user details into database
            return $this->insertUserDetails($un, $fn, $ln, $em, $pw);
          }
          else{
            return false; // Registration failed due to validation errors
          }

          }
          // Function to retrieve and format error messages
          public function getError($error) {
            // Check if error exists in error array
            if(!in_array($error, $this->errorArray)){ 
              $error = "";    // Clear error if not found
            }
           return "<span class='errorMessage'>$error</span>"; // Return formatted error message
         }

         // Private method to insert user details into database
         private function insertUserDetails($un, $fn, $ln, $em, $pw){
          $encryptedPw = md5($pw);  // Encrypt password (Note: MD5 is not secure)
          $profilePic = "assets/images/profile-pics/light.jpeg";  // Default profile picture
          $date = date("Y-m-d");  // Current date in YYYY-MM-DD format
          // Insert user data into database (Note: Vulnerable to SQL injection)
          $result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')");
          return $result;   // Return query result
         }

         // Validate username length and uniqueness
          private function validateUsername($us){
            if(strlen($un) >25 || strlen($un) < 5){ // Check username length
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
            }
            // Check if username already exists
              $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username= '$un'");
              if(mysqli_num_rows($checkUsernameQuery) != 0) {
                array_push($this->errorArray, Constants::$usernameTaken);
                return;
              }
         }

         // Validate first name length
          private function validateFirstName($fn){
            if(strlen($fn) >25 || strlen($fn) < 5){   // Check first name length
            array_push($this->errorArray, constant::$firstNameCharacters);
            return;
            }
         }

         // Validate last name length
          private function validateLastName($ln){
            if(strlen($ln) >25 || strlen($ln) < 5){ // Check last name length
            array_push($this->errorArray, Constants::$lastNameCharacters);
            return;
            }
         }

         // Validate email matching and format
          private function validateEmails($em, $em2){
            if($em != $em2) { // Check if emails match
              array_push($this->errorArray,Constantss::$emailsDoNotMatch);
              return;
            }
            if(!filter_var($em, FILTER_VALIDATE_EMAIL)){  // Validate email format
              array_push($this->errorArray,Constants::$emailInvalid);
            }

            // Check if email is already taken
            $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email= '$em'");
            if(mysqli_num_rows($checkEmailQuery) != 0) {
              array_push($this->errorArray, Constants::$emailTaken);
              return;
            }
         }

         // Validate password matching, characters, and length
          private function validatePasswords($pw, $pw2){
            if($pw != $pw2){    // Check if passwords match
            array_push($this->errorArray,Constants::$passwordsDoNotMatch);
            return;
            }
            if(preg_match('/[^A-Za-z0-9]/', $pw)){  // Check for non-alphanumeric characters
            array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
            return;
            }
            if(strlen($pw) >20 || strlen($pw) < 8){  // Check password length
            array_push($this->errorArray,Constants::$passwordCharaters);
            return;
            }
         }
       }

 ?>
