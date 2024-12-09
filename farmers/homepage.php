 <?php
session_start();
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check if the user exists
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");

    if (mysqli_num_rows($query) > 0) {
        // Fetch user data
        $user = mysqli_fetch_assoc($query);
        $_SESSION['email'] = $user['email'];

//// Redirect to the desired website
        header("Location: https://www.google.com/"); // Replace with the actual URL
        exit();
  //  } else {
        echo "Invalid email or password.";
    }
}
?> 
