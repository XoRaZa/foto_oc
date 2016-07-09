<?php

require_once('connect.php');

$change = $_POST['changeUserId'];
$orN = $change['orN'];
$size = $change['size'];
$oldUserId = $change['oldUserId'];
$newUserId = $change['newUserId'];

$quantity = $_POST['quantity'];
changeOneQuantity($conn, $name, $quantity);

function changePictureUserId($conn, $orN, $size, $oldUserId, $newUserId) {
    $stmt = $conn->prepare('UPDATE picture SET user_id = :new_user_id WHERE original_name = :name AND file_size = :file_size AND user_id = :old_user_id');
    $stmt->execute(
        array(
            'new_user_id' => $newUserId,
            'old_user_id' => $oldUserId,
            'name' => $orN,
            'file_size' => $size
        )
    );
}