<?php
require "app/database.php"
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
    <div class="w-full flex justify-end">
                    <button class="my-2 h-10 flex items-center gap-2 px-4 bg-red-400 text-white  rounded-lg"
                            id="printPdfBtn"
                            type="button" name="fetch">
                        <span>Print Pdf</span>
                    </button>

                <form method="post" action="#" class="w-fit">
                    <!--            <input type="submit" name="fetch"-->
                    <!--                   class="my-2 h-10 w-[16] px-10 bg-[#3E2093] text-white  rounded-lg"-->
                    <!--                   value="fetch">-->

                    <button class="my-2 h-10 flex items-center gap-2 px-4 bg-[#3E2093] text-white  rounded-lg"
                            type="submit" name="fetch">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>

                        <span>View Landlords</span>
                    </button>
                </form>
            </div>
        <table class="w-full text-sm text-left mx-auto
            text-gray-500 dark:text-gray-400 table-fixed pdf">

            

            <thead class="text-xs text-gray-700 uppercase h-12
                    bg-gray-50 dark:bg-gray-700 dark:text-gray-400 pdf">
            <tr>
                <th scope="col" class="px-6 py-3">First Name</th>
                <th scope="col" class="px-6 py-3">Last Name</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
            </thead>

            <?php

            $connection = $GLOBALS['connection'];

            if(isset($_POST['fetch'])){
                $query = "SELECT * FROM user where user_type='landlord'";
                $search_query = mysqli_query($connection, $query);

                if(!$search_query){
                    die("Query Failed". mysqli_error($connection));
                }

                //count the number of rows
                $count = mysqli_num_rows($search_query);

                /**
                 * check count to see if table has data
                 */
                if ($count == 0){
                    echo "<h1 class='text-red-400'>No results</h1>";
                }else {

                    while ($row=mysqli_fetch_array($search_query)){
                        $fname = $row['fname'];
                        $lname = $row['lname'];
                        $email = $row['email'];

                        echo "
                            <tbody class='w-11/12'>
                                <tr class='bg-white border-b dark:bg-gray-900 dark:border-gray-700'>
                                    <td class='px-6 py-4'>$fname</td>
                                    <td class='px-6 py-4'>$lname</td>
                                    <td class='px-6 py-4'>$email</td>
                                    <td class='px-6 py-4 flex items-center gap-2'>
                                        <button class='my-2 h-10 w-[16] px-4 bg-blue-400 
                                            hover:bg-blue-500
                                            text-white  rounded'>
                                            <span>
                                                Edit
                                            </span>
                                        </button>
                                        <button class='my-2 h-10 w-[16] px-4 
                                            hover:bg-blue-500
                             
                                            bg-red-400 text-white  rounded'>
                                                    <span>
                                                        Delete
                                                    </span>
                                        </button>
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
<script>
    document.getElementById('printPdfBtn').addEventListener('click', function () {
        var pdf = new jsPDF();
        pdf.html(document.querySelector('.pdf'), {
            callback: function (pdf) {
                pdf.save('report.pdf');
            }
        });
    });
</script>
</body>
</html>
