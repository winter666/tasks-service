<?php

require($_SERVER['DOCUMENT_ROOT'] . '/app/config/init.php');
require($_SERVER['DOCUMENT_ROOT'] . '/app/modules/Response.php');

use App\Modules\Auth;
use App\Modules\Response;

if (!empty($_POST)) {

    if ($_POST['action'] === 'register') {
        $auth = new Auth();
        $name = htmlspecialchars($_POST['name']);
        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);
        $confPass = htmlspecialchars($_POST['confirmation']);
        $result = $auth->register($name, $login, $password, $confPass);
    }

    if ($_POST['action'] === 'authorize') {
        $auth = new Auth();
        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);
        $result = $auth->authorize($login, $password, false);
    }

    if ($_POST['action'] === 'logout') {
        $result = Auth::logout();
    }

    $url = '/templates/general_components/header-buttons.php';
    $response = new Response;
    echo $response->answer($result, ['url' => $url]);
}