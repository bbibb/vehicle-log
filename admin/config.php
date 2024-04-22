<?php
// Bryan Bibb, CPT283-W01, Feb 1, 2024
// Program: Project Lab 2, which demonstrates the database connection.
// initialize the database connection and authenticate
    $dsn = 'mysql:host=127.0.0.1:3308;dbname=cpt283bibb_vehicle_log';
    $username = 'bryanb';
    $password = 'aside-FLARE-grandam';

// exception handling in the case of a database connection error. An error message
// is generated and printed to the screen in the included database_error.php file
try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}