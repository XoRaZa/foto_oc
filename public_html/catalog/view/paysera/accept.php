<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/catalog/view/theme/fotoprizme/connect.php');

$orderStatusId = 20; // Sumok�ta
$userId = $_COOKIE['userId'];

$stmt = $con->prepare('UPDATE oc_order SET order_status_id = :order_status_id WHERE custom_field = :custom_field');
$stmt->execute(array(
    'order_status_id' => $orderStatusId,
    'custom_field' => $userId
));

//Add sending mail to customer 

header('LOCATION: http://' . $_SERVER['SERVER_NAME'] . '?success=true');