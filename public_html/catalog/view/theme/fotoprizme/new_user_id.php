<?php
//ikvieciamas viena karta is main_script.js
require_once('connect.php');

$error_str = 'error_str';

/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * order lenteleje laukas custom_field opencartu apdirbamas kaip serializuotas
 * t.y. siame lauke visi duomenys turi buti serializuoti.
 ******************************************************************************/
$userId = serialize(md5(uniqid('', TRUE)));
$currentTime = time();
$expireDate = $currentTime+60*60*24*365;
$cookieName = 'userId';
$cookieNameSet = $cookieName . 'Set';
setcookie($cookieName, $userId, $expireDate, '/');
setcookie($cookieNameSet, $currentTime, $expireDate, '/');
setcookie('photo-count', 1, time()+60*60*24*365, '/');
$data = array($cookieName => $userId, $cookieNameSet => $currentTime, $error_str => '', 'sql_str' => 'empty', 'userIP' => $userIP);

//TODO:2016-07-02:rimas:reikia kazkaip realizuoti
//??$this->load->model('fotoprisme/fotoorder');
//??$this->model_fotoprisme_fotoorder->createNewOrder($userId);

function createNewOrder($con, $userId, $userIP) {
    global $data;
    try
    {
        $sql_str = "INSERT INTO `oc_order` ( `custom_field`, `order_status_id`, `date_added`, `date_modified`, `ip`) "
            . "VALUES ('". $userId ."', 1, '".date('Y-m-d h:i:s', time())."','".date('Y-m-d h:i:s', time())."', '". $userIP ."' )";
        $data['sql_str'] = $sql_str;
        $stmt = $con->prepare($sql_str);
        $stmt->execute();
        /*
        $sql_str = 'INSERT INTO `oc_order` ( `custom_field`, `order_status_id`, `date_added`, `date_modified`) ' 
                             . 'VALUES ( :user_id,       :order_status_id,  :date_added,  :date_modified)';
        $data['sql_str'] = $sql_str;
        $stmt = $con->prepare($sql_str);
        $stmt->execute(
            array(
                'user_id' => $userId,
                'order_staus_id' => 1, //status 1 tai Pending arba kitaip Laukiantis
                'date_added' => date('Y-m-d h:i:s', time()),
                'date_modified' => date('Y-m-d h:i:s', time())
            )
        );
        */

        $sql_str = "SELECT `order_id` FROM `oc_order` WHERE `custom_field` = '".$userId."'";
        $data['sql_str'] = $sql_str;  
        $rows = $con->query($sql_str);
        foreach ($rows as $row) {
            $orderId = $row['order_id'];
        }
        $data[$error_str] = $orderId;
        
         
    }
    catch (Exception $exc)
    {
        $data[$error_str] = 'Insert new order sql:' . $exc->getTraceAsString() . '.';
        return;
    }

    try
    {
        $sql_str = "INSERT INTO `oc_order_product` (`order_id`, `product_id`, `name`, `model`, `quantity`)"
            . "VALUES (".$orderId.", 1, 'Nuotraukų spausdinimas','".$userId."',0)";
        $data['sql_str'] = $sql_str;
        $stmt = $con->prepare($sql_str);
        $stmt->execute();
                
        /*
        $sql_str = 'INSERT INTO `oc_order_product` (`order_id`, `product_id`, `name`, `model`, `quantity`) '
                                     . 'VALUES (:order_id,  :product_id,  :name,  :model,  :quantity)';
        $stmt = $con->prepare($sql);
        $data['sql_str'] = $sql_str;
        $stmt->execute(
            array(
                'order_id' => $orderId,
                'product_id' => 1,
                'name' => 'Nuotraukų spausdinimas',
                'model' => $userId,
                'quantity' => 0
            )
        );
        */
    }
    catch (Exception $exc)
    {
        $data[$error_str] = 'Insert new product for new order sql:' . $exc->getTraceAsString() . '.';
        return;
    }
    
};


createNewOrder($con, $userId, $userIP);

echo json_encode($data);

return;
