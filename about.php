<?php
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
<body class="min-h-screen flex flex-col gap-6 w-full items-start justify-start bg-gray-50">

<div class="w-full h-full flex flex-col gap-4">
    <div class=" z-50 fixed top-0 w-full">
        <?php
            require 'components/navBar.php'
        ?>
    </div>

    <!--        welcome text and  image -->
    <div class="p-4 flex gap-4 mt-32 md:mt-24">
       <div class="h-[300px] md:h-[450px]
       bg-[url('images/kitchen.jpg')] bg-cover bg-no-repeat
        w-full md:w-9/12 rounded-lg">

       </div>

        <div class="hidden md:flex flex-col gap-2 w-2/12  ">
            <div class="h-[150px] w-full
             bg-[url('projectMedia/rental2.jpg')] bg-cover bg-no-repeat rounded-lg">

            </div>

            <div class="h-[150px]
            bg-[url('projectMedia/rental3.jpg')] bg-cover bg-no-repeat
            w-full  rounded-lg">

            </div>
        </div>
    </div>

    <div class="px-4">

        <div class="grid grid-cols-1 md:grid-cols-2 w-full md:w-9/12 gap-4">
            <div class="flex flex-col gap-2">
                <h3 class="text-2xl font-bold">ABOUT US</h3>

                <p class="w-full h-fit my-2 text-gray-600 md:border-r pr-4 py-4">
                    An exclusive connection to house owners for student accommodation.
                </p>

                <h3 class="text-2xl font-bold">WHY CHOOSE US</h3>

                <p class="w-full h-fit my-2 text-gray-600 md:border-r pr-4 py-4">
                    We provide a variety of different housing properties ensuring you have an array of choices.
                    The platform is user-friendly, easy to navigate and our search features are intuitive
                    We value trust and transparency which is why we work with reliable apartment
                    owners to ensure your transactions are safe and secure.
                </p>

            </div>

            <div class="flex flex-col gap-2">
                <h3 class="text-2xl font-bold">WHO WE ARE</h3>

                <p class="w-full h-fit my-2 text-gray-600 md:border-r pr-4 py-4">
                    We are an organization that aims to connect student with house owners to acquire ideal
                    living spaces by simplifying the house search process.
                </p>

                <h3 class="text-2xl font-bold">JOIN OUR COMMUNITY</h3>

                <p class="w-full h-fit my-2 text-gray-600 md:border-r pr-4 py-4">
                    Join us in your housing journey, we are here to support you all through.
                    Thankyou for choosing keja pap as your trusted housing partner.
                    We look forward to helping you find the perfect place to call home.
                </p>

            </div>

        </div>



    </div>
</div>

</body>
</html>