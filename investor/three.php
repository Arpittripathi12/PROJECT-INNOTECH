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
$sql = "SELECT  firstName, lastName FROM users";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invest in Indian Agriculture</title>
  <style>
    /* Global Styles */
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background: url('https://images.unsplash.com/photo-1571127233403-c7a655fd49b3') no-repeat center center fixed;
      background-size: cover;
      color: #313131;
    }

    /* Header */
    header {
      background: rgba(0, 0, 0, 0.7);
      color: #fff;
      text-align: center;
      padding: 2rem 1rem;
      font-size: 2rem;
      font-weight: bold;
      letter-spacing: 1px;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
    }

    /* Main Container */
    .container {
      max-width: 900px;
      margin: 3rem auto;
      padding: 2rem;
      background: rgba(255, 255, 255, 0.9);
      border-radius: 12px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    /* Section Title */
    .section-title {
      font-size: 2rem;
      color: #2d3436;
      text-align: center;
      margin-bottom: 1.5rem;
    }

    /* Form Styles */
    .form-group {
      margin-bottom: 1.5rem;
    }

    .form-group label {
      font-weight: bold;
      color: #2c3e50;
      display: block;
      margin-bottom: 0.5rem;
    }

    .form-group input, .form-group select {
      width: 100%;
      padding: 0.8rem;
      border: 1px solid #ced6e0;
      border-radius: 8px;
      font-size: 1rem;
    }

    .form-group input:focus, .form-group select:focus {
      border-color: #007BFF;
      outline: none;
    }

    /* Button Styles */
    .btn {
      display: inline-block;
      width: 100%;
      padding: 1rem;
      background: linear-gradient(45deg, #ff6b6b, #feca57);
      color: #fff;
      font-size: 1.2rem;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      text-align: center;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
    }

    .btn:hover {
      background: linear-gradient(45deg, #feca57, #ff6b6b);
    }

    /* Payment Confirmation */
    .payment-slip {
      display: none;
      padding: 2rem;
      background: rgba(255, 255, 255, 0.95);
      border-radius: 12px;
      margin-top: 2rem;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .payment-slip h3 {
      font-size: 1.8rem;
      color: #2ecc71;
      margin-bottom: 1rem;
    }

    .payment-slip p {
      font-size: 1.2rem;
      color: #333;
    }

    footer {
      text-align: center;
      padding: 1rem;
      background: rgba(0, 0, 0, 0.8);
      color: #fff;
      position: fixed;
      width: 100%;
      bottom: 0;
    }
  </style>
</head>
<body>
  <header>🌾 Invest in Indian Agriculture 🌾</header>

  <div class="container">
    <h2 class="section-title">Empowering Farmers. Growing Together.</h2>
    <form id="investmentForm">
      <div class="form-group">
        <label for="state">Select the State</label>
        <select id="state" required>
          <option value="">-- Choose a State --</option>
          <option value="Punjab">Punjab</option>
          <option value="Haryana">Haryana</option>
          <option value="Rajasthan">Rajasthan</option>
          <option value="Uttar Pradesh">Uttar Pradesh</option>
          <option value="Bihar">Bihar</option>
        </select>
      </div>

      <div class="form-group">
        <label for="cropType">Select Crop Type</label>
        <select id="cropType" required>
          <option value="">-- Choose a Crop --</option>
          <option value="Wheat">Wheat</option>
          <option value="Rice">Rice</option>
          <option value="Sugarcane">Sugarcane</option>
          <option value="Cotton">Cotton</option>
        </select>
      </div>

      <div class="form-group">
        <label for="landSize">Total Agri(Shares)</label>
        <input type="number" id="landSize" placeholder="E.g., 5" required>
      </div>

      <div class="form-group">
        <label for="investmentDuration">Investment Duration (in Years)</label>
        <input type="number" id="investmentDuration" placeholder="E.g., 3" required>
      </div>

      <div class="form-group">
        <label for="profitSharing">Profit Sharing Percentage (%)</label>
        <input type="number" id="profitSharing" placeholder="E.g., 20" required>
      </div>

      <div class="form-group">
        <label for="investmentAmount">Investment Amount (₹)</label>
        <input type="number" id="investmentAmount" placeholder="Enter amount in INR" required>
      </div>

      <div class="form-group">
        <label for="paymentMethod">Select Payment Method</label>
        <select id="paymentMethod" required>
          <option value="">-- Choose Payment Method --</option>
          <option value="UPI">UPI</option>
          <option value="Net Banking">Net Banking</option>
          <option value="Credit/Debit Card">Credit/Debit Card</option>
        </select>
      </div>

      <button type="submit" class="btn">Proceed to Payment</button>
    </form>

    <!-- Payment Confirmation Slip -->
    <div id="paymentSlip" class="payment-slip">
      <h3>Payment Successful ✅</h3>
      <p>Thank you for your investment in Indian agriculture!</p>
      <p><strong>State:</strong> <span id="stateDisplay"></span></p>
      <p><strong>Crop Type:</strong> <span id="cropTypeDisplay"></span></p>
      <p><strong>Land Size:</strong> <span id="landSizeDisplay"></span> Acres</p>
      <p><strong>Duration:</strong> <span id="durationDisplay"></span> Years</p>
      <p><strong>Profit Sharing:</strong> <span id="profitDisplay"></span>%</p>
      <p><strong>Investment Amount:</strong> ₹<span id="amountDisplay"></span></p>
      <p><strong>Payment Method:</strong> <span id="methodDisplay"></span></p>
      <!-- <p><strong>You have invested in: </strong></p> -->


<?php if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Now $row is populated with data, you can access it
        echo "<p><strong>You have invested in </strong>" . $row["firstName"] . " " . $row["lastName"]."'s"." Land </p>";
    }
} else {
    echo "No data found!";
}
?>










    </div>
  </div>

  <footer>&copy; 2024 Agrishares. All rights reserved.</footer>

  <script>
    const form = document.getElementById('investmentForm');
    const paymentSlip = document.getElementById('paymentSlip');

    form.addEventListener('submit', function (event) {
      event.preventDefault();

      const state = document.getElementById('state').value;
      const cropType = document.getElementById('cropType').value;
      const landSize = document.getElementById('landSize').value;
      const duration = document.getElementById('investmentDuration').value;
      const profit = document.getElementById('profitSharing').value;
      const investmentAmount = document.getElementById('investmentAmount').value;
      const paymentMethod = document.getElementById('paymentMethod').value;

      if (state && cropType && landSize && duration && profit && investmentAmount && paymentMethod) {
        form.style.display = 'none';
        paymentSlip.style.display = 'block';

        document.getElementById('stateDisplay').textContent = state;
        document.getElementById('cropTypeDisplay').textContent = cropType;
        document.getElementById('landSizeDisplay').textContent = landSize;
        document.getElementById('durationDisplay').textContent = duration;
        document.getElementById('profitDisplay').textContent = profit;
        document.getElementById('amountDisplay').textContent = investmentAmount;
        document.getElementById('methodDisplay').textContent = paymentMethod;
      } else {
        alert('Please fill all the fields correctly.');
      }
    });
  </script>
</body>
</html>