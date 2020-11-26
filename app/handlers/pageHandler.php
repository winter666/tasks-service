<?php
include($_SERVER['DOCUMENT_ROOT'] . '/app/config/init.php');
use App\Modules\Tasks;

if (!empty($_GET['page'])) {
    $arResponse['status'] = 200;
    $arResponse['result'] = false;

    if ($_GET['page'] === '/') {
        
        if (auth()) {

            $tasks = new Tasks;
            $data = [];
            $user = user();
            $status = $tasks->getCurrentStatus();
            $data['currentTasks'] = $tasks->getTasksListByUserId($user['id'], $tasks->getCurrentStatus());
            $data['completeTasks'] = $tasks->getTasksListByUserId($user['id'], $tasks->getCompleteStatus());
            $data['failedTasks'] = $tasks->getTasksListByUserId($user['id'], $tasks->getFailedtatus());
            if (admin()) {
                $data['assignedTasks'] = $tasks->getTasksListByAssignerId($user['id']);
            }
            $data['user'] = $user;

            ob_start();
            getTemplate('tasks', $data);
            $html = ob_get_clean();
        } else {
            ob_start();
            include($_SERVER['DOCUMENT_ROOT'] . '/templates/landing/index.php');
            $html = ob_get_clean();
        }
        
        $arResponse['html'] = $html;
        $arResponse['result'] = true;
    }

    echo json_encode($arResponse);

}