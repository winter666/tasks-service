<?php

require($_SERVER['DOCUMENT_ROOT'] . '/app/config/config.php');
require($_SERVER['DOCUMENT_ROOT'] . '/app/modules/DB.php');
require($_SERVER['DOCUMENT_ROOT'] . '/app/modules/Auth.php');

use App\Modules\DB;

GLOBAL $DB;

$DB =
$db = new DB;
$connection = $db->connect(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
$DB = $connection;