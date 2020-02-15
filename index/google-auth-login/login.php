<?php
require("config.php");
#require("G_Api/vendor/autoload.php");
$auth_url= $client->createAuthUrl();
echo "<a href= '$auth_url'>Google Login</a>";

$code= isset($_GET['code'])? $_GET["code"]: NULL;

if(isset($code))
{
    try{
        $token= $client->fetchAccessTokenWithAuthCode($_GET['code']);
        // if ($token['error']) {
        //     error_log("$token[error]: $token[error_description]");
        // }
        // else{
        $_SESSION['id_token_token']=$token;
        $client->setAccessToken($token);
        
        
    }
    catch(Exception $e)
    {
        echo "Hi<br>";
        echo $e->getMessage();

    }

    try{
        $data=$client->verifyIdToken();
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
else
{
    $data=NULL;
}

if(isset($data))
{
    // echo $data["email"];
    echo $data;
}
?>