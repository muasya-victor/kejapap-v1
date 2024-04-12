<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require "app/database.php";

// Delete landlord record
if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $connection = $GLOBALS['connection'];
    $query = "DELETE FROM landlord WHERE landlord_id = $id";
    $delete_query = mysqli_query($connection, $query);

    if (!$delete_query) {
        die("Query Failed" . mysqli_error($connection));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tenants</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<div class="w-full rounded-lg bg-white flex flex-col">

    <div class="border rounded-xl p-4 w-full ">
        <div class="w-full flex justify-end gap-4">
            <form id="pdfForm" method="post" action="#"
                  class="my-2 h-10 flex items-center gap-2 px-4 bg-red-400 text-white  rounded-lg cursor-pointer">
                <input type="submit" name="tableData" id="printPdfBtn" value="Print Pdf">
            </form>

            <form method="post" action="#" class="w-fit">
                <button class="my-2 h-10 flex items-center gap-2 px-4 bg-[#3E2093] text-white  rounded-lg"
                        type="submit" name="fetch">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
                    </svg>
                    <span>View Landlords</span>
                </button>
            </form>
        </div>
        <table class="w-full text-sm text-left mx-auto text-gray-500 dark:text-gray-400 table-fixed pdf">
            <thead class="text-xs text-gray-700 uppercase h-12 bg-gray-50 dark:bg-gray-700 dark:text-gray-400 pdf">
            <tr>
                <th scope="col" class="px-6 py-3">First Name</th>
                <th scope="col" class="px-6 py-3">Last Name</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
            </thead>

            <?php
            $connection = $GLOBALS['connection'];

            if (isset($_POST['fetch'])) {
                $query = "SELECT * FROM landlord";
                $search_query = mysqli_query($connection, $query);

                if (!$search_query) {
                    die("Query Failed" . mysqli_error($connection));
                }

                //count the number of rows
                $count = mysqli_num_rows($search_query);

                /**
                 * check count to see if table has data
                 */
                if ($count == 0) {
                    echo "<h1 class='text-red-400'>No results</h1>";
                } else {
                    while ($row = mysqli_fetch_array($search_query)) {
                        $id = $row['landlord_id'];
                        $fname = $row['landlord_first_name'];
                        $lname = $row['landlord_last_name'];
                        $email = $row['landlord_email'];

                        echo "
                            <tbody class='w-11/12' id='tableData'>
                                <tr class='bg-white border-b dark:bg-gray-900 dark:border-gray-700'>
                                    <td class='px-6 py-4'>$fname</td>
                                    <td class='px-6 py-4'>$lname</td>
                                    <td class='px-6 py-4'>$email</td>
                                    <td class='px-6 py-4 flex items-center gap-2'>
                                        <form method='post' action='#'>
                                            <input type='hidden' name='delete' value='$id'>
                                            <button type='submit' class='my-2 h-10 w-[16] px-4 hover:bg-blue-500 bg-red-400 text-white  rounded'>
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        ";
                    }
                }
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>