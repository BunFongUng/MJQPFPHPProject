<?php
try {
    session_start();
    require_once("../config/User.php");
    require_once("../config/Database.php");

    $user_home = new User();
    $stmt = $user_home->runQuery("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(":id", $_SESSION['userSession']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    $database = new Database();

    if(!$user_home->is_logged_in()) {
        $user_home->redirect("index.php");
    }

    $error_message = array();
    $id = (isset($_GET['id'])) ? $_GET['id'] : '';
    if($id == "") {
        $error_message["id_required"] = "ID not found!";
    } else {
        $conn = $database->getConnection();
        $sql_select = "SELECT * FROM menus WHERE ID = :id";
        $stmt = $conn->prepare($sql_select);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
    }

} catch (PDOException $err) {
    $error = $err->getMessage();
}
?>

<?php include_once("header.php");?>
    <div id="main-content">
        <div class="wrapper">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel-default" style="background: white; border-radius: 5px;box-shadow: 0 0 3px 0 rgba(0,0,0,.5)">
                        <div class="panel-heading">
                            <span>confirm to delete</span>
                        </div>
                        <div class="panel-body">
                            <form action="confirm_delete.php" method="POST">
                                <input type="hidden" name="id" value="<?= $id?>">
                                <div class="form-group">
                                    <label for="title">title</label>
                                    <input class="form-control" type="text" name="title" id="title" value="<?php echo $title = (isset($row['MenuTitle'])) ? $row['MenuTitle'] : ''?>">
                                </div>

                                <div class="form-group">
                                    <label for="parent">Parent Menu</label>
                                    <select name="parent" id="parent" class="form-control">
                                        <?php if(isset($row['ParentMenu'])):?>
                                           <?php
                                                $conn3 = $database->getConnection();
                                                $stmt3 = $conn3->prepare("SELECT * FROM menus WHERE ID = :parentID");
                                                $stmt3->bindParam(":parentID", $row['ParentMenu']);
                                                $stmt3->execute();
                                                $row3 = $stmt3->fetch();
                                            ?>
                                            <?php if($stmt3->rowCount() > 0):?>
                                                <option value="<?= $row3['ID']?>"><?= $row3['MenuTitle']?></option>
                                            <?php else:?>
                                                <option value="0">None</option>
                                            <?php endif;?>

                                        <?php endif;?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" name="content" id="content" value="<?php echo $content = (isset($row['Content'])) ? $row['Content'] : ''?>"></textarea>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="form-control btn btn-danger" name="delete" value="Delete">
                                </div>
                            </form>

                            <?php if(!empty($error_message)):?>
                                <div class="alert alert-warning">
                                    <p><?= $error_message['confirm']?></p>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once("footer.php");?>
