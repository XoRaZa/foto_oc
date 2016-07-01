<?php
//RZ
require_once('/home/pprelati/domains/kado.lt/public_html/config.php');

$con = new PDO('mysql:host=' . DB_HOSTNAME . ';dbname=' . DB_DATABASE . ';charset=utf8', DB_USERNAME, DB_PASSWORD);

function l($msg) {
    file_put_contents('log.txt', $msg . "\n", FILE_APPEND);
}
