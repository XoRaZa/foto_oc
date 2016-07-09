<?php
//ikvieciamas viena karta is main_script.js
require_once('connect.php');

$error_str = 'error_str';

/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * order lenteleje laukas custom_field opencartu apdirbamas kaip serializuotas
 * t.y. siame lauke visi duomenys turi buti serializuoti.
 ******************************************************************************/
$userId = serialize(md5(uniqid('', TRUE)));
$statusId = 1; //status 1 tai Pending arba kitaip Laukiantis
$currentTime = time();
$expireDate = $currentTime+60*60*24*365;
$cookieName = 'userId';
$cookieNameSet = $cookieName . 'Set';
setcookie($cookieName, $userId, $expireDate, '/');
setcookie($cookieNameSet, $currentTime, $expireDate, '/');
setcookie('photo-count', 1, time()+60*60*24*365, '/');

$data = array(
    $cookieName => $userId, 
    $cookieNameSet => $currentTime, 
    $error_str => 'none', 
    'sql_str' => 'empty', 
    'userIP' => $userIP,
    'order_id'=> ''
);

//TODO:2016-07-02:rimas:siais dviem keitimais reikia kazkaip realizuoti orderio kurimo sauguma t.y. autorizacija
//??$this->load->model('fotoprisme/fotoorder');
//??$this->model_fotoprisme_fotoorder->createNewOrder($userId);

function createNewOrder($conn, $userId, $userIP, $statusId) {
    global $data;
    try
    {
        $sql_str = "INSERT INTO `".DB_PREFIX."order` ( `custom_field`, `order_status_id`, `date_added`, `date_modified`, `ip`) "
            . "VALUES ('$userId', '$statusId', '".date('Y-m-d h:i:s', time())."','".date('Y-m-d h:i:s', time())."', '$userIP' )";
        $data['sql_str'] = $sql_str;
        file_put_contents(DIR_TMP . '--foto-new-user-id.html', $sql_str."\n");
        $result = $conn->query($sql_str);
        if (!$result){
            file_put_contents(DIR_TMP . '--foto-new-user-id.html', "Sql error\n", FILE_APPEND);
        }
        
        $sql_str = "SELECT `order_id` FROM `".DB_PREFIX."order` WHERE `custom_field` = '$userId'";
        $data['sql_str'] = $sql_str;  
        file_put_contents(DIR_TMP.'--foto-new-user-id.html', $sql_str."\n", FILE_APPEND);
        $result = $conn->query($sql_str);
        if (!$result){
            file_put_contents(DIR_TMP . '--foto-new-user-id.html', "Sql error\n", FILE_APPEND);
        }
        //jei daugiau nei vienas toks tai imti paskutinio orderio id
        foreach ($result as $row) {
            $order_id = $row['order_id'];
        }
        $data[$error_str] = $order_id;
        $data['order_id'] = $order_id;
        
        file_put_contents(DIR_TMP . '--foto-new-user-id.html', $orderId."\n" , FILE_APPEND);
         
    }
    catch (Exception $exc)
    {
        $data[$error_str] = 'Insert new order sql:' . $exc->getTraceAsString() . '.';
        return;
    }

    try
    {
       
        $sql_str = 
                "SELECT pr.`product_id`"
                ."FROM `".DB_PREFIX."product` pr, `oc_product_to_category` cat "
                ."WHERE pr.`product_id` = cat.`product_id` AND cat.`category_id` = '59'";
        file_put_contents(DIR_TMP . '--foto-new-user-id.html', $sql_str."\n" , FILE_APPEND);
        foreach ($conn->query($sql_str) as $row) {
            $sql_str = "INSERT INTO `".DB_PREFIX."order_product` (`order_id`, `product_id`, `name`, `model`, `quantity`)"
                . "VALUES ('$orderId', '".$row['product_id']."', 'Nuotraukų spausdinimas','$userId', '0') ";
            file_put_contents(DIR_TMP . '--foto-new-user-id.html', $sql_str."\n" , FILE_APPEND);
            $result = $conn->query($sql_str);
        }
                            
        $data['sql_str'] = $sql_str;
        
    }
    catch (Exception $exc)
    {
        $data[$error_str] = 'Insert new product for new order sql:' . $exc->getTraceAsString() . '.';
        return;
    }
    
};

createNewOrder($conn, $userId, $userIP, $statusId);

echo json_encode($data);

return;
