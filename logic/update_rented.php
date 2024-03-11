<?php
// update_rented.php

require "../app/database.php";

$connection = $GLOBALS['connection'];

if (isset($_POST['property_id'])) {
    $property_id = $_POST['property_id'];

    // Update rented status to 1
    $query = "UPDATE property SET rented = 1 WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $property_id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Send back a success response
        http_response_code(200);
        echo "Property rented successfully!";
    } else {
        // Send back an error response
        http_response_code(500);
        echo "Error renting property: " . mysqli_error($connection);
    }

    // Close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}
?>
