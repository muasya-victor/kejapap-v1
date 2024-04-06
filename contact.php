<?php
    require "logic/giveFeedback.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact us</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen flex flex-col gap-6 w-full items-center justify-start bg-gray-50">


    <div class=" z-50 fixed top-0 w-full">
        <?php
        require 'components/navBar.php'
        ?>
    </div>



    <div class="min-h-[90vh] max-h-fit flex flex-col md:flex-row w-full md:w-9/12 p-2 bg-white rounded-lg
        mt-32 md:mt-24">

        <div class="w-full md:w-[430px]  flex flex-col justify-between
        bg-[url('images/backg.png')]
        bg-center bg-cover
        bg-no-repeat text-white p-6 rounded-lg">
            <!--        instructions-->
            <div class="py-2 flex flex-col gap-6">
                <h3 class="text-2xl font-semibold">
                    Contact Information
                </h3>

                <p class="text-gray-300">
                    Fill up the form and our team will get back to you within 24 hours
                </p>
            </div>

            <!--        company contact details-->
            <div class="flex flex-col gap-10">
                <p class="text-lg font-semibold flex gap-2 items-center">
                <span class="text-[#fa949d]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                    </svg>
                </span>


                    <span>
                    +254 716 940 60
                </span>
                </p>

                <p class="text-lg font-semibold flex gap-2 items-center">
                <span class="text-[#fa949d]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                </span>

                    <span>
                    samplemail@gmail.com
                </span>
                </p>

                <p class="text-lg font-semibold flex gap-2 items-center">
                <span class="text-[#fa949d]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                    </svg>
                </span>

                    <span>
                189 Kabuku town
            </span>
                </p>
            </div>

            <!--        company social media details-->
            <div class="flex gap-2 items-center">
            <span class="rounded-[100%] flex items-center justify-center h-12 w-12 hover:bg-[#FA949D]">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40"
                     viewBox="0 0 30 30">
                    <path d="M15,3C8.373,3,3,8.373,3,15c0,6.016,4.432,10.984,10.206,11.852V18.18h-2.969v-3.154h2.969v-2.099c0-3.475,1.693-5,4.581-5 c1.383,0,2.115,0.103,2.461,0.149v2.753h-1.97c-1.226,0-1.654,1.163-1.654,2.473v1.724h3.593L19.73,18.18h-3.106v8.697 C22.481,26.083,27,21.075,27,15C27,8.373,21.627,3,15,3z"></path>
                </svg>
            </span>

                <span class="rounded-[100%] flex items-center justify-center h-12 w-12 hover:bg-[#FA949D]">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40"
                     viewBox="0 0 50 50">
                    <path d="M25,2c12.703,0,23,10.297,23,23S37.703,48,25,48S2,37.703,2,25S12.297,2,25,2z M32.934,34.375	c0.423-1.298,2.405-14.234,2.65-16.783c0.074-0.772-0.17-1.285-0.648-1.514c-0.578-0.278-1.434-0.139-2.427,0.219	c-1.362,0.491-18.774,7.884-19.78,8.312c-0.954,0.405-1.856,0.847-1.856,1.487c0,0.45,0.267,0.703,1.003,0.966	c0.766,0.273,2.695,0.858,3.834,1.172c1.097,0.303,2.346,0.04,3.046-0.395c0.742-0.461,9.305-6.191,9.92-6.693	c0.614-0.502,1.104,0.141,0.602,0.644c-0.502,0.502-6.38,6.207-7.155,6.997c-0.941,0.959-0.273,1.953,0.358,2.351	c0.721,0.454,5.906,3.932,6.687,4.49c0.781,0.558,1.573,0.811,2.298,0.811C32.191,36.439,32.573,35.484,32.934,34.375z"></path>
                </svg>
            </span>

                <span class="rounded-[100%] flex items-center justify-center h-12 w-12 hover:bg-[#FA949D]">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40"
                     viewBox="0 0 50 50">
                    <path d="M 16 3 C 8.83 3 3 8.83 3 16 L 3 34 C 3 41.17 8.83 47 16 47 L 34 47 C 41.17 47 47 41.17 47 34 L 47 16 C 47 8.83 41.17 3 34 3 L 16 3 z M 37 11 C 38.1 11 39 11.9 39 13 C 39 14.1 38.1 15 37 15 C 35.9 15 35 14.1 35 13 C 35 11.9 35.9 11 37 11 z M 25 14 C 31.07 14 36 18.93 36 25 C 36 31.07 31.07 36 25 36 C 18.93 36 14 31.07 14 25 C 14 18.93 18.93 14 25 14 z M 25 16 C 20.04 16 16 20.04 16 25 C 16 29.96 20.04 34 25 34 C 29.96 34 34 29.96 34 25 C 34 20.04 29.96 16 25 16 z"></path>
                </svg>
            </span>
            </div>

        </div>

        <form method="post"
                class="p-4 w-full flex flex-col items-start justify-center gap-4 ">

            <div class="grid md:grid-cols-2 gap-4 w-full">
                <div class="flex flex-col gap-1 w-[90%]">
                    <label for="feedback_first_name">First Name</label>
                    <input type="text" name="feedback_first_name" class="border-b-2 p-2
                focus-none outline-none
                text-gray-600 border-gray-400" >
                </div>

                <div class="flex flex-col gap-1 w-[90%]">
                    <label for="feedback_last_name">Last Name</label>
                    <input type="text" name="feedback_last_name" class="border-b-2 p-2
                focus-none outline-none
                text-gray-600 border-gray-400" >
                </div>

                <div class="flex flex-col gap-1 w-[90%]">
                    <label for="feedback_mail">Mail</label>
                    <input type="feedback_email" name="email" class="border-b-2 p-2
                focus-none outline-none
                text-gray-600 border-gray-400" >
                </div>

                <div class="flex flex-col gap-1 w-[90%]">
                    <label for="feedback_phone">Phone</label>
                    <input type="text" name="feedback_phone" class="border-b-2 p-2
                focus-none outline-none
                text-gray-600 border-gray-400" >
                </div>
            </div>

            <div class="flex flex-col gap-1 w-full">
                <label for="feedback_message">Message</label>
                <textarea name="feedback_message" class="border-b-2 p-2
                focus-none outline-none
                text-gray-600 border-gray-400" ></textarea>
            </div>

            <input type="submit" name="submit"
                   class="my-2 h-10 w-fit px-10 bg-[#3E2093] text-white  rounded-2xl"
                   value="Submit">

        </form>
    </div>
</body>
</html>