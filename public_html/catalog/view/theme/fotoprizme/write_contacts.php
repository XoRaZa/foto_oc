<?php

require_once('connect.php');

$userId = $_POST['userId'];
$name = $_POST['vardas'];
$surname = $_POST['pavarde'];
$email = $_POST['elpastas'];
$phone = $_POST['telefonas'];
$address = $_POST['adresas'];
$comments = $_POST['komentaras'];

writeContacts($conn, $userId, $name, $surname, $email, $phone, $address, $comments);

function writeContacts($conn, $userId, $name, $surname, $email, $phone, $address, $comments) {
    $stmt = $conn->prepare('UPDATE oc_order SET firstname = :name, lastname = :surname, email = :email, telephone = :phone, payment_address_1 = :address, comment = :comments, date_modified = :date_modified WHERE custom_field = :user_id');
    $stmt->execute(array(
        'name' => $name,
        'surname' => $surname,
        'email' => $email,
        'phone' => $phone,
        'address' => $address,
        'comments' => $comments,
        'user_id' => $userId,
        'date_modified' => date('Y-m-d h:i:s', time())
    ));
}