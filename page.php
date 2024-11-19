<?php
include_once "conn.php"; 

$sql = "SELECT * FROM messages ORDER BY id DESC"; 
$result = mysqli_query($con, $sql);

$messages = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $messages[] = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - Anonymous</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            height: 100vh; /* Ensures the body height matches the viewport height */
            margin: 0; /* Removes default body margin */
            background-image: url('images.jpeg'); 
            background-size: cover; 
            background-position: center center; 
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
        }

        .message-container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .message-container h1 {
            color: #e5ff00;
        }
        .message-card {
            background-color: #f6ff009c;
            padding: 15px;
            opacity: 0.9;
            border-radius: 10px;
            box-shadow: 0 10px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .message-header {
            font-weight: bold;
            color: #000000;
            margin-bottom: 10px;
        }

        .message-body {
            color: #555;
            font-size: 1.1rem;
        }
        .message-body p {
            color: #000000;
            font-weight: bolder;
            font-size: larger;
        }

        .message-footer {
            text-align: right;
            color: #777;
            font-size: 0.9rem;
        }

        .message-card:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .message-footer a {
            color: #3b98c2;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="message-container">
    <h1>Imposter Jack</h1>
    

    <?php foreach ($messages as $message): ?>
        <div class="message-card">
            <div class="message-header">
                <strong>JACK BHAYA</strong>
            </div>
            <div class="message-body">
                <p><?php echo htmlspecialchars($message['message']); ?></p>
            </div>
            <div class="message-footer">
            </div>
        </div>
    <?php endforeach; ?>

</div>

</body>
</html>
