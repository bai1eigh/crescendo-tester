<?php
session_start();
if(isset($_SESSION['crescendo_userid'])){
    $_SESSION['crescendo_userid'] = NULL;
    unset($_SESSION['crescendo_userid']);
}


header("Location: login.php");
die;
?>