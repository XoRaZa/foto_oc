<?php
//blokuojami IP address'ai
require_once('google_ip_denied.php');
$userIP = get_client_ip();
foreach ($blocked_google_ip as $value) {
    if ($value == $userIP ){
        exit('Pizdec');
    };
} ;
// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (    getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
};

require_once('/home/pprelati/domains/kado.lt/public_html/config.php');
$conn = new PDO('mysql:host=' . DB_HOSTNAME . ';dbname=' . DB_DATABASE 
        . ';charset=utf8', DB_USERNAME, DB_PASSWORD);
