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

    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        // Specify the folder to move the avatar to
        $target_directory = "projectMedia/";

        // Extract the filename from the avatar path
        $avatar_name = basename($_FILES["avatar"]["name"]);

        // Set the destination path
        $destination = $target_directory . $avatar_name;

        // Move the uploaded file to the destination folder
        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $destination)) {
            echo "The file ". $avatar_name. " has been uploaded.";
        } else {
            echo "Sorry, there was an error moving the uploaded file.";
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

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

