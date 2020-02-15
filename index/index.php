<?php

require('C:\xampp\htdocs\d-repo\connect.php');

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
        <a class="navbar-brand title-head" href="#" style="outline:none;">d-repo</a>

        <!-- Links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="#section1" class="nav-link login-button"><i class="fa fa-info" aria-hidden="true"></i> About us</a>
            </li>
            <li class="nav-item">
                <a href="#section2" class="nav-link login-button"><i class="fa fa-phone" aria-hidden="true"></i> Contact</a>
            </li>
            <li class="nav-item">
                <a href="register.php" class="nav-link login-button"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign up</a>
            </li>
            <li class="nav-item">
                <a href="login.php" class="nav-link login-button"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                <!-- <input type="button" onclick="window.location.href = 'login.php'" class="nav-link login-button" style="outline:none;" value="Login"> -->
            </li>
        </ul>
    </nav>

    <div id="drepo">
        <!-- Background insertion happened here -->
        <div class="col-md-7 col-sm-7 title-page">
            <br> A STUDENT <br> DATA REPOSITORY
        </div>
    </div>

    <div id="section1">
        <div class="aboutus">
            <h2>A Content Platform for the Digital Age</h2>
            <div class="para">
                <p>&emsp;&emsp;Every student, as he proceeds in his career, takes upon several activities and attends several seminars. For instance, a student attends workshops, takes up an internship, performs multiple courses, writes many research papers, works on several projects, so on and so forth. The students receive certificates or some form of validations on completing his workshops, internships and courses. It can be a rather tedious task to maintain and keep a record of all these certificates manually.</p>

                <p>&emsp;&emsp;The main objective of the website ‘d-repo’ is to make this task as easy and as user friendly as possible. First, you register yourself to this website. Once you register, you are appointed an amin who basically monitors all your work and and the uploads that you do. Here, you upload the details of the workshops you attended and of the projects you took on. You also upload the certificate along with the details. Once these are uploaded, the job of the student is done.</p>

                <p>&emsp;&emsp;Now, the admin does not register himself to the website. His details and his registration is directly into the database. It is now the admin’s job to look after the things put up by the student, to check their validity and verify them in order to approve them. The admin also sends emails to the students to remind and notify them about the deadlines for their upload. The admin is also able to check the entire record of any particular student, along with his personal details. He can also view the record of any class, even if he isn’t an admin for all of it’s students.</p>
            </div>
        </div>
    </div>

    <div id="section2">
        <div class="contact">
            <!-- Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima, officiis veniam obcaecati dolores totam ullam libero deserunt necessitatibus accusamus voluptate excepturi aliquid dicta beatae corrupti, eveniet doloribus temporibus quidem quia! -->
            <div class="container col-md-12 col-sm-9">
                <div class="card" style="width:25%; margin: 0 auto;">
                    <img class="card-img-top" src="me.jpg" alt="Card image" style="width:100%;">
                    <div class="card-body">
                        <h4 class="card-title">Sayali Moghe</h4>
                        <p class="card-text">
                            <strong> EMAIL ID </strong><br>
                            2017.sayali.moghe@ves.ac.in <br><br>
                            <strong>MOBILE NO. </strong><br>
                            9594033444
                        </p>
                        <!-- <a href="#" class="btn btn-primary">See Profile</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>