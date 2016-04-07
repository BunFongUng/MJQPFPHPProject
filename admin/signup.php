<?php

session_start();
require_once("config/User.php");
$reg_user = new User();

if($reg_user->is_logged_in() != "") {
    $reg_user->redirect('dashboard.php');
}
$email = "bun.fong2009@gmail.com";
$password = md5("098436723");
$code = md5(uniqid(rand()));

if($reg_user->register($email, $password, $code)) {
    echo "User has been register!";
}