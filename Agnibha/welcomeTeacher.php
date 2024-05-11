<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="teacherStyle.css">
</head>
<body>
<?php
        
        // $student_uid=$_GET["uid"];
        $server = "localhost";
        $username = "root";
        $password = "";
        $database1 = "fc_new";
        session_start();
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header("Location: login.php");  // Redirect to the login page if not logged in
            exit;
        }
        $uid = $_SESSION['uid'];  // Ensure you get the UID from the session
        // $uid='1000';
        $conn = mysqli_connect($server, $username, $password, $database1);
        $query="SELECT lt.t_name as Teacher_Name , lt.t_uid as Teacher_ID ,s.s_name as Subject_Name,s.s_id as Subject_ID
        FROM login_teacher lt,subjects s,teacher t
        WHERE lt.t_uid=t.t_uid AND s.s_id=t.sub_uid and lt.t_uid=$uid";
        $result=mysqli_query($conn,$query);
        $row=mysqli_fetch_all($result,MYSQLI_ASSOC)
        // $uid=$_POST["UID"];
        
        // $_SESSION['UID']=$uid;
    ?>
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
        <h1 class="h-primary">Welcome to Classroom</h1>
        <p>Faculty Name:<?php echo $row[0]['Teacher_Name'] ?> </p>
        <p>Faculty Id:<?php echo $row[0]['Teacher_ID'] ?></p>
    </section>
    <section class="subjects-container">
        <h1 class="h-primary center">Subjects in your Current Course</h1>
        
        <div class="subjects">
            
            <br>
            <?php foreach ($row as $material): ?>
                <div class="box">
                <ul>

                    <li class="sub_name"><a href="subjectT.php?Subject_Name=<?php echo $material['Subject_Name'] ?>" target="_parent" >Subject:<?php echo $material['Subject_Name']?></a></li>
                    <?php $_SESSION['T_Subject_ID']=$material['Subject_ID'] ?>

                    <!-- <li class="faculty">Faculty:<?php echo $material['Teacher_Name']?></li> -->
                </ul>
                </div>
            <?php endforeach; ?>
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