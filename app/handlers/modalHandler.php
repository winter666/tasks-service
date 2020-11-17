<?php

require($_SERVER['DOCUMENT_ROOT'] . '/app/config/init.php');

if (!empty($_GET['type'])) {

    $arResponse['result'] = false;

    if ($_GET['type'] === 'register') {
        ob_start();
        include($_SERVER['DOCUMENT_ROOT'] . '/templates/modals/auth/registration.php');
        $html = ob_get_clean();
        $arResponse['html'] = $html;
        $arResponse['result'] = true;
    }

    if ($_GET['type'] === 'authorize') {
        ob_start();
        include($_SERVER['DOCUMENT_ROOT'] . '/templates/modals/auth/authorization.php');
        $html = ob_get_clean();
        $arResponse['html'] = $html;
        $arResponse['result'] = true;
    }

    echo json_encode($arResponse);
}