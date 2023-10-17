<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="StudentStylee.css">
</head>
<body>
    <?php
        $server = "localhost";
        $username = "root";
        $password = "";
        $database1 = "fc";
        $conn = mysqli_connect($server, $username, $password, $database1);
        $query="SELECT s.Name , c.Course_name, c.C_UID, s.UID
        FROM login_table s
        INNER JOIN student_allocated sca 
        ON s.UID = sca.S_UID
        INNER JOIN course c ON c.C_UID=sca.Course_1 OR c.C_UID=sca.Course_2 OR c.C_UID=sca.Course_3 OR c.C_UID=sca.Course_4 OR c.C_UID=sca.Course_5 OR c.C_UID=sca.Course_6 OR c.C_UID=sca.Course_7
        WHERE sca.S_UID='22/123';"; //The S_UID will be taken in accordance with the login page.This is a dummy
                
                // -- JOIN
                // --         `teacher_allocated` ON course.C_UID = teacher_allocated.Course_1 
                // -- LEFT JOIN
                // --         `student_allocated` ON course.C_UID = student_allocated.Course_1
                // -- WHERE      `C_UID` = student_allocated.Course_1";
        
        $result=mysqli_query($conn,$query);
        $row=mysqli_fetch_all($result,MYSQLI_ASSOC)
        // $uid=$_POST["UID"];
        
        // $_SESSION['UID']=$uid;
    ?>
    <header>
        <h2>Flipped Classroom</h2>
        <nav class="navigation">
            <a href="/">Home</a>
            <a href="/">About</a>
            <a href="/">Contact</a>
        </nav>
    </header>
    <div>
        <h2>Welcome Student</h2>
    </div>
    
    <section class="welcome">
        <h1 class="h-primary">Welcome to Classroom</h1>
        <p>Student Name:<?php echo $row[0]['Name']?></p>
        <p>Student Id: <?php echo $row[0]['UID']?></p>
        <p>Semester:</p>
    </section>
    <section class="subjects-container">
        <h1 class="h-primary center">Subjects in your Current Course</h1>
        <div class="subjects">
            <div class="box">
                <ul>
                    <li class="sub_name"><a href="#">Subject:<?php echo $row[0]['Course_name']?> </a></li>
                    <li class="sub_code">Code:<?php echo $row[0]['C_UID']?></li>
                    <li class="faculty">Faculty:</li>
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li class="sub_name"><a href="#">Subject:<?php echo $row[1]['Course_name']?></a></li>
                    <li class="sub_code">Code:<?php echo $row[1]['C_UID']?></li>
                    <li class="faculty">Faculty:</li>
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li class="sub_name"><a href="#">Subject:<?php echo $row[2]['Course_name']?></a></li>
                    <li class="sub_code">Code:<?php echo $row[2]['C_UID']?></li>
                    <li class="faculty">Faculty:</li>
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li class="sub_name"><a href="#">Subject</a></li>
                    <li class="sub_code">Code</li>
                    <li class="faculty">Faculty</li>
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li class="sub_name"><a href="#">Subject</a></li>
                    <li class="sub_code">Code</li>
                    <li class="faculty">Faculty</li>
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li class="sub_name"><a href="#">Subject</a></li>
                    <li class="sub_code">Code</li>
                    <li class="faculty">Faculty</li>
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li class="sub_name"><a href="#">Subject</a></li>
                    <li class="sub_code">Code</li>
                    <li class="faculty">Faculty</li>
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li class="sub_name"><a href="#">Subject</a></li>
                    <li class="sub_code">Code</li>
                    <li class="faculty">Faculty</li>
                </ul>
            </div>
            
        </div>
        
    </section>
    
</body>
</html>
