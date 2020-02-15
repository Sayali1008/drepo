<?php

include('C:\xampp\htdocs\d-repo\connect.php');
session_start();

$id = $fname = $lname = $dob = $gender = $email = $mobile = $add = $fullname = NULL;

//<!----------------------------------------------------------------------- FETCHING PROFILE DATA FROM DATABASE -->
$check = $_SESSION['login_student_email'];

//<!----------------------------------------------------------------------- LOGGING OUT -->

if (isset($_POST['logout'])) {
    header('location:logout.php');
}

if ($_SESSION['login_student_email'] == "") {
    header('location:../index/login.php');
}
//<!-------------------------------------------------------------------------------------->

$sql = "SELECT * FROM student WHERE semail='$check'";
// $result = mysqli_fetch_array($result);
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // echo "id: " . $row["aid"] . " - Name: " . $row["afname"] . " " . $row["alname"] . "<br>";
        $id = $row['sid'];
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
        $fullname = $fname . " " . $lname;
    }
} else {
    echo mysqli_error($conn);
}

//<!----------------------------------------------------------------------- STORING ADD MODAL DATA INTO DATABASE -->
if (isset($_POST['add'])) {
    $title = $_POST['ttitle'];
    $topic = $_POST['ttopic'];
    $org = $_POST['oorg'];
    $date = $_POST['sstartdate'];
    $time = $_POST['ttime'];

    $pic = $_FILES['iimg'];
    $filename = $_FILES['iimg']['name'];
    $imgt = $_FILES['iimg']['tmp_name'];
    $folder = "../certificates/" . $filename;
    // $img = $_POST['iimg'];

    $insert_query = "INSERT INTO projects(ptitle, ptopic, porganization, startdate, duration, certi, uid) VALUES('$title', '$topic', '$org', '$date', '$time', '$folder', '$id')";
    $result = $conn->query($insert_query);

    if ($result) {
        header('location:projects.php');
        // echo "Successful";
    } else {
        echo mysqli_error($conn);
    }
}


