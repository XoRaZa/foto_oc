<?php
//$data = array('userId' => 'aaa', 'userIdSet' => '15:00');
//echo json_encode($data);
//return;//RZ

require_once('connect.php');

$cookieName = 'userId';
$userId = md5(uniqid('', TRUE));
$currentTime = time();
$expireDate = $currentTime+60*60*24*365;
setcookie($cookieName, $userId, $expireDate, '/');
setcookie('userIdSet', $currentTime, $expireDate, '/');
setcookie('photo-count', 1, time()+60*60*24*365, '/');
$data = array('userId' => $userId, 'userIdSet' => $currentTime);

function createNewOrder($con, $userId) {
    $stmt = $con->prepare('INSERT INTO oc_order (custom_field, date_added, date_modified) VALUES (:user_id, :date_added, :date_modified)');
    $stmt->execute(
        array(
            'user_id' => $userId,
            'date_added' => date('Y-m-d h:i:s', time()),
            'date_modified' => date('Y-m-d h:i:s', time())
        )
    );

    $stmt = $con->prepare('SELECT order_id FROM oc_order WHERE custom_field = :custom_field');
    $stmt->execute(
        array(
            'custom_field' => $userId
        )
    );
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $orderId = $row['order_id'];

    $stmt = $con->prepare('INSERT INTO oc_order_product (order_id, product_id, name, model, quantity) VALUES (:order_id, :product_id, :name, :model, :quantity)');
    $stmt->execute(
        array(
            'order_id' => $orderId,
            'product_id' => 1,
            'name' => 'Nuotraukų spausdinimas',
            'model' => $userId,
            'quantity' => 1
        )
    );
};

createNewOrder($con, $userId);

echo json_encode($data);