
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
<body>

    <nav class="p-4 flex items-center justify-between flex-wrap gap-2 w-full bg-white">

        <div class="flex items-center gap-6 flex-wrap w-fit ">
            <span class="flex gap-1 items-center mr-8">
                <p class="font-bold text-xl text-[#3E2093]
                 hidden md:flex flex-col ">
                    <span>KejaPap</span>
                    <span class="w-12 h-2 border-b-4 border-[#3E2093]">

                    </span>
                </p>

                <span class="text-[#3E2093]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
                    </svg>
                </span>
            </span>


            <button onclick="openNewPage('http://localhost/kejapap-v1/index.php')"
                    class="font-semibold text-gray-700 hover:text-[#3E2093] hover:font-bold cursor-pointer">Home</button>
            <button onclick="openNewPage('http://localhost/kejapap-v1/about.php')"
                    class="font-semibold text-gray-700 hover:text-[#3E2093] hover:font-bold cursor-pointer">About</button>

            <button onclick="openNewPage('http://localhost/kejapap-v1/contact.php')"
                    class="font-semibold text-gray-700 hover:text-[#3E2093] hover:font-bold
                    cursor-pointer">Feed Back</button>

            <?php



                if(isset($_COOKIE['username'])) {
                    echo '
                        <select name="house_type"
                        id="selectLocation"
                        class="p-1 rounded-lg
                            focus-none outline-none bg-white font-semibold text-gray-700 hover:text-[#3E2093]">
                            <option value="">Admin</option>
                            <option value="http://localhost/kejapap-v1/landlords.php">Landlords</option>
                            <option value="http://localhost/kejapap-v1/tenants.php">Tenants</option>
                            <option value="http://localhost/kejapap-v1/properties.php">Properties</option>
                        </select>
                    ';
                } else {
                    // The session variable 'username' does not exist
                    // Perform an alternate action if the session does not exist here
                    echo "";
                }


            ?>


        </div>



        <div class="flex gap-2 items-center md:mx-2">


                <?php

                if(isset($_COOKIE['username'])) {

                    echo '
                        <div class="h-10 w-10   
                                bg-[url(`images/hat.webp`)]
                                 bg-cover
                             rounded-[50%]">
                             </div>
                
                        <p class="text-sm font-bold capitalize text-gray-400">
                            <?php 
                                $_COOKIE[`username`]
                            ?>
                        </p>
                        <form action="logoutLogic.php" method="post">
                                <input type="submit" name="submit" 
                                class="border px-4 py-2 h-fit rounded-md
                                bg-violet-800 text-white hover:bg-violet-900
                                flex items-center gap-1 font-semibold " value="Sign Out">
                                
                        </button>
                        </form>
                        
                        ';
                } else {
                    echo '
                        <button onclick="openNewPage(`http://localhost/kejapap-v1/login.php`)"
                        class=" border px-4 py-2 h-fit rounded-md
                         bg-violet-800 text-white hover:bg-violet-900
                         flex items-center gap-1 font-semibold ">
                            <span>Sign In</span>
                        </button>
                        ';

//                    echo $_SESSION['username'];
                }

                ?>
        </div>

    </nav>

    <script>
        function openNewPage(path) {
            window.location = path;
        }

        document.getElementById('selectLocation').addEventListener('change', function() {
            window.location.href = this.value;
        });
    </script>

</body>
</html>