<?php
    require "./app/database.php";
?>

<?php
$connection = $GLOBALS['connection'];

if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $user_type = 'tenant';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];

    $query = "INSERT INTO user(fname,lname,email,user_type, password, username)";
    $query .= "VALUES('{$fname}', '{$lname}', '{$email}', '{$user_type}', '{$password}', '{$username}')";
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

