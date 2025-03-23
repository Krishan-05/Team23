<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $mainProduct->name }} - beActive</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/review.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.ico') }}">
    <script src="https://kit.fontawesome.com/891652da6b.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div id="customAlert" class="custom-alert hidden">
        <div class="custom-alert-content">
            <p id="alertMessage"></p>
            <button id="alertOkButton">OK</button>
        </div>
    </div>
    <style>
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

#dark-mode-toggle {
top: 10px;
background: none;
border: none;
font-size: 1.5rem;
cursor: pointer;}

html[data-theme='dark'] .product,
html[data-theme='dark'] .product p {
background-color: #222;
border-color: #444;
color: #fff;
}



html[data-theme='dark'] .review-text {
    background-color: white !important;
    color: black !important; 
}



html[data-theme='dark'] .custom-alert-content{
    background-color: #2a2a2a;
}

html[data-theme='dark'] .custom-alert-content p, 
html[data-theme='dark'] .custom-alert-content div {
    color: white !important;
    }

body {
    font-family: Arial, sans-serif;
    background-color: #f8f8f8;
    color: #333;
    margin: 0;
    padding: 0;
    
}

.product-container {
    display: flex;
    max-width: 90vw;
    flex-direction: column;
    margin: auto;
    background: #fff;
    padding: 2vw;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

}


.product img {
    left:20px;
    align-items: center; 
    width: 25%;
    padding: 20px;
    max-width: 1600px; 
    max-height: 1600px; 
    border-radius: 10px;
    display: block; 

}


.product-details {
    flex: 1;
    padding: 20px;
    display: flex;
    flex-direction: column;
}

.product-name {
    font-size: 2rem;
    margin-bottom: 1rem;
    font-weight: bold;
    color: rgb(0, 0, 0);
    letter-spacing: 1px; 
    text-transform: capitalize; 
    
    position: absolute;
    top: 7rem; 
    
    text-align: left; 
}
.product-price {
    font-size: 2rem; 
    margin-bottom: 1rem;
    font-weight: bold;
    color: rgb(0, 0, 0);
    letter-spacing: 1px; 
    text-transform: capitalize; 
    
    position: absolute; 
    top: 11.3rem; 

    
    text-align: right; 
}


.star-rating {
    font-size: 20px;
    color: #007bff;
    font-weight: 700;
    background-color: #e6f0ff;
    padding: 6px 12px;
    border-radius: 20px;
    border: 2px solid #007bff;
    text-transform: uppercase;
    letter-spacing: 1px;
    display: inline-block;
    margin-left: 10px; 
    text-align:center;
}
.stars {
    font-size: 28px;
    text-align: center;
    color: #007bff; 
    background-color: #e6f0ff;
    padding: 8px 15px;
    border-radius: 30px; 
    text-shadow: 2px 2px 6px rgba(0, 123, 255, 0.4);
    letter-spacing: 3px;
    display: inline-block; 
    font-weight: 800;
    border: 3px solid #007bff;

    display: block;
    margin: 0 auto;
}
.quantity-label {

    position: absolute; 
    top: 16rem;
    font-size: 15px;
    font-weight: bold;
    color: #007bff;
    text-transform: uppercase;
    letter-spacing: 1px;

}

.product-rating {
    position: absolute; 
    top: 7rem; 

    font-size: 20px; 
    margin-bottom: 1rem; 
    font-weight: bold; 
    color: #007bff; /* Blue color */
    text-transform: uppercase; /* Makes it more prominent */
    letter-spacing: 1px; /* Enhances readability */
  
}

/* Description */
.product-description {
    position: absolute; /* Enables precise positioning */
    top: 10.3rem; /* Distance from the top */

    font-size: 1rem; /* Larger for emphasis */
    margin-bottom: 1rem;
    font-weight: bold; /* Makes it stand out */
    color:rgb(62, 63, 64); /* Blue color */
    text-transform: uppercase; /* Makes it more prominent */
    letter-spacing: 1px; /* Enhances readability */
   
}

/* Quantity Selector */
.quantity-container {  
position: absolute;

top: 17rem; /* Adjust spacing from top */
display: flex;
align-items: flex-end;
justify-content: center;
background-color:#f8f8f8; /* Light background */
border-radius: 6px;
overflow: hidden;
width: 170px;
border: 1px solid #f8f8f8; /*border */
}

