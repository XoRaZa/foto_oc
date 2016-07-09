<?php
require_once('connect.php');
$name = $_POST['name'];
$names = $_POST['names'];
$size = $_POST['size'];
$product_id = $_POST['product_id'];
if (!empty($name) && !empty($size)) {
    echo 'name';
    changeOneSize($conn, $name, $size, $product_id);
}
if (!empty($names) && !empty($size)) {
    echo 'names';
    changeSelectedSizes($conn, $names, $size);
}
function changeOneSize($conn, $name, $size, $product_id)
{
    $stmt = $conn->prepare('UPDATE picture SET photo_size = :photo_size, product_id = :product_id WHERE name = :name');
    $stmt->execute(array('photo_size' => $size, 'name' => $name, 'product_id' => $product_id));
}

function changeSelectedSizes($conn  , $names, $size)
{
    $stmt = $conn->prepare('UPDATE picture SET photo_size = :photo_size WHERE name = :name');
    foreach ($names as $name) {
        $stmt->execute(array('photo_size' => $size, 'name' => $name));
    };
}