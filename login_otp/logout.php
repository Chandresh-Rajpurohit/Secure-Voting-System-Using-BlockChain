<?php
if(session_status() === PHP_SESSION_NONE)
session_start();

session_destroy();
foreach($_SESSION as $k =>$v){
    unset($_SESSION[$k]);
}

echo "<script>location.replace('http://localhost/demo/Voting%20System/src/home.php');</script>";