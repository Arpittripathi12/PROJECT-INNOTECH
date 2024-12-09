<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmer_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, email, firstName, lastName, LandLeisure, LeasePeriod, 
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
        body {
            margin: 0;
            height: 100vh; 
            display: flex;
            flex-direction: column;
            align-items: center; 
            justify-content: center; 
            background-image: url("https://img.freepik.com/premium-photo/indian-tractor-drivers-farmers-agriculture-progress-rural-landscape_954948-12413.jpg?w=826");
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-bottom: 20px; 
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
            color:blue;
        }

    

.arpit{
    color:green;
}
    </style>
</head>
<body>

<h1 class="text-5xl font-extrabold mb-6">Congratulations, you have Registered.Thanks for joining Our Community</h1>
        <h3><strong class="arpit"> Your Registration Details are :</strong></h3>

<?php


if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Your Name</th>
            <th>Your Email</th>
            <th>Land Leisure</th>
            <th>Lease Period</th>
            <th>Price Per Agricultural Unit</th>
            <th>Total Agricultural Units</th>
            <th>Crop Name</th>
            <th>State</th>
          </tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["firstName"] ." ".$row["lastName"] . "</td>
                <td>" . $row["email"] . "</td>
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

$conn->close();
?>
</body>
</html>
