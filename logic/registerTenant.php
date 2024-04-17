<?php
    require "./app/database.php";
?>

<?php
$connection = $GLOBALS['connection'];

if(isset($_POST['submit'])){
    $fname = $_POST['user_first_name'];
    $lname = $_POST['user_last_name'];
    $user_type = 'tenant';
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];
    $username = $_POST['username'];

    $salt = 'max';
    $hashed_password = hash('sha256', $password . $salt);


    $query = "INSERT INTO user(user_first_name,user_last_name,user_email,user_type, user_password, username)";
    $query .= "VALUES('{$fname}', '{$lname}', '{$email}', '{$user_type}', '{$hashed_password}', '{$username}')";
    //    $conn = $GLOBALS['connection'];
    $create_post_query = mysqli_query($connection, $query);


    if ($create_post_query) {

        echo "
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var successCard = document.getElementById('successCard');
            
                setTimeout(function() {
                    successCard.classList.remove('hidden');
                    setTimeout(function() {
                        successCard.classList.add('hidden');
                    }, 3000); // Hide after 3 seconds
                }, 2000); // Show after 2 seconds
            });
        </script>
        ";
    } else {
        die("Query failed".mysqli_error($connection));
    }
}
?>

