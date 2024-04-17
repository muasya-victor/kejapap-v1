<?php
require "./app/database.php";
?>

<?php
$connection = $GLOBALS['connection'];

if(isset($_POST['submit'])){
    $house_type = $_POST['property_house_type'];
    $price = $_POST['property_price'];
    $location = $_POST['property_location'];
    $avatar = $_POST['property_avatar'];
    $rented = 0;

    $query = "INSERT INTO property(property_house_type,property_price,property_location,property_avatar,property_rented)";
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

