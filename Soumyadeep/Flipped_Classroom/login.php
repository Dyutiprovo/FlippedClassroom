<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "register_data";

    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    $login = false; 
    $showError = false; 
    if($_SERVER["REQUEST_METHOD"] == "POST"){ 
        include 'partials/_dbconnect.php'; 
        $uid = $_POST["uid"]; 
        $password = $_POST["password"];  
        $choice = $_POST["choice"]; 
        if($choice=="student"){ 
        $sql = "SELECT * FROM `students` WHERE `uid` ='$uid' AND `password` = '$password'"; 
        } 
        elseif($choice=="teacher"){ 
        $sql =  "SELECT * FROM `teachers` WHERE `uid` ='$uid' AND `password` = '$password'"; 
        }
        $sql = "SELECT * FROM `student_reg` WHERE `uid` ='$uid' AND `password` = '$password'"; 
        $result = mysqli_query($conn, $sql); 
    
        $num = mysqli_num_rows($result); 
        if ($num == 1 && $choice=="student"){ 
            $login = true; 
            session_start(); 
            $_SESSION['loggedin'] = true; 
            $_SESSION['uid'] = $uid; 
            header("location: welcomeStudent.php"); 
    
        } 
        elseif ($num == 1 && $choice=="teacher"){ 
            $login = true; 
            session_start(); 
            $_SESSION['loggedin'] = true; 
            $_SESSION['uid'] = $uid; 
            header("location: welcomeTeacher.php"); 
    
        }
        else{ 
            $showError = "Invalid Credentials"; 
        } 
    } 
    
 ?> 