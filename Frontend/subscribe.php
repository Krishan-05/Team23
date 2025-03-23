<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "beactive1"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);

    $checkQuery = "SELECT * FROM NewsletterSubscriptions WHERE email = '$email'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        echo "This email is already subscribed!";
    } else {
        $sql = "INSERT INTO NewsletterSubscriptions (email) VALUES ('$email')";

        if ($conn->query($sql) === TRUE) {
            echo "Thank you for subscribing!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$conn->close();
?>
