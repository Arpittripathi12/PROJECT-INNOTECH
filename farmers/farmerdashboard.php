<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Livestock Wealth | Crowdfarming™</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

  <link rel="stylesheet" href="styles.css">

  <style>
    .hero {
      background: url('https://cdn.velocityhousing.in/pages/large_agriculture-land-on-yamuna-expressway.jpg') no-repeat center center/cover;
      height: 80vh;
    }

    .hero h1,
    .hero p {
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.6);
    }

    .table-wrapper {
      overflow-x: auto;
    }

    .table-wrapper table {
      width: 100%;
    }

    .table-wrapper th,
    .table-wrapper td {
      padding: 1rem;
      text-align: left;
    }

    .hero-button {
      background-color: #FF6F61;
      color: rgb(236, 243, 237);
    }

    .hero-button:hover {
      background-color: #2ddb67;
    }

    .btn-primary {
      background-color: #2C3E50;
      color: white;
    }

    .btn-primary:hover {
      background-color: #1A252F;
    }

    .btn-secondary {
      background-color: #F39C12;
      color: white;
    }

    .btn-secondary:hover {
      background-color: #E67E22;
    }

    .table-header {
      background-color: #2980B9;
      color: white;
    }

    .table-row:hover {
      background-color: #ECF0F1;
    }

    .footer-bg {
      background-color: #34495E;
    }
  </style>
</head>

<body class="bg-gray-100 text-grey-800 font-sans">

  <header class="bg-black py-4">
    <nav class="container mx-auto flex justify-between items-center px-4">
      <div class="text-white font-bold text-xl animate_animated animate_fadeInLeft">
        AGRISHARES
      </div>
      <ul class="flex space-x-4">
        <li><a href="#about" class="text-white hover:text-gray-300 transition duration-300" aria-label="About">About</a></li>
        <li><a href="#investments" class="text-white hover:text-gray-300 transition duration-300" aria-label="Investments">Investments</a></li>
        <li><a href="#governance" class="text-white hover:text-gray-300 transition duration-300" aria-label="Governance">Governance</a></li>
        <li><a href="#farmers" class="text-white hover:text-gray-300 transition duration-300" aria-label="Farmers">Farmers</a></li>
        <li><a href="#contact" class="text-white hover:text-gray-300 transition duration-300" aria-label="Contact">Contact</a></li>
        <li><a href="#faqs" class="text-white hover:text-gray-300 transition duration-300" aria-label="FAQs">FAQs</a></li>
      </ul>
    </nav>
  </header>

  <section class="hero flex items-center justify-center text-center text-white">
    <div class="animate_animated animate_fadeInUp">
      <h1 class="text-5xl font-extrabold mb-6">You Buy, We Farm, You Profit</h1>
      <p class="text-lg mb-6">
        Own real farm assets as they grow and earn profit at harvest. <br>
        <strong>Welcome to Crowdfarming™.</strong>
      </p>
      <div class="flex justify-center space-x-4">
        <button onclick="document.getElementById('registerForm').classList.remove('hidden')" class="hero-button px-6 py-3 rounded hover:bg-coral-600 transition duration-300">Register Land</button>
        <a href="learnmore.php" class="border border-white text-white px-6 py-3 rounded hover:bg-white hover:text-black transition duration-300">Learn More</a>
      </div>
    </div>
  </section>

  <div id="registerForm" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg w-full max-w-lg p-6 relative overflow-y-auto max-h-[80vh]">
      <button onclick="document.getElementById('registerForm').classList.add('hidden')" class="absolute top-4 left-4 text-gray-500 hover:text-gray-800">&times;</button>
      <h2 class="text-2xl font-bold mb-6">Farmer Crop Registration</h2>
      <form id="registerLandForm" action="farmerdatabase.php" method="POST">
      <!-- land leisure-->
      <input type="hidden" name="MobileNo" value="<?php echo $farmers['MobileNo']; ?>">

        <div class="mb-4">
          <label for="LandLeisure" class="block text-gray-700 font-semibold mb-2">Land Leisure (in Acres):</label>
          <input type="number" id="LandLeisure" name="LandLeisure" class="w-full border border-gray-300 rounded px-4 py-2" placeholder="Enter leisure in acres" required>
        </div>
        <!-- Lease Period -->
      <div class="mb-4">
        <label for="LeasePeriod" class="block text-gray-700 font-semibold mb-2">Lease Period (in Years):</label>
        <input type="number" id="LeasePeriod" name="LeasePeriod" class="w-full border border-gray-300 rounded px-4 py-2" placeholder="Enter lease period in years" required>
      </div>
      <!-- Price per Agri -->
      <div class="mb-4">
        <label for="PricePerAgri" class="block text-gray-700 font-semibold mb-2">Price per Agri:</label>
        <input type="number" id="PricePerAgri" name="PricePerAgri" class="w-full border border-gray-300 rounded px-4 py-2" placeholder="Enter price per agri in Rupees" required>
      </div>
      <!-- Total Agri -->
      <div class="mb-4">
        <label for="TotalAgri" class="block text-gray-700 font-semibold mb-2">Total Agri (Shares):</label>
        <input type="number" id="TotalAgri" name="TotalAgri" class="w-full border border-gray-300 rounded px-4 py-2" placeholder="Enter total AGRISHARES" required>
      </div>
      <!-- Crop Name -->
      <div class="mb-4">
        <label for="CropName" class="block text-gray-700 font-semibold mb-2">Crop Name:</label>
        <select id="CropName" name="CropName" class="w-full border border-gray-300 rounded px-4 py-2" required>
          <option value="wheat">Wheat</option>
          <option value="rice">Rice</option>
          <option value="paddy">Paddy</option>
          <option value="pulses">Pulses</option>
          <option value="sugarcane">Sugarcane</option>
          <option value="cotton">Cotton</option>
        </select>
      </div>
      <!-- State -->
      <div class="mb-4">
        <label for="State" class="block text-gray-700 font-semibold mb-2">State:</label>
        <input type="text" id="State" name="State" class="w-full border border-gray-300 rounded px-4 py-2" placeholder="Enter the State" required>
      </div>
      <!-- Location -->
      <div class="mb-4">
        <label for="Location" class="block text-gray-700 font-semibold mb-2">Location:</label>
        <input type="text" id="Location" name="Location" class="w-full border border-gray-300 rounded px-4 py-2" placeholder="Enter the location URL" required>
      </div>
      <!-- Mobile Number -->
      <div class="mb-4">
        <label for="MobileNo" class="block text-gray-700 font-semibold mb-2">Mobile Number:</label>
        <input type="number" id="MobileNo" name="MobileNo" class="w-full border border-gray-300 rounded px-4 py-2" placeholder="Enter your mobile number" required>
      </div>
      <!-- Submit -->
      <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 w-full">Submit</button>
    </form>
  </div>
