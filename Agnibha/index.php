<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flipped Classroom</title>
    <link rel="stylesheet" href="Home_Style.css">
</head>
<body>
    <header>
        <h2>Flipped Classroom</h2>
        <nav class="navigation">
            <a href="/">Home</a>
            <a href="/">About</a>
            <a href="/">Contact</a>
            <!--<button class="btnLogin-Popup">Login</button>-->
        </nav>
    </header>
        <div class="form-box login">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <!--<div class="input-box">
                    <input type="email" required>
                    <label>Email</label>
                </div>-->
                <div class="input-box">
                    <input type="uid" required>
                    <label>User ID</label>
                </div>
                <div class="input-box">
                    <input type="password" required>
                    <label>Password</label>
                </div>
                <div class="form-check"> 
                    <input class="form-check-input" type="radio" name="choice" value="student" id="student"> 
                    <label class="form-check-label" for="student"> 
                        Student 
                    </label>  
                    <input class="form-check-input" type="radio" name="choice" value="teacher" id="teacher"> 
                    <label class="form-check-label" for="teacher"> 
                        Teacher 
                    </label>
                </div>
                <a href="welcomeStudent.php">
                    <button type="submit" class="btn">Login</button>
                </a>
            </form>
        </div>
</body>
</html>