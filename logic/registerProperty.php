<?php
require "./app/database.php";
?>

<?php
$connection = $GLOBALS['connection'];

if(isset($_POST['submit'])){
    $house_type = $_POST['house_type'];
    $price = $_POST['price'];
    $location = $_POST['location'];
    $avatar = $_POST['avatar'];
    $rented = false;

    $query = "INSERT INTO property(house_type,price,location,avatar,rented)";
    $query .= "VALUES('{$house_type}', $price, '{$location}', '{$avatar}','{$rented}')";

    //$conn = $GLOBALS['connection'];
    $create_post_query = mysqli_query($connection, $query);


    if ($create_post_query) {
        echo '<script>alert("Data Added Successfuly")</script>';

    } else {
        die("Query failed".mysqli_error($connection));
    }
}
?>

