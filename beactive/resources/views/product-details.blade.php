<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $mainProduct->name }} - beActive</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.ico') }}">
    <script src="https://kit.fontawesome.com/891652da6b.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
            height: auto;
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

        .product img {
            /* Ideal size for product images */
            height: 100px;
            width: auto;
            /* Rounded edges for images */
            transition: transform 0.3s ease, filter 0.3s ease;
            /* Smooth zoom effect */
            margin-right: auto;
            border: 1px solid red;

        }

        .product {
            display: flex;
            flex-direction: column;
            background-color: #ffffff;
            /* Clean white background */
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
            /* Gentle shadow for depth */
            margin: 15px;
            /* Center products and add spacing */
            padding: 20px;
        }

        .product p {
            margin: 10px 0 5px;
            font-size: 17px;
            /* Perfect size for readability */
            font-weight: 600;
            /* Enhance visibility of product names */
            color: #333333;
            /* Dark text for strong contrast */

            border: 1px solid pink;
        }

        .product-price {
            font-size: 16px;
            /* Adjust size for emphasis */
            font-weight: 500;
            /* Medium weight for hierarchy */
            color: #007bff;
            /* Attractive blue tone for pricing */
            margin: 5px 0;

            border: 1px solid blue;
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
            border: 1px solid purple;

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

        .review-button {
            background-color: #007bff;
            /* Blue color */
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .review-button:hover {
            background-color: #0056b3;
            /* Darker blue on hover */
            transform: scale(1.05);
            /* Slightly larger on hover */
        }

        /* css for pop up leave a review */
        /* Modal Style */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            z-index: 1;
            /* Stay on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            background-color: rgba(0, 0, 0, 0.5);
            /* Black background with transparency */
        }

        /* Modal Content */
        .modal-content {
            background-color: white;
            padding: 20px;
            margin: 15% auto;
            width: 80%;
            /* Adjust size as needed */
            max-width: 500px;
        }

        /* Close Button */
        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            /* Make it clickable */
            position: absolute;
            top: 10px;
            right: 25px;
        }

        /* Hover effect for close button */
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
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
            <img src="{{ asset('images/' . strtolower(str_replace(' ', '-', $mainProduct->name)) . '.jpeg') }}"
                alt="{{ $mainProduct->name }}" width="100">
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

            <div class="reviews-section">
                <h3>Customer Reviews</h3>

                @if($reviews->isEmpty())
                    <p>No reviews yet. Be the first to review this product!</p>
                @else
                    @foreach($reviews as $review)
                        <div class="review">
                            <p><strong>{{ $review->customer_name }}</strong> -
                            <p class="customer-rating" id="stars-{{ $review->id }}">Rating: </p>
                            </p>
                            <p>{{ $review->comment }}</p>
                            <p><em>Reviewed on: {{ $review->created_at->format('F j, Y \a\t H:i') }}</em></p>
                            <hr>
                        </div>
                    @endforeach
                @endif
                <button class="review-button" onclick="openReviewPopup()">Leave a Review</button>

                <div id="reviewPopup" class="modal">
                    <div class="modal-content">
                        <span class="close" onclick="closeReviewPopup()">&times;</span>
                        <h2>Submit Your Review</h2>

                        <form action="{{ route('reviews.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $mainProduct->id }}">
                            <!-- Dynamic Product ID -->

                            <label for="customer_name">Your Name</label>
                            <input type="text" name="customer_name" id="customer_name" placeholder="Your Name"
                                required><br>

                            <label for="rating">Rating (1-5)</label>
                            <div class="stars">
                                <input type="radio" id="star5" name="rating" value="5"><label for="star5">★</label>
                                <input type="radio" id="star4" name="rating" value="4"><label for="star4">★</label>
                                <input type="radio" id="star3" name="rating" value="3"><label for="star3">★</label>
                                <input type="radio" id="star2" name="rating" value="2"><label for="star2">★</label>
                                <input type="radio" id="star1" name="rating" value="1"><label for="star1">★</label>
                            </div><br>

                            <label for="comment">Your Review</label>
                            <textarea name="comment" id="comment" placeholder="Write your review here..." rows="4"
                                required></textarea><br>

                            <input type="submit" value="Submit Review">
                        </form>
                    </div>
                </div>
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
        function displayStars(rating, elementId) {
            const starsContainer = document.getElementById(elementId);
            if (!starsContainer) return;

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

        document.addEventListener("DOMContentLoaded", function () {
            displayStars({{ $mainProduct->rating }}, "stars");

            @foreach ($reviews as $review)
                displayStars({{ $review->rating }}, "stars-{{ $review->id }}");
            @endforeach
    });


        function openReviewPopup() {
            document.getElementById("reviewPopup").style.display = "block";
        }

        function closeReviewPopup() {
            document.getElementById("reviewPopup").style.display = "none";
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