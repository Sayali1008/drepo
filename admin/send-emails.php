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
$check = $_SESSION['login_admin_email'];
$sql = "SELECT * FROM adminn WHERE aemail='$check'";
$result = $conn->query($sql);
// $result = mysqli_fetch_array($result);
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
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

//<!----------------------------------------------------------------------- SEND EMAIL -->
if (isset($_POST['sendmail'])) {

    $to = $_POST['mailto'];
    $subject = $_POST['subject'];
    $txt = $_POST['content'];
    $headers = "From:2017.sayali.moghe@ves.ac.in";

    if (mail($to, $subject, $txt, $headers)) {
        header('location:send-emails.php');
    } else {
        $err = mysqli_error($conn);
        echo "<h1>Error in sending Mail.....</h1>" . $err;
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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="../dist/jquery.table2excel.js"></script> -->

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
                <a href="send-emails.php" class="nav-link login-button">Send Emails or Notifications&nbsp;&nbsp;&nbsp;</a>
            </li> -->
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
    <div class="container col-md-6 text-center">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" style="margin:0%;">
            <div class="row">
                <h5>Recipient:</h5>
                <input type="email" id="input-text1" class="input-field" name="mailto">
            </div>
            <div class="row">
                <h5>Subject:</h5>
                <input type="text" id="input-text1" class="input-field" name="subject">
            </div>
            <div class="row">
                <h5>Message:</h5>
                <textarea type="text" id="input-text1" class="input-field" cols="100%" rows="5" name="content"></textarea>
            </div>
            <br><br><input type="submit" class="btn btn-info btn-lg" style="margin-bottom:3%;" name="sendmail" value="Send">
        </form>
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
                                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Name : &nbsp;&nbsp;&emsp;</label>
                                    <input type="text" id="input-text1" class="input-field" name="name" value="<?php echo $name ?>" required>
                                    <br>
                                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Gender : &nbsp;&nbsp;&emsp;</label>
                                    <select name="gender" id="input-text2" class="custom-select-lg input-field">
                                        <option value="Male" <?php if ($gender == "Male") echo 'selected="selected"'; ?>>Male</option>
                                        <option value="Female" <?php if ($gender == "Female") echo 'selected="selected"'; ?>>Female</option>
                                        <option value="Other" <?php if ($gender == "Other") echo 'selected="selected"'; ?>>Other</option>
                                    </select>
                                    <br>
                                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Date of Birth : &nbsp;&nbsp;&emsp;</label>
                                    <input type="date" id="input-date" class="input-field" name="dob" value="<?php echo $dob ?>" required>
                                    <br>
                                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Email ID : &nbsp;&nbsp;&emsp;</label>
                                    <input type="email" id="input-email" class="input-field" name="email" value="<?php echo $email ?>" required>
                                    <br>
                                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Mobile No. : &nbsp;&nbsp;&emsp;</label>
                                    <input type="text" id="input-number" class="input-field" name="mobile" value="<?php echo $mobile ?>" required>
                                    <br>
                                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Address : &nbsp;&nbsp;&emsp;</label>
                                    <textarea name="add" id="input-text3" cols="100%" required><?php echo $add ?></textarea>

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

    <?php
    $conn->close();
    ?>
</body>

</html>