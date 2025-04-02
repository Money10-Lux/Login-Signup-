<?php
// Include necessary configuration and class files
include("matatus/config.php");            // Database connection settings
include("matatus/classes/Account.php");   // Account class for user management
include("matatus/classes/Constants.php"); // Constants for error messages
//include("connect.php")                // Commented out additional connection file

// Create new Account object with database connection
$account = new Account($con);

// Include handler files for registration and login processing
include("matatus/handler/register-handler.php");
include("matatus/handler/login-handler.php");

// Function to retain form input values after submission
function getInputValue($name) {
  if(isset($_POST[$name])) {  // Check if POST variable exists
      echo $_POST[$name];     // Echo the value to populate form field
  }
}

?>
<html>
 <head>
  <title> Welcome to our page </title>
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>

 </head>
  <body>
    <?php
    // PHP block to toggle between login and register forms
     if(isset($_POST['registerButton'])){       // If register button was clicked
      // JavaScript to hide login form and show register form
          echo '  <script>
                 $(document).ready(function() {
                 $("#loginForm").hide();
                 $("#registerForm").show();
                });
                </script>';
      }
      else{ // Default state: show login form
        // JavaScript to show login form and hide register form
        echo '  <script>
               $(document).ready(function() {
               $("#loginForm").show();
               $("#registerForm").hide();
              });
              </script>';
      }
     ?>


      <div id="background">
      <div id="loginContainer">
        <div id="inputContainer">
        <form id="loginForm" action="register.php" method="POST">
          <h3><b>Log in to your account</b></h3>
          <p>
              <?php echo $account->getError(Constants::$loginFailed); ?>
              <label for="loginUsername">Username</label>
              <input id="loginUsername" name="loginUsername" type="text" placeholder=" " value="<?php getInputValue('loginUsername') ?>" required>
          </p>
            <p>
              <label for="loginPassword">Password</label>
              <input id="loginPassword" name="loginPassword" type="password" placeholder=" " required>
            </p>
              <button type="submit" name="loginButton">LOG IN</button>
              <div class ="hasAccountText">
                <span id ="hideLogin">Don't have an account yet?<b> Sign Up here.</b></span>
              </div>

            </form>

            <form id="registerForm" action="register.php" method="POST">
              <h3><b>Create sacco account</b></h3>
              <p>
                 <?php echo $account->getError(Constants::$usernameCharacters); ?>
                  <?php echo $account->getError(Constants::$usernameTaken); ?>
                <label for="username">Username</label>
                <input id"username" name="username" type="text" value="<?php getInputValue('username')?>" required>
               </p>
                <p>
                <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                <label for="firstName">First name</label>
                <input id"firstName" name="firstName" type="text" value="<?php getInputValue('firstName')?>" required>
                </p>
                <p>
                  <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                  <label for="lastName"> Last name</label>
                  <input id="lastName" name="lastName" type="text" value="<?php getInputValue('lastName')?>" required>
                </p>
                <p>
                  <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                  <?php echo $account->getError(Constants::$emailInvalid); ?>
                  <?php echo $account->getError(Constants::$emailTaken); ?>
                  <label for="email">Email</label>
                  <input id="email" name="email" type="email" value="<?php getInputValue('email')?>" required>
                </p>
                <p>
                  <label for="email2">Confirm email</label>
                  <input id="email2" name="email2" type="email" value="<?php getInputValue('email2')?>" required>
                </p>
                <p>
                  <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                  <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
                  <?php echo $account->getError(Constants::$passwordCharaters); ?>
                  <label for="password">Password</label>
                  <input id="password" name="password" type="password" placeholder=" " required>
                </p>
                <p>
                  <label for="password2"> Confirm password</label>
                  <input id="password2" name="password2" type="password" placeholder=" " required>
                </p>
                <button type="submit" name="registerButton"> SIGN UP</button>
                <div class ="hasAccountText">
                  <span id ="hideregister">Already have an account? <b>Sign In here.</b></span>
                </div>
              </form>

            </div>
            <div id="loginText">
              <h1>PHP . Javascript . Css . MySQL</h1>
              <h2>Demonstrating various functionality.</h2>
              <ul>
                <li>Home</li>
                <li>Search</li>
                <li>Preview</li>
                <li>Comment</li>
              </ul>
            </div>

           </div>
          </div>
        </body>
      </html>
