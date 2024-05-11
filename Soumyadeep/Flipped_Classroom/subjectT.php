<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="subjectTeacherStyle.css">
</head>
<body>
    <header>
        <h2>Flipped Classroom</h2>
        <nav class="navigation">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="/">About</a></li>
                <li><a href="/">Contact</a></li>
            </ul>
            <img src="profile.png" class="user-pic" onclick="toggleMenu()">
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="profile.png">
                        <h2>Name</h2>
                    </div>
                    <hr></hr>
                    <a href="#" class="sub-menu-link">
                        <img src="profile.png">
                        <p>Edit Profile</p>
                        <span>></span>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img src="chpass.png">
                        <p>Change Password</p>
                        <span>></span>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img src="help.png">
                        <p>Help and Support</p>
                        <span>></span>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img src="admin_login.png">
                        <p>Admin Login</p>
                        <span>></span>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img src="logout.png">
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <section class="welcome">
        <h1 class="h-primary">Subject:</h1>
        <h1>Subject Code:</h1>
        <h1>Semister:</h1>
    </section>
    <section class="upload">
        <h3>Upload New Material</h3>
        <button class="upld">Upload</button>
    </section>
    <section class="main">
        <div class="materials">
            <h3>Uploaded Materials</h3>
            <div class="box">
                <ul>
                    <li>material:</li>
                    <li>date:</li>
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li>material:</li>
                    <li>date:</li>
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li>material:</li>
                    <li>date:</li>
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li>material:</li>
                    <li>date:</li>
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li>material:</li>
                    <li>date:</li>
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li>material:</li>
                    <li>date:</li>
                </ul>
            </div>
        </div>
        <div class="students">
            <h3>Enrolled Students</h3>
            <ul class="box1">
                <li>S1</li>
                <li><a>></a></li>
            </ul>
            <ul class="box1">
                <li>S1</li>
                <li><a>></a></li>
            </ul>
            <ul class="box1">
                <li>S1</li>
                <li><a>></a></li>
            </ul>
            <ul class="box1">
                <li>S1</li>
                <li><a>></a></li>
            </ul>
            <ul class="box1">
                <li>S1</li>
                <li><a>></a></li>
            </ul>
            <ul class="box1">
                <li>S1</li>
                <li><a>></a></li>
            </ul>
            <ul class="box1">
                <li>S1</li>
                <li><a>></a></li>
            </ul>
            <ul class="box1">
                <li>S1</li>
                <li><a>></a></li>
            </ul>
            <ul class="box1">
                <li>S1</li>
                <li><a>></a></li>
            </ul>
            <ul class="box1">
                <li>S1</li>
                <li><a>></a></li>
            </ul>
            <ul class="box1">
                <li>S1</li>
                <li><a>></a></li>
            </ul>
            <ul class="box1">
                <li>S1</li>
                <li><a>></a></li>
            </ul>
            <ul class="box1">
                <li>S1</li>
                <li><a>></a></li>
            </ul>
        </div>
    </section>
<script>
    let subMenu = document.getElementById("subMenu");
    function toggleMenu(){
        subMenu.classList.toggle("open-menu");
    }
</script>
</body>
</html>