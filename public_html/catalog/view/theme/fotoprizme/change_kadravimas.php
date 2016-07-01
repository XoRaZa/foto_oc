<?php

require_once('connect.php');

$name = $_POST['name'];
$kadravimas = $_POST['kadravimas'];
changeOneKadravimas($con, $name, $kadravimas);

function changeOneKadravimas($con, $name, $kadravimas) {
    try {
        $stmt = $con->prepare('UPDATE picture SET kadravimas = :kadravimas WHERE name = :name');
        $stmt->execute(
            array(
                'kadravimas' => $kadravimas,
                'name' => $name
            )
        );
    } catch (Exception $e) {
    }
}