/* Quantity Buttons */
.quantity-btn {
background-color:#007bff; /* Dark teal color */
color: white;
border: none;
font-size: 35px;
cursor: pointer;
width: 80px;
height: 60px;
display: flex;
align-items: center;
justify-content: center;
transition: 0.3s ease;
}

.quantity-btn:hover {
background-color: #022b31;
}

/* Quantity Input */
.quantity-input {
    text-align: center;
    width: 60px;
    height: 40px; /* Make it square for better alignment */
    background-color: #f8f8f8;
    
    font-weight: bold;
    color: #007bff;
    display: flex; /* Enables centering */
    align-items: center; /* Vertical centering */
    justify-content: center; /* Horizontal centering */
    border: 2px solid #007bff; 
    border-radius: 8px; /* Softens the corners */
}

.quantity-container input {
    width: 50px;
    text-align: center;
    font-size: 30px;
    padding: 5px;
    border: 1px solid #f8f8f8;
    border-radius: 5px;
}

/* Add to Basket Button */
.add-to-basket {
    display: block;
    width: 300px;
    background-color: #007bff;
    color: white;
    font-size: 22px;
    position: absolute;
    top: 22rem; /* Adjust spacing from top */
    align-items: flex-end;
    padding: 12px;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    text-align: center;
    transition: background 0.3s;
}

.add-to-basket:hover{
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15); /* More prominent shadow on hover */
    background-color:rgb(39, 96, 157); /* Soft gray background on hover */
}

/* Customer Reviews */

.reviews-section {
    width: 100%;
    max-width: 800px;
    margin: 60px auto;
    justify-content:center;
    align-self:center;
    align-items:center;
    text-align:center;  
    padding: 10px 30px;
    background-color:#eeeee4;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    font-family: 'Poppins', sans-serif;
    margin-top:  200px;
}
.review-title {
    font-size: 32px; 
    font-weight: bold;
    color: #007bff; 
    background-color: #e6f0ff; 
    padding: 10px 20px; 
    border-radius: 30px; 
    justify-content:center;
    align-self:center;
    align-items:center;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border: 3px solid #007bff;
    text-transform: uppercase;
    letter-spacing: 2px;    
}


.reviews-section p {
    color: #333333;
    line-height: 1.6;
}

.review {
    background: #fafafa;
    padding: 20px 25px;
    margin-bottom: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    position: relative;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.review:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
}

.review strong {
    font-size: 1.1em;
    color: #100E39;
}

.customer-rating {
    color: #FF5B00;
    font-weight: 600;
    margin: 8px 0;
}

.customer-rating i {
    color: #FFD700;
}

.review em {
    font-size: 0.9em;
    color: #777777;
}

.review hr {
    border: none;
    height: 1px;
    background: #eee;
    margin-top: 20px;
}

