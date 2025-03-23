<?php
include 'config.php';

$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;
if (!$product_id) {
    echo "<p>No product ID specified.</p>";
    exit;
}

$query = "SELECT * FROM reviews WHERE product_id = '$product_id' ORDER BY created_at DESC";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reviews</title>
    <link rel="stylesheet" href="css/reviews.css">
</head>
<body>
    <div class="review-container">
        <h2>Customer Reviews for Product ID: <?php echo htmlspecialchars($product_id); ?></h2>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='review'>";
                echo "<p><strong>{$row['customer_name']}</strong> - Rating: " . str_repeat('★', $row['rating']) . str_repeat('☆', 5 - $row['rating']) . "</p>";
                echo "<p>{$row['comment']}</p>";
                echo "<p><em>Reviewed on: {$row['created_at']}</em></p>";
                echo "</div><hr>";
            }
        } else {
            echo "<p>No reviews yet for this product.</p>";
        }
        ?>
    </div>
</body>
</html>
