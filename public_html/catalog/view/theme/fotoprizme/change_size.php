<?php
require_once('connect.php');
$name = $_POST['name'];
$names = $_POST['names'];
$size = $_POST['size'];
if (!empty($name) && !empty($size)) {
    echo 'name';
    changeOneSize($con, $name, $size);
}
if (!empty($names) && !empty($size)) {
    echo 'names';
    changeSelectedSizes($con, $names, $size);
}
function changeOneSize($con, $name, $size)
{
    $stmt = $con->prepare('UPDATE picture SET photo_size = :photo_size WHERE name = :name');
    $stmt->execute(array('photo_size' => $size, 'name' => $name));
}

function changeSelectedSizes($con, $names, $size)
{
    $stmt = $con->prepare('UPDATE picture SET photo_size = :photo_size WHERE name = :name');
    foreach ($names as $name) {
        $stmt->execute(array('photo_size' => $size, 'name' => $name));
    };
}