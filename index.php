<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flipped Classroom</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h2>Flipped Classroom</h2>
        <nav class="navigation">
            <a href="/">Home</a>
            <a href="/">About</a>
            <a href="/">Contact</a>
            <button class="btnLogin-Popup">Login</button>
        </nav>
    </header>
    <div class="wrapper">
        <span class="icon-close">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.2253 4.81108C5.83477 4.42056 5.20161 4.42056 4.81108 4.81108C4.42056 5.20161 4.42056 5.83477 4.81108 6.2253L10.5858 12L4.81114 17.7747C4.42062 18.1652 4.42062 18.7984 4.81114 19.1889C5.20167 19.5794 5.83483 19.5794 6.22535 19.1889L12 13.4142L17.7747 19.1889C18.1652 19.5794 18.7984 19.5794 19.1889 19.1889C19.5794 18.7984 19.5794 18.1652 19.1889 17.7747L13.4142 12L19.189 6.2253C19.5795 5.83477 19.5795 5.20161 19.189 4.81108C18.7985 4.42056 18.1653 4.42056 17.7748 4.81108L12 10.5858L6.2253 4.81108Z" fill="currentColor" /></svg>
        </span>
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
                <button type="submit" class="btn">Login</button>
                <div class="login-register">
                    <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
                </div>
            </form>
        </div>
        <div class="form-box register">
            <h2>Registration</h2>
            <form action="register.php" method="post">
                <div class="input-box">
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <input type="text" name="name" required>
                    <label>Name</label>
                </div>
                <div class="input-box">
                    <input type="text" name="uid" required>
                    <label>User ID</label>
                </div>
                <div class="input-box">
                    <input type="password" name="password" required>
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
                <div class="terms">
                    <label><input type="checkbox">I agree to the terms and conditions</label>
                </div>
                <button type="submit" class="btn">Register</button>
                <div class="login-register">
                    <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>