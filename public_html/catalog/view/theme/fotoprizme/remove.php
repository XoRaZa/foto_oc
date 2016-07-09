<?php

require_once('connect.php');
if(!empty($_POST['name'])) {
    $name = $_POST['name'];
    deleteFile($conn, $name);
    removeOne($conn, $name);
    //delete record from picture table
    function removeOne($conn, $name) {
        $stmt = $conn->prepare('DELETE FROM picture WHERE name = :name');
        $stmt->execute(
            array(
                'name' => $name
            )
        );
    }
    //delete file from server
    function deleteFile($conn, $name) {
        $stmt = $conn->prepare('SELECT path, path_thumb FROM picture WHERE name = :name');
        $stmt->execute(
            array(
                'name' => $name
            )
        );
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $path = $row['path'];
        $path_thumb = $row['path_thumb'];
        unlink($path);
        unlink($path_thumb);
    }
}

if(!empty($_POST['orNs'])) {
    $orN = $_POST['orNs']['name'];
    $size = $_POST['orNs']['size'];
    $userId = $_POST['orNs']['userId'];
    try {
        function removeOneO($conn, $orN, $size, $userId) {
            $stmt = $conn->prepare('DELETE FROM picture WHERE original_name = :name AND file_size = :file_size AND user_id = :user_id');
            $stmt->execute(
                array(
                    'name' => $orN,
                    'file_size' => $size,
                    'user_id' => $userId
                )
            );
        }

        function deleteFileO($conn, $orN, $size, $userId) {
            $stmt = $conn->prepare('SELECT path, path_thumb FROM picture WHERE original_name = :name AND file_size = :file_size AND user_id = :user_id');
            $stmt->execute(
                array(
                    'name' => $orN,
                    'file_size' => $size,
                    'user_id' => $userId
                )
            );
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $path = $row['path'];
            $path_thumb = $row['path_thumb'];
            unlink($path);
            unlink($path_thumb);
        }

        deleteFileO($conn, $orN, $size, $userId);
        removeOneO($conn, $orN, $size, $userId);

        echo 'removed';
    } catch (Exception $e) {
        echo $e->getMessage();
    }


}
