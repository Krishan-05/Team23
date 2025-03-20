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
/* General Page Styling */
/* General Styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f8f8;
    color: #333;
    margin: 0;
    padding: 0;
}

/* Product Page Container */
.product-container {
    display: flex;
    max-width: 1200px;
    margin: auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Product Image Section */
.product img {
    left:20px;
    align-items: center; /* Centers vertically */
    width: 25%;
    padding: 20px;
    max-width: 1600px; /* Increase size but keep responsiveness */
    max-height: 1600px; /* Limits excessive height */
    border-radius: 10px;
    display: block; /* Ensure proper centering */
    margin-left:0px; /* Center in the container */
}

/* Product Details */
.product-details {
    flex: 1;
    padding: 20px;
}

.product-name {
    font-size: 50px; /* Larger for emphasis */
    font-weight: bold;
    color: rgb(0, 0, 0);
    letter-spacing: 1px; /* Adds subtle spacing for readability */
    text-transform: capitalize; /* Ensures first letter is uppercase */
    
    position: absolute; /* Allows precise placement */
    top: 200px; /* Positions it near the top */
    right: 500px; /* Aligns it to the right */
    
    text-align: right; /* Ensures proper alignment */
}
.product-price {
    font-size: 50px; /* Larger for emphasis */
    font-weight: bold;
    color: rgb(0, 0, 0);
    letter-spacing: 1px; /* Adds subtle spacing for readability */
    text-transform: capitalize; /* Ensures first letter is uppercase */
    
    position: absolute; /* Allows precise placement */
    top: 300px; /* Positions it near the top */
    right: 765px; /* Aligns it to the right */
    
    text-align: right; /* Ensures proper alignment */
}

/* Rating */
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

    /* Centering the element itself */
    display: block;
    margin: 0 auto;
}
.quantity-label {

    position: absolute; /* For top-right positioning */
    top: 490px;
    right: 794px;
    font-size: 20px;
    font-weight: bold;
    color: #007bff;
    text-transform: uppercase;
    letter-spacing: 1px;

}

.product-rating {
    position: absolute; /* Enables precise positioning */
    top: 200px; /* Distance from the top */
    right: 725px; /* Distance from the right */

    font-size: 20px; /* Slightly larger for better visibility */
    font-weight: bold; /* Makes it stand out */
    color: #007bff; /* Blue color */
    text-transform: uppercase; /* Makes it more prominent */
    letter-spacing: 1px; /* Enhances readability */
    margin-bottom: 5px; /* Adds spacing */
}

/* Description */
.product-description {
    position: absolute; /* Enables precise positioning */
    top: 290px; /* Distance from the top */
    right: 337px; /* Distance from the right */

    font-size: 20px; /* Slightly larger for better visibility */
    font-weight: bold; /* Makes it stand out */
    color:rgb(62, 63, 64); /* Blue color */
    text-transform: uppercase; /* Makes it more prominent */
    letter-spacing: 1px; /* Enhances readability */
    margin-bottom: 5px; /* Adds spacing */
}

