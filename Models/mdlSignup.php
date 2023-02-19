<?php

class clsSignup {

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

    public function Signup() {

        if ($this->nFlag == "Y") {
            $sql = "UPDATE login SET name='" . $this->cName . "', email='" . $this->cEmail . "', pass='" . $this->nPassword . "', confirm_password='" . $this->nConfirmPassword . "', joined='" . $this->nDate . "' WHERE cus_code=" . $this->cName;
        } else {
            $sql = "INSERT INTO login (name, email, pass, confirm_password, joined) VALUES (:name, :email, :pass, :confirm_password, :joined)";
        } if ($sql != "") {
            $stmt = $this->pdo->prepare($sql);
            $data = [":name" => $this->cName, ":email" => $this->cEmail, ":pass" => $this->nPassword, ":confirm_password" => $this->nConfirmPassword, ":joined" => $this->nDate];

            $stmt->execute($data);
            if ($this->nFlag == "Y") {
                $this->message = "Records Updated Successfully";
            } else {
                $this->message = "*". $this->cName . ", your account created Succeessfully";
//                alert("Hello! I am an alert box!!");
            }
            $this->cName = $this->cEmail = $this->nPassword = $this->nConfirmPassword = $this->nDate = "";
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
