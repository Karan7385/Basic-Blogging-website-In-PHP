<?php

    require_once 'Authentication_controller.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'register') {
        $authentication = new Authentication();
        $authentication -> register();
    } else if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'login') {
        $authentication = new Authentication();
        $authentication -> login();
    } else if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'forgot_password') {
        $authentication = new Authentication();
        $authentication -> forgot_password();
    } else if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'creator') {
        $authentication = new Authentication();
        $authentication -> creator();
    }

?>