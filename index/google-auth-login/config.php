<?php

require_once('googleapi\vendor\autoload.php');
session_start();
$client = new Google_Client();
$client->setClientId("953358532784-79gh0uug090qiv7aol9o7kp35dv0gtt8.apps.googleusercontent.com");
$client->setClientSecret("mihWjfgWIAg6RTUFf7fezCyE");
$client->setRedirectUri("http://localhost/index/login.php");
$client->addScope("email");

// $client->setAuthConfig('client_credentials.json');
// $client->setScopes(array(
//     "https://www.googleapis.com/auth/plus.login",
//     "https://www.googleapis.com/auth/userinfo.email",
//     "https://www.googleapis.com/auth/userinfo.profile",
//     ));
// $client->addScope([Google_Service_Oauth2::PLUS_LOGIN, Google_Service_Oauth2::USERINFO_EMAIL, Google_Service_Oauth2::USERINFO_PROFILE]);
?>