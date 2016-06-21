<?php
print 'smart_resize_image.function.php';//RZ
require('smart_resize_image.function.php');
require_once('connect.php');

// 'pictures' refers to your file input name attribute
if (empty($_FILES)) {
    json_encode(array('error'=>'No files found for upload.'));
    return; // terminate
}

$image = $_FILES['file'];

// a flag to see if everything is ok
$success = null;

// file paths to store
$paths = array();

// get file names
$filename = $image['name'];

// get file types
$filetype = $image['type'];

// get file tmp_names
$filetmp_name = $image['tmp_name'];

// get errors
$errors = $image['error'];

// get file sizes
$filesize = $image['size'];

// get userId
$userId = $_POST['userId'];

// proccess file.

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
    $url = '';
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
    $url_thumb = '';
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

    if(move_uploaded_file($filetmp_name, $path)) {
        $success = true;

        smart_resize_image($path, null, 120, 0, true, $path_thumb, $uploaded_images_thumbs_directory, false, false, 80);
        save_data($con, $filename, $new_filename, $filetype, $ext, $filetmp_name, $filesize, $path, $path_thumb, $url, $url_thumb, $userId);

    } else {
        $success = false;
    }

// check and process based on successful status
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

// return a json encoded response for plugin to process successfully
echo json_encode($output);

function save_data($con, $filename, $new_filename, $filetype, $ext, $filetmp_name, $filesize, $path, $path_thumb, $url, $url_thumb, $userId) {
//    try {
        $stmt = $con->prepare('INSERT INTO picture (original_name, name, type, ext, tmp_name, file_size, path, path_thumb, url, url_thumb, user_id) VALUES (:original_name, :name, :type, :ext, :tmp_name, :file_size, :path, :path_thumb, :url, :url_thumb, :user_id)');
        $stmt->execute(
            array(
                'original_name' => $filename,
                'name' => $new_filename,
                'type' => $filetype,
                'ext' => $ext,
                'tmp_name' => $filetmp_name,
                'file_size' => $filesize,
                'path' => $path,
                'path_thumb' => $path_thumb,
                'url' => $url,
                'url_thumb' => $url_thumb,
                'user_id' => $userId
            )
        );
//    } catch (Exception $e) {
//        echo $e->getMessage();
//    } finally {
//        echo 'done';
//    }
}
