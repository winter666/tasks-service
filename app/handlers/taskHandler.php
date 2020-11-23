<?php

require($_SERVER['DOCUMENT_ROOT'] . '/app/config/init.php');
require($_SERVER['DOCUMENT_ROOT'] . '/app/modules/Response.php');

use App\Modules\Auth;
use App\Modules\Response;
use App\Modules\Tasks;

if (!empty($_POST) && auth()) {

    $task = new Tasks;
    $result = ['result' => false, 'message' => "Something's bad"];

    if ($_POST['action'] === 'create') {
        $name = htmlspecialchars(trim($_POST['name']));
        $description = htmlspecialchars(trim($_POST['description']));
        $userId = htmlspecialchars($_POST['user_id']);
        $currentUser = user();
        $result = $task->makeCurrent($name, $description, $userId, $currentUser['id']);
    }

    if ($_POST['action'] === 'pass_tasks') {
        $taskId = $_POST['task_id'];
        $status = (isset($_POST['status']) && admin()) ? $_POST['status'] : $task->getCheckStatus(); 
        $result = $task->toggleStatus($taskId, $status);
    }

    if ($_POST['action'] === 'delete' && admin()) {
        $taskId = $_POST['task_id'];
        $result = $task->deleteTask($taskId);
    }

    $response = new Response;
    echo $response->answer($result);
}