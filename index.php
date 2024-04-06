<?php
require "app/database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your meta tags, title, stylesheets, and scripts here -->
</head>
<body class="min-h-screen flex flex-col gap-6 w-full items-start justify-start bg-gray-50 relative">

<!-- Add your success and error card components here -->

<div class="w-full h-full">
    <div class="z-50 fixed top-0 w-full">
        <?php
        require 'components/navBar.php'
        ?>
    </div>

    <div class="w-full h-[350px] bg-[url('images/kitchen.jpg')]
            bg-cover bg-no-repeat bg-center relative mt-10">
        <!-- Add your welcome text and image content here -->
    </div>

    <div class="w-10/12 min-h-[600px]
            rounded-md bg-white absolute top-[40%] left-1/2 transform -translate-x-1/2
            flex flex-col gap-2 p-4">
        <h3 class="text-xl font-bold">Properties</h3>
        <div class="flex flex-wrap gap-4 my-2">
            <?php
            $connection = $GLOBALS['connection'];

            $query = "SELECT * FROM property where property_rented = '0'";
            $search_query = mysqli_query($connection, $query);

            if (!$search_query) {
                die("Query Failed" . mysqli_error($connection));
            }

            $count = mysqli_num_rows($search_query);

            if ($count == 0) {
                echo "<h1 class='text-red-400'>No results</h1>";
            } else {

                while ($row = mysqli_fetch_array($search_query)) {
                    $price = $row['property_price'];
                    $location = $row['property_location'];
                    $avatar = $row['property_avatar'];
                    $property_id = 2;

                    echo '<div class="flex flex-col gap-2 rounded-lg border border-gray-300 w-[270px]">
                                <img src="projectMedia/' . $avatar . '" class="rounded-t-lg h-[150px]">
                                <div class="flex flex-col gap-2 p-2">
                                    <h3 class="text-lg font-bold">KES ' . $price . '</h3>
                                    <p class="text-gray-600 font-semibold text-sm">
                                        ' . $location . '
                                    </p>
                                    <button
                                        data-property-id="' . $property_id . '"
                                        class="rent-btn h-10 w-full mt-4  flex rounded-lg
                                        border border-[#3E2093] hover:bg-blue-100
                                        items-center gap-2 justify-center">
                                        Rent
                                    </button>
                                </div>
                            </div>';
                }
            }
            ?>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const rentButtons = document.querySelectorAll('.rent-btn');

        rentButtons.forEach(button => {
            button.addEventListener('click', function() {
                const propertyId = this.getAttribute('data-property-id');

                // Send an AJAX request to update rented status
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'logic/update_rented.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Update the UI or handle response as needed
                        button.disabled = true;
                        button.textContent = 'Rented';
                    } else {
                        console.error('Request failed:', xhr.status, xhr.statusText);
                    }
                };
                xhr.send('property_id=' + propertyId);
            });
        });
    });
</script>
</body>
</html>
