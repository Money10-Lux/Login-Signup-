# Login and SignUp Using PHP, JS and CSS

This project is a simple web application demonstrating user authentication and basic database 
interaction using PHP, MySQL, HTML, CSS, and JavaScript. It includes login and registration functionality, 
with form validation and session management. 
The application is designed as a learning example to showcase backend and frontend integration.

# Features
User Registration: Allows users to create accounts with username, first name, last name, email, and password validation.
User Login: Authenticates users with username and password, maintaining session state.
Form Validation: Client-side and server-side validation for input fields (e.g., password length, email format).
Database Integration: Stores user data in a MySQL database.
Responsive UI: Basic styling with CSS and form toggling using jQuery.

matatu/
├── assets/

│   ├── css/

│   │   ├── register.css    # Styles for registration/login forms

│   │   └── style.css       # General styles for the application

│   ├── images/

│   │   └── logo.jpeg       # Placeholder logo image

│   └── js/

│       └── register.js     # JavaScript for form toggling

├── matatus/

│   ├── classes/

│   │   ├── Account.php     # Class for user account management

│   │   └── Constants.php   # Error message constants

│   ├── handler/

│   │   ├── login-handler.php    # Login processing logic

│   │   └── register-handler.php # Registration processing logic

│   └── config.php          # Database connection configuration

├── index.php               # Main landing page

├── register.php            # Login and registration page

└── README.md               # This file

# Prerequisites
PHP: Version 7.x or higher
MySQL: For database storage
Web Server: Apache or similar (e.g., XAMPP, WAMP)
Git: For version control
Browser: Modern browser with JavaScript enabled

# Setup Instructions
1. Configure the Database
   There is matatu.sql file, impoert it to mysql xammp
2. Deploy to a Web Server
   Place the project folder in your web server’s root directory (e.g., htdocs for XAMPP).
   Start your web server and MySQL service.
3. Access the Application
   Open a browser and navigate to http://localhost/<repository>/register.php.
   Use the login or registration forms to interact with the system.

# Key Files and Their Purpose
# PHP Files
matatus/classes/Account.php: Manages user registration, login, and validation logic.
matatus/classes/Constants.php: Defines error messages for validation feedback.
matatus/handler/register-handler.php: Processes registration form submissions.
matatus/handler/login-handler.php: Handles login form submissions.
register.php: Main page with login and registration forms.
index.php: Landing page after successful login.

# JavaScript
assets/js/register.js: Toggles between login and registration forms using jQuery.
# CSS
assets/css/register.css: Styles the login/registration forms.
assets/css/style.css: General application styling.

# Security Notes
SQL Injection: The current code uses raw SQL queries, making it vulnerable. Consider using prepared statements.
Password Hashing: Uses MD5 (outdated). Replace with password_hash() and password_verify() for better security.
HTTPS: Deploy with HTTPS in production to secure data transmission.

# Acknowledgments
Built as a learning exercise for PHP, MySQL, and web development.
Uses jQuery for client-side interactivity.

#Screenshots
Login Page
![image](https://github.com/user-attachments/assets/9472895a-d0e2-4d72-8705-15c84646f4d1)

SIgnUp Page
![image](https://github.com/user-attachments/assets/29d09365-05b3-4b91-8a94-b508da76c1c5)


