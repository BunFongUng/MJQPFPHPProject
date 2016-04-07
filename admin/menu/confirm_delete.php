<?php
try {
    require_once("../config/Database.php");
    if(isset($_POST['delete'])) {
        $id = (isset($_POST['id'])) ? $_POST['id'] : '';
        if($id != "") {
            $database = new Database();
            $conn = $database->getConnection();
            $sql_delete = "DELETE FROM menus WHERE ID = :id";
            $stmt = $conn->prepare($sql_delete);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            if($stmt->rowCount() > 0) {
                header("Location: ../dashboard.php");
            } else {
                echo "Look like something error!";
            }
        }
    }
} catch (PDOException $err) {
    $error = $err->getMessage();
}