<?php

require($_SERVER['DOCUMENT_ROOT'] . '/app/config/init.php');
require($_SERVER['DOCUMENT_ROOT'] . '/app/modules/Response.php');

use App\Modules\Auth;
use App\Modules\Response;
use App\Modules\Tasks;

if (!empty($_POST) && auth()) {

    if ($_POST['action'] === 'create') {
        $name = htmlspecialchars(trim($_POST['name']));
        $description = htmlspecialchars(trim($_POST['description']));
        $userId = htmlspecialchars($_POST['user_id']);
        $currentUser = user();
        $task = new Tasks;
        $result = $task->makeCurrent($name, $description, $userId, $currentUser['id']);
    }

    $response = new Response;
    echo $response->answer($result);
}