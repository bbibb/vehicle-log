<?php
include('session_ok.php');
include('admin_ok.php');
require_once('config.php');

$file = $_POST['file'];
$file_name = substr($file, 3);
unlink($file);
$query = 'UPDATE vehicles
          SET
            image_file = NULL
          WHERE
             image_file LIKE :file_name;';
$statement = $db->prepare($query);
$statement->bindValue(':file_name', $file_name);
$statement->execute();
$statement->closeCursor();

header('Location: files.php');