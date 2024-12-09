<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmer_db";

// Database connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $MobileNo = $conn->real_escape_string($_POST['MobileNo']);
    $LandLeisure = $conn->real_escape_string($_POST['LandLeisure']);
    $LeasePeriod = $conn->real_escape_string($_POST['LeasePeriod']);
    $PricePerAgri = $conn->real_escape_string($_POST['PricePerAgri']);
    $TotalAgri = $conn->real_escape_string($_POST['TotalAgri']);
    $CropName = $conn->real_escape_string($_POST['CropName']);
    $State = $conn->real_escape_string($_POST['State']);
    $Location = $conn->real_escape_string($_POST['Location']);

    // Update user details
    $sql = "UPDATE users
            SET MobileNo = '$MobileNo',
                LandLeisure = '$LandLeisure',
                LeasePeriod = '$LeasePeriod',
                PricePerAgri = '$PricePerAgri',
                TotalAgri = '$TotalAgri',
                CropName = '$CropName',
                State = '$State',
                Location = '$Location'
            WHERE id = '$user_id'";

    if ($conn->query($sql) === TRUE) {
        // echo "Farmer information updated successfully.";
        header("Location: farmerdetails.php");
        
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Retrieve user data for display
$sql = "SELECT * FROM users WHERE id = '$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

$conn->close();
?>
