<?php
// Define database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmer_db";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to get data from the 'users' table (with additional fields)
$sql = "SELECT id, MobileNo,email, firstName, lastName, LandLeisure, LeasePeriod, 
        PricePerAgri, TotalAgri, CropName, State FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data from Database</title>
    <style>
        /* Style for the page body */
        body {
            margin: 0;
            height: 100vh; /* Full viewport height */
            display: flex;
            flex-direction: column;
            align-items: center; /* Center horizontally */
            justify-content: center; /* Center vertically */
            background-image: url("WhatsApp Image 2024-11-12 at 23.39.53_c7f2d394.jpg");
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        /* Style for the table */
        table {
            width: 80%;
            border-collapse: collapse;
            margin-bottom: 20px; /* Space between table and button */
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
            background-color:white;
        }

        th {
            background-color: #f2f2f2;
        }
        td{
            color:red;
                
        }

        h1 {
            text-align: center;
            color:green;
        }

        /* Style for the Invest button */
        .invest-btn {
            padding: 15px 30px;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-top: 20px;
        }

        /* Hover effect for the button */
        .invest-btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        /* Active effect for the button */
        .invest-btn:active {
            background-color: #004085;
        }

        /* Focus effect for accessibility */
        .invest-btn:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(38, 143, 255, 0.5);
        }

    </style>
</head>
<body>

<h1>Farmer Info</h1>

<?php
// Check if there are any results
if ($result->num_rows > 0) {
    // Start the table and define the table headers
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Mobile Number</th>
            <th>Land Leisure</th>
            <th>Lease Period</th>
            <th>Price Per Agricultural Unit</th>
            <th>Total Agricultural Units</th>
            <th>Crop Name</th>
            <th>State</th>
          </tr>";
    
    // Output data for each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["firstName"] . "</td>
                <td>" . $row["lastName"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["MobileNo"] . "</td>
                <td>" . $row["LandLeisure"] . "</td>
                <td>" . $row["LeasePeriod"] . "</td>
                <td>" . $row["PricePerAgri"] . "</td>
                <td>" . $row["TotalAgri"] . "</td>
                <td>" . $row["CropName"] . "</td>
                <td>" . $row["State"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No records found.</p>";
}

// Close the database connection
$conn->close();
?>

<!-- Invest Button -->
<a class="invest-btn" href="three.php" target="_blank">Invest Now</a>

</body>
</html>
