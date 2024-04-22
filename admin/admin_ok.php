<?php
session_start();
//// If the user is not admin, send error message and redirect
if ($_SESSION['user_role'] != 'admin') {
    header('Location: admin_error.php');
    exit;
}