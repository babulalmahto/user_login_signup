<?php

class clsForgotPassword {

    public $cName = "";
    public $cEmail = "";
    public $nPassword = "";
    public $nConfirmPassword = "";
    public $nDate = "";
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


    public function search() {

        $stmt = $this->pdo->prepare("SELECT name, email, pass, confirm_password FROM login WHERE name ='" . $this->cName . "'");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row != false) {
            $this->cName = $row["name"];
            $this->cEmail = $row["email"];
            $this->nPassword = $row["pass"];
            $this->nConfirmPassword = $row["confirm_password"];

            $this->nFlag = "Y";
        } else {
            $this->message = "Oops! Account: " . $this->cName . " is not registered.";
            $this->cName = "";
        }
    }

    public function delete() {
        $sql = "DELETE FROM login WHERE name='" . $this->cName . "'";
        if ($this->pdo->exec($sql)) {
            $this->message = "Account deleted successfully";
            $this->cName = "";
        } else {
            $this->message = "Opps! Account: " . $this->cName . " is not exist.";
            $this->cName = "";
        }
    }

    public function clear() {
        $this->cName = "";
        $this->cEmail = "";
        $this->nPassword = "";
        $this->nConfirmPassword = "";
        $this->nDate = "";
        $this->nFlag = "";
    }

}

?>
