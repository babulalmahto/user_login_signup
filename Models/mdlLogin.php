<?php

class clsLogin {

    public $cEmail = "";
    public $nPass = "";
    public $nFlag = "";
    public $error = "";
    public $message = "";
    public $pdo;

    public function __construct() {
        $this->pdo = $this->dbconnect();
    }

    public function dbconnect() {
        $dsn = 'mysql:host=localhost;dbname=login_page';
        $user = 'root';
        $passwd = 'mysql123';

        try {
            $pdo = new PDO($dsn, $user, $passwd);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Could not connect to the database: ' . $e->getMessage());
//echo "Connection failed: " . $e->getMessage();
        }
        return $pdo;
    }

    public function login() {

        $stmt = $this->pdo->prepare("SELECT email, pass FROM login WHERE email ='" . $this->cEmail . "' AND '" . $this->nPass . "'");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row != false) {
            $this->cEmail = $row["email"];
            $this->nPass = $row["pass"];
            echo("Login successful");

            $this->nFlag = "Y";
        } else {
            $this->message = "Oops! wrong email & password.";
            $this->cEmail = "";
            $this->nPass = "";
        }
    }

    public function clear() {
        $this->cEmail = "";
        $this->nPass = "";
        $this->nFlag = "";
    }

}

?>
