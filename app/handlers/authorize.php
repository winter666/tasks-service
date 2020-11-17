<?php

require($_SERVER['DOCUMENT_ROOT'] . '/app/config/init.php');
use App\Modules\Auth;

if (!empty($_POST)) {

    if ($_POST['action'] === 'register') {
        $auth = new Auth();
        $name = htmlspecialchars($_POST['name']);
        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);
        $confPass = htmlspecialchars($_POST['confirmation']);
        $result = $auth->register($name, $login, $password, $confPass);
        $arResponse = $result;
        echo json_encode($arResponse);
    }
}