<?php
include_once "conn.php";
        foreach ($messages as $messages) {
            echo "<div class='message-card'>";
            echo "<a href='login.php'>";  
            echo "<p><strong>Message:</strong> " . htmlspecialchars($messages['message']) . "</p>";
            echo "</a>";
            echo "</div>";
        }
        ?>

