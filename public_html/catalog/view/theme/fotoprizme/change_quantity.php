<?php

require_once('connect.php');

$name = $_POST['name'];
$quantity = $_POST['quantity'];
changeOneQuantity($con, $name, $quantity);

function changeOneQuantity($con, $name, $quantity) {
    $stmt = $con->prepare('UPDATE picture SET quantity = :quantity WHERE name = :name');
    $stmt->execute(
        array(
            'quantity' => $quantity,
            'name' => $name
        )
    );
}