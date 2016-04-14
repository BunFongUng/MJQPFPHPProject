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
        $content = (isset($_POST['content']) && !empty($_POST['content'])) ? $_POST['content'] : '';

        if($title == "") {
            $error_message["title_required"] = "Title Field is Required!";
        }

        if($content == "") {
            $error_message["content_required"] = "Content Field is Required!";
        }

        if(empty($error_message)) {
            $database = new Database();
            $conn = $database->getConnection();
            $sql_update = "UPDATE menus SET MenuTItle = :title, ParentMenu = :parent, Content = :content WHERE ID = :update_id";
            $stmt = $conn->prepare($sql_update);
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":parent", $parent);
            $stmt->bindParam(":update_id", $update_id);
            $stmt->bindParam(":content", $content);
            $stmt->execute();
        }
    }

} catch(PDOException $err) {
    $error = $err->getMessage();
}
?>

<?php include_once("../include_header.php");?>
    <div id="main-content">
        <div class="wrapper">
            <div class="row">
                <div class="col-md-12">
                    <?php if($stmt->rowCount() > 0):?>
                        <div class="form-group">
                            <h3 style="text-align: center">Record has been updated!</h3>
                        </div>
                        <div class="form-group">
                            <a class="btn btn-success" href="../dashboard.php">Go Back</a>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
<?php include_once("../include_footer.php");?>
