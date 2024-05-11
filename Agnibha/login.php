<?php 
    session_start();  // Start the session at the beginning
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "fc_new";

    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $login = false; 
    $showError = false; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $uid = $_POST["userid"];  // Change to 'userid' matching the form's input name attribute
        $password = $_POST["password"];  
        $choice = $_POST["choice"]; 

        if ($choice == "student") { 
            $sql = "SELECT * FROM `login_student` WHERE `s_uid` = ? AND `password` = ?"; 
        } elseif ($choice == "teacher") { 
            $sql = "SELECT * FROM `login_teacher` WHERE `t_uid` = ? AND `password` = ?"; 
        }

        // Prepare and bind
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $uid, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
        $num = mysqli_num_rows($result); 
        if ($num == 1) { 
            $_SESSION['loggedin'] = true; 
            $_SESSION['uid'] = $uid; 
            $_SESSION['user_type'] = $choice;  // Save user type to session
            
            if ($choice == "student") {
                header("location: welcomeStudent.php"); 
            } else { // teacher
                header("location: welcomeTeacher.php"); 
            }
            exit();
        } else { 
            $showError = "Invalid Credentials"; 
        } 
    } 
?>
