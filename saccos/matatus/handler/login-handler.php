<?php
// Check if the login form was submitted
if(isset($_POST['LoginButton'])){ // Verify if login button was pressed
  // Retrieve username from form submission
  $username = $_POST['loginUsername'];

  // Retrieve password from form submission
  // Note: Typo 'loginPasswaord' should be 'loginPassword'
  $password = $_POST['loginPassword'];


  // Attempt to log in using Account class method
  $result = $account->login($username, $password);

  // Check if login was successful
  if($result == true){
    // Set session variable with username for logged-in state
    $_SESSION['userLoggedIn']= $username;

    // Redirect to index.php page
  header("Location: index.php");
  exit(); //to prevent further execution
  }
}
 ?>
