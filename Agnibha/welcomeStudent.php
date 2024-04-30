<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="studentStyle.css">
</head>
<body>
    <?php
        $student_uid=$_GET["uid"];
        $server = "localhost";
        $username = "root";
        $password = "";
        $database1 = "fc_new";
        $conn = mysqli_connect($server, $username, $password, $database1);
        $query="SELECT ls.s_name as Student_Name,ss.student_id as Student_ID,lt.t_name as Teacher_Name,s.s_id as Subject_ID,s.s_name as Subject_Name
        from login_teacher as lt, login_student as ls, subjects as s, student as ss, teacher as st
        where ls.s_uid=ss.student_id AND
        ss.sub_uid=s.s_id AND
        ss.sub_uid=st.sub_uid AND
        lt.t_uid=st.t_uid AND
        ss.student_id=$student_uid 
        order by s.s_id";
        
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
                        <h3>Name:<?php echo $row[0]['Student_Name']?></h3>
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
        <p>Student Name:<?php echo $row[0]['Student_Name']?></p>
        <p>Student Id:<?php echo $row[0]['Student_ID']?></p>
        <p>Semester:</p>
    </section>
    <section class="subjects-container">
        <h1 class="h-primary center">Subjects in your Current Course</h1>
        
        <div class="subjects">
            
            <br>
            <?php foreach ($row as $material): ?>
                <div class="box">
                <ul>
                    <li class="sub_name"><a href="subjectS.php?Subject_Name=<?php echo $material['Subject_Name']?>" target="_parent">Subject:<?php echo $material['Subject_Name']?></a></li>
                    <li class="faculty">Faculty:<?php echo $material['Teacher_Name']?></li>
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