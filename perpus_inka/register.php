<?php
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $fullname = $_POST['fullname'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];

  if ($password == $password2) {
    // Hash the password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Connect to database
    $conn = mysqli_connect('localhost', 'root', '', 'perpus');

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Insert data into database
    $sql = "INSERT INTO user (username, fullname, password) VALUES ('$username', '$fullname', '$password')";

    if (mysqli_query($conn, $sql)) {
      header("Location: login.php");
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
  } else {
    echo "Passwords do not match.";
  }
}
?>

<form action="register.php" method="post">
<h1> SILAHKAN REGISTER </h1>
  <input type="text" name="username" placeholder="Username"></br>
  </br> <input type="fullname" name="fullname" placeholder="fullname"></br>
  </br> <input type="password" name="password" placeholder="Password"></br>
  </br>  <input type="password" name="password2" placeholder="Confirm Password"></br>
 </br> <button type="submit" name="submit">Sign Up</button></br>
</form>
