<?php

require_once('connect.php');

$userId = $_POST['userId'];
$orderStatusId = $_POST['order_status_id'];

changeOrderStatusId($conn, $userId, $orderStatusId);

function changeOrderStatusId($conn, $userId, $orderStatusId) {
    $stmt = $conn->prepare('UPDATE oc_order SET order_status_id = :order_status_id WHERE custom_field = :custom_field');
    $stmt->execute(array(
        'order_status_id' => $orderStatusId,
        'custom_field' => $userId
    ));
}