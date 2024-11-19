<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anomu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: 'Poppins', Arial, sans-serif;
            background-image: url('bg image 1.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-height: 100vh;
        }

        /* Header */
        .header {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.8);
            padding: 6px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .header h1 {
            font-size: 1.8rem;
            margin-left: 10px;
        }

        .header button {
            background: #ffffff;
            color: #6a11cb;
            border: none;
            border-radius: 50px;
            padding: 8px 20px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .header button:hover {
            background: #2575fc;
            color: #ffffff;
            transform: scale(1.05);
        }

        /* Logo Section */
        .logo {
            text-align: center;
            margin-top: 100px;
        }

        .logo h1 {
            font-size: 3rem;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
            color: #ffff00;
        }

        .logo h2 {
            font-size: 1.3rem;
            font-weight: 400;
            opacity: 0.9;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
            color: #6aff00;
            font-weight: bolder;
        }

        /* Message Form */
        .message-area {
            display: flex;
            align-items: center;
            margin-top: 40px;
            width: 100%;
            max-width: 600px;
        }

        #message {
            flex: 1;
            height: 50px;
            width: 35vw;
            border: none;
            border-radius: 25px;
            padding: 0 20px;
            font-size: 1rem;
            outline: none;
            margin-right: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        #send {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            border: none;
            background: #ffffff;
            color: #6a11cb;
            font-size: 1.5rem;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: background 0.3s ease, transform 0.2s ease;
        }

        #send:hover {
            background: #2575fc;
            color: #ffffff;
            transform: scale(1.1);
        }

        /* Single Message Box */
        .message-dashboard {
            margin-top: 50px;
            display: flex;
            justify-content: center;
            max-width: 800px;
        }

        .message-card {
            background: #00000091;
            color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 250px;
            height: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-weight: 500;
            font-size: 1.2rem;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.3s ease;
            text-decoration: none;
        }

        .message-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .message-card a {
            color: inherit;
            text-decoration: none;
            display: block;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>IMPOSTER JACK</h1>
        <button onclick="window.location.href='login.php'">Login</button>
    </div>

    <!-- Logo Section -->
    <div class="logo">
        <h1>Welcome to JACK World</h1>
        <h2>Your trusted anonymous message platform</h2>
    </div>

    <!-- Message Input Form -->
    <form action="message.php" method="POST">
        <div class="message-area">
            <input type="text" name="message" required id="message" placeholder="Type your message" />
            <button type="submit" id="send">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>

        <input type="hidden" name="ip_add" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
        <input type="hidden" name="mac_add" value="<?php echo exec('getmac'); ?>">
        <input type="hidden" name="id" value="<?php echo time(); ?>">
    </form>

    <!-- Single Box for Viewing Messages -->
   <!-- Single Box for Viewing Messages -->
<div class="message-dashboard">
    <div class="message-card">
        <a href="login.php">View All Messages</a>
    </div>
</div>

</body>
</html>
