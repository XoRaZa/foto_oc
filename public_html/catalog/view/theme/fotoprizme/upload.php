<?php
require('smart_resize_image.php');
require_once('connect.php');

file_put_contents(DIR_TMP.'--foto-upload.html', "upload start \n");
/*
$params = array(
    'conn'              => $conn, // is connect.php 
    'order-id'          => $order_id, 
    'order-product-id'  => $order_product_id, 
    'product-id'        => $product_id, 
    'file-name'         => $filename, 
    'file-name-new'     => $new_filename, 
    'file-type'         => $filetype, 
    'file-ext'          => $ext, 
    'file-name-tmp'     => $filetmp_name, 
    'file-size'         => $filesize, 
    'file-path'         => $path, 
    'file-path-thumb'   => $path_thumb,
    'file-url'          => $url, 
    'file-url-thumb'    => $url_thumb, 
    'user-id'           => $userId, 
    'photo-dimension'   => $photo_size, 
    'photo-surface'     => $pavirsius, 
    'photo-cropping'    => $kadravimas, 
    'photo-quantity'    => $quantity
);
//*/

    function save_data($data2save) {
        ob_start();
        var_dump(get_defined_vars());
        file_put_contents(DIR_TMP.'--foto-upload.html', ob_get_flush(), FILE_APPEND); 


        $sql_str = "INSERT INTO `picture` "
            ."(order_id, order_product_id, product_id, original_name, name, type,"
            ."ext, tmp_name, file_size, path, path_thumb, url, url_thumb, user_id,"
            ."photo_size, pavirsius, kadravimas, quantity) "
            ."VALUES ('"
            .$data2save['order-id']         ."', '"
            .$data2save['order-product-id'] ."', '"
            .$data2save['product-id']       ."', '"
            .$data2save['file-name']        ."', '"
            .$data2save['file-name-new']    ."', '"
            .$data2save['file-type']        ."', '"
            .$data2save['file-ext']         ."', '"
            .$data2save['file-name-tmp']    ."', '"
            .$data2save['file-size']        ."', '"
            .$data2save['file-path']        ."', '"
            .$data2save['file-path-thumb']  ."', '"
            .$data2save['file-url']         ."', '"
            .$data2save['file-url-thumb']   ."', '"
            .$data2save['user-id']          ."', '"
            .$data2save['photo-dimension']  ."', '"
            .$data2save['photo-suface']     ."', '"
            .$data2save['photo-copping']    ."', '"
            .$data2save['photo-quantity']   ."' ) ";

            file_put_contents(DIR_TMP.'--foto-upload.html', $sql_str, FILE_APPEND);
            $result = $data2save['conn']->query($sql_str);
    }

$params = array();
$params['conn']              = $conn;
$params['order-id']          = $_POST['order_id'];
$params['order-product-id']  = $_POST['order_product_id'];
$params['product-id']        = $_POST['product_id'];
$params['photo_dimension']   = $_POST['photo_size'];
$params['photo-surfac']      = $_POST['pavirsius'];
$params['photo-cropping']    = $_POST['kadravimas'];
$params['photo-quantity']    = $_POST['quantity'];
$params['user-id']           = $_POST['userId'];

ob_start();
echo "<pre>";
echo "_POST \n";
var_dump($_POST);
echo "\n_FILES\n";
var_dump($_FILES);
echo "\nDefined variables \n";
get_defined_vars();
file_put_contents(DIR_TMP.'--foto-upload.html', ob_get_contents(), FILE_APPEND);
ob_end_clean();

if (empty($_FILES)) {
    json_encode(array('error'=>'No files found for upload.'));
    return;
}

$image = $_FILES['file'];

$success = null;
$paths = array();
$filename = $image['name'];
$filetype = $image['type'];
$filetmp_name = $image['tmp_name'];
$errors = $image['error'];
$filesize = $image['size'];

$ext = array_pop(explode('.', basename($filename)));
$filename_no_ext = rtrim(str_replace($ext, '', $filename), '.');
$new_filename = $filename_no_ext . '_' . substr(md5(uniqid('', TRUE)), 1, 16) . "." . $ext;

