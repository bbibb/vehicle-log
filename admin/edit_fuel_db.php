<?php
include('session_ok.php');
include('admin_ok.php');


//  Bryan Bibb, CPT283-W01, Feb 1 2024

// filtering of variables
$fuel_date = filter_input(INPUT_POST, 'fuel_date');
$vehicle_id = filter_input(INPUT_POST, 'vehicle_id');
$fuel_source = filter_input(INPUT_POST, 'fuel_source');
$fuel_gallons = filter_input(INPUT_POST, 'fuel_gallons', FILTER_VALIDATE_FLOAT);
$fuel_cost = filter_input(INPUT_POST, 'fuel_cost', FILTER_VALIDATE_FLOAT);
$fuel_mileage = filter_input(INPUT_POST, 'fuel_mileage');
$fuel_id = filter_input(INPUT_POST, 'fuel_id');

// just in case the database has not been initialized
require_once('config.php');

// echo $fuel_source;

//// test to make sure that all fields have been filled in.
if (
    $fuel_date == NULL || $vehicle_id == NULL || $fuel_source == NULL || $fuel_gallons == NULL || $fuel_cost == NULL ||
    $fuel_mileage == NULL )
 {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
// if so, the INSERT query runs, inserting each variable into its database column
    $query = 'UPDATE fuel
              SET
                fuel_date = :fuel_date, 
                vehicle_id = :vehicle_id, 
                fuel_source = :fuel_source, 
                fuel_gallons = :fuel_gallons, 
                fuel_cost = :fuel_cost, 
                fuel_mileage = :fuel_mileage
                
              WHERE
                  fuel_id = :fuel_id;';

    $statement = $db->prepare($query);
    // each value in the query statement must be bound to the PHP variable
    $statement->bindValue(':fuel_id', $fuel_id);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->bindValue(':fuel_date', $fuel_date);
    $statement->bindValue(':fuel_source', $fuel_source);
    $statement->bindValue(':fuel_gallons', $fuel_gallons);
    $statement->bindValue(':fuel_cost', $fuel_cost);
    $statement->bindValue(':fuel_mileage', $fuel_mileage);
    // query is executed after preparation
    $statement->execute();
    $statement->closeCursor();
    // after the record is created, load the page that views all fuel records
    header("Location: fuel.php");
}
?>