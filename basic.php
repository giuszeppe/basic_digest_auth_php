<?php
$credentials = include("credentials.php");
function reject_basic_user(){
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Text to send if user hits Cancel button';
}
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    reject_basic_user();
    exit;
} else {
    if(isset($credentials[$_SERVER['PHP_AUTH_USER']]) && $credentials[$_SERVER['PHP_AUTH_USER']] == $_SERVER['PHP_AUTH_PW']){
        echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
        echo "<p>Hai inserito {$_SERVER['PHP_AUTH_PW']} come password!.</p>";
    } else {
        reject_basic_user();
    }
}
