
<?php
    require "logic/registerProperty.php"
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
<body>

<form method="post" action="#"
      class="p-4 flex flex-col items-start justify-center gap-4 w-full rounded-lg bg-white">

    <h3 class="text-lg font-bold">Property Addition</h3>

    <div class="grid md:grid-cols-1 gap-4 w-full  ">
        <div class="flex flex-col gap-1 w-[90%]">
            <label for="property_house_type">House Type</label>
            <select name="property_house_type" id="house_type" class="border-b-2 p-2
                focus-none outline-none
                text-gray-600 border-gray-400">
                <option value="">Select An Option</option>
                <option value="single_room">Single Room</option>
                <option value="one_bedroom">One Bedroom</option>
                <option value="two_bedroom">Two Bedroom</option>
            </select>
        </div>

        <div class="flex flex-col gap-1 w-[90%]">
            <label for="propoerty_price">Price In KSH</label>
            <input type="number" name="property_house_type" class="border-b-2 p-2
                focus-none outline-none
                text-gray-600 border-gray-400" >
        </div>
        <div class="flex flex-col gap-1 w-[90%]">
            <label for="property_avatar">Avatar</label>

            <input type="file" name="property_avatar" class="border-b-2 p-2
                focus-none outline-none
                text-gray-600 border-gray-400" >
        </div>

        <div class="flex flex-col gap-1 w-[90%]">
            <label for="propety_location">Location Description</label>
            <textarea name="propety_location" class="border-b-2 py-2
                focus-none outline-none
                text-gray-600 border-gray-400" >

            </textarea>
        </div>



    </div>

    <input type="submit" name="submit" class="my-2 h-10 w-[16] px-10 bg-[#3E2093] text-white  rounded-2xl"
           value="submit">


</form>


</body>
</html>
