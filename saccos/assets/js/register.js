// Wait for the document to be fully loaded before executing code
$(document).ready(function() {

  // Event handler for clicking the "Sign Up" link
    $("#hideLogin").click(function() {      // When element with id "hideLogin" is clicked
      $("#loginForm").hide();               // Hide the login form
      $("#registerForm").show();            // Show the registration form
      // Note: Helps toggle between login and register forms
    });

    // Event handler for clicking the "Sign In" link
    $("#hideregister").click(function() {   // When element with id "hideregister" is clicked
      $("#loginForm").show();               // Show the login form
      $("#registerForm").hide();            // Hide the registration form
    });
});
