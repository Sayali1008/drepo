<?php

    require_once('config.php');
    if(isset($_SESSION['accesstoken'])){
         $client->setAccessToken($_SESSION['accesstoken']);
    }else if (isset($_GET['code'])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['accesstoken'] = $token;
        //$client = $client->setAccessToken($_SESSION['accesstoken']);
    }else{
        header("location : index.php");
    }

    $oauth = new Google_Service_Oauth2($client);
    $user = $oauth->userinfo->get();

    echo "<pre>";
        print_r($user);
    echo "</pre>";
    $userdata['name'] = $user->name;
    $userdata['email'] = $user->email;
    $userdata['gender'] = $user->gender;
    $userdata['pageLink'] = $user->link;
    $userdata['picture'] = $user->picture;

    echo session('email');
    $_SESSION['user'] = $userdata;
    //header("location:userInfo.php");

?>