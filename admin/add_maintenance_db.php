<?php
include('session_ok.php');
include('admin_ok.php');

//  Bryan Bibb, CPT283-W01, Mar 3 2024


// filtering of variables
$maintenance_date = filter_input(INPUT_POST, 'maintenance_date');
$maintenance_type_id = filter_input(INPUT_POST, 'maintenance_type_id');
$vehicle_id = filter_input(INPUT_POST, 'vehicle_id');
$maintenance_vendor = filter_input(INPUT_POST, 'maintenance_vendor');
$maintenance_description = filter_input(INPUT_POST, 'maintenance_description');
$maintenance_vendor_address = filter_input(INPUT_POST, 'maintenance_vendor_address');
$maintenance_cost = filter_input(INPUT_POST, 'maintenance_cost');
$maintenance_mileage = filter_input(INPUT_POST, 'maintenance_mileage');
$maintenance_id = filter_input(INPUT_POST, 'maintenance_id');

// just in case the database has not been initialized
require_once('config.php');
//echo $maintenance_vendor_address;

// test to make sure that all fields have been filled in.
//if (
//    $maintenance_date == NULL || $maintenance_type_id == NULL || $maintenance_vendor == NULL || $maintenance_description == NULL || $maintenance_vendor_address == NULL ||
//    $maintenance_cost == NULL || $maintenance_mileage = NULL)
//{
//    $error = "Invalid product data. Check all fields and try again.";
//    include('error.php');
//} else {
// if so, the INSERT query runs, inserting each variable into its database column

if (empty($maintenance_date)) {
    $error = "Error: No Maintenance Date entered";
    include('error.php');
    die;
}

if (empty($maintenance_type_id)) {
    $error = "Error: No Maintenance Code entered";
    include('error.php');
    die;
}

if (empty($vehicle_id)) {
    $error = "Error: No Vehicle ID entered";
    include('error.php');
    die;
}

if (empty($maintenance_vendor)) {
    $error = "Error: No Maintenance Vendor entered";
    include('error.php');
    die;
}

if (empty($maintenance_description)) {
    $error = "Error: No Maintenance Description entered";
    include('error.php');
    die;
}

if (empty($maintenance_vendor_address)) {
    $error = "Error: No Maintenance Vendor Address entered";
    include('error.php');
    die;
}

if (empty($maintenance_cost)) {
    $error = "Error: No Maintenance Cost entered";
    include('error.php');
    die;
}

if (empty($maintenance_mileage)) {
    $error = "Error: No Maintenance Mileage entered";
    include('error.php');
    die;
}


    $query = 'INSERT INTO maintenance
                    (
                     maintenance_date, maintenance_type_id, vehicle_id, maintenance_vendor, 
                     maintenance_vendor_address, maintenance_description, maintenance_cost, maintenance_mileage
                    )
                    VALUES
                    (
                     :maintenance_date, :maintenance_type_id, :vehicle_id, :maintenance_vendor, 
                     :maintenance_vendor_address, :maintenance_description, :maintenance_cost, :maintenance_mileage
                     
                    )';
    $statement = $db->prepare($query);
    // each value in the query statement must be bound to the PHP variable
    $statement->bindValue(':maintenance_type_id', $maintenance_type_id);
    $statement->bindValue(':maintenance_date', $maintenance_date);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->bindValue(':maintenance_vendor', $maintenance_vendor);
    $statement->bindValue(':maintenance_vendor_address', $maintenance_vendor_address);
    $statement->bindValue(':maintenance_description', $maintenance_description);
    $statement->bindValue(':maintenance_cost', $maintenance_cost);
    $statement->bindValue(':maintenance_mileage', $maintenance_mileage);

    // query is executed after preparation
    $statement->execute();
    $statement->closeCursor();
    // after the record is created, load the page tha views all vehicles
    header("Location: maintenance.php");
//}
?>