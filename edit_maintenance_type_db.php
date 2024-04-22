<?php
include('session_ok.php');

//  Bryan Bibb, CPT283-W01, Feb 1 2024

// filtering of variables
$maintenance_type_id = filter_input(INPUT_POST, 'maintenance_type_id');
$maintenance_type = filter_input(INPUT_POST, 'maintenance_type');


// just in case the database has not been initialized
require_once('config.php');
// echo $maintenance_mileage;
// test to make sure that all fields have been filled in.

if (empty($maintenance_type)) {
    $error = "Error: No Maintenance Type Description entered";
    include('error.php');
    die;
}
// if so, the INSERT query runs, inserting each variable into its database column
$query = 'UPDATE maintenance_type
          SET
            maintenance_type = :maintenance_type
            
          WHERE
              maintenance_type_id = :maintenance_type_id;';

$statement = $db->prepare($query);
// each value in the query statement must be bound to the PHP variable
$statement->bindValue(':maintenance_type_id', $maintenance_type_id);
$statement->bindValue(':maintenance_type', $maintenance_type);

// query is executed after preparation
$statement->execute();
$statement->closeCursor();
// after the record is created, load the page that views all vehicles
header("Location: maintenance_type.php");
?>