//<!----------------------------------------------------------------------- STORING EDIT PROFILE DATA INTO DATABASE -->
if (isset($_POST['submit'])) {
    // $id1 = $_POST['id'];

    // $id = $row['sid'];
    $fname1 = $_POST['fname'];
    $lname1 = $_POST['lname'];
    $course1 = $_POST['course'];
    $branch1 = $_POST['branch'];
    $class1 = $_POST['class'];
    $dob1 = $_POST['dob'];
    $gender1 = $_POST['gender'];
    $email1 = $_POST['email'];
    $mobile1 = $_POST['mobile'];
    $cadd1 = $_POST['cadd'];
    $padd1 = $_POST['padd'];
    $frname1 = $_POST['frname'];
    $fremail1 = $_POST['fremail'];
    $frmobile1 = $_POST['frmobile'];
    $mrname1 = $_POST['mrname'];
    $mremail1 = $_POST['mremail'];
    $mrmobile1 = $_POST['mrmobile'];
    // $fullname = $fname . " " . $lname;


    $update_query1 = "UPDATE student SET sfname='$fname1' WHERE sid='$id'";
    $result1 = $conn->query($update_query1);
    $update_query2 = "UPDATE student SET slname='$lname1' WHERE sid='$id'";
    $result2 = $conn->query($update_query2);
    $update_query3 = "UPDATE student SET scourse='$course1' WHERE sid='$id'";
    $result3 = $conn->query($update_query3);
    $update_query4 = "UPDATE student SET sbranch='$branch1' WHERE sid='$id'";
    $result4 = $conn->query($update_query4);
    $update_query5 = "UPDATE student SET sclass='$class1' WHERE sid='$id'";
    $result5 = $conn->query($update_query5);
    $update_query6 = "UPDATE student SET sdob='$dob1' WHERE sid='$id'";
    $result6 = $conn->query($update_query6);
    $update_query7 = "UPDATE student SET sgender='$gender1' WHERE sid='$id'";
    $result7 = $conn->query($update_query7);
    $update_query8 = "UPDATE student SET semail='$email1' WHERE sid='$id'";
    $result8 = $conn->query($update_query8);
    $update_query9 = "UPDATE student SET smobile='$mobile1' WHERE sid='$id'";
    $result9 = $conn->query($update_query9);
    $update_query10 = "UPDATE student SET scurrentaddress='$cadd1' WHERE sid='$id'";
    $result10 = $conn->query($update_query10);
    $update_query11 = "UPDATE student SET spermaddress='$padd1' WHERE sid='$id'";
    $result11 = $conn->query($update_query11);
    $update_query12 = "UPDATE student SET frname='$frname1' WHERE sid='$id'";
    $result12 = $conn->query($update_query12);
    $update_query13 = "UPDATE student SET fremail='$fremail1' WHERE sid='$id'";
    $result13 = $conn->query($update_query13);
    $update_query14 = "UPDATE student SET frmobile='$frmobile' WHERE sid='$id'";
    $result14 = $conn->query($update_query14);
    $update_query15 = "UPDATE student SET frname='$frname1' WHERE sid='$id'";
    $result15 = $conn->query($update_query15);
    $update_query16 = "UPDATE student SET fremail='$fremail1' WHERE sid='$id'";
    $result16 = $conn->query($update_query16);
    $update_query17 = "UPDATE student SET frmobile='$frmobile' WHERE sid='$id'";
    $result17 = $conn->query($update_query17);

    if ($result1 and $result2 and $result3 and $result4 and $result5 and $result6 and $result7 and $result8 and $result9 and $result10 and $result11 and $result12 and $result13 and $result14 and $result15 and $result16 and $result17) {
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
            <li class="nav-item">
                <!-- <a href="send-emails.php" class="nav-link login-button">Add Another&nbsp;&nbsp;&nbsp;</a> -->
                <button type="button" id="add-button" class="nav-link login-button" data-toggle="modal" data-target="#addmodal">
                    <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add Another&nbsp;&nbsp;&nbsp;
                </button>
            </li>
            <li class="nav-item dropdown">
                <!-- <input type="button" onclick="index/index.php" class="nav-link login-button" value="Logout"> -->

                <a href="#" class="nav-link dropdown-toggle login-button" id="navbardrop" data-toggle="dropdown">
                    <i class="fa fa-user-circle" aria-hidden="false"></i>
                    <span><?php echo $fullname ?></span>
                </a>

                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" style="margin:0%;">
                    <div class="dropdown-menu dropdown-menu-right">
                        <button type="button" id="modal-button" class="btn btn-default btn-xs text-left" style="width:100%;" data-toggle="modal" data-target="#editProfileModal">
                            <i class="fa fa-pencil" aria-hidden="false"></i> Edit Profile
                        </button>
                        <button type="submit" name="logout" class="btn btn-default btn-xs text-left" style="width:100%;">
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
        <h1 class="text-center" style="font-family: 'Merriweather', serif; margin-bottom:4%;">PROJECTS</h1>
        <div class="row justify-content-end">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" style="margin-bottom:0%;">
                <label for="from">From - </label> &nbsp;
                <input type="date" name="fromdate"> &nbsp;
                <label for="to" name="todate">To - </label> &nbsp;
                <input type="date" name="todate"> &ensp;
                <input type="submit" name="search" value="&nbsp;Search&nbsp;">
            </form>
        </div>
    </div>

    <!----------------------------------------------------------------------- TABLE -->
    <div class="container" style="margin-top:3%;">
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

                if (isset($_POST['search'])) {
                    $startdate = $_POST['fromdate'];
                    $enddate = $_POST['todate'];
                    $sql2 = "SELECT p.pid, p.ptitle, p.ptopic, p.porganization, p.startdate, p.duration, p.certi FROM projects AS p, student AS s WHERE p.uid = s.sid AND s.sid='$id' AND p.startdate BETWEEN '$startdate' AND '$enddate'";
                    $result2 = $conn->query($sql2);

                    if ($result2->num_rows > 0) {
                        $i = 1;
                        while ($row = $result2->fetch_array()) {
                            $image = $row['certi'];
                            $image_src = $image;
                            ?>
                            <tr>
                                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" style="margin:0%;">
                                    <th><?php echo $i ?></th>
                                    <th><?php echo $row['ptitle'] ?></th>
                                    <th><?php echo $row['ptopic'] ?></th>
                                    <th><?php echo $row['porganization'] ?></th>
                                    <th><?php echo $row['startdate'] ?></th>
                                    <th><?php echo $row['duration'] ?></th>
                                    <td><a href="<?php echo $image_src ?>" target="_blank" download>Click here</a></td>
                                </form>
                            </tr>
                        <?php
                                    $i++;
                                }
                            }
                        } else {
                            $sql1 = "SELECT p.pid, p.ptitle, p.ptopic, p.porganization, p.startdate, p.duration, p.certi FROM projects AS p, student AS s WHERE p.uid = s.sid AND s.sid='$id'";
                            $result1 = $conn->query($sql1);

                            if ($result1->num_rows > 0) {
                                $i = 1;
                                while ($row = $result1->fetch_array()) {
                                    $image = $row['certi'];
                                    $image_src = $image;
                                    ?>
                            <tr>
                                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" style="margin:0%;">
                                    <th><?php echo $i ?></th>
                                    <th><?php echo $row['ptitle'] ?></th>
                                    <th><?php echo $row['ptopic'] ?></th>
                                    <th><?php echo $row['porganization'] ?></th>
                                    <th><?php echo $row['startdate'] ?></th>
                                    <th><?php echo $row['duration'] ?></th>
                                    <td><a href="<?php echo $image_src ?>" target="_blank" download>Click here</a></td>
                                </form>
                            </tr>
                <?php
                            $i++;
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!----------------------------------------------------------------------- ADD MODAL -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="modal fade" id="addmodal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" style="border: 1px solid #00424d;">
                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data" style="margin:0%;">
                                <!-- Modal Header -->
                                <div class="modal-header" style="font-family: 'Ubuntu', sans-serif; background-color:#00424d; color: white; margin:1px;">
                                    <h3>Add Project</h3>
                                    <button type="button" class="close" data-dismiss="modal" style="color:white; font-size:23px; outline:none;">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body" style="background-color: #c8e3e8; margin:1px;">
                                    <input type="text" id="input-text11" class="input-field" name="ttitle" placeholder="Title">
                                    <input type="text" id="input-text12" class="input-field" name="ttopic" placeholder="Project Topic">
                                    <input type="text" id="input-text13" class="input-field" name="oorg" placeholder="Organization/Company">
                                    <label for="input-date" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Start Date : &nbsp;&nbsp;&emsp;</label>
                                    <input type="date" id="input-date" class="input-field" name="sstartdate">
                                    <input type="number" id="input-number" class="input-field" name="ttime" min=1 placeholder="Project Duration (No. of days)">

                                    <br>
                                    <br>
                                    <label for="input-file" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Upload Certificate : &nbsp;&nbsp;&emsp;</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="input-file" style="cursor:pointer;" name="iimg">
                                        <label class="custom-file-label" for="customFile" style="cursor:pointer;">Choose file</label>
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer" style="background-color:#00424d; margin:1px;">
                                    <!-- <input class="btn btn-light" style="margin: auto;" type="submit" name="save" value="Add"> -->
                                    <button type="submit" class="btn btn-light" style="margin: auto;" name="add">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Add
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!----------------------------------------------------------------------- EDIT PROFILE MODAL -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="modal fade" id="editProfileModal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" style="margin:0%;">
                                <!-- Modal Header -->
                                <div class="modal-header" style="font-family: 'Ubuntu', sans-serif; background-color:#00424d; color: white; margin:1px;">
                                    <h3>Edit Profile</h3>
                                    <button type="button" class="close" data-dismiss="modal" style="color:white; font-size:23px; outline:none;">&times;</button>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body" style="background-color: #c8e3e8; margin:1px;">
                                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;First Name: &nbsp;&nbsp;&emsp;</label>
                                    <input type="text" id="input-text1" class="input-field" name="fname" value="<?php echo $fname ?>" required>

                                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Last Name : &nbsp;&nbsp;&emsp;</label>
                                    <input type="text" id="input-text2" class="input-field" name="lname" value="<?php echo $lname ?>" required>

                                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Course : &nbsp;&nbsp;&emsp;</label>
                                    <input type="text" id="input-text3" class="input-field" name="course" value="<?php echo $course ?>" required>

                                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Branch : &nbsp;&nbsp;&emsp;</label>
                                    <select name="branch" id="input-text4" class="custom-select-lg input-field">
                                        <option value="Computer Engineering" <?php if ($branch == "Computer Engineering") echo 'selected="selected"'; ?>>Computer Engineering</option>
                                        <option value="Electronics Engineering" <?php if ($branch == "Electronics Engineering") echo 'selected="selected"'; ?>>Electronics Engineering</option>
                                        <option value="Instrumentation Engineering" <?php if ($branch == "Instrumentation Engineering") echo 'selected="selected"'; ?>>Instrumentation Engineering</option>
                                        <option value="Electronics and Telecommunication Engineering" <?php if ($branch == "Electronics and Telecommunication Engineering") echo 'selected="selected"'; ?>>Electronics and Telecommunication Engineering</option>
                                        <option value="Information Technology" <?php if ($branch == "Information Technology") echo 'selected="selected"'; ?>>Information Technology</option>
                                    </select>

                                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Class : &nbsp;&nbsp;&emsp;</label>
                                    <input type="text" id="input-text5" class="input-field" name="class" value="<?php echo $class ?>" required>

                                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Date of Birth : &nbsp;&nbsp;&emsp;</label>
                                    <input type="date" id="input-date" class="input-field" name="dob" value="<?php echo $dob ?>" required>

                                    <br>
                                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Gender : &nbsp;&nbsp;&emsp;</label>
                                    <select name="gender" id="input-text6" class="custom-select-lg input-field">
                                        <option value="Male" <?php if ($gender == "Male") echo 'selected="selected"'; ?>>Male</option>
                                        <option value="Female" <?php if ($gender == "Female") echo 'selected="selected"'; ?>>Female</option>
                                        <option value="Other" <?php if ($gender == "Other") echo 'selected="selected"'; ?>>Other</option>
                                    </select>
                                    <br>

                                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Email ID : &nbsp;&nbsp;&emsp;</label>
                                    <input type="email" id="input-email1" class="input-field" name="email" value="<?php echo $email ?>" required>
                                    <br>

                                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Mobile No. : &nbsp;&nbsp;&emsp;</label>
                                    <input type="text" id="input-number1" class="input-field" name="mobile" maxlength="10" value="<?php echo $mobile ?>" required>
                                    <br>

                                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Current Address : &nbsp;&nbsp;&emsp;</label>
                                    <textarea name="cadd" id="input-text7" cols="100%" required><?php echo $cadd ?></textarea>

                                    <br>
                                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Permanent Address : &nbsp;&nbsp;&emsp;</label>
                                    <textarea name="padd" id="input-text8" cols="100%" required><?php echo $padd ?></textarea>

                                    <br><br>
                                    <h3>Parents' Details</h3>
                                    <hr>
                                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Father's Name: &nbsp;&nbsp;&emsp;</label>
                                    <input type="text" id="input-text9" class="input-field" name="frname" value="<?php echo $frname ?>" required>
                                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Email ID : &nbsp;&nbsp;&emsp;</label>
                                    <input type="email" id="input-email2" class="input-field" name="fremail" value="<?php echo $fremail ?>" required>
                                    <br>
                                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Mobile No. : &nbsp;&nbsp;&emsp;</label>
                                    <input type="text" id="input-number2" class="input-field" name="frmobile" maxlength="10" value="<?php echo $frmobile ?>" required>
                                    <br>
                                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Mother's Name: &nbsp;&nbsp;&emsp;</label>
                                    <input type="text" id="input-text10" class="input-field" name="mrname" value="<?php echo $mrname ?>" required>
                                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Email ID : &nbsp;&nbsp;&emsp;</label>
                                    <input type="email" id="input-email3" class="input-field" name="mremail" value="<?php echo $mremail ?>" required>
                                    <br>
                                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Mobile No. : &nbsp;&nbsp;&emsp;</label>
                                    <input type="text" id="input-number3" class="input-field" name="mrmobile" maxlength="10" value="<?php echo $mrmobile ?>" required>
                                    <br>

                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer" style="background-color:#00424d; margin:1px;">
                                    <input class="btn btn-light" style="margin: auto;" type="submit" name="submit" value="Save Changes">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

    <?php
    $conn->close();
    ?>

</body>