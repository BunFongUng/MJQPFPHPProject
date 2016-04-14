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

        //if user is not login then redirect the user to the login page
        if(!$user_home->is_logged_in()) {
            $user_home->redirect("index.php");
        }


        $id = (isset($_GET['id']) && !empty($_GET['id'])) ? $_GET['id'] : '';

        if($id != "") {
            $database = new Database();
            $conn = $database->getConnection();
            $sql_select = "SELECT * FROM menus WHERE ID = :id";
            $stmt2 = $conn->prepare($sql_select);
            $stmt2->bindParam(":id", $id);
            $stmt2->execute();
            $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
            $stmt2->closeCursor();
        }

    } catch(PDOException $err) {
        $error = $err->getMessage();
    }

?>
<?php include_once("../include_header.php");?>
    <div id="main-content">
        <div class="wrapper">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel-default">
                        <div class="panel-heading">
                            <span>Update Menu</span>
                        </div>
                        <div class="panel-body">
                            <form action="confirm_update.php" method="post">
                                <input type="hidden" name="update_id" value="<?php echo $update_id = (isset($row2['ID'])) ? $row2['ID'] : ''?>">
                                <div class="form-group">
                                    <label for="title">Menu Title</label>
                                    <input type="text" class="form-control" name="title" id="title" value="<?php echo $title = (isset($row2['MenuTitle'])) ? $row2['MenuTitle'] : ''?>">
                                </div>

                                <div class="form-group">
                                    <label for="parent">Parent Menu</label>
                                    <select name="parent" id="parent" class="form-control">
                                        <?php
                                            $conn3 = $database->getConnection();
                                            $sql_select2 = "SELECT * FROM menus WHERE id = :parentID";
                                            $stmt3 = $conn3->prepare($sql_select2);
                                            $stmt3->bindParam(":parentID", $row2['ParentMenu']);
                                            $stmt3->execute();
                                            $row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
                                        ?>
                                        <?php if($stmt3->rowCount() > 0):?>
                                            <option value="<?= $row3['ID']?>"><?= $row3['MenuTitle']?></option>
                                            <?php
                                                $conn4 = $database->getConnection();
                                                $stmt4 = $conn4->prepare("SELECT * FROM menus");
                                                $stmt4->execute();
                                            ?>
                                            <?php while($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)):?>
                                                <?php if($row4['ID'] == $row3['ID']):?>
                                                    <?php continue;?>
                                                    <?php else:?>
                                                    <?php if($row4['ID'] == $row2['ID']):?>
                                                        <?php continue;?>
                                                    <?php else:?>
                                                        <option value="<?= $row4['ID']?>"><?= $row4['MenuTitle']?></option>
                                                    <?php endif;?>
                                                <?php endif;?>

                                            <?php endwhile;?>
                                        <?php else:?>
                                            <option value="0">None</option>
                                            <?php
                                                $conn4 = $database->getConnection();
                                                $stmt4 = $conn4->prepare("SELECT * FROM menus");
                                                $stmt4->execute();
                                            ?>
                                            <?php while($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)):?>
                                                <option value="<?= $row4['ID']?>"><?= $row4['MenuTitle']?></option>
                                            <?php endwhile;?>
                                        <?php endif;?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" name="content" id="content" value="<?= $content = (isset($row2['Content'])) ? $row2['Content'] : ''?>"></textarea>
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-success form-control" type="submit" name="update" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once("footer.php");?>
