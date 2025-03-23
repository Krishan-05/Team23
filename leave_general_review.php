<?php
include 'config.php'; 

session_start(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name']);
    $review = trim($_POST['review']);

    if (!empty($name) && !empty($review)) {

        $sql = "INSERT INTO generalreviews (name, review) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $name, $review);

        if ($stmt->execute()) {
            $_SESSION['message'] = "✅ Thank you for your review!";
        } else {
            $_SESSION['message'] = "❌ Error: " . $conn->error;
        }

        $stmt->close();
    } else {
        $_SESSION['message'] = "❌ Please fill in all fields.";
    }

    $conn->close();

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leave a Review!</title>
    <link rel="stylesheet" href="css/reviews.css">
</head>
<body>

<div class="review-container">
<h2>Leave a Review!</h2>

<?php
if (isset($_SESSION['message'])):
?>
    <div class="message"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div>
<?php endif; ?>

<form action="" method="POST">
    <label for="name">Your Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="review">Your Review:</label>
    <textarea name="review" id="review" rows="5" required></textarea>

    <button type="submit">Submit Review</button>
</form>

<a href="call-to-action.php">⬅ Back to Home</a>
</div>

</body>
</html>
