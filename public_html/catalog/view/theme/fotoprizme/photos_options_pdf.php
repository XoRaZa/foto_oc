<?php

require_once('fpdf.php');
require_once('connect.php');

$userId = $_GET['userid'];

$stmt = $conn->prepare('SELECT name, photo_size, quantity FROM picture WHERE user_id = :user_id');
$stmt->execute(array(
    'user_id' => $userId
));
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pdf = new FPDF();
$pdf->addPage();
$pdf->SetFont('Arial', 'B', 10);

$pdf->Cell(130, 10, 'Nuotraukos pavadinimas', 'LTB');
$pdf->Cell(30, 10, 'Dydis', 'TB');
$pdf->Cell(30, 10, 'Kiekis', 'TBR', 1);

$pdf->SetFont('Arial', '', 9);

foreach ($rows as $row) {
    $name = $row['name'];
    if(strlen($name) > 80) {
        $name = substr($name, 0, 77) . '......';
    }
    $photoSize = $row['photo_size'];
//    $quantity = $row['kiekis']; // TODO: Fix.

    $pdf->Cell(130, 10, $name, 'LTB');
    $pdf->Cell(30, 10, $photoSize, 'TB');
    $pdf->Cell(30, 10, $quantity, 'TBR', 1);
}

$pdf->Output();