/* Quantity Selector */
.quantity-container {  
position: absolute;
right: 730px; /* Move it to the right side */
top: 520px; /* Adjust spacing from top */
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
    border: 2px solid #007bff; /* Optional for improved appearance */
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
    width: 25%;
    background-color: #007bff;
    color: white;
    font-size: 22px;
    position: absolute;
    left: 1600px; /* Move it to the right side */
    top: 600px; /* Adjust spacing from top */
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
.customer-reviews {
    margin-top: 30px;
}

.review-name-text {
    width: 100%; 
    max-width: 400px; 
    padding: 10px 15px; 
    font-size: 18px;
    color: #007bff;
    background-color: #f0f8ff; 
    border: 2px solid #007bff; 
    border-radius: 8px; 
    outline: none; 
    box-shadow: 0 3px 6px rgba(0, 123, 255, 0.2); 
    transition: border 0.3s, box-shadow 0.3s; 
    display: block; 
    margin: 0 auto; /* Centers the text box */
    text-align: center; /* Centers text inside the box */
}
.review-textbox {
    width: 100%;
    max-width: 500px; 
    height: 150px; 
    padding: 15px 20px; 
    font-size: 20px; 
    color: #007bff;
    background-color: #f0f8ff;
    border: 3px solid #007bff; 
    border-radius: 10px; 
    outline: none;
    box-shadow: 0 3px 8px rgba(0, 123, 255, 0.2);
    transition: border 0.3s, box-shadow 0.3s;
    display: block;
    margin: 0 auto;
    text-align: center; 
    resize: none; /* Prevents resizing for a cleaner layout */
}

.review-textbox:focus {
    border: 3px solid #0056b3; 
    box-shadow: 0 4px 12px rgba(0, 86, 179, 0.4);
}
.review-name-text:focus {
    border: 2px solid #0056b3; 
    box-shadow: 0 4px 10px rgba(0, 86, 179, 0.4); 
}
.reviews-section{
    background-color:#eeeee4;
}
.review-title {
    font-size: 32px; 
    font-weight: bold;
    color: #007bff; 
    background-color: #e6f0ff; 
    padding: 10px 20px; 
    border-radius: 30px; 
    text-align: center;
    width: fit-content; 
    margin: 0 auto 20px; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border: 3px solid #007bff;
    text-transform: uppercase;
    letter-spacing: 2px; 
}
.review-button{
    display: block;
    width: 25%;
    background-color: #007bff;
    color: white;
    font-size: 22px;
    align-items: flex-end;
    padding: 12px;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    text-align: center;
    transition: background 0.3s;
}

.modal {
            display: none;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
        }

        .modal-content {
            background: #ffffff;
            padding: 40px 30px;
            margin: 5% auto;
            width: 90%;
            max-width: 500px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            font-family: 'Poppins', sans-serif;
            position: relative;
            animation: fadeInUp 0.4s ease;
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
            font-size: 2.2em;
            color: #100E39;
            margin-bottom: 20px;
            text-align: center;
        }

        .modal-content form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        .modal-content label {
            align-self: flex-start;
            margin-left: 5%;
            font-weight: 600;
            color: #333333;
        }

        .modal-content input[type="text"],
        .modal-content textarea {
            width: 90%;
            max-width: 400px;
            padding: 12px 15px;
            font-size: 1em;
            border: 2px solid #100E39;
            border-radius: 8px;
            outline: none;
            background-color: #fafafa;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .modal-content input[type="text"]:focus,
        .modal-content textarea:focus {
            border-color: #FF5B00;
            box-shadow: 0 0 5px rgba(255, 91, 0, 0.3);
        }

        .modal-content textarea {
            resize: none;
            min-height: 100px;
        }

        .stars {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 10px 0 20px 0;
        }

        .stars i {
            font-size: 2rem;
            color: #FFD700;
            margin: 0 5px;
        }


        .stars i.selected {
            color: #FFD700;
            transform: scale(1.1);
        }
.modal {
            display: none;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
        }

        .modal-content {
            background: #ffffff;
            padding: 40px 30px;
            margin: 5% auto;
            width: 90%;
            max-width: 500px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            font-family: 'Poppins', sans-serif;
            position: relative;
            animation: fadeInUp 0.4s ease;
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
            font-size: 2.2em;
            color: #100E39;
            margin-bottom: 20px;
            text-align: center;
        }

        .modal-content form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        .modal-content label {
            align-self: flex-start;
            margin-left: 5%;
            font-weight: 600;
            color: #333333;
        }

        .modal-content input[type="text"],
        .modal-content textarea {
            width: 90%;
            max-width: 400px;
            padding: 12px 15px;
            font-size: 1em;
            border: 2px solid #100E39;
            border-radius: 8px;
            outline: none;
            background-color: #fafafa;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .modal-content input[type="text"]:focus,
        .modal-content textarea:focus {
            border-color: #FF5B00;
            box-shadow: 0 0 5px rgba(255, 91, 0, 0.3);
        }

        .modal-content textarea {
            resize: none;
            min-height: 100px;
        }

        .stars {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 10px 0 20px 0;
        }

        .stars i {
            font-size: 2rem;
            color: #FFD700;
            margin: 0 5px;
        }


        .stars i.selected {
            color: #FFD700;
            transform: scale(1.1);
        }

        .stars i:hover {
            color: #FFD700;
        }

        .modal-content input[type="submit"] {
            width: 90%;
            max-width: 400px;
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

        @media (max-width: 768px) {
            .reviews-section {
                padding: 30px 20px;
            }

            .modal-content {
                width: 95%;
                padding: 30px;
            }

            .modal-content h2 {
                font-size: 2em;
            }
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



            <div class="reviews-section">
                <h3 class = review-title>Customer Reviews</h3>

                @if($reviews->isEmpty())
                    <p>No reviews yet. Be the first to review this product!</p>
                @else
                    @foreach($reviews as $review)
                        <div class="review">
                            <p><strong>{{ $review->customer_name }}</strong> -
                            <p class="customer-rating" id="stars-{{ $review->id }}">Rating: </p>
                            </p>
                            <p>{{ $review->comment }}</p>
                            <p><em>Reviewed on: {{ \Carbon\Carbon::parse($review->created_at)->format('F j, Y \a\t H:i') }}</em>
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

        alert(`${quantity} x ${name} added to the basket!`);
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

            // 🔹 Quantity Selector Script (NEW)
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
                if (value < 100) { // Adjust max limit if needed
                    quantityInput.value = value + 1;
                }
            });
        });
    });

    </script>

</body>

</html>