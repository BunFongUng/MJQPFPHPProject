<?php
    try {
        require_once("../config/User.php");
        require_once("../config/Database.php");

        $user = new User();

    } catch(PDOException $err) {
        $error = $err->getMessage();
    }
?>
<?php include_once("../include_header.php");?>
<?php include_once("../include_footer.php");?>
