<?php

require_once('connect.php');

$name = $_POST['name'];
$pavirsius = $_POST['pavirsius'];
changeOnePavirsius($conn, $name, $pavirsius);

function changeOnePavirsius($conn, $name, $pavirsius) {
    $stmt = $conn->prepare('UPDATE picture SET pavirsius = :pavirsius WHERE name = :name');
    $stmt->execute(
        array(
            'pavirsius' => $pavirsius,
            'name' => $name
        )
    );
}
