<?php

//include_once 'Models/mdlShopCart.php';

class Controller {

    private $pdo;

    public function __construct() {
        
    }

    public function invoke() {



        $page = filter_input(INPUT_GET, 'mdl', FILTER_SANITIZE_SPECIAL_CHARS);

        switch ($page) {

            case "1":

                include_once 'Controllers/ctrlLogin.php';
                $ctrlHomecont = new ctrlLogin();
                $ctrlHomecont->invoke();
                break;

            case "2":

                include_once 'Controllers/ctrlSignup.php';
                $ctrlHomecont = new ctrlSignup();
                $ctrlHomecont->invoke();
                break;

            case "3":

                include_once 'Controllers/ctrlForgotPassword.php';
                $ctrlHomecont = new ctrlForgotPassword();
                $ctrlHomecont->invoke();
                break;

            case "4":

                include_once 'Controllers/ctrlStatement.php';
                $ctrlHomecont = new ctrlStatement();
                $ctrlHomecont->invoke();
                break;
            
            default:
                include_once 'Controllers/ctrlMenu.php';
                $ctrlHomeMenu = new ctrlMenu();
                $ctrlHomeMenu->invoke();
        }
    }

}

?>