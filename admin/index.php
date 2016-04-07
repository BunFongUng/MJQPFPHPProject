<?php
session_start();
require_once("config/User.php");
$user_login = new User();

if($user_login->is_logged_in() != "") {
    $user_login->redirect("dashboard.php");
}

if(isset($_POST['login'])) {
    $error_array = array();
    $email = (isset($_POST['email']) && !empty($_POST['email'])) ? $_POST['email'] : '';
    $password = (isset($_POST['password']) && !empty($_POST['password'])) ? $_POST['password'] : '';

    if($email == '') {
        $error_array['email_required'] = 'Email Field is required!';
    }

    if($password == '') {
        $error_array['password_required'] = 'Password Field is required!';
    }

    if(empty($error_array)) {
        $user_login->login($email, md5($password));
    }

} else {
    $error_array = array();
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>MJQPF</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Login Form</h4>
                        </div>
                        <div class="panel-body">
                            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" id="email" placeholder="Email" >
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" id="password"  placeholder="Enter your password">
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-success form-control" type="submit" name="login" value="Login">
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php if(!empty($error_array)):?>
                        <div class="alert alert-warning">
                            <?php foreach($error_array as $error):?>
                                <p><?= $error?></p>
                            <?php endforeach;?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </body>
</html>
