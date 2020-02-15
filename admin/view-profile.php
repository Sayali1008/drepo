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

$fname = $lname  = $course = $branch = $class = $dob = $gender = $email = $pass = $confirm = $mobile = $cadd = $padd = $cadd = $padd = $frname = $fremail = $frmobile = $mrname = $mremail = $mrmobile = $aid = $fullname = NULL;
$passerr = $emailerr = $classerr = NULL;

$student_data = "SELECT * FROM student WHERE sfname='$first_chunk' AND slname='$last_word'";
$data_result = $conn->query($student_data);

if ($data_result->num_rows > 0) {
    while ($row = $data_result->fetch_assoc()) {
        $fname = $row['sfname'];
        $lname = $row['slname'];
        $course = $row['scourse'];
        $branch = $row['sbranch'];
        $class = $row['sclass'];
        $dob = $row['sdob'];
        $gender = $row['sgender'];
        $email = $row['semail'];
        $mobile = $row['smobile'];
        $cadd = $row['scurrentaddress'];
        $padd = $row['spermaddress'];
        $frname = $row['frname'];
        $fremail = $row['fremail'];
        $frmobile = $row['frmobile'];
        $mrname = $row['mrname'];
        $mremail = $row['mremail'];
        $mrmobile = $row['mrmobile'];
    }
} else {
    echo mysqli_error($conn);
}

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
                <a href="student-record.php" class="nav-link login-button">View Record&nbsp;&nbsp;&nbsp;</a>
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
        <h1 class="text-center" style="font-family: 'Merriweather', serif; margin-bottom:4%; text-transform:uppercase;"><?php echo $first_chunk . " " . $last_word ?></h1>
    </div>

    <!----------------------------------------------------------------------- PROFILE DATA -->
    <div class="container text-left">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
                <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:21px; font-weight:bold;">&nbsp;&nbsp;Course : &nbsp;&nbsp;&emsp;</label>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
                <span class="data-style"><?php echo $course ?></span>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
                <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:21px; font-weight:bold;">&nbsp;&nbsp;Branch : &nbsp;&nbsp;&emsp;</label>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                <span class="data-style"><?php echo $branch ?></span>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:21px; font-weight:bold;">&nbsp;&nbsp;Class : &nbsp;&nbsp;&emsp;</label>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                <span class="data-style"><?php echo $class ?></span>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
                <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:21px; font-weight:bold;">&nbsp;&nbsp;Date of Birth : &nbsp;&nbsp;&emsp;</label>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                <span class="data-style"><?php echo $dob ?></span>
            </div>

            <div class="col-md-3 col-sm-3 col-xs-3">
                <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:21px; font-weight:bold;">&nbsp;&nbsp;Gender : &nbsp;&nbsp;&emsp;</label>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                <span class="data-style"><?php echo $gender ?></span>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
                <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:21px; font-weight:bold;">&nbsp;&nbsp;Mobile No. : &nbsp;&nbsp;&emsp;</label>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                <span class="data-style"><?php echo $mobile ?></span>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:21px; font-weight:bold;">&nbsp;&nbsp;Email ID : &nbsp;&nbsp;&emsp;</label>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                <span class="data-style"><?php echo $email ?></span>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
                <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:21px; font-weight:bold;">&nbsp;&nbsp;
                    Current Address : &nbsp;&nbsp;&emsp;</label>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                <span class="data-style"><?php echo $cadd ?></span>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:21px; font-weight:bold;">&nbsp;&nbsp;Permanent Address : &nbsp;&nbsp;&emsp;</label>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                <span class="data-style"><?php echo $padd ?></span>
            </div>
        </div>
        <br>
        <!-- </form> -->

    </div>

    <div class="container">
        <h2><br> PARENTS' DETAILS</h2>
        <hr>

        <!-- <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" style="margin:0%;"> -->

        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
                <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:21px; font-weight:bold;">&nbsp;&nbsp;Father's Name : &nbsp;&nbsp;&emsp;</label>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
                <span class="data-style"><?php echo $frname ?></span>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
                <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:21px; font-weight:bold;">&nbsp;&nbsp;
                    Email ID : &nbsp;&nbsp;&emsp;</label>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                <span class="data-style"><?php echo $fremail ?></span>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:21px; font-weight:bold;">&nbsp;&nbsp;Mobile No. : &nbsp;&nbsp;&emsp;</label>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                <span class="data-style"><?php echo $frmobile ?></span>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
                <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:21px; font-weight:bold;">&nbsp;&nbsp;Mother's Name : &nbsp;&nbsp;&emsp;</label>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
                <span class="data-style"><?php echo $mrname ?></span>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
                <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:21px; font-weight:bold;">&nbsp;&nbsp;
                    Email ID : &nbsp;&nbsp;&emsp;</label>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                <span class="data-style"><?php echo $mremail ?></span>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:21px; font-weight:bold;">&nbsp;&nbsp;Mobile No. : &nbsp;&nbsp;&emsp;</label>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                <span class="data-style"><?php echo $mrmobile ?></span>
            </div>
        </div>
        <br>
        <!-- </form> -->

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