<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>beActive - Accessories</title> <!-- Title -->
    <style>
        .container {
            display: flex;
            flex-direction: column;
            width: 100%;
            align-items: left;
            text-align: left;
            width: 100%;
            flex: 1;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto auto;
            grid-template-rows: auto auto auto auto;
            gap: 10px;
            padding: 10px;
        }

        .grid-container div {
            background-color: white;
            text-align: center;
            padding: 20px;
            font-size: 20px;
            border: 1px solid black;
        }


        #grid-title {
            font-family: 'Space Grotesk', sans-serif; 
            font-size: 36px; 
            font-weight: 700; 
            color: #007bff; 
            text-align: center; 
            text-transform: uppercase; 
            margin: 20px 0; 
            letter-spacing: 2px; 
            background-color: #f8f9fa; 
            padding: 15px; 
            border-radius: 12px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        }
        

        /* Todo after mvp */
        #grid-filter {
            grid-row-start: 2;
            grid-row-end: 7;
            /* change to 7 */
            border: none;

        }

        /* Todo after mvp */
        #grid-sort {
            grid-column-start: 2;
            grid-column-end: 4;
            border: none;

        }


/* Product Cards */
        .product {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #ffffff; 
            border: 1px solid #e6e6e6; 
            border-radius: 12px; 
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08); 
            max-width: 240px; 
            text-align: center;
            margin: 15px auto; 
            overflow: hidden; 
        }

        .product:hover {
            transform: translateY(-8px); 
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15); 
            background-color: #f9f9f9; 
        }

        .product img {
            width: 140px; 
            height: auto;
            margin-bottom: 12px;
            border-radius: 10px; 
            transition: transform 0.3s ease, filter 0.3s ease; 
        }

        .product:hover img {
            transform: scale(1.1); 
            filter: brightness(1.1); 
        }

        .product p {
            margin: 10px 0 5px;
            font-size: 17px; 
            font-weight: 600; 
            color: #333333; 
            text-align: center;
        }

.product-price {
    font-size: 16px; 
    font-weight: 500; 
    color: #007bff; 
    margin: 5px 0;
}

.product-button, .add-to-basket {
    margin-top: 12px;
    background-color: #007bff; 
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    border-radius: 25px; 
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
}

.product-button:hover , .add-to-basket:hover {
    background-color: #0056b3;
    transform: scale(1.05); 
}

.product-button:active, . .add-to-basket:active{
    background-color: #004085; 
    transform: scale(1); 
    box-shadow: none; 
}
/* Search Bar Styling*/

#searchBar {
    width: 100%; 
    max-width: 400px; 
    padding: 12px 20px; 
    font-size: 16px; 
    border: 1px solid #e6e6e6; 
    border-radius: 25px; 
    background-color: #ffffff; 
    outline: none; 
    box-shadow: none; 
    transition: border-color 0.3s ease; 
}

#searchBar:focus {
    border-color: #007bff; 
    box-shadow: 0 8px 15px rgba(0, 123, 255, 0.2); 
}

#searchBar::placeholder {
    color: #999999; 
    font-style: italic; 
}

.grid-container #grid-search {
    display: flex;
    justify-content: center; 
    align-items: center; 
    margin-bottom: 20px; 
    background-color: transparent; 
    border: none; 
    box-shadow: none; 
}


    </style>
</head>

<body>
    <main>
    <header id="main-header">
            <h1> <img src="images/Team23 Logo No background.png" alt="Brand logo" width="80" height="80"> <br> </h1>
            <nav class="navbar"> <!-- Navbar in the header -->
                <ul>
                    <li><a id="home" href="{{ url('/') }}">Home</a></li>
                    <li><a id="basket" href="{{ route('basket') }}">Basket</a></li>
                    <li><a id="products">Products</a>
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
        <div class="container">
            <div class="grid-container">
                <!-- Title -->
                <div id="grid-title">Gym Equipment</div>
                <div id="grid-filter"></div>
                <div id="grid-sort"></div>
                <!-- Search Bar -->
                <div id="grid-search">
                    <input type="text" id="searchBar" placeholder="Search for products..." onkeyup="filterProducts()">
                </div>

                <!-- Loaded Products -->
                @foreach($mainProducts as $mainProduct)
                <div class="product" id="item{{ $mainProduct->id }}">
                    <!-- Product Image -->
                    <img src="{{ asset('images/accessories/' . strtolower(str_replace(' ', '-', $mainProduct->name)) . '.jpeg') }}" alt="{{ $mainProduct->name }}" width="100">
                    <!-- Product Name -->
                    <p>{{ $mainProduct->name }}</p>
                    <!-- Product Price -->
                    <p class="product-price">£{{ $mainProduct->price }}</p>
                    <!-- Add to Basket Button -->
                    <label for="quantity-{{ $mainProduct->id }}" style="padding-bottom: 10px;">Quantity:</label>
                    <input type="number" id="quantity-{{ $mainProduct->id }}" data-id="{{ $mainProduct->id }}" data-name="{{ $mainProduct->name }}" data-price="{{ $mainProduct->price }}" class="quantity-input" min="1" max="100" value="1" style = "text-align: center;">
                    <button class="add-to-basket" data-id="{{ $mainProduct->id }} ">Add to Basket</button>
                </div>
                @endforeach
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
                    </div>
                </div>
                <div class="beactivefooter">
                    <p>beActive - 2024</p>
                </div>
            </div>
        </footer>

    </main>
    <script>
        function filterProducts() {
            var searchInput = document.getElementById("searchBar").value.toLowerCase();
            var products = document.getElementsByClassName("product");

            for (let i = 0; i < products.length; i++) {
                const productName = products[i].textContent.toLowerCase();
                if (productName.includes(searchInput)) {
                    products[i].style.display = "block";
                } else {
                    products[i].style.display = "none";
                }
            }
        }
    </script>
    <script>
        $(document).ready(function () {
            $('.show-sub-products').click(function () {
                const productId = $(this).data('id');
                $(`#sub-products-${productId}`).toggle();
            });
            $('.add-to-basket').click(function () {
                const subProductId = $(this).data('id');
                const quantity = $(`#quantity-${subProductId}`).val();
                const name = $(`#quantity-${subProductId}`).data('name');
                const price = $(`#quantity-${subProductId}`).data('price');

                const basketItems = JSON.parse(localStorage.getItem('basket')) || [];
                basketItems.push({ id: subProductId, name, price, quantity });
                localStorage.setItem('basket', JSON.stringify(basketItems));

                alert(`${quantity} x ${name} added to the basket!`);
            });
        });
    </script>
</body>

</html>