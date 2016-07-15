<?php
$shortopts  = "";
$shortopts .= "f:";  // Required value
$shortopts .= "v::"; // Optional value
$shortopts .= "abc"; // These options do not accept values

$longopts  = array(
    "required:",     // Required value
    "optional::",    // Optional value
    "option",        // No value
    "opt",           // No value
);
$options = getopt($shortopts, $longopts);
var_dump($options);
echo "kuku<br>";
session_start();
echo '<pre>';
foreach ($_SESSION as $key => $val){
    var_dump($val);
    if (is_array($val)) {
        var_dump(unserialize(base64_decode($key)));
//        echo $val[0];
//        echo $val[1];
//        echo '</pre>';
//    }
//    else {
//        echo $key." ".$val."<br/>";
    }
}

//
//
echo base64_decode("YToxOntzOjEwOiJwcm9kdWN0X2lkIjtpOjQ7fQ==");
//unset($val);
//echo '<pre>';
//foreach ($_SESSION as $key => $val) {
//        echo $key." ".$val."<br/>";
//};
//echo '</pre>';
////echo var_dump(unserialize("YToxOntzOjEwOiJwcm9kdWN0X2lkIjtpOjQ7fQ=="));
?>