<?php
include('session_ok.php');

//  Bryan Bibb, CPT283-W01, Mar 3 2024

$vehicle_id = filter_input(INPUT_POST, 'vehicle_id');

// filtering of variables
$fuel_date = filter_input(INPUT_POST, 'fuel_date');
$fuel_source = filter_input(INPUT_POST, 'fuel_source');
$fuel_gallons = filter_input(INPUT_POST, 'fuel_gallons', FILTER_VALIDATE_FLOAT);
$fuel_cost = filter_input(INPUT_POST, 'fuel_cost', FILTER_VALIDATE_FLOAT);
$fuel_mileage = filter_input(INPUT_POST, 'fuel_mileage');

// just in case the database has not been initialized
require_once('config.php');

// test to make sure that all fields have been filled in.

if (empty($fuel_date)) {
    $error = "Error: No Fuel Date entered";
    include('error.php');
    die;
}

if (empty($vehicle_id)) {
    $error = "Error: No Vehicle ID entered";
    include('error.php');
    die;
}

if (empty($fuel_source)) {
    $error = "Error: No Fuel Source entered";
    include('error.php');
    die;
}

if (empty($fuel_gallons)) {
    $error = "Error: No Fuel Amount entered";
    include('error.php');
    die;
}

if (empty($fuel_cost)) {
    $error = "Error: No Fuel Cost entered";
    include('error.php');
    die;
}

if (empty($fuel_mileage)) {
    $error = "Error: No Fuel Mileage data entered";
    include('error.php');
    die;
}

// if so, the INSERT query runs, inserting each variable into its database column
$query = 'INSERT INTO fuel
                (
                 fuel_date, vehicle_id, fuel_source, fuel_gallons, fuel_cost, fuel_mileage
                )
                VALUES
                (
                 :fuel_date, :vehicle_id, :fuel_source, :fuel_gallons, :fuel_cost, :fuel_mileage
                 
                )';
$statement = $db->prepare($query);
// each value in the query statement must be bound to the PHP variable
$statement->bindValue(':fuel_date', $fuel_date);
$statement->bindValue(':vehicle_id', $vehicle_id);
$statement->bindValue(':fuel_source', $fuel_source);
$statement->bindValue(':fuel_gallons', $fuel_gallons);
$statement->bindValue(':fuel_cost', $fuel_cost);
$statement->bindValue(':fuel_mileage', $fuel_mileage);

// query is executed after preparation
$statement->execute();
$statement->closeCursor();
// after the record is created, load the page tha views all vehicles
header("Location: fuel.php");
?>