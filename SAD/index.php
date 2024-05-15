<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flipped Classroom</title>
    <link rel="stylesheet" href="style.css">
</head>

<!-- Try to find out what is happenning-->
<!-- <?php try {
    //code...
    session_start();  
    if (isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true and $_SESSION['user_type']=="student") {
        header("location:welcomeStudent.php");  // Redirect to the login page if not logged in
        exit;
    }
    if (isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true and $_SESSION['user_type']=="teacher") {
        header("location:welcomeTeacher.php");  // Redirect to the login page if not logged in
        exit;
    } 
} catch (\Throwable $th) {
    //throw $th;
    echo "Error!";
}
    
    ?>  -->

<body>
    <header>
        <h2>Flipped Classroom</h2>
        <nav class="navigation">
            <a href="/">Home</a>
            <a href="/">About</a>
            <a href="/">Contact</a>
        </nav>
    </header>
    <div class="form-box login">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <div class="input-box" id="uid">
                <input type="text" name="userid" required>
                <label>User ID</label>
            </div>
            <div class="input-box" id="password">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="form-check" id="choice"> 
                <input class="form-check-input" type="radio" name="choice" value="student" id="student" checked> 
                <label class="form-check-label" for="student"> 
                    Student 
                </label>  
                <input class="form-check-input" type="radio" name="choice" value="teacher" id="teacher"> 
                <label class="form-check-label" for="teacher"> 
                    Teacher 
                </label>
            </div>
            <button type="submit" class="submit-btn">Login</button>
        </form>
    </div>
</body>
</html>
