<?php

require_once('connect.php');

$name = $_POST['name'];
$pavirsius = $_POST['pavirsius'];
$kadravimas = $_POST['kadravimas'];
$quantity = $_POST['quantity'];

changeOneQuantity($conn, $name, $pavirsius, $kadravimas, $quantity);

function changeOneQuantity($conn, $name, $pavirsius, $kadravimas, $quantity) {
    $stmt = $conn->prepare('UPDATE picture SET quantity = :quantity, pavirsius = :pavirsius, kadravimas = :kadravimas WHERE name = :name');
    $stmt->execute(
        array(
            'quantity' => $quantity,
            'pavirsius' => $pavirsius,
            'kadravimas' => $kadravimas,
            'name' => $name
        )
    );
}