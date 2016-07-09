<?php

require_once('connect.php');

$userId = $_GET['userid'];

if(!file_exists(__DIR__ . '/uploads/zip')) {
    mkdir(__DIR__ . '/uploads/zip');
}

$date = date('Y-m-d', time());

$zip = new ZipArchive();
$zipPath = __DIR__ . '/uploads/zip/' . $date . '_' . $userId . '.zip';
$dlPath = '/catalog/view/theme/fotoprizme/uploads/zip/' . $date . '_' . $userId . '.zip';
$zip->open($zipPath, ZipArchive::CREATE);

$stmt = $conn->prepare('SELECT * FROM picture WHERE user_id = :user_id');
$stmt->execute(array(
    'user_id' => $userId
));
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($rows as $row) {
    $zip->addFile($row['path'], $row['name']);
}

$zip->close();

header("Location: $dlPath");