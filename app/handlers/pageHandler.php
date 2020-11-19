<?php
include($_SERVER['DOCUMENT_ROOT'] . '/app/config/init.php');

if (!empty($_GET['page'])) {
    $arResponse['status'] = 200;
    $arResponse['result'] = false;

    if ($_GET['page'] === '/') {
        ob_start();
        if (auth()) {
            include($_SERVER['DOCUMENT_ROOT'] . '/templates/tasks/index.php');
        } else {
            include($_SERVER['DOCUMENT_ROOT'] . '/templates/landing/index.php');
        }
        $html = ob_get_clean();
        $arResponse['html'] = $html;
        $arResponse['result'] = true;
    }

    echo json_encode($arResponse);

}