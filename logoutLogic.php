<?php
if(isset($_POST['submit'])){
    setcookie('logged_in', '', time() - 3600, "/");
    setcookie('username', '', time() - 3600, "/");

    // Redirect the user to the login page after logout
    header("Location: http://localhost/kejapap-v1/login.php");
    exit();
}
?>