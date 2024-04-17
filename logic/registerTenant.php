<?php
    require "./app/database.php";
?>

<?php
$connection = $GLOBALS['connection'];

if(isset($_POST['submit'])){
    $fname = $_POST['tenant_first_name'];
    $lname = $_POST['tenant_last_name'];
    $user_type = 'tenant';
    $email = $_POST['tenant_email'];
    $password = $_POST['tenant_password'];
    $username = $_POST['tenant_username'];

    $salt = 'max';
    $hashed_password = hash('sha256', $password . $salt);


    $query = "INSERT INTO user(tenant_first_name,tenant_last_name,tenant_email,user_type, tenant_password, tenant_username)";
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