date_default_timezone_set('Europe/Vilnius');
$current_year = date('Y');
$current_month = date('m');
$current_day = date('d');

$uploaded_images_directory =
    __DIR__
    . DIRECTORY_SEPARATOR
    . "uploads"
    . DIRECTORY_SEPARATOR
    . $current_year
    . DIRECTORY_SEPARATOR
    . $current_month
    . DIRECTORY_SEPARATOR
    . $current_day;

$uploaded_images_thumbs_directory =
    __DIR__
    . DIRECTORY_SEPARATOR
    . "uploads"
    . DIRECTORY_SEPARATOR
    . "thumbs"
    . DIRECTORY_SEPARATOR
    . $current_year
    . DIRECTORY_SEPARATOR
    . $current_month
    . DIRECTORY_SEPARATOR
    . $current_day;

$url =
    DIRECTORY_SEPARATOR
    . 'catalog'
    . DIRECTORY_SEPARATOR
    . 'view'
    . DIRECTORY_SEPARATOR
    . 'theme'
    . DIRECTORY_SEPARATOR
    . 'fotoprizme'
    . DIRECTORY_SEPARATOR
    . 'uploads'
    . DIRECTORY_SEPARATOR
    . $current_year
    . DIRECTORY_SEPARATOR
    . $current_month
    . DIRECTORY_SEPARATOR
    . $current_day
    . DIRECTORY_SEPARATOR
    . $new_filename;

$url_thumb =
    DIRECTORY_SEPARATOR
    . 'catalog'
    . DIRECTORY_SEPARATOR
    . 'view'
    . DIRECTORY_SEPARATOR
    . 'theme'
    . DIRECTORY_SEPARATOR
    . 'fotoprizme'
    . DIRECTORY_SEPARATOR
    . 'uploads'
    . DIRECTORY_SEPARATOR
    . 'thumbs'
    . DIRECTORY_SEPARATOR
    . $current_year
    . DIRECTORY_SEPARATOR
    . $current_month
    . DIRECTORY_SEPARATOR
    . $current_day
    . DIRECTORY_SEPARATOR
    . $new_filename;

if (!file_exists($uploaded_images_directory)) {
    mkdir($uploaded_images_directory, 0755, true);
}

$path = $uploaded_images_directory . DIRECTORY_SEPARATOR . $new_filename;
$path_thumb = $uploaded_images_thumbs_directory . DIRECTORY_SEPARATOR . $new_filename;

$params['file-name']         = $filename; 
$params['file-name-new']     = $new_filename; 
$params['file-type']         = $filetype; 
$params['file-ext']          = $ext; 
$params['file-name-tmp']     = $filetmp_name; 
$params['file-size']         = $filesize; 
$params['file-path']         = $path; 
$params['file-path-thumb']   = $path_thumb;
$params['file-url']          = $url; 
$params['file-url-thumb']    = $url_thumb; 

ob_start();
echo "\n Nu ka kartojame \n<pre>";
echo "_POST \n";
var_dump($_POST);
echo "\n_FILES\n";
var_dump($_FILES);
echo "parametrai \n";
var_dump($params);
echo "\nDefined variables \n";
get_defined_vars();
file_put_contents(DIR_TMP.'--foto-upload.html', ob_get_contents(), FILE_APPEND);
ob_end_clean();

if(move_uploaded_file($filetmp_name, $path)) {
    $success = true;
    smart_resize_image($path, null, 120, 0, true, $path_thumb, $uploaded_images_thumbs_directory, false, false, 80);
    save_data($params);
} else {
    $success = false;
}

if ($success === true) {
    // store a successful response (default at least an empty array). You
    // could return any additional response info you need to the plugin for
    // advanced implementations.
    $output = array();
    $output[] = true;
    // for example you can get the list of files uploaded this way
    // $output = ['uploaded' => $paths];
} elseif ($success === false) {
    $output = array('error'=>'Error while uploading images. Contact the system administrator');
    // delete any uploaded files
    foreach ($paths as $file) {
        unlink($file);
    }
} else {
    $output = array('error'=>'No files were processed.');
}
//*/

//$output = array();
//$output[] = true;

// return a json encoded response for plugin to process successfully
echo json_encode($output);
