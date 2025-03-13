<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $mainProduct->name }} - beActive</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/891652da6b.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>

    </style>
</head>

<body>
    <main>
        <header id="main-header">
            <!-- Brand name within the header -->
            <img src="{{ asset('images/Team23 Logo No background.png') }}" alt="Brand logo" width="80" height="80">
            <br>
            </h1>
            <nav class="navbar"> <!-- Navbar in the header -->
                <ul>
                    <li><a id="home" href="{{ url('/') }}">Home</a></li>
                    <li><a id="basket" href="{{ route('basket') }}">Basket</a></li>
                    <li><a id="products" href="">Products</a>
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
        <div class="product" id="item{{ $mainProduct->id }}" data-price="{{ $mainProduct->price }}"
            data-rating="{{ $mainProduct->rating }}" data-name="{{ $mainProduct->name }}">
            <!-- Product Image -->
            <a href="{{ route('product.show', $mainProduct->id) }}" style="text-decoration: none;">
                <img src="{{ asset('images/' . strtolower(str_replace(' ', '-', $mainProduct->name)) . '.jpeg') }}"
                    alt="{{ $mainProduct->name }}" width="100">
            </a>
            <!-- Product Name -->
            <p>{{ $mainProduct->name }}</p>

            <!-- Product Price -->
            <p class="product-price">£{{ $mainProduct->price }}</p>

            <!-- Product Rating -->
            <p class="product-rating" id="stars">Rating: </p>


            <!-- Product Description -->
            <p>{{ $mainProduct->description }}</p>

            <!-- Add to Basket Button -->
            <label for="quantity-{{ $mainProduct->id }}" style="padding-bottom: 10px;">Quantity:</label>
            <input type="number" id="quantity-{{ $mainProduct->id }}" data-id="{{ $mainProduct->id }}"
                data-name="{{ $mainProduct->name }}" data-price="{{ $mainProduct->price }}"
                data-rating="={{ $mainProduct->rating }}" class="quantity-input" min="1" max="100" value="1">
            <button class="add-to-basket" data-id="{{ $mainProduct->id }} ">Add to Basket</button>
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
                                    <button type="submit"
                                        style="border: none; background: none; color: inherit; font: inherit; cursor: pointer; margin-left: 50px; text-align: center;">
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
                    </div>
                </div>
                <div class="beactivefooter">
                    <p>beActive - 2024</p>
                </div>
            </div>
        </footer>
    </main>
    <script>
        function displayStars(rating) {
            const starsContainer = document.getElementById("stars");

            for (let i = 0; i < 5; i++) {
                const star = document.createElement("i");

                if (i < rating) {
                    star.classList.add("fa-solid", "fa-star");
                } else {
                    star.classList.add("fa-regular", "fa-star");
                }

                starsContainer.appendChild(star);
            }
        }

        let rating = {{ $mainProduct->rating }};
        displayStars(rating);
    </script>

</body>

</html>