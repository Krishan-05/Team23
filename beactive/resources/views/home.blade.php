<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trending.css') }}">
    <script src="{{ asset('js/call-to-action.js') }}"></script>
    <script src="{{ asset('js/trending.js') }}"></script>
    <div id="customAlert" class="custom-alert hidden">
        <div class="custom-alert-content">
            <p id="alertMessage"></p>
            <button id="alertOkButton">OK</button>
        </div>
    </div>
    <title>beActive - Home</title> 
</head>
<style>
    #dark-mode-toggle {
        top: 10px;
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
    }
           
    .custom-alert {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); 
        justify-content: center; 
        align-items: center; 
        z-index: 1000; 
        display: flex; 
    }

    .custom-alert.hidden {
        display: none; 
    }

    .custom-alert-content {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        text-align: center;
        max-width: 300px;
    }

    .custom-alert-content p {
        margin: 0 0 20px 0;
        font-size: 16px;
        color: #333;
    }

    .custom-alert-content button {
        padding: 10px 20px;
        background-color: #FF5B00;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .custom-alert-content button:hover {
        background-color: #cc4800;
    }

    html[data-theme='dark'] .custom-alert-content{
        background-color: #2a2a2a;
    }

    html[data-theme='dark'] .custom-alert-content p, 
    html[data-theme='dark'] .custom-alert-content div {
        color: white !important;
        }

