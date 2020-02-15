<?php

include('C:\xampp\htdocs\d-repo\connect.php');
session_start();

$fname = $lname  = $course = $branch = $class = $dob = $gender = $email = $pass = $confirm = $mobile = $cadd = $padd = $cadd = $padd = $frname = $fremail = $frmobile = $mrname = $mremail = $mrmobile = $aid = $fullname = NULL;
$passerr = $emailerr = $classerr = NULL;

if (isset($_POST['signup'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $course = "Bachelor of Engineering";
    $branch = $_POST['branch'];
    $class = $_POST['class'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $confirm = $_POST['confirm'];
    $mobile = $_POST['mobile'];
    $cadd = $_POST['cadd'];
    $padd = $_POST['padd'];
    $frname = $_POST['frname'];
    $fremail = $_POST['fremail'];
    $frmobile = $_POST['frmobile'];
    $mrname = $_POST['mrname'];
    $mremail = $_POST['mremail'];
    $mrmobile = $_POST['mrmobile'];

    $studentcheck = "SELECT semail FROM student";
    $checkresult = $conn->query($studentcheck);

    if ($checkresult->num_rows > 0) {
        while ($row = $checkresult->fetch_array()) {
            if ($email === $row['semail']) {
                $emailerr = "Email already exists!";
            }
        }
    }

    if ($password !== $confirm) {
        $passerr = "Passwords don't match!";
    } else {

        $admin_query = "SELECT COUNT(*) as countno FROM adminn";
        $admin_result = $conn->query($admin_query);

        $count = NULL;
        if ($admin_result->num_rows == 1) {
            while ($row = $admin_result->fetch_array()) {
                $count = $row['countno'];
            }
        }
        $aid = rand(1, $count);



        $insert_query = "INSERT INTO student(sfname, slname, scourse, sbranch, sclass, sdob, sgender, semail, spassword, smobile, scurrentaddress, spermaddress, frname, fremail, frmobile, mrname, mremail, mrmobile, aid) VALUES('$fname', '$lname', '$course', '$branch', '$class', '$dob', '$gender', '$email', '$password', '$mobile', '$cadd', '$padd', '$frname', '$fremail', '$frmobile', '$mrname', '$mremail', '$mrmobile', '$aid')";
        $insert_result = $conn->query($insert_query);

        if ($insert_result) {
            header('location:login.php');
            // echo "Successful";
        } else {
            echo mysqli_error($conn);
        }
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
    <link rel="stylesheet" type="text/css" href="index5.css">

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
    <nav class="navbar navbar-expand-sm navbar-dark sticky-top" style="background-color:#2693C4;">
        <!-- Brand/logo -->
        <a class="navbar-brand title-head" href="index.php" style="outline:none;">d-repo</a>

        <!-- Links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="login.php" class="nav-link login-button"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
            </li>
        </ul>
    </nav>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" style="margin:0%;">

        <div class="container text-center">
            <h1 style="margin-top:3%; margin-bottom:3%; font-family:'Bitter', serif;">SIGN UP</h1>


            <div class="row">
                <div class="col-md-6">
                    <input type="text" id="input-text1" class="input-field" name="fname" placeholder="First Name" value="<?php echo $fname ?>" required>
                </div>
                <div class="col-md-6">
                    <input type="text" id="input-text1" class="input-field" name="lname" placeholder="Last Name" value="<?php echo $lname ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="text" id="input-text1" class="input-field" name="course" placeholder="Course" value="Bachelor of Engineering" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Branch : &nbsp;&nbsp;&emsp;</label>
                    <select name="branch" id="input-text2" class="custom-select-lg input-field">
                        <option value="Computer Engineering" <?php if ($branch == "Computer Engineering") echo 'selected="selected"'; ?>>Computer Engineering</option>
                        <option value="Electronics Engineering" <?php if ($branch == "Electronics Engineering") echo 'selected="selected"'; ?>>Electronics Engineering</option>
                        <option value="Instrumentation Engineering" <?php if ($branch == "Instrumentation Engineering") echo 'selected="selected"'; ?>>Instrumentation Engineering</option>
                        <option value="Electronics and Telecommunication Engineering" <?php if ($branch == "Electronics and Telecommunication Engineering") echo 'selected="selected"'; ?>>Electronics and Telecommunication Engineering</option>
                        <option value="Information Technology" <?php if ($branch == "Information Technology") echo 'selected="selected"'; ?>>Information Technology</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <input type="text" id="input-text1" class="input-field" name="class" placeholder="Class" value="<?php echo $class ?>" required>
                    <span style="color:crimson;"><?php echo $classerr ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Date of Birth : &nbsp;&nbsp;&emsp;</label>
                    <input type="date" id="input-date" class="input-field" name="dob" value="<?php echo $dob ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="" style="font-family: 'Ubuntu', sans-serif; font-size:20px;">&nbsp;&nbsp;Gender : &nbsp;&nbsp;&emsp;</label>
                    <select name="gender" id="input-text2" class="custom-select-lg input-field">
                        <option value="Male" <?php if ($gender == "Male") echo 'selected="selected"'; ?>>Male</option>
                        <option value="Female"><?php if ($gender == "Female") echo 'selected="selected"'; ?>Female</option>
                        <option value="Other" <?php if ($gender == "Female") echo 'selected="selected"'; ?>>Other</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input type="tel" id="input-text1" class="input-field" maxlength="10" name="mobile" placeholder="Mobile No." value="<?php echo $mobile ?>" required>
                </div>
                <div class="col-md-6">
                    <input type="email" id="input-text1" class="input-field" name="email" placeholder="Email ID" value="<?php echo $email ?>" required>
                    <span style="color:crimson;"><?php echo $emailerr ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input type="password" id="input-text1" class="input-field" maxlength="13" name="pass" placeholder="Password" required>
                </div>
                <div class="col-md-6">
                    <input type="password" id="input-text1" class="input-field" maxlength="13" name="confirm" placeholder="Confirm Password" required>
                    <span style="color:crimson;"><?php echo $passerr ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <textarea name="cadd" id="input-text1" cols="100%" placeholder="Current Address" required><?php echo $cadd ?></textarea>
                </div>
                <div class="col-md-6">
                    <textarea name="padd" id="input-text1" cols="100%" placeholder="Permanent Address" required><?php echo $padd ?></textarea>
                </div>
            </div>

            <!-- </form> -->

        </div>

        <div class="container">
            <h2><br> PARENTS' DETAILS</h2>
            <hr>

            <!-- <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" style="margin:0%;"> -->

            <div class="row">
                <div class="col-md-12">
                    <input type="text" id="input-text1" class="input-field" name="frname" placeholder="Father's Name" value="<?php echo $frname ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input type="email" id="input-text1" class="input-field" name="fremail" placeholder="Email ID" value="<?php echo $fremail ?>" required>
                </div>
                <div class="col-md-6">
                    <input type="tel" id="input-text1" class="input-field" maxlength="10" name="frmobile" placeholder="Mobile No." value="<?php echo $frmobile ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <input type="text" id="input-text1" class="input-field" name="mrname" placeholder="Mother's Name" value="<?php echo $mrname ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input type="email" id="input-text1" class="input-field" name="mremail" placeholder="Email ID" value="<?php echo $mremail ?>" required>
                </div>
                <div class="col-md-6">
                    <input type="tel" id="input-text1" class="input-field" maxlength="10" name="mrmobile" placeholder="Mobile No." value="<?php echo $mrmobile ?>" required>
                </div>
            </div>

            <!-- </form> -->

        </div>

        <div class="container text-center" style="margin-bottom:3%; margin-top:2%;">

            <!-- <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" style="margin:0%;"> -->

            <input type="submit" class="btn btn-info btn-lg" name="signup" value="Sign up">
        </div>
    </form>

</body>

</html>