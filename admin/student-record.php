<?php

include('C:\xampp\htdocs\d-repo\connect.php');
session_start();

$id = $name = $dob = $gender = $email = $mobile = $add = NULL;

//<!----------------------------------------------------------------------- FETCHING PROFILE DATA FROM DATABASE -->
$check = $_SESSION['login_admin_email'];

//<!----------------------------------------------------------------------- LOGGING OUT -->

if (isset($_POST['logout'])) {
    header('location:logout.php');
}

if ($_SESSION['login_admin_email'] == "") {
    header('location:../index/login.php');
}
//<!-------------------------------------------------------------------------------------->
$sql = "SELECT * FROM adminn WHERE aemail='$check'";
// $result = mysqli_fetch_array($result);
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // echo "id: " . $row["aid"] . " - Name: " . $row["afname"] . " " . $row["alname"] . "<br>";
        $id = $row['aid'];
        $name = $row['aname'];
        $dob = $row['adob'];
        $gender = $row['agender'];
        $email = $row['aemail'];
        $mobile = $row['amobile'];
        $add = $row['aaddress'];
    }
} else {
    echo mysqli_error($conn);
}

//<!----------------------------------------------------------------------- FETCHING STUDENT DATA FROM DATABASE -->
$student_name = $_SESSION['student-name'];
$words = explode(' ', $student_name);
$last_word = array_pop($words);
$first_chunk = implode(' ', $words);

