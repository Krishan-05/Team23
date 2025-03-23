<?php include 'config.php'; ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/call-to-action.css" /> 
    <link rel="stylesheet" type="text/css" href="css/trending.css" /> 
    <script src="js/call-to-action.js"></script>
    <script src="js/trending.js"></script>

    <title>Homepage</title>
</head>

<body>
    <main>
        <header id="main-header">
            <h1> 
                <img src="images/Team23 Logo No background.png" alt="Brand logo" width="80" height="80"> 
            </h1>  
            <nav class="navigation">
                <a href="call-to-action.html">Home</a>    
                <a href="">Basket</a>
                <a href="">Products</a>
                <a href="">Contact Us</a>
            </nav>
        </header>

        <section class="hero">
            <h1 class="hero-title">beActive</h1>
            <p class="hero-subtitle">Fuel Your Fitness Journey with beActive</p>
            <a href="products.html" class="cta-button">Shop Now</a>
            <p class="hero-subtitle"> At beActive, our team is dedicated to supporting your fitness journey every step of the way.
                Whether you're a beginner just starting out or an athlete pushing your limits, we know that finding 
                the right gear can make all the difference. </p>

        </section>

        <?php include 'config.php'; ?> 

<section class="call-to-action">

    <div class="cta-box newsletter">
        <h2>Subscribe to Our Newsletter</h2>
        <p>Stay updated on the latest products and exclusive offers!</p>

        <form id="newsletter-form">
            <input type="email" name="email" placeholder="Enter your email" required>
            <button type="submit">Subscribe</button>
        </form>

        <div id="popup-message" class="popup-message"></div>
    </div>

    <div class="cta-box reviews">
        <h2>Customer Reviews</h2>

        <div class="carousel">
    <?php
        $sql = "SELECT name, review, created_at FROM generalreviews ORDER BY created_at DESC LIMIT 10";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0):
            $first = true;
            while ($row = $result->fetch_assoc()):
                $formatted_date = date('Y-m-d', strtotime($row['created_at']));
    ?>
        <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">
            <p>"<?php echo htmlspecialchars($row['review']); ?>"</p>
            <span>- <?php echo htmlspecialchars($row['name']); ?></span><br><br>
            <span>Date: <?php echo htmlspecialchars($formatted_date); ?></span>
        </div>
    <?php
                $first = false;
            endwhile;
        else:
    ?>
        <div class="carousel-item active">
            <p>"No reviews yet. Be the first to leave one!"</p>
            <span>- beActive Team</span>
        </div>
    <?php endif; ?>
</div>



        <div class="carousel-controls">
            <button class="prev">❮</button>
            <button class="next">❯</button>
        </div>

        <a href="leave_general_review.php" class="cta-link">Leave a Review</a>
    </div>

    <div class="cta-box products">
        <h2>View Our Products</h2>
        <p>Discover the best gear, apparel, and supplements for your fitness journey.</p>

        <div class="product-gallery">
            <div class="product-item">
                <img src="images/gymproduct1.webp" alt="Gym Product 1">
            </div>
            <div class="product-item">
                <img src="images/gymproduct2.webp" alt="Gym Product 2">
            </div>
            <div class="product-item">
                <img src="images/gymproduct3.webp" alt="Gym Product 3">
            </div>
        </div>

        <a href="products.html" class="cta-link">Browse Now</a>
    </div>

</section>


<section class="trending-section">
  <h2 class="section-title">Trending Products</h2>

  <div class="wrapper">
    <i id="left" class="fa-solid fa-angle-left"></i>

    <ul class="carousel">
      <li class="card">
        <div class="img">
          <img src="images/Dumbbells.jpeg" alt="Dumbbells" draggable="false">
        </div>
        <h3>Dumbbells</h3>
      </li>

      <li class="card">
        <div class="img">
          <img src="images/gymproduct2.webp" alt="Weight Lifts" draggable="false">
        </div>
        <h3>Weight Lifts</h3>
      </li>

      <li class="card">
        <div class="img">
          <img src="images/Headphones.jpeg" alt="Headphones" draggable="false">
        </div>
        <h3>Headphones</h3>
      </li>

      <li class="card">
        <div class="img">
          <img src="images/Whey-Protein-Powder.jpeg" alt="Whey Protein Powder" draggable="false">
        </div>
        <h3>Whey Protein Powder</h3>
      </li>

      <li class="card">
        <div class="img">
          <img src="images/Hoodie.jpeg" alt="Hoodie" draggable="false">
        </div>
        <h3>Hoodie</h3>
      </li>
    </ul>

    <i id="right" class="fa-solid fa-angle-right"></i>
  </div>
</section>

<br> <br>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        
        
<footer id="footer">
            <a href="https://github.com/" target="_blank">
                <img src="images/github_logo.png" alt="github logo" width="30" height="30">
            </a>
</footer>
    </main>

</body>
</html>
