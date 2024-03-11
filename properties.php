<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Joyland Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen bg-gray-50">
<div class="fixed top-0 w-full">
    <?php
        require "components/navBar.php"
    ?>
</div>

<div class="mt-32 flex flex-col gap-4 w-full">

    <div class="w-full md:w-6/12 mx-auto">
        <?php
//            require "logic/components/propertyForm.php"
            require "logic/registerProperty.php"
        ?>
    </div>
</div>
</body>
</html>
