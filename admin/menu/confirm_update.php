<?php
try {
    session_start();
    require_once("../config/User.php");
    require_once("../config/Database.php");
    $user = new User();

    if(!$user->is_logged_in()) {
        $user->redirect("index.php");
    }

    //if the user click the update button
    if(isset($_POST['update'])) {
        $update_id = (isset($_POST['update_id'])) ? $_POST['update_id'] : '';
        $title = (isset($_POST['title']) && !empty($_POST['title'])) ? $_POST['title'] : '';
        $parent = (isset($_POST['parent']) && !empty($_POST['parent'])) ? $_POST['parent'] : '';
    }

} catch(PDOException $err) {
    $error = $err->getMessage();
}