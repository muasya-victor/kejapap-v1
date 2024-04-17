<?php

require "app/database.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_hash = hash('sha256', $password . 'max');

    // Prevent SQL injection using prepared statements
    $con = $GLOBALS['connection'];
    $sql = "SELECT * FROM user WHERE username = ? AND user_password = ?";
    
    // Prepare the SQL statement
    if ($stmt = mysqli_prepare($con, $sql)) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ss", $username, $password_hash);
        
        // Execute the statement
        mysqli_stmt_execute($stmt);
        
        // Store the result
        $result = mysqli_stmt_get_result($stmt);
        
        // Fetch the row
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        // Get the number of rows
        $count = mysqli_num_rows($result);
        
        // Check if a user with the provided credentials exists
        if ($count == 1) {
            // User found, set cookies
            $user_type = $row['user_type'];
            setcookie('username', $username, time() + (86400), "/");
            setcookie('user_type', $user_type, time() + (86400), "/");
            setcookie('logged_in', true, time() + (86400), "/");
            
            // Redirect to home page
            header("Location: /");
            exit();
        } else {
            // No user found with the provided credentials
            echo "
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var errorCard = document.getElementById('errorCard');
                    
                    setTimeout(function() {
                        errorCard.classList.remove('hidden');
                        setTimeout(function() {
                            errorCard.classList.add('hidden');
                        }, 3000); // Hide after 3 seconds
                    }, 2000); // Show after 2 seconds
                });
            </script>
            ";
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        // Error handling
        echo "Error: " . mysqli_error($con);
    }
}
?>
