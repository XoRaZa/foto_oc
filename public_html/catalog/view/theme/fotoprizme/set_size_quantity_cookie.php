<?php
ob_start();
file_put_contents('/home/pprelati/domains/kado.lt/public_html/_tmp/--cookie.html','');

if (isset($_COOKIE['sizeQ'])) {
    $sizeQ = json_decode($_COOKIE['sizeQ'], TRUE);
}

var_dump($sizeQ);


$names = $_POST['names'];
$sizes = $_POST['sizes'];
$pavirsiai = $_POST['pavirsiai'];
$kadravimai = $_POST['kadravimai'];
$quantities = $_POST['quantities'];
$prod_id = $_POST['product_id'];

var_dump($_POST['names']);
var_dump($_POST['sizes']);
var_dump($_POST['pavirsiai']);
var_dump($_POST['kadravimai']);
var_dump($_POST['quantities']);
var_dump($_POST['product_id']);

$count = count($names) - 1;
$i = 0;

$sizeQ = array();

var_dump($sizeQ);


while($i <= $count) {
    $sizeQ[$names[$i]] = array(
            'size' => $sizes[$i],
            'pavirsius' => $pavirsiai[$i],
            'kadravimas' => $kadravimai[$i],
            'quantity' => $quantities[$i]
    );
    $i++;
}

var_dump($sizeQ);

file_put_contents('/home/pprelati/domains/kado.lt/public_html/_tmp/--cookie.html', ob_get_contents(), FILE_APPEND);

setcookie('test', '@@@@@@@', time() + 60*60, '/');
setcookie('sizeQ', json_encode($sizeQ), time() + 60*60, '/');

ob_clean();