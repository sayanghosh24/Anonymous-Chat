<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 200) {
        echo "
        <script>
        alert('LOGIN SUCCESSFUL!');
        </script>
        ";
    } elseif ($_GET['status'] == 404) {
        echo "
        <script>
        alert('LOGIN FAILED!');
        </script>
        ";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once "conn.php";  // Include the database connection
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Query to check if the user credentials exist in the database
    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        // If a match is found, redirect to page.php
        header("Location: page.php");
        exit();
    } else {
        // If no match is found, show login failed message
        header("Location: login.php?status=404");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <h2> Imposter Login</h2>
        <form action="login.php" method="POST" onsubmit="return validateForm()">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <button type="button" onclick="togglePasswordVisibility()" class="toggle-password-btn">
                    <i class="fa-solid fa-eye" id="eye-icon"></i>
                </button>
            </div>
            <div class="input-group">
                <button type="submit" class="btn">Login</button>
            </div>
        </form>
        
    </div>

    <script>
        // Toggle password visibility
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            var eyeIcon = document.getElementById("eye-icon");

            // Toggle the password visibility
            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash"); // Change icon to eye-slash
            } else {
                passwordField.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye"); // Change icon back to eye
            }
        }

        // Form validation
        function validateForm() {
            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;

            if (!username || !password) {
                alert("Both fields are required.");
                return false;
            }
            return true;
        }
    </script>

    <style>
       * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-image: url('bg image 1.jpg'); /* Path to your image */
    background-size: cover; /* Ensures the image covers the entire screen */
    background-position: center; /* Centers the image */
    background-repeat: no-repeat; /* Prevents tiling of the image */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-container {
    background-color: rgba(0, 0, 0, 0.61); /* Semi-transparent background */
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5); /* Updated shadow for consistency */
    width: 350px;
    text-align: center;
}

h2 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #ffffff; /* White text for contrast */
}

.input-group {
    margin-bottom: 20px;
    text-align: left;
    position: relative;
}

.input-group label {
    display: block;
    margin-bottom: 5px;
    font-size: 17px;
    color: #ffffff; /* White text for contrast */
}

.input-group input {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 2px solid #ffffff; /* White border for better contrast */
    border-radius: 5px;
}

.input-group input:focus {
    border-color: #007bff;
    outline: none;
}

.toggle-password-btn {
    position: absolute;
    right: 10px;
    top: 35px;
    background: none;
    border: none;
    cursor: pointer;
}

.toggle-password-btn i {
    font-size: 18px;
    color: #ffffff; /* White icon for visibility */
}

.btn {
    width: 50%;
    margin-left: 70px;
    margin-top: 20px;
    padding: 10px;
    background-color: #003affb3;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.btn:hover {
    background-color: #0056b3;
}

.signup-option {
    margin-top: 20px;
}

.signup-option a {
    color: #ffffff; /* White text for better visibility */
    text-decoration: none;
    font-weight: bold;
}

.signup-option a:hover {
    text-decoration: underline;
}

@media (max-width: 480px) {
    .login-container {
        width: 90%;
        padding: 20px;
    }

    .btn {
        width: 80%;
    }
}

    </style>
</body>
</html>
