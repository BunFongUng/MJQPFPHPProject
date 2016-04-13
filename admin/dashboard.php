<?php
    session_start();
    require_once("config/User.php");
    require_once("config/Database.php");
    $user_home = new User();
    $stmt = $user_home->runQuery("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(":id", $_SESSION['userSession']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $database = new Database();
    $conn = $database->getConnection();
    $sql_select = "SELECT * FROM menus";
    $stmt = $conn->prepare($sql_select);
    $stmt->execute();

    if(!$user_home->is_logged_in()) {
        $user_home->redirect("index.php");
    }
?>
<?php include_once('header.php');?>
<div id="main-content">
    <div class="wrapper">
        <div class="row" id="displayAJAX">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Menu Title</th>
                        <th>Parent Menu</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if($stmt->rowCount() > 0):?>
                        <?php while($row = $stmt->fetch()):?>
                            <tr>
                                <td><?= $row['ID']?></td>
                                <td><?= $row['MenuTitle']?></td>
                                <td><?= $row['ParentMenu']?></td>
                                <td>
                                    <a id="btnUpdate" class="btn btn-success" href="menu/update.php?id=<?= $row['ID']?>">Update</a>
                                    <a href="menu/delete.php?id=<?= $row['ID']?>" class="btn btn-success">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile;?>
                    <?php else:?>
                        <tr>
                            <td>Record Not Found!</td>
                        </tr>
                    <?php endif;?>
                    </tbody>
                </table>
                <a href="menu/create.php" class="btn btn-primary">Create Menu</a>
            </div>
        </div>
    </div>
</div>
<?php include_once('footer.php')?>
