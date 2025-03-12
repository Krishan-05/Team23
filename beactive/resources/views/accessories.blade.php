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
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto auto;
            grid-template-rows: auto auto auto auto;
            gap: 10px;
            padding: 10px;
            padding-right: 0;
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
            /* Matches the chosen font */
            font-size: 36px;
            /* Larger font size for prominence */
            font-weight: 700;
            /* Bold for emphasis */
            color: #007bff;
            /* Eye-catching blue to match the theme */
            text-align: center;
            /* Center the title horizontally */
            text-transform: uppercase;
            /* Capitalize all letters for impact */
            margin: 20px 0;
            /* Add vertical spacing above and below */
            letter-spacing: 2px;
            /* Slight spacing for elegance */
            background-color: #ffffff;
            /* Subtle background for distinction */
            padding: 15px;
            /* Adds space around the title text */
            border-radius: 12px;
            /* Smooth rounded  */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Subtle shadow for depth */
        }


        /* todo after mvp */
        #grid-filter {
            grid-row-start: 2;
            grid-row-end: 7;
            /* change to 7 */
            background: #ffffff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: left;
            margin-right: 50px;
        }

        #grid-filter h3 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 10px;
            text-align: center;

        }

        #grid-filter label {
            font-size: 14px;
            font-weight: 600;
            margin-top: 10px;
        }

        #grid-filter select {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-top: 5px;
        }

        #apply-filter {
            margin-top: 15px;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #apply-filter:hover {
            background-color: #0056b3;
        }

        /* todo after mvp */
        #grid-sort {
            display: flex;
            justify-content: center;
            align-items: center;

            grid-column-start: 2;
            grid-column-end: 4;
            /* Spacious padding for comfort */

            background-color: #ffffff;
            /* Clean white background */
            border: none;

            margin-bottom: 20px;
            padding: 20px;

        }

        #sort-bar {
            width: 100%;
            /* Full width for responsiveness */
            max-width: 400px;
            /* Restrict maximum width */
            padding: 12px 20px;
            /* Spacious padding for comfort */
            font-size: 16px;
            /* Readable text size */
            border: 1px solid #e6e6e6;
            /* Subtle border matching product cards */
            border-radius: 25px;
            /* Fully rounded */
            background-color: #ffffff;
            /* Clean white background */
            outline: none;
            /* Remove default focus outline */
            box-shadow: none;
            /* Removes any shadow effect */
            transition: border-color 0.3s ease;
            /* Smooth transition for border color */
        }


        #grid-search {
            display: flex;
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */
            margin-bottom: 20px;
            /* Add spacing */
            background-color: transparent;
            /* Remove any background color */
            border: none;
            /* Remove any border */
            box-shadow: none;
            /* Remove any shadow */
        }

        #searchBar {
            width: 100%;
            /* Full width for responsiveness */
            max-width: 400px;
            /* Restrict maximum width */
            padding: 12px 20px;
            /* Spacious padding for comfort */
            font-size: 16px;
            /* Readable text size */
            border: 1px solid #e6e6e6;
            /* Subtle border matching product cards */
            border-radius: 25px;
            /* Fully rounded */
            background-color: #ffffff;
            /* Clean white background */
            outline: none;
            /* Remove default focus outline */
            box-shadow: none;
            /* Removes any shadow effect */
            transition: border-color 0.3s ease;
            /* Smooth transition for border color */
        }

        #searchBar:focus {
            border-color: #007bff;
            /* Highlight border on focus */
            box-shadow: 0 8px 15px rgba(0, 123, 255, 0.2);
            /* Optional shadow on focus */
        }

        #searchBar::placeholder {
            color: #999999;
            /* Subtle placeholder color */
            font-style: italic;
            /* Different style for placeholder */
        }


        /* Product Cards */
        .product {
            width: 200px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #ffffff;
            /* Clean white background */
            border: 1px solid #e6e6e6;
            /* Subtle border to define edges */
            border-radius: 12px;
            /* Slightly rounded */
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
            /* Gentle shadow for depth */
            /* Restrict product card width for uniformity */
            text-align: center;
            margin: 15px;
            /* Center products and add spacing */
            overflow: hidden;
            /* Ensure no content overflows */
        }

        .product:hover {
            transform: translateY(-8px);
            /* Slight lift on hover for interactivity */
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
            /* More prominent shadow on hover */
            background-color: #f9f9f9;
            /* Soft gray background on hover */
        }

        .product img {
            width: 140px;
            /* Ideal size for product images */
            height: auto;
            margin-bottom: 12px;
            border-radius: 10px;
            /* Rounded edges for images */
            transition: transform 0.3s ease, filter 0.3s ease;
            /* Smooth zoom effect */
        }

        .product:hover img {
            transform: scale(1.1);
            /* Slight zoom on hover */
            filter: brightness(1.1);
            /* Brighten the image on hover */
        }

        .product p {
            margin: 10px 0 5px;
            font-size: 17px;
            /* Perfect size for readability */
            font-weight: 600;
            /* Enhance visibility of product names */
            color: #333333;
            /* Dark text for strong contrast */
            text-align: center;
        }

        .product-price {
            font-size: 16px;
            /* Adjust size for emphasis */
            font-weight: 500;
            /* Medium weight for hierarchy */
            color: #007bff;
            /* Attractive blue tone for pricing */
            margin: 5px 0;
        }

        .product-button,
        .add-to-basket {
            margin-top: 12px;
            background-color: #007bff;
            /* Brand primary color */
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            /* Fully rounded buttons for a modern feel */
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Light shadow for better visibility */
        }

        .product-button:hover,
        .add-to-basket:hover {
            background-color: #0056b3;
            /* Slightly darker blue on hover */
            transform: scale(1.05);
            /* Scale up button slightly on hover */
        }

        .product-button:active,
        .add-to-basket:active {
            background-color: #004085;
            /* Even darker blue for active state */
            transform: scale(1);
            /* Remove scale for pressed state */
            box-shadow: none;
            /* Remove shadow for pressed effect */
        }

        /* Search Bar Styling*/
    </style>
