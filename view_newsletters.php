<?php
include 'config.php';

$sql = "SELECT * FROM newsletters ORDER BY id ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>beActive Newsletters</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&display=swap" rel="stylesheet">
    <style>

        body {
            margin: 0;
            padding: 0;
            background: #f4f4f4;
            font-family: "Space Grotesk", sans-serif;
            font-size: 18px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            color: #100E39;
            margin-bottom: 40px;
            animation: fadeIn 1.5s ease-in-out;
        }

        .newsletter-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            animation: fadeInUp 1.5s ease-in-out;
        }

        .card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 20px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            font-size: 1.5rem;
            color: #100E39;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .card a {
            display: inline-block;
            padding: 12px 20px;
            color: #ffffff;
            background-color: #FF5B00;
            border-radius: 25px;
            text-decoration: none;
            font-size: 1rem;
            transition: all 0.3s ease-in-out;
        }

        .card a:hover {
            background-color: #cc4800;
            transform: translateY(-5px);
        }

        @media (max-width: 768px) {
            .newsletter-grid {
                flex-direction: column;
                align-items: center;
            }
        }

    </style>
</head>
<body>

    <main>
        <div class="container">

            <h2 class="section-title">Newsletters:</h2>

            <div class="newsletter-grid">

                <?php
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $title = htmlspecialchars($row['title']);
                        $filename = htmlspecialchars($row['filename']);
                        echo '<div class="card">';
                        echo '<div class="card-title">' . $title . '</div>';
                        echo '<a href="newsletters/' . urlencode($filename) . '" target="_blank">View Newsletter</a>';
                        echo '</div>';
                    }
                } else {
                    echo '<p style="text-align: center;">No newsletters found.</p>';
                }

                $conn->close(); 
                ?>

            </div>
        </div>
    </main>


</body>
</html>
