<?php

require($_SERVER['DOCUMENT_ROOT'] . '/app/config/config.php');
require($_SERVER['DOCUMENT_ROOT'] . '/app/modules/DB.php');
require($_SERVER['DOCUMENT_ROOT'] . '/app/modules/Auth.php');
require($_SERVER['DOCUMENT_ROOT'] . '/app/modules/Tasks.php');
require($_SERVER['DOCUMENT_ROOT'] . '/app/helpers/site.php');

use App\Modules\DB;

GLOBAL $DB;

$db = new DB;
$connection = $db->connect(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
$DB = $connection;