</head>

<body>
    <main>
        <header id="main-header">
            <!-- Brand name within the header -->
            <h1> <img src="images/Team23 Logo No background.png" alt="Brand logo" width="80" height="80"> <br> </h1>
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
        <div class="container">
            <div class="grid-container">
                <!-- Title -->
                <div id="grid-title">Accessories</div>
                <div id="grid-filter">
                    <h3>Filter Products</h3>

                    <label for="price">Price Range:</label><br>
                    <input type="radio" name="price_checkbox" value="all">All</input><br>
                    <input type="radio" name="price_checkbox" value="under50">Under £50</input><br>
                    <input type="radio" name="price_checkbox" value="5-10">£5 - £10</input><br>
                    <input type="radio" name="price_checkbox" value="over10">Over £10</input><br>
                    <br>

                    <label for="rating">Rating:</label><br>
                    <input type="radio" name="rating_checkbox" value="all">All</input><br>
                    <input type="radio" name="rating_checkbox" value="4">4★ & Up</input><br>
                    <input type="radio" name="rating_checkbox" value="3">3★ & Up</input><br>
                    <input type="radio" name="rating_checkbox" value="2">2★ & Up</input><br>
                    <input type="radio" name="rating_checkbox" value="1">1★ & Up</input><br>
                    <br>

                    <button id="apply-filter">Apply Filters</button>
                </div>
                <div id="grid-sort">

                    <div id="sort-bar">
                        <label for="sort">Sort By:</label>
                        <select name="sort" id="sort">
                            <option value="default" selected>Select Sort Option</option>
                            <option value="price-low-high">Price: Low to High</option>
                            <option value="price-high-low">Price: High to Low</option>
                            <option value="rating-low-high">Rating: Low to High</option>
                            <option value="rating-high-low">Rating: High to Low</option>
                            <option value="name-a-z">Name: A to Z</option>
                            <option value="name-z-a">Name: Z to A</option>
                        </select>
                    </div>



                </div> <!-- Search Bar -->
                <div id="grid-search">
                    <input type="text" id="searchBar" placeholder="Search for products..." onkeyup="searchProducts()">
                </div>

                <!-- Dynamically Loaded Products -->
                @foreach($mainProducts as $mainProduct)
                    <a href="{{ route('product.show', $mainProduct->id) }}">

                        <div class="product" id="item{{ $mainProduct->id }}" data-price="{{ $mainProduct->price }}"
                            data-rating="{{ $mainProduct->rating }}" data-name="{{ $mainProduct->name }}">
                            <!-- Product Image TODO CHANGE TO IMAGE FROM DATABASE -->

                            <img src="{{ asset('images/' . strtolower(str_replace(' ', '-', $mainProduct->name)) . '.jpeg') }}"
                                alt="{{ $mainProduct->name }}" width="100">

                            <!-- Product Name -->
                            <p>{{ $mainProduct->name }}</p>
                            <!-- Product Price -->
                            <p class="product-price">£{{ $mainProduct->price }}</p>
                            <!-- Add to Basket Button -->
                            <label for="quantity-{{ $mainProduct->id }}" style="padding-bottom: 10px;">Quantity:</label>
                            <input type="number" id="quantity-{{ $mainProduct->id }}" data-id="{{ $mainProduct->id }}"
                                data-name="{{ $mainProduct->name }}" data-price="{{ $mainProduct->price }}"
                                data-rating="={{ $mainProduct->rating }}" class="quantity-input" min="1" max="100"
                                value="1">
                        </div>
                    </a>


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

        //FILTER

        $(document).ready(function () {
            $('#apply-filter').click(function () {
                var priceFilter = [];
                var ratingFilter = [];

                $('input[name="price_checkbox"]:checked').each(function () {
                    priceFilter.push($(this).val());
                });

                $('input[name="rating_checkbox"]:checked').each(function () {
                    ratingFilter.push($(this).val());
                });

                $('.product').each(function () {
                    var price = parseFloat($(this).find('.product-price').text().replace('£', ''));
                    var rating = $(this).data('rating');

                    var showProduct = true;

                    if (priceFilter.length > 0 && !priceFilter.includes('all')) {
                        if (priceFilter.includes('under50') && price >= 50) {
                            showProduct = false;
                        }
                        if (priceFilter.includes('5-10') && (price < 5 || price > 10)) {
                            showProduct = false;
                        }
                        if (priceFilter.includes('over10') && price <= 10) {
                            showProduct = false;
                        }
                    }

                    if (ratingFilter.length > 0 && !ratingFilter.includes('all')) {
                        var ratingThreshold = parseInt(ratingFilter[0]);

                        if (rating < ratingThreshold) {
                            showProduct = false;
                        }
                    }

                    if (showProduct) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });


        // SORT
        document.getElementById('sort').addEventListener('change', function () {
            var sortOption = this.value;
            var productContainer = document.querySelector('.grid-container');
            var products = Array.from(document.querySelectorAll('.product'));

            products.sort(function (a, b) {
                var priceA = parseFloat(a.getAttribute('data-price'));
                var priceB = parseFloat(b.getAttribute('data-price'));
                var nameA = a.getAttribute('data-name').trim().toLowerCase();
                var nameB = b.getAttribute('data-name').trim().toLowerCase();

                var ratingA = parseInt(a.getAttribute('data-rating'));
                var ratingB = parseInt(b.getAttribute('data-rating'));

                if (sortOption === 'price-low-high') {
                    return priceA - priceB;
                } else if (sortOption === 'price-high-low') {
                    return priceB - priceA;
                } else if (sortOption === 'name-a-z') {
                    return nameA.localeCompare(nameB);
                } else if (sortOption === 'name-z-a') {
                    return nameB.localeCompare(nameA);
                } else if (sortOption === 'rating-high-low') {
                    return ratingB - ratingA;
                } else if (sortOption === 'rating-low-high') {
                    return ratingA - ratingB;
                } else {
                    return 0;
                }
            });

            products.forEach(function (product) {
                productContainer.appendChild(product);
            });
        });



        // SEARCH
        function searchProducts() {
            var input = $('#searchBar').val().toLowerCase();
            $('.product').each(function () {
                var productName = $(this).find('p').first().text().toLowerCase();
                if (productName.indexOf(input) > -1) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }




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