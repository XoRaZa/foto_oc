<?php

require_once('connect.php');

file_put_contents(DIR_TMP.'--foto-change-ord-stat.html', '');
ob_start();
echo "<pre>";
echo "_POST \n";
var_dump($_POST);
echo "\nDefined variables \n";
get_defined_vars();
file_put_contents(DIR_TMP.'--foto-change-ord-stat.html', ob_get_contents(), FILE_APPEND);
ob_end_clean();

$userId = $_POST['userId'];
$order_id = $_POST['order_id'];
$order_status_id = $_POST['order_status_id'];

$sql_str = "UPDATE `" . DB_PREFIX . "order` SET `order_status_id` = '" . $order_status_id
        . "' WHERE `order_id` = '" . $order_id . "'";
file_put_contents(DIR_TMP.'--foto-change-ord-stat.html', $sql_str, FILE_APPEND);
$result = $conn->query($sql_str);


if ($_POST['update_order_product'] === '1'){
    $sql_str = "SELECT * FROM picture WHERE `order_id` = '" . $order_id ."'";
    file_put_contents(DIR_TMP.'--foto-change-ord-stat.html', $sql_str, FILE_APPEND);
    $pic_rows = $conn->query($sql_str);
    foreach ($pic_rows as $pic_row) {
        //$o_pr_rows = $conn->query("SELECT * FROM `" . DB_PREFIX . "order_product` op " 
        //        . " WHERE op.order_id = '" . $order_id . "' AND op.product_id = '" . $product_id . "'");
        $sql_str = "UPDATE `" . DB_PREFIX . "order_product` op SET op.quantity = op.quantity + " . $pic_row['quantity']
                . " WHERE op.order_id = '" . $order_id . "' AND op.product_id = '" . $pic_row['product_id'] . "'";
        file_put_contents(DIR_TMP.'--foto-change-ord-stat.html', $sql_str, FILE_APPEND);
        $result = $conn->query($sql_str);
         
     }
    
}