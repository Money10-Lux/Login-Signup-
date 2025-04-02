<?php
// Function to sanitize password input by removing HTML tags
function sanitizeFormPassword($inputText){  // Removes any HTML/PHP tags from the input
  $inputText = strip_tags($inputText);      // Returns the sanitized password
  return $inputText;
}
// Function to sanitize username input
function sanitizeFormUsername($inputText){  
  $inputText = strip_tags($inputText);            // Removes any HTML/PHP tags from the input
  $inputText = str_replace(" ", "", $inputText);  // Removes all spaces from the username
  return $inputText;                              // Returns the sanitized username
}
// Function to sanitize general string inputs (like names and email)
function sanitizeFormString($inputText){
  $inputText = strip_tags($inputText);            // Removes any HTML/PHP tags from the input
  $inputText = str_replace(" ", "", $inputText);  // Removes all spaces from the string
  $inputText = ucfirst(strtolower($inputText));   // Converts to lowercase then capitalizes first letter
  return $inputText;                              // Returns the sanitized and formatted string
}

// Check if the registration form was submitted
if(isset($_POST['RegistrationButton'])){                // Verifies if registration button was pressed
  // Sanitize all form inputs using respective functions
    $username =sanitizeFormUsername($_POST['username']);  // Clean username input
    $firstName =sanitizeFormString($_POST['firstName']);  // Clean first name input
    $lastName =sanitizeFormString($_POST['lastName']);    // Clean last name input
    $email =sanitizeFormString($_POST['email']);          // Clean email input
    $email2 =sanitizeFormString($_POST['email2']);        // Clean email confirmation input
    $password =sanitizeFormPassword($_POST['password']);  // Clean password input
    $password2 =sanitizeFormPassword($_POST['password2']);// Clean password confirmation input


    // Attempt to register the user with sanitized inputs
    // Assumes $account is an object with a register method
    $wasSuccessful = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);

    // Check if registration was successful
    if($wasSuccessful == true){               // Set session variable with username
       $_SESSION['userLoggedIn']= $username;  // Redirect to index.php page
       header("Location: index.php");
       exit() ;                                // to prevent further execution
    }
}

?>
