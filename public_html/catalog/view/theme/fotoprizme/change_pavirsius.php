<?php

require_once('connect.php');

$name = $_POST['name'];
$pavirsius = $_POST['pavirsius'];
changeOnePavirsius($con, $name, $pavirsius);

function changeOnePavirsius($con, $name, $pavirsius) {
    $stmt = $con->prepare('UPDATE picture SET pavirsius = :pavirsius WHERE name = :name');
    $stmt->execute(
        array(
            'pavirsius' => $pavirsius,
            'name' => $name
        )
    );
}
