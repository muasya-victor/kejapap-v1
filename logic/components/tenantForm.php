
<?php
    require "logic/registerTenant.php"
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>register tenant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">
</head>
<body class="relative">

<div id="successCard" class="hidden absolute top-0 left-0 w-full h-full flex items-center justify-center">
    <div class="bg-green-500 px-6 py-2 rounded-lg shadow-lg text-white">
        <div class="text-2xl font-semibold mb-2">Success!</div>
        <div>Tenant Registered.</div>
    </div>
</div>

<form method="post" action="#"
      class="p-4 flex flex-col items-start justify-center gap-4 w-full rounded-lg bg-white">

    <h3 class="text-lg font-bold">Tenant Registration</h3>

    <div class="grid md:grid-cols-1 gap-4 w-full  ">
        <div class="flex flex-col gap-1 w-[90%]">
            <label for="user_first_name">First Name</label>
            <input type="text" name="user_first_name" class="border-b-2 p-2
                focus-none outline-none
                text-gray-600 border-gray-400" >
        </div>

        <div class="flex flex-col gap-1 w-[90%]">
            <label for="user_last_name">Last Name</label>
            <input type="text" name="user_last_name" class="border-b-2 p-2
                focus-none outline-none
                text-gray-600 border-gray-400" >
        </div>

        <div class="flex flex-col gap-1 w-[90%]">
            <label for="user_email">Mail</label>
            <input type="email" name="user_email" class="border-b-2 p-2
                focus-none outline-none
                text-gray-600 border-gray-400" >
        </div>

        <div class="flex flex-col gap-1 w-[90%]">
            <label for="username">Username</label>
            <input type="text" name="username" class="border-b-2 p-2
                focus-none outline-none
                text-gray-600 border-gray-400" >
        </div>

        <div class="flex flex-col gap-1 w-[90%]">
            <label for="user_password">Password</label>
            <input type="password" name="user_password" class="border-b-2 p-2
                focus-none outline-none
                text-gray-600 border-gray-400" >
        </div>


    </div>

    <input type="submit" name="submit" class="my-2 h-10 w-[16] px-10 bg-[#3E2093] text-white  rounded-2xl"
           value="submit">


</form>

</body>
</html>
