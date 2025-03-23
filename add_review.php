<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $customer_name = $_POST['customer_name'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $query = "INSERT INTO reviews (product_id, customer_name, rating, comment) 
              VALUES ('$product_id', '$customer_name', '$rating', '$comment')";
    
    if ($conn->query($query) === TRUE) {
        header("Location: add_review.php?success=true"); 
        exit();  
    } else {
        echo "<p>There was an error submitting your review. Please try again.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Review</title>
    <link rel="stylesheet" href="css/reviews.css"> 
</head>
<body>
    <div class="review-container">
        <h2>Submit Your Review</h2>

        <?php
        if (isset($_GET['success']) && $_GET['success'] == 'true') {
            echo "<p>Thank you for your review!</p>";
        }
        ?>

        <form action="add_review.php" method="POST">
            <input type="hidden" name="product_id" value="1"> <!-- Replace with dynamic product ID -->
            
            <label for="customer_name">Your Name</label>
            <input type="text" name="customer_name" id="customer_name" placeholder="Your Name" required><br>

            <label for="rating">Rating (1-5)</label>
            <div class="stars">
                <input type="radio" id="star5" name="rating" value="5"><label for="star5">★</label>
                <input type="radio" id="star4" name="rating" value="4"><label for="star4">★</label>
                <input type="radio" id="star3" name="rating" value="3"><label for="star3">★</label>
                <input type="radio" id="star2" name="rating" value="2"><label for="star2">★</label>
                <input type="radio" id="star1" name="rating" value="1"><label for="star1">★</label>
            </div><br>

            <label for="comment">Your Review</label>
            <textarea name="comment" id="comment" placeholder="Write your review here..." rows="4" required></textarea><br>

            <input type="submit" value="Submit Review">
        </form>
    </div>
</body>
</html>
