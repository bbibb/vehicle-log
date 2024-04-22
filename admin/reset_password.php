<?php
session_start();
//$DATABASE_HOST = '127.0.0.1:3308';
//$DATABASE_USER = 'bryanb';
//$DATABASE_PASS = 'aside-FLARE-grandam';
//$DATABASE_NAME = 'cpt283bibb_vehicle_log';
//// Try and connect using the info above.
//$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
//if ( mysqli_connect_errno() ) {
//    // If there is an error with the connection, stop the script and display the error.
//    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
//}

require_once('config.php');

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

//echo $username;
//echo $password;


$query = 'SELECT username FROM users';
$statement = $db->prepare($query);
$statement->execute();
$users = $statement->fetchAll();
$statement->closeCursor();


$password_hash = password_hash($password, PASSWORD_DEFAULT);
//if (
//    $username == NULL || !in_array($username, $users)
//) {
//    exit('Username not found');
//}
//    else if ((strlen($password) > 20 || strlen($password) < 7)) {
//        exit('Password must be between 7 and 20 characters long!');
//    } else {
   $query = 'UPDATE users
           SET password = :password
            WHERE username = :username;';
//}

$statement = $db->prepare($query);
$statement->bindValue(':password', $password_hash);
$statement->bindValue(':username', $username);
$statement->execute();
$statement->closeCursor();
$changed = True;
header("Location: index.php?changed=" . $changed);
?>