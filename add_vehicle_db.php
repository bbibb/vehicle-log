<?php
include('session_ok.php');

//  Bryan Bibb, CPT283-W01, Feb 1 2024
//  Program: Project Lab 3: form data input with INSERT INTO database. Demonstrates the use of form input,
//           assigning PHP variables, and constructing a database query to create a new record.
//  Related: config.php, error.php, vehicles.php, add_vehicle.php
//
//  This PHP script is loaded with the POST array from add_vehicle.php. The variables are filtered, tested, and then
//  send to the database a new record.

// filtering of variables
$vehicle_class = filter_input(INPUT_POST, 'vehicle_class');
$vehicle_make = filter_input(INPUT_POST, 'vehicle_make');
$vehicle_model = filter_input(INPUT_POST, 'vehicle_model');
$vehicle_year = filter_input(INPUT_POST, 'vehicle_year', FILTER_VALIDATE_INT);
$vehicle_year_purchased = filter_input(INPUT_POST, 'vehicle_year_purchased', FILTER_VALIDATE_INT);
$vehicle_color = filter_input(INPUT_POST, 'vehicle_color');
$vehicle_VIN = filter_input(INPUT_POST, 'vehicle_VIN');
$vehicle_license_tag = filter_input(INPUT_POST, 'vehicle_license_tag');
$vehicle_license_state = filter_input(INPUT_POST, 'vehicle_license_state');
$vehicle_purchase_price = filter_input(INPUT_POST, 'vehicle_purchase_price', FILTER_VALIDATE_INT);
$vehicle_purchase_mileage = filter_input(INPUT_POST,'vehicle_purchase_mileage', FILTER_VALIDATE_INT);
$vehicle_current_mileage = filter_input(INPUT_POST, 'vehicle_current_mileage', FILTER_VALIDATE_INT);

// just in case the database has not been initialized
require_once('config.php');

if (empty($vehicle_class)) {
    $error = "Error: No Vehicle Class entered";
    include('error.php');
    die;
}

if (empty($vehicle_make)) {
    $error = "Error: No Vehicle Make entered";
    include('error.php');
    die;
}

if (empty($vehicle_model)) {
    $error = "Error: No Vehicle Model entered";
    include('error.php');
    die;
}

if (empty($vehicle_year)) {
    $error = "Error: No Vehicle Year entered";
    include('error.php');
    die;
}

if (empty($vehicle_year_purchased)) {
    $error = "Error: No Vehicle Year Purchased entered";
    include('error.php');
    die;
}

if (empty($vehicle_color)) {
    $error = "Error: No Vehicle Color entered";
    include('error.php');
    die;
}

if (empty($vehicle_VIN)) {
    $error = "Error: No Vehicle VIN entered";
    include('error.php');
    die;
}

if (empty($vehicle_license_tag)) {
    $error = "Error: No Vehicle License Tag entered";
    include('error.php');
    die;
}

if (empty($vehicle_license_state)) {
    $error = "Error: No Vehicle License Tag State entered";
    include('error.php');
    die;
}

if (empty($vehicle_purchase_price)) {
    $error = "Error: No Vehicle Purchase Price entered, or entered incorrectly. Be sure to omit commas.";
    include('error.php');
    die;
}

if (empty($vehicle_purchase_mileage)) {
    $error = "Error: No Vehicle Purchase Mileage entered";
    include('error.php');
    die;
}

if (empty($vehicle_current_mileage)) {
    $error = "Error: No Vehicle Current Mileage entered";
    include('error.php');
    die;
}



$query = 'INSERT INTO vehicles
                (
                 vehicle_class, vehicle_make, vehicle_model, vehicle_year, vehicle_year_purchased, vehicle_color,
                 vehicle_VIN, vehicle_license_tag, vehicle_license_state, vehicle_purchase_price, 
                 vehicle_purchase_mileage, vehicle_current_mileage
                )
                VALUES
                (
                 :vehicle_class, :vehicle_make, :vehicle_model, :vehicle_year, :vehicle_year_purchased, :vehicle_color,
                 :vehicle_VIN, :vehicle_license_tag, :vehicle_license_state, :vehicle_purchase_price, 
                 :vehicle_purchase_mileage, :vehicle_current_mileage
                )';
$statement = $db->prepare($query);
// each value in the query statement must be bound to the PHP variable
$statement->bindValue(':vehicle_class', $vehicle_class);
$statement->bindValue(':vehicle_make', $vehicle_make);
$statement->bindValue(':vehicle_model', $vehicle_model);
$statement->bindValue(':vehicle_year', $vehicle_year);
$statement->bindValue(':vehicle_year_purchased', $vehicle_year_purchased);
$statement->bindValue(':vehicle_color', $vehicle_color);
$statement->bindValue(':vehicle_VIN', $vehicle_VIN);
$statement->bindValue(':vehicle_license_tag', $vehicle_license_tag);
$statement->bindValue(':vehicle_license_state', $vehicle_license_state);
$statement->bindValue(':vehicle_purchase_price', $vehicle_purchase_price);
$statement->bindValue(':vehicle_purchase_mileage', $vehicle_purchase_mileage);
$statement->bindValue(':vehicle_current_mileage', $vehicle_current_mileage);
// query is executed after preparation
$statement->execute();
$statement->closeCursor();
// after the record is created, load the page tha views all vehicles
header("Location: vehicles.php");
?>