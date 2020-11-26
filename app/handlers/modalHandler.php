<?php

require($_SERVER['DOCUMENT_ROOT'] . '/app/config/init.php');
use App\modules\User;

if (!empty($_GET['type'])) {

    $arResponse['result'] = false;

    if ($_GET['type'] === 'register') {
        ob_start();
        getTemplate('modals.auth', [], 'registration');
        $html = ob_get_clean();
        $arResponse['html'] = $html;
        $arResponse['result'] = true;
        $arResponse['title'] = 'Registration';
        $arResponse['button_text'] = 'Sign up';
    }

    if ($_GET['type'] === 'authorize') {
        ob_start();
        getTemplate('modals.auth', [], 'authorization');
        $html = ob_get_clean();
        $arResponse['html'] = $html;
        $arResponse['result'] = true;
        $arResponse['title'] = 'Authorization';
        $arResponse['button_text'] = 'Sign in';
    }

    if ($_GET['type'] == 'create_task') {
        $u = new User;
        $users = $u->getUserList();
        ob_start();
        getTemplate('modals.tasks', ['users' => $users], 'create');
        $html = ob_get_clean();
        $arResponse['html'] = $html;
        $arResponse['result'] = true;
        $arResponse['title'] = 'Create new Task';
        $arResponse['button_text'] = 'Assign';
    }

    echo json_encode($arResponse);
}