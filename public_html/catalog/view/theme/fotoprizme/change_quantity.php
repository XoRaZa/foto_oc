<?php

require_once('connect.php');

$name = $_POST['name'];
$product_id = $_POST['size'];
$order_id = $_POST['order_id'];
$pavirsius = $_POST['pavirsius'];
$kadravimas = $_POST['kadravimas'];
$quantity = $_POST['quantity'];

$result = $conn->query("UPDATE `picture` SET `quantity` = '$quantity' WHERE `name` = '$name'");
//quantity = 1 kad matytusi picture
$result = $conn->query("UPDATE `".DB_PREFIX."order_product` SET `quantity` = '1' WHERE `order_id` = '$order_id' AND `product_id` = '$product_id'");


//changeOneQuantity($conn, $name, $pavirsius, $kadravimas, $quantity);

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