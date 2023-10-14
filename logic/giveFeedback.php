<?php
require "./app/database.php";
?>

<?php
$connection = $GLOBALS['connection'];

if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $query = "INSERT INTO feedback(fname,lname,phone,email,message)";
    $query .= "VALUES('{$fname}', '{$lname}', '{$phone}', '{$email}', '{$message}')";
//    $conn = $GLOBALS['connection'];
    $create_post_query = mysqli_query($connection, $query);


    if ($create_post_query) {

        echo '<script>alert("Feed Back Posted")</script>';
        $query = "";
    } else {
        die("Query failed".mysqli_error($connection));
    }
}
?>

