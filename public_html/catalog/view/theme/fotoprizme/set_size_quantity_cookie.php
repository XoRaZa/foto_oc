<?php

if (isset($_COOKIE['sizeQ'])) {
    $sizeQ = json_decode($_COOKIE['sizeQ'], TRUE);
}

$names = $_POST['names'];
$sizes = $_POST['sizes'];
$pavirsiai = $_POST['pavirsiai'];
$kadravimai = $_POST['kadravimai'];
$quantities = $_POST['quantities'];

$count = count($names) - 1;
$i = 0;

$sizeQ = array();

while($i <= $count) {
    $sizeQ[$names[$i]] = array(
            'size' => $sizes[$i],
            'pavirsius' => $pavirsiai[$i],
            'kadravimas' => $kadravimai[$i],
            'quantity' => $quantities[$i]
    );
    $i++;
}

setcookie('test', '@@@@@@@', time() + 60*60, '/');
setcookie('sizeQ', json_encode($sizeQ), time() + 60*60, '/');