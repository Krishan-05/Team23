<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $file = $_FILES['file'];
    $file_name = basename($file['name']);
    $file_tmp = $file['tmp_name'];

    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    if ($file_ext != "pdf") {
        header("Location: add_newsletters.php?status=invalid");
        exit();
    }

    $target_dir = "newsletters/";
    $target_file = $target_dir . $file_name;

    if (move_uploaded_file($file_tmp, $target_file)) {

        $sql = "INSERT INTO newsletters (title, filename) VALUES ('$title', '$file_name')";

        if (mysqli_query($conn, $sql)) {
            header("Location: add_newsletters.php?status=success");
            exit();
        } else {
            header("Location: add_newsletters.php?status=dberror");
            exit();
        }

    } else {
        header("Location: add_newsletters.php?status=uploadfail");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Newsletter - beActive</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f4f4f4;
            font-family: "Space Grotesk", sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 400px;
        }

        h2 {
            color: #100E39;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #FF5B00;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #cc4800;
        }

        .message {
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Add Newsletter</h2>

        <div class="message">
            <?php
            if (isset($_GET['status'])) {
                switch ($_GET['status']) {
                    case 'success':
                        echo "<p style='color:green;'>Newsletter added successfully!</p>";
                        break;
                    case 'invalid':
                        echo "<p style='color:red;'>Only PDF files are allowed.</p>";
                        break;
                    case 'dberror':
                        echo "<p style='color:red;'>Database error. Please try again.</p>";
                        break;
                    case 'uploadfail':
                        echo "<p style='color:red;'>Failed to upload PDF file.</p>";
                        break;
                }
            }
            ?>
        </div>

        <form action="" method="POST" enctype="multipart/form-data">
            <label for="title">Newsletter Title</label>
            <input type="text" id="title" name="title" required>

            <label for="file">Upload PDF</label>
            <input type="file" id="file" name="file" accept="application/pdf" required>

            <button type="submit">Add Newsletter</button>
        </form>
    </div>

</body>
</html>
