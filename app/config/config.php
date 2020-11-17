<?php
// error_reporting(E_ALL);
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/app/helpers/system.php');



define('APP_NAME', config('APP_NAME'));
define('DB_NAME', config('DB_NAME'));
define('DB_USER', config('DB_USER'));
define('DB_PASSWORD', config('DB_PASSWORD'));
define('DB_HOST', config('DB_HOST'));



