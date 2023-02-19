<?php

include_once 'Models/mdlLogin.php';

class ctrlLogin {

    public $model;
    public $error;

    public function __construct() {
        $this->model = new clsLogin();
        $this->error = "";
    }

    public function invoke() {
        $page = filter_input(INPUT_GET, 'mdl', FILTER_SANITIZE_SPECIAL_CHARS);
//    echo "Page is ".$page."        ";

        if (isset($_POST['btnLogin'])) {

            $this->model->cEmail = $_POST['txtEmail'];
            $this->model->nPass = $_POST['txtPassword'];
            if (empty($_POST["txtEmail"])) {
                $this->model->error = "*enter email";
            } elseif (empty($_POST["txtPassword"])) {
                $this->model->error = "*enter password";
            } else {
                $this->model->login();
                $this->model->clear();
            }
        } elseif (isset($_POST['btnClear'])) {
            $this->model->clear();
        }
        require "Views/vewLogin.php";
    }

}

?>