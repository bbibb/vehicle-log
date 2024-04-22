<?php
include('session_ok.php');
include('admin_ok.php');


//  Bryan Bibb, CPT283-W01, Mar 23 2024
//  Program: Project Lab 10: Delete chosen record from the database
//
//  This PHP script is loaded with the POST array from delete_vehicle.php.

$vehicle_id = $_POST['vehicle_id'];

// just in case the database has not been initialized
require_once('config.php');

$query = 'DELETE FROM vehicles WHERE vehicle_id = :vehicle_id';
$statement = $db->prepare($query);
// each value in the query statement must be bound to the PHP variable
$statement->bindValue(':vehicle_id', $vehicle_id);
// query is executed after preparation
$statement->execute();
$statement->closeCursor();

$query = 'DELETE FROM fuel WHERE vehicle_id = :vehicle_id';
$statement = $db->prepare($query);
// each value in the query statement must be bound to the PHP variable
$statement->bindValue(':vehicle_id', $vehicle_id);
// query is executed after preparation
$statement->execute();
$statement->closeCursor();

$query = 'DELETE FROM maintenance WHERE vehicle_id = :vehicle_id';
$statement = $db->prepare($query);
// each value in the query statement must be bound to the PHP variable
$statement->bindValue(':vehicle_id', $vehicle_id);
// query is executed after preparation
$statement->execute();
$statement->closeCursor();


?>
// after the record is created, load the page tha views all vehicles
<script type="text/javascript">
    alert("Record deleted successfully!");
    window.location = "vehicles.php";
</script>
