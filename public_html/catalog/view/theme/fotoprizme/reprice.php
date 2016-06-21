<?php

require_once('connect.php');

$userId = $_POST['userId'];

$pricing = $_POST['pricing'];

$total = 0;

foreach($pricing as $key => $val) {

    $valArray = explode('-', $val);

    $size = $valArray[0];

    $quantity = $valArray[1];

    $singlePrice = 0;

    switch($size) {

        case '9x13':

        {

            switch($quantity) {

                case $quantity <= 10:

                    $singlePrice = 0.69;

                    break;

                case $quantity > 10 && $quantity <= 50:

                    $singlePrice = 0.59;

                    break;

                case $quantity > 50 && $quantity <=100:

                    $singlePrice = 0.49;

                    break;

                default:

                    $singlePrice = 0.39;

            }

        };

            break;

        case '10x15':

        {

            switch($quantity) {

                case $quantity <= 10:

                    $singlePrice = 0.79;

                    break;

                case $quantity > 10 && $quantity <= 50:

                    $singlePrice = 0.69;

                    break;

                case $quantity > 50 && $quantity <=100:

                    $singlePrice = 0.59;

                    break;

                default:

                    $singlePrice = 0.49;

            }

        };

            break;

        case '13x18':

        {

            switch($quantity) {

                case $quantity <= 10:

                    $singlePrice = 1.59;

                    break;

                case $quantity > 10 && $quantity <= 50:

                    $singlePrice = 1.49;

                    break;

                case $quantity > 50 && $quantity <=100:

                    $singlePrice = 1.39;

                    break;

                default:

                    $singlePrice = 1.29;

            }

        };

            break;

        case '15x21':

        {

            switch($quantity) {

                case $quantity <= 10:

                    $singlePrice = 1.99;

                    break;

                case $quantity > 10 && $quantity <= 50:

                    $singlePrice = 1.89;

                    break;

                case $quantity > 50 && $quantity <=100:

                    $singlePrice = 1.79;

                    break;

                default:

                    $singlePrice = 1.69;

            }

        };

            break;

        case '15x23':

        {

            switch($quantity) {

                case $quantity <= 10:

                    $singlePrice = 2.29;

                    break;

                case $quantity > 10 && $quantity <= 50:

                    $singlePrice = 2.19;

                    break;

                case $quantity > 50 && $quantity <=100:

                    $singlePrice = 2.09;

                    break;

                default:

                    $singlePrice = 1.99;

            }

        };

            break;

        case '21x25':

        {

            switch($quantity) {

                case $quantity <= 10:

                    $singlePrice = 4.49;

                    break;

                case $quantity > 10 && $quantity <= 50:

                    $singlePrice = 4.39;

                    break;

                case $quantity > 50 && $quantity <=100:

                    $singlePrice = 4.29;

                    break;

                default:

                    $singlePrice = 4.19;

            }

        };

            break;

        case '21x30':

        {

            switch($quantity) {

                case $quantity <= 10:

                    $singlePrice = 4.99;

                    break;

                case $quantity > 10 && $quantity <= 50:

                    $singlePrice = 4.89;

                    break;

                case $quantity > 50 && $quantity <=100:

                    $singlePrice = 4.79;

                    break;

                default:

                    $singlePrice = 4.69;

            }

        };

            break;

    }

    $total = $total + $singlePrice * $quantity;

}



function writePrice($con, $userId, $total) {

    $stmt = $con->prepare('UPDATE oc_order SET total = :total_price WHERE custom_field = :user_id');

    $stmt->execute(

        array(

            'total_price' => $total,

            'user_id' => $userId

        )

    );



    $stmt = $con->prepare('UPDATE oc_order_product SET total = :total_price WHERE model = :user_id');

    $stmt->execute(

        array(

            'total_price' => $total,

            'user_id' => $userId

        )

    );

};



writePrice($con, $userId, $total);



$currentTime = time();

$expireDate = $currentTime+60*60*24*365;

setcookie('total_to_pay', $total, $expireDate, '/');



echo $total;