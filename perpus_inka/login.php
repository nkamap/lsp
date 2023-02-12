<?php

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'perpus');

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Retrieve the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database for a matching username and password
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    // Check if a matching record was found
    if (mysqli_num_rows($result) == 1) {
        // Start a session and store the user information
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;

        // Redirect to the protected area
        header('Location: user/index.php');
    } else {
        // Display an error message
        echo 'Invalid username or password';
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1> SILAHKAN LOGIN </h1>
    <form action="login.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>