/* Leave Review Button */
.review-button {
    display: inline-block;
    width: 100%;
    padding: 15px;
    background: linear-gradient(135deg, #FF5B00, #cc4800);
    color: #ffffff;
    border: none;
    border-radius: 50px;
    font-size: 1em;
    font-weight: bold;
    letter-spacing: 1px;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(255, 91, 0, 0.4);
    transition: background 0.3s ease, box-shadow 0.3s ease;
    margin-top: 30px;
}

.review-button:hover {
    background: linear-gradient(135deg, #cc4800, #FF5B00);
    box-shadow: 0 6px 20px rgba(255, 91, 0, 0.6);
}

.review-button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        /* css for pop up leave a review */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            margin: 15% auto;
            width: 80%;
            max-width: 500px;
            border-radius: 15px;
            position: relative;
        }

        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            top: 10px;
            right: 25px;
            cursor: pointer;
            user-select: none;

        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .stars {
            display: flex;
            justify-content: start;
            gap: 10px;
            user-select: none;

        }

        .stars i {
            font-size: 2rem;
            cursor: pointer;
        }

        .stars i.filled {
            color: gold;
        }


        .modal {
    display: none;
    position: fixed;
    z-index: 1000;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow-y: auto;
    background-color: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(4px);
    padding: 20px;
}

.modal-content {
    background: #ffffff;
    padding: 30px 25px;
    margin: 60px auto;
    width: 100%;
    max-width: 400px;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    font-family: 'Poppins', sans-serif;
    position: relative;
    animation: fadeInUp 0.4s ease;
    display: flex;
    flex-direction: column;
}

@keyframes fadeInUp {
    from {
        transform: translateY(30px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.modal-content h2 {
    font-size: 1.8em;
    color: #100E39;
    margin-bottom: 20px;
    text-align: center;
}

.modal-content form {
    display: flex;
    flex-direction: column;
    gap: 15px;
    width: 100%;
}

.modal-content label {
    font-weight: 600;
    color: #333333;
    font-size: 0.95em;
    margin-bottom: 5px;
    padding-left: 5%;
}

.modal-content input[type="text"],
.modal-content textarea {
    width: 90%;
    align-self: center;
    padding: 12px 15px;
    font-size: 1em;
    border: 2px solid #100E39;
    border-radius: 8px;
    background-color: #fafafa;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.modal-content input[type="text"]:focus,
.modal-content textarea:focus {
    border-color: #FF5B00;
    box-shadow: 0 0 5px rgba(255, 91, 0, 0.3);
}

.modal-content textarea {
    resize:none;
    min-height: 100px;
}

.stars {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin: 0 auto 10px auto;
}

.stars i {
    font-size: 1.8rem;
    color: #FFD700;
    cursor: pointer;
    transition: transform 0.2s ease;
}

.stars i.selected {
    color: #FFD700;
    transform: scale(1.1);
}

.stars i:hover {
    transform: scale(1.2);
}

.modal-content input[type="submit"] {
    width: 90%;
    align-self: center;
    padding: 14px 20px;
    background: linear-gradient(135deg, #FF5B00, #cc4800);
    color: #ffffff;
    border: none;
    border-radius: 50px;
    font-size: 1em;
    font-weight: bold;
    letter-spacing: 1px;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(255, 91, 0, 0.4);
    transition: background 0.3s ease, box-shadow 0.3s ease;
}

    .modal-content input[type="submit"]:hover {
        background: linear-gradient(135deg, #cc4800, #FF5B00);
        box-shadow: 0 6px 20px rgba(255, 91, 0, 0.6);
    }

    .close {
        color: #aaa;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
        position: absolute;
        top: 15px;
        right: 20px;
        transition: color 0.3s ease;
    }

    .close:hover,
    .close:focus {
        color: #100E39;
    }

        .product-info-container {
            display: flex;
            justify-content: center;  /* Center the entire block horizontally */
            align-items: center;  /* Center the entire block vertically */ 
            width: 100%; 
            position: absolute;
            top: 0;
            left: 0;
        }

        .product-info-wrapper {
            text-align: left;  /* Ensures text stays left-aligned */
            max-width: 500px;  /* Adjust as needed */
            width: 100%;
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
                    <button id="dark-mode-toggle">🌙</button>
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

        <div class = "product-info-container">
            <div class="product-info-wrapper">
            <!-- Product Name -->
            <p class="product-name">{{ $mainProduct->name }}</p>
            <!-- Product Price -->
            <p class="product-price">£{{ $mainProduct->price }}</p>
            <!-- Product Rating -->
            <p class="product-rating" id="stars">Rating: </p>
            <!-- Product Description -->
            <p class ="product-description">{{ $mainProduct->description }}</p>
            <!-- Add to Basket Button -->
            <label for="quantity-{{ $mainProduct->id }}"class="quantity-label" style="padding-bottom: 10px;">Quantity:</label>
            <div class="quantity-container">
                <button type="button" class="quantity-btn minus" data-id="{{ $mainProduct->id }}">-</button>
                <input type="text" id="quantity-{{ $mainProduct->id }}" class="quantity-input" 
                    data-id="{{ $mainProduct->id }}" data-name="{{ $mainProduct->name }}" 
                    data-price="{{ $mainProduct->price }}" data-rating="{{ $mainProduct->rating }}" 
                     value="1" readonly>
                <button type="button" class="quantity-btn plus" data-id="{{ $mainProduct->id }}">+</button>
            </div>
            <button class="add-to-basket" data-id="{{ $mainProduct->id }}">Add To Basket</button>
            </div>
        </div>


            <div class="reviews-section">
                <h3 class = review-title>Customer Reviews</h3>

                @if($reviews->isEmpty())
                    <p class="review-text">No reviews yet. Be the first to review this product!</p>
                @else
                    @foreach($reviews as $review)
                        <div class="review">
                            <p class="review-text"><strong>{{ $review->customer_name }}</strong> -
                            <p class="review-text" id="stars-{{ $review->id }}">Rating: </p>
                            </p>
                            <p class="review-text">{{ $review->comment }}</p>
                            <p class="review-text"><em>Reviewed on: {{ \Carbon\Carbon::parse($review->created_at)->format('F j, Y \a\t H:i') }}</em>
                            </p>
                            <hr>
                        </div>
                    @endforeach
                @endif
                <button class="review-button" onclick="openReviewPopup()">Leave a Review</button>

                <div id="reviewPopup" class="modal">
                    <div class="modal-content">
                        <span class="close" onclick="closeReviewPopup()">&times;</span>
                        <h2 class = "review-submit">Submit A Review</h2>

                        <form action="{{ route('reviews.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $mainProduct->id }}">
                            <!-- Dynamic Product ID -->

                            
                            <input type="text" class="review-name-text"name="customer_name" id="customer_name" placeholder=" Name"
                                required><br>

                            <label for="rating"class = "star-rating">Rating (1-5)</label>
                            <div id="rating" class="stars">
                                <i class="fa-regular fa-star" data-value="1"></i>
                                <i class="fa-regular fa-star" data-value="2"></i>
                                <i class="fa-regular fa-star" data-value="3"></i>
                                <i class="fa-regular fa-star" data-value="4"></i>
                                <i class="fa-regular fa-star" data-value="5"></i>
                            </div><br>
                            <input type="hidden" name="rating" id="ratingValue" value="0">
                            <textarea name="comment"class = "review-textbox" id="comment" placeholder="Write your review here..." rows="4"
                                required></textarea><br>

                            <input type="submit" class ="submit-review"value="Submit Review">
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

//display stars for customer reviews and product  js script
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

//open review popup js script
function openReviewPopup() {
    document.getElementById("reviewPopup").style.display = "block";
}

document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("reviewPopup");
    const modalContent = document.querySelector(".modal-content");

    modal.addEventListener("click", function (event) {
        if (event.target === modal) { // Only close when clicking on the background
            closeReviewPopup();
        }
    });
});

//close review popup js script
function closeReviewPopup() {
    document.getElementById("reviewPopup").style.display = "none";
}

//add to basked js script
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

                // Set the custom alert message
                $('#alertMessage').text(`${quantity} x ${name} added to the basket!`);
                $('#customAlert').removeClass('hidden');

                // Close alert on button click
                $('#alertOkButton').off('click').on('click', function () {
                    $('#customAlert').addClass('hidden');
                });
            });
        });

// add review rating stars js script
document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.stars i');
    const ratingValue = document.getElementById('ratingValue');

    stars.forEach(star => {
        star.addEventListener('click', function () {
            const rating = parseInt(this.getAttribute('data-value'));

            ratingValue.value = rating;

            stars.forEach(star => {
                if (parseInt(star.getAttribute('data-value')) <= rating) {
                    star.classList.add('fa-solid', 'fa-star');
                    star.classList.remove('fa-regular');
                    star.style.color = 'gold';
                } else {
                    star.classList.remove('fa-solid', 'fa-star');
                    star.classList.add('fa-regular', 'fa-star');
                    star.style.color = '';
                }
            });
        });
    });
});

            //  Quantity Selector 
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".quantity-container").forEach(container => {
            const minusBtn = container.querySelector(".minus");
            const plusBtn = container.querySelector(".plus");
            const quantityInput = container.querySelector(".quantity-input");

            minusBtn.addEventListener("click", function () {
                let value = parseInt(quantityInput.value);
                if (value > 1) {
                    quantityInput.value = value - 1;
                }
            });

            plusBtn.addEventListener("click", function () {
                let value = parseInt(quantityInput.value);
                if (value < 100) { 
                    quantityInput.value = value + 1;
                }
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
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
