<?php
require_once("Database.php");
class User {
    private $conn;
    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->conn = $db;
    }

    public function runQuery($sql) {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function register($email, $password, $code) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO users(email, password, tokenCode)
                                          VALUES(:email, :password, :tokenCode)");
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", md5($password));
            $stmt->bindParam(":tokenCode", $code);
            $stmt->execute();
            return $stmt;
        } catch(PDOException $err) {
            $error = $err->getMessage();
        }
    }

    public function login($email, $password) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", md5($password));
            $stmt->execute();
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0) {
                if($userRow['userStatus'] == "Y") {
                    if($userRow['password'] == md5($password)) {
                        $_SESSION['userSession'] = $userRow['id'];
                        $this->redirect('dashboard.php');
                    } else {
                        header("Location: index.php?error");
                        exit;
                    }
                } else {
                    header("Location: index.php?inactive");
                }
            } else {
                header("Location: index.php?error");
                exit;
            }
        } catch(PDOException $err) {
            $error = $err->getMessage();
        }
    }

    public function is_logged_in() {
        if(isset($_SESSION['userSession'])) {
            return true;
        }
    }

    public function redirect($url) {
        header("Location: {$url}");
    }

    public function logout() {
        session_destroy();
        $_SESSION['userSession'] = false;
    }
}