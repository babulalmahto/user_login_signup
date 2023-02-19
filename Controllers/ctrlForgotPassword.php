<?php

include_once 'Models/mdlForgotPassword.php';

class ctrlForgotPassword {

    public $model;
    public $error;

    public function __construct() {
        $this->model = new clsForgotPassword();
        $this->error = "";
    }

    public function invoke() {
        $page = filter_input(INPUT_GET, 'mdl', FILTER_SANITIZE_SPECIAL_CHARS);
//    echo "Page is ".$page."        ";

        
        if (isset($_POST["btnSearch"])) {

            if (empty(trim($_POST["txtName"]))) {
                $this->model->error = $this->model->error . "*Enter name first.";
            } else {
                $this->model->cName = trim($_POST["txtName"]);
                $this->model->search();
            }
        } elseif (isset($_POST["btnDelete"])) {

            if (empty(trim($_POST["txtName"]))) {
                $this->model->error = $this->model->error . "*Enter name first.";
            } else {
                $this->model->cName = trim($_POST["txtName"]);
                $this->model->delete();
            }
        } elseif (isset($_POST['btnClear'])) {
            $this->model->clear();
        }
        require "Views/vewForgotPassword.php";
    }

}

?>