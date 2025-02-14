<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <script src="<?php echo e(asset('js/call-to-action.js')); ?>"></script>
    <title>beActive - Home</title> <!-- Title --> 
</head>

<body>
    <main>
    <header id="main-header">
            <!-- Brand name within the header -->
            <h1> <img src="images/Team23 Logo No background.png" alt="Brand logo" width="80" height="80"> <br> </h1>
            <nav class="navbar"> <!-- Navbar in the header -->
                <ul>
                    <li><a id="home" href="<?php echo e(url('/')); ?>">Home</a></li>
                    <li><a id="basket" href="<?php echo e(route('basket')); ?>">Basket</a></li>
                    <li><a id="products">Products</a>
                        <ul class="dropdown">
                            <li><a href="<?php echo e(route('supplements')); ?>">Supplements</a></li>
                            <li><a href="<?php echo e(route('gym')); ?>">Gym Equipment</a></li>
                            <li><a href="<?php echo e(route('clothing')); ?>">Clothing</a></li>
                            <li><a href="<?php echo e(route('sports')); ?>">Sports Equipment</a></li>
                            <li><a href="<?php echo e(route('accessories')); ?>">Accessories</a></li>
                        </ul>
                    <li><a id="contact" a href="<?php echo e(route('contact')); ?>">Contact Us</a></li>
                </ul>
            </nav>
        </header>


        <section class="hero">
            <h1 class="hero-title">beActive</h1>
            <p class="hero-subtitle">Fuel Your Fitness Journey with beActive</p>
            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->useraccess == 'admin'): ?>
                    <a href="<?php echo e(route('admin.dashboard')); ?>"class = "cta-button">Admin Dashboard</a>
                <?php else: ?>
                    <a href="<?php echo e(route('dashboard')); ?>" class = "cta-button">Dashboard</a>
                <?php endif; ?>
                <?php endif; ?>

                <?php if(auth()->guard()->guest()): ?>
                    <a href="<?php echo e(route('login')); ?>" class = "cta-button">Login</a>
                <?php endif; ?>
            <p class="hero-subtitle"> At beActive, our team is dedicated to providing you with the best<br>products, 
                supplements and apparel to help you on your fitness journey.<br>
                Whether you're a beginner or a fitness pro we have you covered! join beActive today!

        </section>

        <section class="call-to-action">
            <div class="cta-box newsletter">
                <h2>Subscribe to Our Newsletter</h2>
                <p>Stay updated on the latest products and exclusive offers!</p>
                <form id="newsletter-form">
                    <input type="email" placeholder="Enter your email" required class = "enter-text">
                    <button type="submit">Subscribe</button>
                </form>
            </div>
            

        
            <div class="cta-box reviews">
                <h2>Customer Reviews</h2>
                <div class="carousel">
                    <div class="carousel-item active">
                        <p>"Fantastic quality and excellent service. Highly recommend!"</p>
                        <span>- Sarah W.</span>
                    </div>
                    <div class="carousel-item">
                        <p>"The gear is top-notch! Helped me step up my workouts."</p>
                        <span>- Mark T.</span>
                    </div>
                    <div class="carousel-item">
                        <p>"Love the apparel—stylish and functional. Will buy again!"</p>
                        <span>- Emily R.</span>
                    </div>
                </div>
                <div class="carousel-controls">
                    <button class="prev">❮</button>
                    <button class="next">❯</button>
                </div>
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
                <a href="<?php echo e(route('supplements')); ?>"class="cta-link">Browse Now</a>
            </div>
            
        </section>

        <footer id="footer">
            <div class="footer-container">
                <div class="footertext">
                    <p>Our Social Networks</p>
                </div> 
                <div class="socialimages">
                    <a href="https://www.facebook.com/" target="_blank">
                        <img src="<?php echo e(asset('images/facebook logo small.png')); ?>" alt="Facebook logo">
                    </a>
                    <a href="https://www.instagram.com/" target="_blank">
                        <img src="<?php echo e(asset('images/instagram logo small.png')); ?>" alt="Instagram logo">
                    </a>
                    <a href="https://uk.pinterest.com/" target="_blank">
                        <img src="<?php echo e(asset('images/pintrest logo small.png')); ?>" alt="Pinterest logo">
                    </a>
                    <a href="https://x.com/home" target="_blank">
                        <img src="<?php echo e(asset('images/x logo small.png')); ?>" alt="X logo">
                    </a>
                </div>
                <div class="footerlinks">
                    <div class="footerlinkhelp">
                        <h5>Help</h5>
                        <p><a href="<?php echo e(url('contact')); ?>">Contact us</a></p>
                    </div>
                    <div class="footerlinkaccount">
                        <h5>Account Management</h5>
                        <p>
                            <?php if(auth()->guard()->check()): ?>
                                <form method="POST" action="<?php echo e(route('logout')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" style="border: none; background: none; color: inherit; font: inherit; cursor: pointer; margin-left: 50px; text-align: center;">
                                        Logout
                                    </button>
                                </form>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>">Login</a>
                            <?php endif; ?>
                        </p>
                    </div>
                    <div class="footerlinkaboutus">
                        <h5>About us</h5> 
                        <p><a href="<?php echo e(url('/')); ?>">Our Ethos</a></p>
                    </div>
                </div>
                <div class="beactivefooter">
                    <p>beActive - 2024</p>
                </div>
            </div>
        </footer>
    </main>
</body>
</html>
<?php /**PATH C:\Users\chris\repos\Team23\beactive\resources\views/home.blade.php ENDPATH**/ ?>