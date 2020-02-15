<?php

include('C:\xampp\htdocs\d-repo\connect.php');

$email = $password = $err = NULL;

if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $student_query = "SELECT semail, spassword FROM student WHERE semail='$email' AND spassword='$password'";
    $admin_query = "SELECT aemail, apassword FROM adminn WHERE aemail='$email' AND apassword='$password'";

    $student_result = $conn->query($student_query);
    $admin_result = $conn->query($admin_query);

    if ($student_result->num_rows == 1) {
        // session_register("email");
        // session_register("password");
        session_start();
        $_SESSION['login_student_email'] = $email;

        header('location:../student/loggedin.php');
    } elseif ($admin_result->num_rows == 1) {
        // session_register("email");
        // session_register("password");
        session_start();
        $_SESSION['login_admin_email'] = $email;

        header('location:../admin/loggedin.php');
    } else {
        $err = "Invalid email or password!";
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
                <a href="register.php" class="nav-link login-button"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign up</a>
            </li>
        </ul>
    </nav>

    <div class="container col-md-4 text-center align-item-center login-form">
        <h3 style="font-family:'Jomolhari', serif;">LOGIN</h3>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" style="margin:0%;">
            <br>
            <input type="email" id="input-email" class="input-field" name="email" placeholder="Email ID" value="<?php echo $email ?>" required>
            <label for="input-email"></label>
            <br><br>
            <input type="password" id="input-password" class="input-field" name="password" placeholder="Password" value="<?php echo $password ?>" required>
            <span for="input-password" style="color:crimson;"><?php echo $err; ?></span>
            <br><br>
            <input type="submit" id="input-text" class="btn btn-info btn-xs input-field" name="signin" value="Sign in">
        </form>
    </div>
    
</body>

</html>