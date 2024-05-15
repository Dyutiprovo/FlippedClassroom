<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="subTeacherStyle.css">
</head>

<body>
    <?php
    include 'partials/_dbconnect.php';
    session_start();
    $subject_id = $_SESSION['T_Subject_ID']; // Define the subject ID for which details are required
    
    // SQL to fetch required details
    $query = "SELECT lt.t_name as Teacher_Name, s.s_name as Subject_Name, s.s_id as Subject_ID,
              ls.s_name as Student_Name, ls.s_uid as Student_UID, lt.t_uid as Teacher_UID
              FROM login_teacher AS lt
              JOIN teacher AS t ON lt.t_uid = t.t_uid
              JOIN subjects AS s ON t.sub_uid = s.s_id
              JOIN student AS ss ON t.sub_uid = ss.sub_uid
              JOIN login_student AS ls ON ss.student_id = ls.s_uid
              WHERE s.s_id = '$subject_id'
              ORDER BY ls.s_name";
    $query1 = "SELECT * FROM materials WHERE sub_uid='$subject_id' order by upload_date";
    $result1 = mysqli_query($conn, $query1);
    $result = mysqli_query($conn, $query);
    $row1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>
    <header>
        <h2>Flipped Classroom</h2>
        <!-- Navigation and user profile omitted for brevity -->
    </header>
    <section class="welcome">
        <h1 class="h-primary">Subject: <?php echo $row[0]['Subject_Name']; ?></h1>
        <h1>Subject Code: <?php echo $row[0]['Subject_ID']; ?></h1>
        <h1>Semester: [Specify Semester]</h1>
    </section>
    <div class="container mt-5">
        <h2>Upload a file</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select file to upload:
            <input type="file" name="file" id="file">
            <input type="hidden" name="subject_uid" value=<?php echo $row[0]['Subject_ID']; ?>>
            <input type="submit" value="Upload File" name="submit">
        </form>
    </div>
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
                        <h3>Name:<?php echo $row[0]['Teacher_Name'] ?></h3>
                    </div>
                    <hr>
                    </hr>
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
                    <a href="logout.php" class="sub-menu-link">
                        <img src="logout.png">
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <!-- <section class="upload">
        <h3>Upload New Material</h3>
        <button class="upld">Upload</button>
    </section> -->


    </div>
    <?php


    ?>
    <section class="main">
        <div class="materials">
            <h3>Materials</h3>
            <?php foreach ($row1 as $material): ?>
                <div class="box">

                    <ul>
                        <li>material: <a
                                href="download.php?FileNo=<?php echo $material['material_name']; ?>"><?php echo htmlspecialchars($material['material_name']); ?></a>
                        </li>
                        <li>date: <?php echo htmlspecialchars($material['upload_date']); ?></li>
                        <li>
                            <form action="delete.php" method="post">
                                <input type="hidden" name="material_name" value="<?php echo $material['material_name']; ?>">
                                <input type="hidden" name="subject_uid" value="<?php echo $row[0]['Subject_ID']; ?>">
                                <button type="submit" class="delete-btn"><img src="delete.png"></button>
                            </form>
                        </li>
                    </ul>

                </div>
            <?php endforeach; ?>
        </div>
        <div class="students">
            <h3>Enrolled Students</h3>
            <div>
                <?php foreach ($row as $details): ?>
                    <ul class="box1">
                        <li><?php echo $details['Student_Name'] ?></li>
                        <li><a>></a></li>
                    </ul>
                <?php endforeach; ?>
            </div>
        </div>

    </section>
    <script>
        let subMenu = document.getElementById("subMenu");
        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>

</html>
