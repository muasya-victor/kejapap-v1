<?php
require "./app/database.php";
?>

<?php
$connection = $GLOBALS['connection'];

if(isset($_POST['submit'])){
    $fname = $_POST['feedback_first_name'];
    $lname = $_POST['feedback_last_name'];
    $phone = $_POST['feedback_phone'];
    $email = $_POST['feedback_email'];
    $message = $_POST['feedback_message'];

    $query = "INSERT INTO feedback(feedback_first_name,feedback_last_name,feedback_phone,feedback_email,feedback_message)";
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

