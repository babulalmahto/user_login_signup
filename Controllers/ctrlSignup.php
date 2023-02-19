<?php

include_once 'Models/mdlSignup.php';

class ctrlSignup {

    public $model;
    public $error;

    public function __construct() {
        $this->model = new clsSignup();
        $this->error = "";
    }

    public function invoke() {
        $page = filter_input(INPUT_GET, 'mdl', FILTER_SANITIZE_SPECIAL_CHARS);
//    echo "Page is ".$page."        ";

        if (isset($_POST['btnSignUp'])) {

            $this->model->cName = trim($_POST["txtName"]);
            $this->model->cEmail = trim($_POST["txtEmail"]);
            $this->model->nPassword = trim($_POST["txtPassword"]);
            $this->model->nConfirmPassword = trim($_POST["txtConfirmPassword"]);
            $this->model->nDate = trim($_POST["txtDate"]);
            $this->model->nFlag = trim($_POST["txtFlag"]);

            if (empty($this->model->cName)) {
                $this->model->error = "*Name required.";
            } elseif (!filter_var($this->model->cName, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
                $this->model->error =  "Name:only letters and white space allowed.";
           
            } else {
                $this->model->nCode = trim($_POST["txtName"]);
            }

            if ($this->model->error == "") {
                $this->model->Signup();
            }
        } elseif (isset($_POST['btnClear'])) {
            $this->model->clear();
        }
        require "Views/vewSignup.php";
    }

}

?>