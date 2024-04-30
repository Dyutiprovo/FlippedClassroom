<?php
$server = "localhost";
$username = "root";
$password = "";
$database1 = "fc_new";
$conn = mysqli_connect($server, $username, $password, $database1);
if (!$conn){
    die("Error". mysqli_connect_error());
}
?>
