<?php
require "./app/database.php";

$connection = $GLOBALS['connection'];
$rented = 0;

if (isset($_POST['submit'])) {
    // Escape user input to prevent SQL injection
    $house_type = mysqli_real_escape_string($connection, $_POST['house_type']);
    $price = floatval($_POST['price']); // Convert price to float for better handling
    $location = mysqli_real_escape_string($connection, $_POST['location']);

    // File upload handling
    $avatar_path = '';
    if ($_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $avatar_name = uniqid() . '_' . $_FILES['avatar']['name'];
        $avatar_path = 'projectMedia/' . $avatar_name;
        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar_path)) {
            // File uploaded successfully
        } else {
            // Failed to move the uploaded file
            echo '<script>alert("Failed to upload avatar.")</script>';
        }
    } else {
        // Handle file upload errors
        echo '<script>alert("Error uploading avatar: ' . $_FILES['avatar']['error'] . '")</script>';
    }

    // Prepare the SQL statement with placeholders
    $query = "INSERT INTO property(house_type, price, location, avatar, rented) 
              VALUES(?, ?, ?, ?, ?)";

    // Create a prepared statement
    $stmt = mysqli_prepare($connection, $query);

    // Bind values to the prepared statement
    mysqli_stmt_bind_param($stmt, "ssssi", $house_type, $price, $location, $avatar_path, $rented);

    // Execute the prepared statement
    $create_post_query = mysqli_stmt_execute($stmt);

    if ($create_post_query) {
        echo '<script>alert("Property added successfully!")</script>';

    } else {
        // Provide informative error message
        $error_msg = "Error adding property: " . mysqli_error($connection);
        echo '<script>alert("' . $error_msg . '")</script>';
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
      class="p-4 flex flex-col items-start justify-center gap-4 w-full rounded-lg bg-white"
      enctype="multipart/form-data">

    <h3 class="text-lg font-bold">Property Addition</h3>

    <div class="grid md:grid-cols-1 gap-4 w-full">
        <div class="flex flex-col gap-1 w-[90%]">
            <label for="house_type">House Type</label>
            <select name="house_type" id="house_type" class="border-b-2 p-2
                focus-none outline-none
                text-gray-600 border-gray-400">
                <option value="">Select An Option</option>
                <option value="single_room">Single Room</option>
                <option value="one_bedroom">One Bedroom</option>
                <option value="two_bedroom">Two Bedroom</option>
            </select>
        </div>

        <div class="flex flex-col gap-1 w-[90%]">
            <label for="price">Price In KSH</label>
            <input type="number" name="price" class="border-b-2 p-2
                focus-none outline-none
                text-gray-600 border-gray-400">
        </div>

        <div class="flex flex-col gap-1 w-[90%]">
            <label for="avatar">Avatar</label>
            <input type="file" name="avatar" class="border-b-2 p-2
                focus-none outline-none
                text-gray-600 border-gray-400">
        </div>

        <div class="flex flex-col gap-1 w-[90%]">
            <label for="location">Location Description</label>
            <textarea name="location" class="border-b-2 py-2
                focus-none outline-none
                text-gray-600 border-gray-400"></textarea>
        </div>
    </div>

    <input type="submit" name="submit" class="my-2 h-10 w-[16] px-10 bg-[#3E2093] text-white  rounded-2xl"
           value="Submit">

</form>
