<?php

require_once('connect.php');

$userId = $_COOKIE['userId'];

$stmt = $conn->prepare('SELECT total FROM oc_order WHERE custom_field = :custom_field');
$stmt->execute(
    array(
        'custom_field' => $userId,
    )
);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total = $row['total'];