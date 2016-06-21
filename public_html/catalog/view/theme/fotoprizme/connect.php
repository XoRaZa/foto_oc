<?php

if(file_exists('../../../../config.php')) {
    require_once('../../../../config.php');
} else {
    require_once('../config.php');
}

$con = new PDO('mysql:host=' . DB_HOSTNAME . ';dbname=' . DB_DATABASE . ';charset=utf8', DB_USERNAME, DB_PASSWORD);

function l($msg) {
    file_put_contents('log.txt', $msg . "\n", FILE_APPEND);
}
