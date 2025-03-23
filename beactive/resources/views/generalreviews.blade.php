<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leave a Review!</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/review.css') }}">
</head>
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
<div class = "container">
    <div class="review-container">
        <h2>Leave a Review!</h2>

        @if(session('message'))
            <div class="message">{{ session('message') }}</div>
        @endif

    
        <form action="{{ route('general.reviews.store') }}" method="POST">
            @csrf 

            <label for="name">Your Name:</label>
            <input type="text" name="name" id="name" required value="{{ old('name') }}">

            <label for="review">Your Review:</label>
            <textarea name="review" id="review" rows="5" required>{{ old('review') }}</textarea>

            <button type="submit">Submit Review</button>
        </form>

        <a href="{{ url('/') }}">Back to Home</a>
    </div>
</div>

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
<style>
    #dark-mode-toggle {
        top: 50px;
        background: none;
        border: none;
        font-size: 24px;
        cursor: pointer;
        z-index: 1000;
}


</style>
</body>
</html>
