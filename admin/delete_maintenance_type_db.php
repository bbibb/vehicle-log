<?php
include('session_ok.php');
include('admin_ok.php');


//  Bryan Bibb, CPT283-W01, Mar 23 2024
//  Program: Project Lab 10: Delete chosen record from the database
//
//  This PHP script is loaded with the POST array from delete_vehicle.php.

$maintenance_type_id = $_POST['maintenance_type_id'];

// just in case the database has not been initialized
require_once('config.php');

$query = 'DELETE FROM maintenance_type WHERE maintenance_type_id = :maintenance_type_id';
$statement = $db->prepare($query);
// each value in the query statement must be bound to the PHP variable
$statement->bindValue(':maintenance_type_id', $maintenance_type_id);
// query is executed after preparation
$statement->execute();
$statement->closeCursor();
?>
// after the record is created, load the page tha views all vehicles
<script type="text/javascript">
    alert("Record deleted successfully!");
    window.location = "maintenance_type.php";
</script>
