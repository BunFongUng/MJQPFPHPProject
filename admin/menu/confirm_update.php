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
        $error_message = array();
        $update_id = (isset($_POST['update_id'])) ? $_POST['update_id'] : '';
        $title = (isset($_POST['title']) && !empty($_POST['title'])) ? $_POST['title'] : '';
        $parent = (isset($_POST['parent'])) ? $_POST['parent'] : '';

        if($title == "") {
            $error_message["title_required"] = "Title Field Is Required!";
        }

        if(empty($error_message)) {
            $database = new Database();
            $conn = $database->getConnection();
            $sql_update = "UPDATE menus SET MenuTItle = :title, ParentMenu = :parent WHERE ID = :update_id";
            $stmt = $conn->prepare($sql_update);
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":parent", $parent);
            $stmt->bindParam(":update_id", $update_id);
            $stmt->execute();

            if($stmt->rowCount() > 0) {
                echo "Record has been updated!";
            }
        }
    }

} catch(PDOException $err) {
    $error = $err->getMessage();
}