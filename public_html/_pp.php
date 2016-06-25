<?php
$error_str = 'error_str';
$userId = serialize(md5(uniqid('', TRUE))); 
$currentTime = time();
$expireDate = $currentTime+60*60*24*365;
$cookieName = 'userId';
$cookieNameSet = $cookieName . 'Set';
setcookie($cookieName, $userId, $expireDate, '/');
setcookie($cookieNameSet, $currentTime, $expireDate, '/');
setcookie('photo-count', 1, time()+60*60*24*365, '/');
$data = array($cookieName => $userId, $cookieNameSet => $currentTime, $error_str => '', 'sql_str' => 'init');

function createNewOrder($con, $userId) {
        global $data;
        $sql_str = 'INSERT INTO oc_order ( custom_field, order_status_id, date_added, date_modified) ' 
                             . 'VALUES ( :user_id,       :order_status_id,  :date_added,  :date_modified)';
        $sql_str = 'bybis';
        $data['sql_str'] = $sql_str;
        return;

}

createNewOrder($con, $userId);
echo json_encode($data);
//ini_set('max_file_uploads', 220); echo ini_get('max_file_uploads');
//require('kint/Kint.class.php');
//d($_SERVER);
//echo phpinfo();
//$dir = dirname(__FILE__);
//$dir = dirname($dir);
//$dir = dirname($dir);
//$dir = scandir($dir);
//$dir = readdir();
//d($dir);
//
//$files = array();
//$dir = opendir('../../../domains'); // open the cwd..also do an err check.
//while(false != ($file = readdir($dir))) {
//    if(($file != ".") and ($file != "..") and ($file != "index.php")) {
//        $files[] = $file; // put in array.
//    }
//}
//
//natsort($files); // sort.

// print.
//foreach($files as $file) {
//    echo("<a href='$file'>$file</a> <br />\n");
//}
//
//$files = array();
//$dir = opendir('../../../domains/amnestija.lt/public_html'); // open the cwd..also do an err check.
//while(false != ($file = readdir($dir))) {
//    if(($file != ".") and ($file != "..") and ($file != "index.php")) {
//        $files[] = $file; // put in array.
//    }
//}
//
//natsort($files); // sort.
//
// print.
//foreach($files as $file) {
//    echo("<a href='$file'>$file</a> <br />\n");
//}
//
//d(file_get_contents('../../../domains/amnestija.lt/public_html'));