//<!----------------------------------------------------------------------- STORING EDIT PROFILE DATA INTO DATABASE -->
if (isset($_POST['submit'])) {
    // $id1 = $_POST['id'];
    $name1 = $_POST['name'];
    $dob1 = $_POST['dob'];
    $gender1 = $_POST['gender'];
    $email1 = $_POST['email'];
    $mobile1 = $_POST['mobile'];
    $add1 = $_POST['add'];

    // $insert_query = "INSERT INTO adminn(aname, adob, agender, aemail, amobile, aaddress) VALUES('$name1', '$dob1', '$gender1', '$email1', '$mobile1', '$add1')";
    // $result1 = $conn->query($insert_query);

    $update_query1 = "UPDATE adminn SET aname='$name1' WHERE aid='$id'";
    $result1 = $conn->query($update_query1);
    $update_query2 = "UPDATE adminn SET adob='$dob1' WHERE aid='$id'";
    $result2 = $conn->query($update_query2);
    $update_query3 = "UPDATE adminn SET agender='$gender1' WHERE aid='$id'";
    $result3 = $conn->query($update_query3);
    $update_query4 = "UPDATE adminn SET aemail='$email1' WHERE aid='$id'";
    $result4 = $conn->query($update_query4);
    $update_query5 = "UPDATE adminn SET amobile='$mobile1' WHERE aid='$id'";
    $result5 = $conn->query($update_query5);
    $update_query6 = "UPDATE adminn SET aaddress='$add1' WHERE aid='$id'";
    $result6 = $conn->query($update_query6);

    if ($result1 and $result2 and $result3 and $result4 and $result5 and $result6) {
        // echo "Successful entry in the database";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<html>

<head>
    <title>d-repo</title>
    <link rel="icon" href="/icon.jpg" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/styles.css">
    <link rel="stylesheet" type="text/css" href="index.css">

    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- ICONS -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Jomolhari&display=swap" rel="stylesheet">
    <!-- font-family: 'Jomolhari', serif; -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <!-- font-family: 'Ubuntu', sans-serif; -->
    <link href="https://fonts.googleapis.com/css?family=ZCOOL+XiaoWei&display=swap" rel="stylesheet">
    <!-- font-family: 'ZCOOL XiaoWei', serif; -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Roboto+Slab&display=swap" rel="stylesheet">
    <!-- font-family: 'Merriweather', serif;
    font-family: 'Roboto Slab', serif; -->
    <link href="https://fonts.googleapis.com/css?family=Bitter|Libre+Franklin&display=swap" rel="stylesheet">
    <!-- font-family: 'Libre Franklin', sans-serif; -->
    <!-- font-family: 'Bitter', serif; -->
</head>

<body>
    <!----------------------------------------------------------------------- NAVBAR -->
    <nav class="navbar navbar-expand-sm navbar-dark sticky-top" style="margin-bottom:3%; background-color:#00424d;">
        <span style="font-size:40px; cursor:pointer; color:#edfcff;" onmouseover="openNav()" onmouseout="closeNav()"> &nbsp;&#9776; &nbsp;&nbsp;</span>
        <!-- Brand/Logo -->
        <a class="navbar-brand title-head" href="loggedin.php">d-repo</a>

        <!-- Links -->
        <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item">
                <a href="send-emails.php" class="nav-link login-button">Send Emails or Notifications&nbsp;</a>
            </li> -->
            <li class="nav-item">
                <a href="view-profile.php" class="nav-link login-button">View Profile&nbsp;&nbsp;&nbsp;</a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle login-button" id="navbardrop" data-toggle="dropdown">
                    <i class="fa fa-user-circle" aria-hidden="false"></i>
                    <span><?php echo $name ?></span>
                </a>

                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" style="margin:0%;">
                    <div class="dropdown-menu dropdown-menu-right">
                        <button type="button" id="modal-button" class="btn btn-default btn-xs text-left" style="width:100%;" data-toggle="modal" data-target="#editProfileModal">
                            <i class="fa fa-pencil" aria-hidden="false"></i> Edit Profile
                        </button>
                        <button type="submit" formaction="<?php echo $_SERVER["PHP_SELF"]; ?>" name="logout" class="btn btn-default btn-xs text-left" style="width:100%;">
                            <i class="fa fa-power-off" aria-hidden="true"></i> Log out
                        </button>
                    </div>
                </form>
            </li>
        </ul>
    </nav>

    <!----------------------------------------------------------------------- SIDE NAVBAR -->
    <div id="mySidenav" class="sidenav" onmouseover="openNav()" onmouseout="closeNav()">
        <!-- <a href="javascript:void(0)" class="closebtn text-centre" onclick="closeNav()">Close&nbsp;&nbsp;&nbsp;<span style="right: 25px;">&times;</span></a> -->
        <a href="workshops.php">Workshops</a>
        <a href="internships.php">Internships</a>
        <a href="courses.php">Courses</a>
        <a href="research.php">Research Papers</a>
        <a href="projects.php">Projects</a>
        <a href="competitions.php">Competitions</a>
        <a href="social.php">Social Activities</a>
        <a href="others.php">Others</a>
    </div>

    <!----------------------------------------------------------------------- PAGE HEAD -->
    <div class="container">
        <h1 class="text-center" style="font-family: 'Merriweather', serif; margin-bottom:4%; text-transform:uppercase;">Report for <?php echo $first_chunk . " " . $last_word ?></h1>
    </div>

    <!----------------------------------------------------------------------- WORKSHOPS -->
    <div class="container" style="margin-top:3%;">
        <h3>WORKSHOPS</h3>

        <table class="table table-hover text-center">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Name of the Workshop</th>
                    <th>Organization/Company</th>
                    <th>Date</th>
                    <th>Duration</th>
                    <th>Certificate</th>
                </tr>
            </thead>
            <tbody class="">
                <?php
                $sql1 = "SELECT w.wid, w.wname, w.worganization, w.startdate, w.duration, w.certi FROM workshops AS w, student AS s WHERE w.uid = s.sid AND sfname='$first_chunk' AND slname='$last_word'";
                $result1 = $conn->query($sql1);

                if ($result1->num_rows > 0) {
                    $i = 1;
                    while ($row = $result1->fetch_array()) {
                        $image = $row['certi'];
                        $image_src = $image;
                        ?>
                        <tr>
                            <th><?php echo $i ?></th>
                            <th><?php echo $row['wname'] ?></th>
                            <th><?php echo $row['worganization'] ?></th>
                            <th><?php echo $row['startdate'] ?></th>
                            <th><?php echo $row['duration'] ?></th>
                            <td><a href="<?php echo $image_src ?>" target="_blank" download>Click here</a></td>
                        </tr>
                <?php
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!----------------------------------------------------------------------- INTERNSHIPS -->
    <div class="container" style="margin-top:3%;">
        <h3>INTERNSHIPS</h3>

        <table class="table table-hover text-center">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Company Name</th>
                    <th>Working Department</th>
                    <th>Date</th>
                    <th>Duration</th>
                    <th>Certificate</th>
                </tr>
            </thead>
            <tbody class="">
                <?php
                $sql1 = "SELECT i.iid, i.icompany, i.idepartment, i.startdate, i.duration, i.certi FROM internships AS i, student AS s WHERE i.uid = s.sid AND sfname='$first_chunk' AND slname='$last_word'";
                $result1 = $conn->query($sql1);

                if ($result1->num_rows > 0) {
                    $i = 1;
                    while ($row = $result1->fetch_array()) {
                        $image = $row['certi'];
                        $image_src = $image;
                        ?>
                        <tr>
                            <th><?php echo $i ?></th>
                            <th><?php echo $row['icompany'] ?></th>
                            <th><?php echo $row['idepartment'] ?></th>
                            <th><?php echo $row['startdate'] ?></th>
                            <th><?php echo $row['duration'] ?></th>
                            <td><a href="<?php echo $image_src ?>" target="_blank" download>Click here</a></td>
                        </tr>
                <?php
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!----------------------------------------------------------------------- COURSES -->
    <div class="container" style="margin-top:3%;">
        <h3>COURSES</h3>

        <table class="table table-hover text-center">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Name of the Course</th>
                    <th>Organization/Company</th>
                    <th>Date</th>
                    <th>Duration</th>
                    <th>Certificate</th>
                </tr>
            </thead>
            <tbody class="">
                <?php
                $sql1 = "SELECT c.cid, c.cname, c.corganization, c.startdate, c.duration, c.certi FROM courses AS c, student AS s WHERE c.uid = s.sid AND sfname='$first_chunk' AND slname='$last_word'";
                $result1 = $conn->query($sql1);

                if ($result1->num_rows > 0) {
                    $i = 1;
                    while ($row = $result1->fetch_array()) {
                        $image = $row['certi'];
                        $image_src = $image;
                        ?>
                        <tr>
                            <th><?php echo $i ?></th>
                            <th><?php echo $row['cname'] ?></th>
                            <th><?php echo $row['corganization'] ?></th>
                            <th><?php echo $row['startdate'] ?></th>
                            <th><?php echo $row['duration'] ?></th>
                            <td><a href="<?php echo $image_src ?>" target="_blank" download>Click here</a></td>
                        </tr>
                <?php
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!----------------------------------------------------------------------- RESEARCH PAPERS -->
    <div class="container" style="margin-top:3%;">
        <h3>RESEARCH PAPERS</h3>

        <table class="table table-hover text-center">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Paper Title</th>
                    <th>Paper Topic</th>
                    <th>Organization/Company</th>
                    <th>Date</th>
                    <th>Certificate</th>
                </tr>
            </thead>
            <tbody class="">
                <?php
                $sql1 = "SELECT r.rid, r.rtitle, r.rtopic, r.rorganization, r.rdate, r.certi FROM research AS r, student AS s WHERE r.uid = s.sid AND sfname='$first_chunk' AND slname='$last_word'";
                $result1 = $conn->query($sql1);

                if ($result1->num_rows > 0) {
                    $i = 1;
                    while ($row = $result1->fetch_array()) {
                        $image = $row['certi'];
                        $image_src = $image;
                        ?>
                        <tr>
                            <th><?php echo $i ?></th>
                            <th><?php echo $row['rtitle'] ?></th>
                            <th><?php echo $row['rtopic'] ?></th>
                            <th><?php echo $row['rorganization'] ?></th>
                            <th><?php echo $row['rdate'] ?></th>
                            <td><a href="<?php echo $image_src ?>" target="_blank" download>Click here</a></td>
                        </tr>
                <?php
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!----------------------------------------------------------------------- PROJECTS -->
    <div class="container" style="margin-top:3%;">
        <h3>PROJECTS</h3>

        <table class="table table-hover text-center">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Project Topic</th>
                    <th>Organization/Company</th>
                    <th>Date</th>
                    <th>Duration</th>
                    <th>Certificate</th>
                </tr>
            </thead>
            <tbody class="">
                <?php
                $sql1 = "SELECT p.pid, p.ptitle, p.ptopic, p.porganization, p.startdate, p.duration, p.certi FROM projects AS p, student AS s WHERE p.uid = s.sid AND sfname='$first_chunk' AND slname='$last_word'";
                $result1 = $conn->query($sql1);

                if ($result1->num_rows > 0) {
                    $i = 1;
                    while ($row = $result1->fetch_array()) {
                        $image = $row['certi'];
                        $image_src = $image;
                        ?>
                        <tr>
                            <th><?php echo $i ?></th>
                            <th><?php echo $row['ptitle'] ?></th>
                            <th><?php echo $row['ptopic'] ?></th>
                            <th><?php echo $row['porganization'] ?></th>
                            <th><?php echo $row['startdate'] ?></th>
                            <th><?php echo $row['duration'] ?></th>
                            <td><a href="<?php echo $image_src ?>" target="_blank" download>Click here</a></td>
                        </tr>
                <?php
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!----------------------------------------------------------------------- COMPETITIONS -->
    <div class="container" style="margin-top:3%;">
        <h3>COMPETITIONS</h3>

        <table class="table table-hover text-center">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Topic</th>
                    <th>Competition Name</th>
                    <th>Organization/Company</th>
                    <th>Date</th>
                    <th>Duration</th>
                    <th>Rank</th>
                    <th>Certificate</th>
                </tr>
            </thead>
            <tbody class="">
                <?php
                $sql1 = "SELECT c.cid, c.ctopic, c.cname, c.corganization, c.cdate, c.duration, c.rank, c.certi FROM competitions AS c, student AS s WHERE c.uid = s.sid AND sfname='$first_chunk' AND slname='$last_word'";
                $result1 = $conn->query($sql1);

                if ($result1->num_rows > 0) {
                    $i = 1;
                    while ($row = $result1->fetch_array()) {
                        $image = $row['certi'];
                        $image_src = $image;
                        ?>
                        <tr>
                            <th><?php echo $i ?></th>
                            <th><?php echo $row['ctopic'] ?></th>
                            <th><?php echo $row['cname'] ?></th>
                            <th><?php echo $row['corganization'] ?></th>
                            <th><?php echo $row['cdate'] ?></th>
                            <th><?php echo $row['duration'] ?></th>
                            <th><?php echo $row['rank'] ?></th>
                            <td><a href="<?php echo $image_src ?>" target="_blank" download>Click here</a></td>
                        </tr>
                <?php
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!----------------------------------------------------------------------- SOCIAL ACTIVITIES -->
    <div class="container" style="margin-top:3%;">
        <h3>SOCIAL ACTIVITIES</h3>

        <table class="table table-hover text-center">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Activity Name</th>
                    <th>Topic</th>
                    <th>Organization/Company</th>
                    <th>Date</th>
                    <th>Duration</th>
                    <th>Certificate</th>
                </tr>
            </thead>
            <tbody class="">
                <?php
                $sql1 = "SELECT sa.said, sa.saname, sa.satopic, sa.saorganization, sa.startdate, sa.duration, sa.certi FROM social AS sa, student AS s WHERE sa.uid = s.sid AND sfname='$first_chunk' AND slname='$last_word'";
                $result1 = $conn->query($sql1);

                if ($result1->num_rows > 0) {
                    $i = 1;
                    while ($row = $result1->fetch_array()) {
                        $image = $row['certi'];
                        $image_src = $image;
                        ?>
                        <tr>
                            <th><?php echo $i ?></th>
                            <th><?php echo $row['saname'] ?></th>
                            <th><?php echo $row['satopic'] ?></th>
                            <th><?php echo $row['saorganization'] ?></th>
                            <th><?php echo $row['startdate'] ?></th>
                            <th><?php echo $row['duration'] ?></th>
                            <td><a href="<?php echo $image_src ?>" target="_blank" download>Click here</a></td>
                        </tr>
                <?php
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!----------------------------------------------------------------------- EXTRA-CURRICULAR ACTIVITIES -->
    <div class="container" style="margin-top:3%;">
        <h3>EXTRA-CURRICULAR ACTIVITIES</h3>

        <table class="table table-hover text-center">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Portfolio</th>
                    <th>Event Name</th>
                    <th>Organization/College</th>
                    <th>Date</th>
                    <th>Rank</th>
                    <th>Certificate</th>
                </tr>
            </thead>
            <tbody class="">
                <?php
                $sql1 = "SELECT o.oid, o.oportfolio, o.oname, o.oorganization, o.odate, o.rank, o.certi FROM others AS o, student AS s WHERE o.uid = s.sid AND sfname='$first_chunk' AND slname='$last_word'";
                $result1 = $conn->query($sql1);

                if ($result1->num_rows > 0) {
                    $i = 1;
                    while ($row = $result1->fetch_array()) {
                        $image = $row['certi'];
                        $image_src = $image;
                        ?>
                        <tr>
                            <th><?php echo $i ?></th>
                            <th><?php echo $row['oportfolio'] ?></th>
                            <th><?php echo $row['oname'] ?></th>
                            <th><?php echo $row['oorganization'] ?></th>
                            <th><?php echo $row['odate'] ?></th>
                            <th><?php echo $row['rank'] ?></th>
                            <td><a href="<?php echo $image_src ?>" target="_blank" download>Click here</a></td>
                        </tr>
                <?php
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>


    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>

    <?php
    $conn->close();
    ?>
</body>

</html>