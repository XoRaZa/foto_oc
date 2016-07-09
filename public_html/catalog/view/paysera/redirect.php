<?php
require_once('/home/pprelati/domains/kado.lt/public_html/system/library/vendor/webtopay/libwebtopay/WebToPay.php');
//RZ TODO reikia kad imtu is cia o ne is virsutinio
//require_once('/system/library/vendor/webtopay/libwebtopay/WebToPay.php');

function get_self_url() {
    $s = substr(strtolower($_SERVER['SERVER_PROTOCOL']), 0,
        strpos($_SERVER['SERVER_PROTOCOL'], '/'));

    if (!empty($_SERVER["HTTPS"])) {
        $s .= ($_SERVER["HTTPS"] == "on") ? "s" : "";
    }

    $s .= '://'.$_SERVER['HTTP_HOST'];

    if (!empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != '80') {
        $s .= ':'.$_SERVER['SERVER_PORT'];
    }

    $s .= dirname($_SERVER['SCRIPT_NAME']);

    return $s;
}



try {
    $orderId = $_COOKIE['userId'];

    $conn = new PDO('mysql:host=localhost;dbname=pprelati_fotop;charset=utf8', 'pprelati_fotop', 'jusK1tas');
    $stmt = $conn->prepare('SELECT total FROM oc_order WHERE custom_field = :user_id');
    $stmt->execute(
        array(
            'user_id' => $orderId
        )
    );
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $amount = $row['total'] * 100;

    $self_url = get_self_url();
    
    //RZ RESTORE NEED AFTER TESTS
    header('Location: '.$self_url.'/accept.php', true);return;

    $request = WebToPay::redirectToPayment(array(
        'projectid'     => 70156,
        'sign_password' => 'c5c00d279e02e4f179d9ffce52656de4',
        'orderid'       => $orderId,
        'amount'        => $amount,
        'currency'      => 'EUR',
        'country'       => 'LT',
        'accepturl'     => $self_url.'/accept.php',
        'cancelurl'     => $self_url.'/cancel.php',
        'callbackurl'   => $self_url.'/callback.php',
        'test'          => 1,
    ));
} catch (WebToPayException $e) {
    echo $e;
}