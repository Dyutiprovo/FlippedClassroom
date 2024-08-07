<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="subjectStyle.css">
</head>
<?php
include 'partials/_dbconnect.php';
$sub_name = $_GET['Subject_Name'];

// SQL to fetch required details
$query = "SELECT lt.t_name as Teacher_Name, s.s_name as Subject_Name, s.s_id as Subject_ID,
              ls.s_name as Student_Name, ls.s_uid as Student_UID, lt.t_uid as Teacher_UID
              FROM login_teacher AS lt
              JOIN teacher AS t ON lt.t_uid = t.t_uid
              JOIN subjects AS s ON t.sub_uid = s.s_id
              JOIN student AS ss ON t.sub_uid = ss.sub_uid
              JOIN login_student AS ls ON ss.student_id = ls.s_uid
              WHERE s.s_name = '$sub_name'
              ORDER BY ls.s_name
              limit  1";
$query1 = "SELECT * FROM materials 
                JOIN subjects 
                WHERE sub_uid=s_id and s_name like '$sub_name' 
                order by upload_date";
$result1 = mysqli_query($conn, $query1);
$result = mysqli_query($conn, $query);
$row1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

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
                        <h3>Name<?php echo $row[0]['Student_Name'] ?></h3>
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
                    <a href="logout.php" class="sub-menu-link">
                        <img src="logout.png">
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <section class="welcome">
       
        <?php foreach ($row as $details): ?>


            <h1 class="h-primary">Subject: <?php echo htmlspecialchars($details['Subject_Name']); ?></h1>
            <h1>Subject Code: <?php echo htmlspecialchars($details['Subject_ID']); ?></h1>
            <h1>Faculty: <?php echo htmlspecialchars($details['Teacher_Name']); ?></h1>
        <?php endforeach; ?>
    </section>

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
                    </ul>

                </div>
            <?php endforeach; ?>
        </div>


        <div class="doubt">
            <h3>Doubts</h3>
            <form action="/">
                <label for="doubt">Ask a doubt</label>
                <br class="line">
                <input type="text" id="doubt" name="doubt">
                <img src="up-arrow.png" alt="">
                </br>
            </form>
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