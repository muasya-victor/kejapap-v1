<?php
    require "logic/loginLogic.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact joyland</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen relative flex flex-col gap-6 w-full items-center justify-start bg-gray-50">

<div id="successCard" class="hidden absolute top-0 left-0 w-full h-full flex items-center justify-center">
    <div class="bg-green-500 px-6 py-2 rounded-lg shadow-lg text-white">
        <div class="text-2xl font-semibold mb-2">Success!</div>
        <div>Successfully Logged In</div>
    </div>
</div>

<div id="errorCard" class="hidden absolute top-0 left-0 w-full h-full flex items-center justify-center">
    <div class="bg-red-500 px-6 py-2 rounded-lg shadow-lg text-white">
        <div class="text-2xl font-semibold mb-2">Error!</div>
        <div>Invalid Credentials</div>
    </div>
</div>

<div class=" z-50 fixed top-0 w-full">
    <?php
    require 'components/navBar.php'
    ?>
</div>



<div class="min-h-fit flex flex-col md:flex-row w-full md:w-5/12 p-2 bg-white rounded-lg
        mt-32 md:mt-24">


    <form method="post"
          class="p-4 w-full flex flex-col items-start justify-center gap-4 ">

        <h3 class="font-bold text-lg">Login</h3>

        <div class="grid grid-cols-1 gap-4 w-full">
            <div class="flex flex-col gap-1 w-[90%]">
                <label for="username">Username</label>
                <input type="text" name="username" class="border-b-2 p-2
                focus-none outline-none
                text-gray-600 border-gray-400" >
            </div>

            <div class="flex flex-col gap-1 w-[90%]">
                <label for="password">Password</label>
                <input type="password" name="password" class="border-b-2 p-2
                focus-none outline-none
                text-gray-600 border-gray-400" >
            </div>


            <input type="submit" name="submit"
                   class="my-2 h-10 w-fit px-10 bg-[#3E2093] text-white  rounded-2xl"
                   value="Submit">

            <div class="flex flex-wrap gap-2 hidden">
                <p class="">Don't Have an account ? Register as</p>
                <button type="button"
                        onclick="openNewPage('http://localhost/joyland/tenants.php')"
                        class="text-lg font-bold text-violet-800
                        hover:text-violet-900 underline">
                    Tenant
                </button>

                <button type="button"
                        onclick="openNewPage('http://localhost/joyland/landlords.php')"
                        class="text-lg font-bold text-violet-800
                        hover:text-violet-900 underline">Landlord</button>
            </div>

    </form>
</div>

    <script>
        function openNewPage(path) {
            window.location = path;
        }

    </script>
</body>
</html>