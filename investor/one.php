<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Live Stock Wealth</title>
  <style>
   
    body 
    {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #010201a2;
      color: #333;
    }
    header {
      background-image: url('https://lh3.googleusercontent.com/proxy/qFHk1jx_MPv_bszWTXptrXT1tyy18-9P5T5H344uCxZh9l5pQcIiiYDYSIcSqzvuQuvN4ZMiqo3g7N2U_bLJCcDZyA'); /* Replace with the main background image */
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      color: white;
    }
    header h1 {
      font-size: 3.5rem;
      margin-bottom: 1rem;
    }
    header p {
      font-size: 1.5rem;
      margin-bottom: 2rem;
    }
    .btn {
      padding: 1rem 2rem;
      margin: 0.5rem;
      font-size: 1rem;
      color: white;
      background: #28a745;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
    }
    .btn:hover {
      background: #218838;
    }
    .section {
      padding: 4rem 2rem;
      text-align: center;
    }
    .section h2 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
    }
    .gallery {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
    }
    .gallery img {
      width: 300px;
      height: 200px;
      object-fit: cover;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .card {
      display: inline-block;
      width: 300px;
      margin: 1rem;
      padding: 1rem;
      background: white;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }
    .card img {
      width: 100%;
      border-radius: 10px;
    }
    footer {
      text-align: center;
      padding: 1rem;
      background: #333;
      color: white;
    }
    nav{
        display: flex;
        background-color: #212121;
        color: #fff;
        justify-content: space-around;
        align-items: center;
    }
    nav ul{
        list-style: none;
        display: flex;
    }
    button{
        padding: 8.5px;

    }
    .login{
        background-color: orange;
        color: #fff;
    }
    nav .center li{
        padding: 10px;
        margin: 0px 2px;
    }

  </style>
</head>
<body>
<nav>
    <div class="left-logo"> AGRISHARE </div>

<div class="center"><ul>
    <li>About</li>
    <li>Investment </li>
    <li>Govemance</li>
    <li>Farmers</li>
    <li>Contacts</li>
    <li>FAQs</li>
</ul></div>
<div class="right">
    <button class ="register">Register</button>
    <button class ="login">login</button>
</div>
</nav>
<header>
  <h1>Empowering Farmers Through Collaborative Investments</h1>
  <p>Transfarming Agriculture With Capital And Innovation</p>
  <a href="fetchdetails.php" class="btn">Invest Now</a>
  <a href="two.php" class="btn">Learn More</a>
</header>

<section class="section">
  <h2>Why Invest in Farm Land?</h2>
  <div class="card">
    <h3>High Returns</h3>
    <p>Grow your wealth with proven investments.</p>
  </div>
  <div class="card">
    <h3>Profit Sharing</h3>
    <p>Clear and fair distributions of returns.</p>
  </div>
</section>

<section class="section">
  <h2>Gallery of Success Stories</h2>
  <div class="gallery">
    <img src="https://assets.gatesnotes.com/8a5ac0b3-6095-00af-c50a-89056fbe4642/20342744-a93e-4ef1-9cc6-cee9f98c7b90/b8fec2aeecd04ee489a7070ff542731b.jpg" alt="Success Story 1">
    <img src="data:image/jpeg;base64,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" alt="Success Story 2">
    <img src="https://livestockwealth.com/wp-content/uploads/2020/05/Livestock-Wealth-Shezi-On-Farm-Talking-1.jpg" alt="Success Story 3">
    <img src="https://webassets.oxfamamerica.org/media/images/Oxfam_InuruID_367528_Kitao_Lenamparasio.width-1200.jpg" alt="Success Story 4">
  </div>
</section>

<section class="section">
  <h2>Our Process</h2>
  <div class="card">
    <img src="https://cdn-icons-png.flaticon.com/512/5109/5109721.png">
    <h3>Step 1 </h3>
    <p>Farmers list shares.</p>
  </div>
  <div class="card">
    <img src="https://cdn-icons-png.flaticon.com/512/8558/8558575.png"  alt="Step 2">
    <h3>Step 2</h3>
    <p>Investors funds projects.</p>
  </div>
  <div class="card">
    <img src="https://smilefy.com/wp-content/uploads/2023/07/AJP-Icons-Step-3.png" alt="Step 3"height="300px" width="300px">
    <h3>Step 3</h3>
    <p>Farm operations on field and profit sharing.</p>
  </div>
</section>
<footer>
  <p>&copy; 2024 Agrishares. All rights reserved.</p>
</footer>

</body>
</html>