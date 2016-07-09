<?php
/* priklausomai nuo fografiju kiekio ir ju dydzioperskaiciuojamos kainos
 * ir update'inamos lenteles order order_product (laukai total_price)
 */
require_once('connect.php');

$userId = $_POST['userId'];
$pricing = $_POST['pricing'];
$total = 0;

$discounts = array();
$sql_str = "SELECT `product_id`, 1 as quantity , `price` FROM `" . DB_PREFIX . "product` "
   . "UNION SELECT `product_id`,     `quantity`, `price` FROM `" . DB_PREFIX . "product_discount`"
   . "ORDER BY `product_id`, `quantity`";

foreach ($conn->query($sql_str) as $row) {
    $discounts[] = array(
        "product_id" => $row['product_id'],
        "quantity" => $row['quantity'],
        "price" => $row['price']
    );
}

foreach($pricing as $val) {
    $valArray = explode('-', $val);
    $size = $valArray[0];
    $quantity = $valArray[1];
    $singlePrice = 0;
  
    foreach($discounts as $raw) {
        if($raw["product_id"] == $size){
                $singlePrice = $raw["price"];
                if($quantity >= $raw["quantity"]){
                    //
                }
        }
    }
    $total = $total + $singlePrice * $quantity;
}    

function writePrice($conn, $userId, $total) {
    $result = $conn->query("UPDATE oc_order SET total = '".$total."' WHERE custom_field = '".$user_id."'");
    
    $result = $conn->query("UPDATE oc_order_product SET total = '".$total_price."' WHERE model = '".$user_id."'");
};

writePrice($conn, $userId, $total);

$currentTime = time();
$expireDate = $currentTime+60*60*24*365;
setcookie('total_to_pay', $total, $expireDate, '/');

echo $total;