</div>

   
   <section id="investments" class="hidden py-12 bg-white">
    <div class="container mx-auto">
      <h2 class="text-3xl font-bold text-center mb-8">Our Featured Investments</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 px-4">
        <!-- Investment Cards -->
        <div class="bg-gray-100 rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
          <h3 class="text-xl font-semibold mb-4">Farm Operations</h3>
          <p class="text-gray-700 mb-4">Funds are used for farming, monitored through the platform</p>
          <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">
            Learn More
          </button>
        </div>
        <div class="bg-gray-100 rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
          <h3 class="text-xl font-semibold mb-4">Performance Tracking</h3>
          <p class="text-gray-700 mb-4">Monitor farm activities and yield performance</p>
          <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">
            Learn More
          </button>
        </div>
        <div class="bg-gray-100 rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
          <h3 class="text-xl font-semibold mb-4">Crop Farming</h3>
          <p class="text-gray-700 mb-4">Invest in diverse crop farming for sustainable and profitable yields.</p>
          <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">
            Learn More
          </button>
        </div>
        <div class="bg-gray-100 rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
          <h3 class="text-xl font-semibold mb-4">Profit Sharing</h3>
          <p class="text-gray-700 mb-4">Clear and fair distribution of returns</p>
          <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">
            Learn More
          </button>
        </div>
      </div>
      <!-- Logout Button -->
      <div class="text-center mt-8">
        <button onclick="logout()" class="bg-red-500 text-white px-6 py-3 rounded hover:bg-red-600 transition duration-300">
          Logout
        </button>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer-bg text-white py-6">
    <p class="text-center">&copy; 2024 AGRISHARES | All rights reserved.</p>
  </footer>

  <script>
    function submitForm(event) {
      event.preventDefault();
      // Hide registration form and show investments with animation
      document.getElementById('registerForm').classList.add('opacity-0', 'pointer-events-none');
      setTimeout(function () {
        document.getElementById('registerForm').classList.add('hidden');
        document.getElementById('investments').classList.remove('hidden');
        document.getElementById('investments').classList.add('animate_animated', 'animate_fadeIn');
      }, 300);  // Wait for fade-out transition before hiding
    }

    function logout() {
      alert('You have successfully logged out!');
      // Add any further actions for logout like redirecting or clearing session
    }
  </script>

</body>

</html>