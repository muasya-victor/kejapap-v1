<?php
ob_start();
?>

<?php
$connection = mysqli_connect('localhost','root', '', 'joyland');

if($connection) {
   echo "";
}else {
    echo "error during connection";
}
?>
