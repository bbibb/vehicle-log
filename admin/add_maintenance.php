<?php include('session_ok.php');?>
<?php include('admin_ok.php');?>


<!DOCTYPE html>
<html>
<!--    Bryan Bibb, CPT283-W01, Feb 1 2024
-->

<?php include('header.php') ?>
<?php require('config.php');?>

<?php

$query = 'SELECT vehicle_id, vehicle_year, vehicle_make, vehicle_model,
vehicle_VIN FROM vehicles ORDER BY vehicle_class';
$statement = $db->prepare($query);
$statement->execute();
$vehicles = $statement->fetchAll();
$statement->closeCursor();
//print_r($vehicles)

$vehicle_list = [];
foreach ($vehicles as $vehicle) :
    $vehicle_name = $vehicle['vehicle_year'] . ' ' . $vehicle['vehicle_make'] . ' ' . $vehicle['vehicle_model'];
    $vehicle_id = $vehicle['vehicle_id'];
    $vehicle_array = ['name' => $vehicle_name, 'id' => $vehicle_id];
    array_push($vehicle_list, $vehicle_array);
endforeach;
//print_r($vehicle_list);

$query = 'SELECT * 
            FROM maintenance_type';
$statement = $db->prepare($query);
$statement->execute();
$types = $statement->fetchAll();
$statement->closeCursor();

$maintenance_type_list = [];
foreach ($types as $type) :
    $maintenance_code = $type['maintenance_type_id'];
    $type_description = $type['maintenance_type'];
    $maintenance_array = ['code' => $maintenance_code, 'type' => $type_description];
    array_push($maintenance_type_list, $maintenance_array);
endforeach;
?>


?>

<body class="bg-secondary"> <!-- gray background -->

<!--Page header with white background and centered text -->
<div class="card-header py-3 text-center text-light m-5 my-3">
    <h1>Add Maintenance Record</h1>
</div>
<!-- The outer container keeps the two inner containers in sync viz. width -->
<div class="container px-5">
    <div class="container px-lg-3 py-0 bg-light">
        <!-- The form creates a POST array and sends to add_vehicle.php -->
        <form action="add_maintenance_db.php" method="post"
              id="add_maintenance_form">
            <!-- The form is divided into two columns for ease of use -->
            <div class="row py-5 mx-5 justify-content-center">
                <!-- Each input box creates a variable with a name that matches the database columns (for convenience)-->

                <div class="mb-3 mt-3">
                    <label for="vehicle" class="form-label">Vehicle:</label>
                    <select name="vehicle_id">
                        <option>Choose vehicle</option>
                        <?php foreach($vehicle_list as $vehicle){
                            echo "<option value='$vehicle[id]'>$vehicle[name]</option>";
                        }
                        ?>

                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date:</label>
                    <input type="date" class="form-control" id="date" placeholder="Enter date" name="maintenance_date">
                </div>

                <div class="mb-3 mt-3">
                    <label for="maintenance_type" class="form-label">Maintenance Type:</label>
                    <select name="maintenance_type_id">
                        <option>Choose type</option>
                        <?php foreach($maintenance_type_list as $maintenance_type){
                            echo "<option value='$maintenance_type[code]'>$maintenance_type[type]</option>";
                        }
                        ?>
                </div>

                <div class="mb-3">
                    <label for="vendor" class="form-label">Vendor:</label>
                    <input type="text" class="form-control" id="vendor" placeholder="Enter maintenance vendor" name="maintenance_vendor">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <input type="text" class="form-control" id="description" placeholder="Enter description of service" name="maintenance_description">
                </div>
                <div class="mb-3">
                    <label for="maintenance_vendor_address" class="form-label">Maintenance Vendor Address:</label>
                    <input type="text" class="form-control" id="maintenance_vendor_address" placeholder="Enter vendor address" name="maintenance_vendor_address">
                </div>
                <div class="mb-3">
                    <label for="cost" class="form-label">Cost:</label>
                    <input type="text" class="form-control" id="cost" placeholder="Enter cost" name="maintenance_cost">
                </div>
                <div class="mb-3">
                    <label for="mileage" class="form-label">Mileage:</label>
                    <input type="text" class="form-control" id="mileage" placeholder="Enter current mileage" name="maintenance_mileage">
                </div>
                <!-- Submit button triggers the POST method and sending of data to add_vehicle.php -->
                <button type="submit" class="btn btn-primary" value="add maintenance">Submit</button>
                <!--                </div>-->
            </div>
        </form>

    </div>
</div>
<?php include('footer.php');?>

</body>
</html>