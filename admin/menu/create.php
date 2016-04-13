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
    $conn = $database->getConnection();

    if(isset($_POST['submit'])) {
        $error_message = array();
        $title = (isset($_POST['title']) && !empty($_POST['title'])) ? $_POST['title'] : '';
        $parent = (isset($_POST['parent'])) ? $_POST['parent'] : '';
        $content = (isset($_POST['content']) && !empty($_POST['content'])) ? $_POST['content'] : '';

        if($title == "") {
            $error_message['title_required'] = "Title Filed Is Required!";
        }

        if($parent == "") {
            $error_message['parent_required'] = "Parent Menu Field Is Required!";
        }

        if($content == "") {
            $error_message['content_required'] = "Content Field is Required!";
        }

        if(empty($error_message)) {
            $sql_insert = "INSERT INTO menus(MenuTitle, ParentMenu, Content) VALUES(:title, :parent, :content)";
            $stmt = $conn->prepare($sql_insert);
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":parent", $parent);
            $stmt->bindParam(":content", $content);
            $stmt->execute();
            if($stmt->rowCount()) {
                header("Location: ../index.php");
            } else {
                print_r($stmt->errorInfo());
            }
        }

    } else {
        $error_message = array();
    }

    //if user is not login
    if(!$user_home->is_logged_in()) {
        $user_home->redirect("index.php");
    }
} catch(PDOException $err) {
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
                      <span>Create Menu</span>
                  </div>

                  <div class="panel-body">
                      <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
                          <div class="form-group <?php (isset($error_message['title_required'])) ? $output = 'has-error' : ''; echo $output;?>">
                              <label for="title">Menu Title</label>
                              <input class="form-control" type="text" name="title" id="title" placeholder="Menu Title">
                              <?php if(isset($error_message['title_required'])):?>
                                <span class="help-block"><?= $error_message['title_required']?></span>
                              <?php endif;?>
                          </div>

                          <div class="form-group">
                              <label for="parentMenu">Parent Menu</label>
                              <select class="form-control" name="parent" id="parentMenu">
                                  <option value="0">None</option>
                                <?php
                                    $conn2 = $database->getConnection();
                                    $stmt = $conn2->prepare("SELECT * FROM menus");
                                    $stmt->execute();
                                ?>
                                <?php if($stmt->rowCount() > 0):?>
                                    <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
                                        <option value="<?= $row['ID'] ?>"><?= $row['MenuTitle']?></option>
                                    <?php endwhile;?>
                                <?php endif;?>
                              </select>
                          </div>

                          <div class="form-group <?php echo $required = (isset($error_message['content_required'])) ? $required = 'has-error' : ''?>">
                              <textarea name="content" id="content" class="form-control"></textarea>
                              <?php if(isset($error_message['content_required'])):?>
                                  <span class="help-block"><?= $error_message['content_required']?></span>
                              <?php endif;?>
                          </div>

                          <div class="form-group">
                              <input type="submit" class="btn btn-primary form-control" name="submit" value="Create">
                          </div>
                      </form>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>
<?php include_once("footer.php");?>
