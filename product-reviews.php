<?php include 'config.php'; ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Reviews</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        
.reviews-section {
    width: 100%;
    max-width: 800px;
    margin: 60px auto;
    padding: 40px 30px;
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    font-family: 'Poppins', sans-serif;
}

.reviews-section h3 {
    font-size: 2em;
    color: #100E39;
    text-align: center;
    margin-bottom: 30px;
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
    width: 100%;
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

@media (max-width: 768px) {
    .modal-content {
        width: 95%;
        padding: 25px 20px;
        margin: 40px auto;
    }

    .modal-content h2 {
        font-size: 1.6em;
    }

    .stars i {
        font-size: 1.5rem;
    }
}


    </style>

</head>
<body>

    <div class="reviews-section">
        <h3>Customer Reviews</h3>


        <div class="reviews-list">
            <div class="review">
                <p><strong>Jane Doe</strong></p>
                <p class="customer-rating">
                    Rating:
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </p>
                <p>This product is amazing! Highly recommended.</p>
                <p><em>Reviewed on: March 18, 2025 at 14:00</em></p>
                <hr>
            </div>

            <div class="review">
                <p><strong>John Smith</strong></p>
                <p class="customer-rating">
                    Rating:
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </p>
                <p>Pretty decent, but there’s room for improvement.</p>
                <p><em>Reviewed on: March 15, 2025 at 10:30</em></p>
                <hr>
            </div>

        </div>

        <button class="review-button" onclick="openReviewPopup()">Leave a Review</button>

        <div id="reviewPopup" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeReviewPopup()">&times;</span>
                <h2>Submit Your Review</h2>

                <form action="#" method="POST" id="reviewForm">
                    <label for="customer_name">Your Name</label>
                    <input type="text" name="customer_name" id="customer_name" placeholder="Your Name" required>

                    <label for="rating">Rating</label>
                    <div id="rating" class="stars">
                        <i class="fa-regular fa-star" data-value="1"></i>
                        <i class="fa-regular fa-star" data-value="2"></i>
                        <i class="fa-regular fa-star" data-value="3"></i>
                        <i class="fa-regular fa-star" data-value="4"></i>
                        <i class="fa-regular fa-star" data-value="5"></i>
                    </div>
                    <input type="hidden" name="rating" id="ratingValue" value="0">

                    <label for="comment">Your Review</label>
                    <textarea name="comment" id="comment" placeholder="Write your review here..." rows="4" required></textarea>

                    <input type="submit" value="Submit Review">
                </form>
            </div>
        </div>
    </div>

    <script>
        function openReviewPopup() {
            document.getElementById('reviewPopup').style.display = 'block';
        }

        function closeReviewPopup() {
            document.getElementById('reviewPopup').style.display = 'none';
        }

        window.onclick = function(event) {
            const modal = document.getElementById('reviewPopup');
            if (event.target === modal) {
                modal.style.display = "none";
            }
        };

        const stars = document.querySelectorAll('#rating .fa-star');
        const ratingValueInput = document.getElementById('ratingValue');

        stars.forEach(star => {
            star.addEventListener('click', () => {
                const rating = star.getAttribute('data-value');
                ratingValueInput.value = rating;

                stars.forEach(s => {
                    s.classList.remove('fa-solid');
                    s.classList.add('fa-regular');
                });

                for (let i = 0; i < rating; i++) {
                    stars[i].classList.add('fa-solid');
                    stars[i].classList.remove('fa-regular');
                }
            });
        });
    </script>

</body>
</html>
