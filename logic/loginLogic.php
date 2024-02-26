<?php

require "app/database.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //to prevent from mysqli injection
    $con = $GLOBALS['connection'];
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);

    $sql = "select *from user where username = '$username' and password = '$password'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    $user_type = $row['user_type'];

    if($count == 1){

        setcookie('username', $username, time() + (86400), "/");
        setcookie('user_type', $user_type, time() + (86400), "/");
        setcookie('logged_in', true, time() + (86400), "/");

        echo "
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var successCard = document.getElementById('successCard');
            
                setTimeout(function() {
                    successCard.classList.remove('hidden');
                    setTimeout(function() {
                        successCard.classList.add('hidden');
                    }, 3000); // Hide after 3 seconds
                }, 2000); // Show after 2 seconds
            });
        </script>
        ";

        header("Location: http://localhost/kejapap-v1/index.php");

    }
    else{
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
}
?>