</style>
<body>
    <main>
    <header id="main-header">
            <h1> <img src="images/Team23 Logo No background.png" alt="Brand logo" width="80" height="80"> <br> </h1>

            <nav class="navbar"> 
                <ul>
                    <button id="dark-mode-toggle">🌙</button>
                    <li><a id="home" href="{{ url('/') }}">Home</a></li>
                    <li><a id="basket" href="{{ route('basket') }}">Basket</a></li>
                    <li><a id="products" href="{{ route('categories') }}">Products</a>
                        <ul class="dropdown">
                            <li><a href="{{ route('supplements') }}">Supplements</a></li>
                            <li><a href="{{ route('gym') }}">Gym Equipment</a></li>
                            <li><a href="{{ route('clothing') }}">Clothing</a></li>
                            <li><a href="{{ route('sports') }}">Sports Equipment</a></li>
                            <li><a href="{{ route('accessories') }}">Accessories</a></li>
                        </ul>
                    <li><a id="contact" a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </nav>
        </header>


        <section class="hero">
            <h1 class="hero-title">beActive</h1>
            <p class="hero-subtitle">Fuel Your Fitness Journey with beActive</p>
            @auth
                @if(auth()->user()->useraccess == 'admin')
                    <a href="{{ route('admin.dashboard') }}"class = "cta-button">Admin Dashboard</a>
                @else
                    <a href="{{ route('dashboard') }}" class = "cta-button">Dashboard</a>
                @endif
                @endauth

                @guest
                    <a href="{{ route('login') }}" class = "cta-button">Login</a>
                @endguest
            <p class="hero-subtitle"> At beActive, our team is dedicated to providing you with the best<br>products, 
                supplements and apparel to help you on your fitness journey.<br>
                Whether you're a beginner or a fitness pro we have you covered! join beActive today!

        </section>
            <section class="call-to-action">
            <div class="cta-box newsletter">
                <h2>Subscribe to Our Newsletter</h2>
                <p>Stay updated on the latest products and exclusive offers!</p>

                <form id="newsletter-form" action="{{ route('newsletter.update') }}" method="POST">
                    @csrf
                    
                    @auth
                        <label for="userid">User ID:</label>
                        <input type="text" id="userid" name="user_id" value="{{ auth()->id() }}" style="text-align:center; border: 2px; background:lightgrey;" readonly>

                        @if(auth()->user()->newsletter === 'yes')
                            <p>View your newsletter in your dashboard.</p>
                            <button type="button" style= "cursor: not-allowed;"disabled>Already Subscribed !</button> 
                        @else
                            <input type="hidden" name="newsletter" value="yes">
                            <button type="submit">Subscribe</button>
                        @endif
                        
                    @else
                        <input type="text" value="Please login to subscribe" style="text-align:center; border: 2px; background:lightgrey;" readonly>
                        <button type="submit"  style= "cursor: not-allowed;" disabled>Subscribe</button>
                    @endauth
                </form>
            </div>

        
            <div class="cta-box reviews">
                <h2>Customer Reviews</h2>

                <div class="carousel">
                    @if($reviews->isNotEmpty())
                        @php $first = true; @endphp
                        @foreach($reviews as $review)
                            @php $formatted_date = \Carbon\Carbon::parse($review->created_at)->format('Y-m-d'); @endphp
                            <div class="carousel-item {{ $first ? 'active' : '' }}">
                                <p>"{{ $review->review }}"</p>
                                <span>- {{ $review->name }}</span><br><br>
                                <span>Date: {{ $formatted_date }}</span>
                            </div>
                            @php $first = false; @endphp
                        @endforeach
                    @else
                        <div class="carousel-item active">
                            <p>"No reviews yet. Be the first to leave one!"</p>
                            <span>- beActive Team</span>
                        </div>
                    @endif
                </div>

                <div class="carousel-controls">
                    <button class="prev">❮</button>
                    <button class="next">❯</button>
                </div>
                <a href="{{ route('general.reviews.create') }}" class="cta-link">Leave a Review</a>
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
                <a href="{{ route('categories') }}"class="cta-link">Browse Now</a>
            </div>
        </section>
        
        <section class="trending-section">
            <h6 class="section-title">Trending Products</h6>

            <div class="wrapper">
                <i id="left" class="fa-solid fa-angle-left"></i>

                <ul class="carousel">
                <li class="card">
                    <a href="{{ route('product.show', 26) }}" style="text-decoration: none; text-align:center; color:black;">
                        <div class="img">
                            <img src="{{ asset('images/dumbbells.jpeg') }}" alt="Dumbbells" draggable="false">
                        </div>
                        <h3>Dumbbells</h3>
                    </a>
                </li>

                <li class="card">
                    <a href="{{ route('product.show', 32) }}" style="text-decoration: none; text-align:center; color:black;">
                        <div class="img">
                            <img src="{{ asset('images/carousel/rowing-machine.jpg') }}" alt="Rowing Machine" draggable="false">
                        </div>
                        <h3>Rowing Machine</h3>
                    </a>
                </li>

                <li class="card">
                    <a href="{{ route('product.show', 53) }}" style="text-decoration: none; text-align:center; color:black;">
                        <div class="img">
                            <img src="{{ asset('images/carousel/headphones.jpg') }}" alt="Headphones" draggable="false">
                        </div>
                        <h3>Headphones</h3>
                    </a>
                </li>

                <li class="card">
                    <a href="{{ route('product.show', 16) }}" style="text-decoration: none; text-align:center; color:black;">
                        <div class="img">
                            <img src="{{ asset('images/carousel/whey-protein-powder.jpg') }}" alt="Whey Protein Powder" draggable="false">
                        </div>
                        <h3>Whey Protein Powder</h3>
                    </a>
                </li>


                <li class="card">
                    <a href="{{ route('product.show', 41) }}" style="text-decoration: none; text-align:center; color:black;">
                        <div class="img">
                            <img src="{{ asset('images/carousel/hoodie.jpg') }}" alt="Hoodie" draggable="false">
                        </div>
                        <h3>Hoodie</h3>
                    </a>
                </li>
                </ul>

                <i id="right" class="fa-solid fa-angle-right"></i>
            </div>
        </section>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">




        
        <footer id="footer">
            <div class="footer-container">
                <div class="footertext">
                    <p>Our Social Networks</p>
                </div> 
                <div class="socialimages">
                    <a href="https://www.facebook.com/" target="_blank">
                        <img src="{{ asset('images/facebook logo small.png') }}" alt="Facebook logo">
                    </a>
                    <a href="https://www.instagram.com/" target="_blank">
                        <img src="{{ asset('images/instagram logo small.png') }}" alt="Instagram logo">
                    </a>
                    <a href="https://uk.pinterest.com/" target="_blank">
                        <img src="{{ asset('images/pintrest logo small.png') }}" alt="Pinterest logo">
                    </a>
                    <a href="https://x.com/home" target="_blank">
                        <img src="{{ asset('images/x logo small.png') }}" alt="X logo">
                    </a>
                </div>
                <div class="footerlinks">
                    <div class="footerlinkhelp">
                        <h5>Help</h5>
                        <p><a href="{{ url('contact') }}">Contact us</a></p>
                    </div>
                    <div class="footerlinkaccount">
                        <h5>Account Management</h5>
                        <p>
                            @auth
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" style="border: none; background: none; color: inherit; font: inherit; cursor: pointer; margin-left: 50px; text-align: center;">
                                        Logout
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}">Login</a>
                            @endauth
                        </p>
                    </div>
                    <div class="footerlinkaboutus">
                        <h5>About us</h5> 
                        <p><a href="{{ url('/') }}">Our Ethos</a></p>
                        <p><a href="{{ url('faq') }}">FAQ</a></p>
                    </div>
                </div>
                <div class="beactivefooter">
                    <p>beActive - 2025</p>
                </div>
            </div>
        </footer>
    </main>

    <script>
        document.getElementById('newsletter-form').addEventListener('submit', function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            fetch('{{ route('newsletter.update') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);

                let alertBox = document.getElementById('customAlert');
                let alertMessage = document.getElementById('alertMessage');

                if (data.message) {
                    alertMessage.textContent = data.message;
                } else {
                    alertMessage.textContent = 'Unexpected response from the server.';
                }

                alertBox.classList.remove('hidden'); 
            })
            .catch(error => {
                console.error('Error:', error);

                let alertBox = document.getElementById('customAlert');
                let alertMessage = document.getElementById('alertMessage');

                alertMessage.textContent = 'Something went wrong!';
                alertBox.classList.remove('hidden'); 
            });
        });

            document.getElementById('alertOkButton').addEventListener('click', function () {
            document.getElementById('customAlert').classList.add('hidden');
        });


        document.addEventListener('DOMContentLoaded', function() {
        const darkModeToggle = document.getElementById('dark-mode-toggle');
        const storedTheme = localStorage.getItem('theme');
        if (storedTheme === 'dark') {
            document.documentElement.setAttribute('data-theme', 'dark');
            darkModeToggle.textContent = '☀️';
        } else {
            document.documentElement.removeAttribute('data-theme');
            darkModeToggle.textContent = '🌙';
        }
        darkModeToggle.addEventListener('click', () => {
            const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
            if (isDark) {
            document.documentElement.removeAttribute('data-theme');
            darkModeToggle.textContent = '🌙';
            localStorage.setItem('theme', 'light');
            } else {
            document.documentElement.setAttribute('data-theme', 'dark');
            darkModeToggle.textContent = '☀️';
            localStorage.setItem('theme', 'dark');
            }
        });
        });
    </script>
    
</body>
</html>
