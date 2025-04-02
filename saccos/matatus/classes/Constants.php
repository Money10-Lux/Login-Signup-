<?php
// Define a class to store constant error messages
  class Constants {
    // Static property for password mismatch error
    public static $passwordsDoNotMatch = "passwords don't match";
    // Static property for password character type restriction
    public static $passwordNotAlphanumeric = "passwords can only contain numbers and letters";
    // Static property for password length requirement
    public static $passwordCharaters = "Your password is short, must be at least 8 Characters";
    // Static property for invalid email format
    public static $emailInvalid = "Email is invalid";
    // Static property for email confirmation mismatch
    public static $emailsDoNotMatch = "Emails don't match";
    // Static property for email already in use
    public static $emailTaken = "This email already exists";
    // Static property for last name length validation
    public static $lastNameCharacters ="Your last name is too short";
    // Static property for first name length validation
    public static $firstNameCharacters = "Your first name is too short";
    // Static property for username length validation
    public static $usernameCharacters = "Your username is too short";
    // Static property for username uniqueness validation
    public static $usernameTaken = "This username already exists";
    // Static property for login failure message
    public static $loginFailed = "Username or password is incorrect";


}
 ?>
