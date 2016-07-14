<?php

require_once('connect.php');

$name = $_POST['name'];
$kadravimas = $_POST['kadravimas'];
changeOneKadravimas($conn, $name, $kadravimas);

function changeOneKadravimas($conn, $name, $kadravimas) {
    try {
        $stmt = $conn->prepare('UPDATE picture SET kadravimas = :kadravimas WHERE name = :name');
        $stmt->execute(
            array(
                'kadravimas' => $kadravimas,
                'name' => $name
            )
        );
    } catch (Exception $e) {
        //log ($e->getMessage());
    }
}
