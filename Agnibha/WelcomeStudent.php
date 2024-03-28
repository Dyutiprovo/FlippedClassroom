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
        $database1 = "fc_new";
        $conn = mysqli_connect($server, $username, $password, $database1);
        $query="SELECT ls.s_name as Student_Name,ss.student_id as Student_ID,lt.t_name as Teacher_Name,s.s_id as Subject_ID,s.s_name as Subject_Name
        from login_teacher as lt, login_student as ls, subjects as s, student as ss, teacher as st
        where ls.s_uid=ss.student_id AND
        ss.sub_uid=s.s_id AND
        ss.sub_uid=st.sub_uid AND
        lt.t_uid=st.t_uid AND
        ss.student_id=101 --student id will be taken during login. this is only experimental
        order by s.s_id";
        
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
        <p>Student Name:<?php echo $row[0]['Student_Name']?></p>
        <p>Student Id: <?php echo $row[0]['Student_ID']?></p>
        <p>Semester:</p>
    </section>
    <section class="subjects-container">
        <h1 class="h-primary center">Subjects in your Current Course</h1>
        <div class="subjects">
            <div class="box">
                <ul>
                    <li class="sub_name"><a href="#">Subject:<?php echo $row[0]['Subject_Name']?> </a></li>
                    <li class="sub_code">Code:<?php echo $row[0]['Subject_ID']?></li>
                    <li class="faculty">Faculty:<?php echo $row[0]['Teacher_Name']?></li>
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li class="sub_name"><a href="#">Subject:<?php echo $row[1]['Subject_Name']?></a></li>
                    <li class="sub_code">Code:<?php echo $row[1]['Subject_ID']?></li>
                    <li class="faculty">Faculty:<?php echo $row[1]['Teacher_Name']?></li>
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li class="sub_name"><a href="#">Subject:<?php echo $row[2]['Subject_Name']?></a></li>
                    <li class="sub_code">Code:<?php echo $row[2]['Subject_ID']?></li>
                    <li class="faculty">Faculty:<?php echo $row[2]['Teacher_Name']?></li>
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li class="sub_name"><a href="#">Subject:<?php echo $row[3]['Subject_Name']?></a></li>
                    <li class="sub_code">Code:<?php echo $row[3]['Subject_ID']?></li>
                    <li class="faculty">Faculty:<?php echo $row[3]['Teacher_Name']?></li>
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li class="sub_name"><a href="#">Subject:<?php echo $row[4]['Subject_Name']?></a></li>
                    <li class="sub_code">Code:<?php echo $row[4]['Subject_ID']?></li>
                    <li class="faculty">Faculty:<?php echo $row[4]['Teacher_Name']?></li>
                </ul>
            </div>
            
        </div>
        
    </section>
    
</body>
</html>
