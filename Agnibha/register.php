<?php

    $email=$_POST["email"];
    $name=$_POST["name"];
    $uid=$_POST["uid"];
    $password=$_POST["password"];
    $choice = $_POST["choice"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "register_data";

    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    if($choice=="student")
    {
        $sql = "INSERT INTO student_reg(email, name , uid , password) VALUES ('{$email}','{$name}','{$uid}','{$password}' )";
    }
    else if($choice=="teacher")
    {
        $sql = "INSERT INTO teacher_reg(email, name , uid , password) VALUES ('{$email}','{$name}','{$uid}','{$password}' )";
    }
    else
    {
        $showError = "Invalid Credentials"; 
    }
    $result = mysqli_query($conn, $sql) or die("Query Failed!");
    header("location: http://localhost/php_tut/Flipped_Classroom/#");
    mysqli_close($conn);

?>