<?php
include('session_ok.php');
include('admin_ok.php');


//  Bryan Bibb, CPT283-W01, Feb 1 2024

// receive fuel_id data input from vehicle list table

$maintenance_id = $_POST['maintenance_id'];

// database connection info
require_once('config.php');

$query = 'SELECT * FROM maintenance
            WHERE maintenance_id = :maintenance_id' ;
$statement = $db->prepare($query);
$statement->bindValue("maintenance_id", $maintenance_id);
$statement->execute();
$main = $statement->fetch();
$statement->closeCursor();
?>


<html lang="en">

<?php include('header.php') ?>

<body class="bg-secondary"> <!-- gray background -->

<div class="card-header py-3 text-center text-light m-5 my-3">
    <h1>Are you sure you want to delete Maintenance Record?</h1>
</div>
<!-- The outer container keeps the two inner containers in sync viz. width -->
<div class="container px-5">
    <div class="container px-lg-3 py-0 bg-light">
        <!-- The form creates a POST array and sends to add_vehicle.php -->
        <form action="delete_maintenance_db.php" method="post"
              id="delete_maintenance_form">
            <!-- The form is divided into two columns for ease of use -->
            <div class="row py-5 mx-5 justify-content-center">
                <!-- Each input box creates a variable with a name that matches the database columns (for convenience)-->
                <div class="mb-3">
                    <label for="date" class="form-label">Date:</label>
                    <input readonly type="text" class="form-control" id="date" value="<?php echo date('m-d-Y', strtotime($main['maintenance_date'])); ?>" placeholder="Enter date" name="maintenance_date">
                </div>
                <div class="mb-3 mt-3">
                    <label for="type_id" class="form-label">Maintenance Type Code:</label>
                    <input readonly type="text" class="form-control" id="type_id" value="<?php echo $main['maintenance_type_id']; ?>" placeholder="Maintenance Type Code" name="maintenance_type_id">
                </div>
                <div class="mb-3 mt-3">
                    <label for="vehicle" class="form-label">Vehicle ID:</label>
                    <input readonly type="text" class="form-control" id="vehicle" value="<?php echo $main['vehicle_id']; ?>" placeholder="Vehicle ID" name="vehicle_id">
                </div>
                <div class="mb-3">
                    <label for="vendor" class="form-label">Vendor:</label>
                    <input readonly type="text" class="form-control" id="vendor" value="<?php echo $main['maintenance_vendor']; ?>" placeholder="Enter vendor" name="maintenance_vendor">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <input readonly type="text" class="form-control" id="description" value="<?php echo $main['maintenance_description']; ?>" placeholder="Enter description of service" name="maintenance_description">
                </div>
                <div class="mb-3">
                    <label for="vendor_address" class="form-label">Vendor Address:</label>
                    <input readonly type="text" class="form-control" id="vendor_address" value="<?php echo $main['maintenance_vendor_address']; ?>" placeholder="Enter vendor address" name="maintenance_vendor_address">
                </div>
                <div class="mb-3">
                    <label for="cost" class="form-label">Cost:</label>
                    <input readonly type="text" class="form-control" id="cost" value="<?php echo $main['maintenance_cost']; ?>" placeholder="Enter cost" name="maintenance_cost">
                </div>
                <div class="mb-3">
                    <label for="mileage" class="form-label">Mileage:</label>
                    <input type="text" class="form-control" id="mileage" value="<?php echo $main['maintenance_mileage']; ?>" placeholder="Enter current mileage" name="maintenance_mileage">
                </div>
                <!-- Submit button triggers the POST method and sending of data to add_vehicle.php -->
                <input type="hidden" class="form-control id="maintenance_id" value="<?php echo $main['maintenance_id']; ?>" name="maintenance_id">
                <button type="submit" class="btn btn-primary" value="delete maintenance">Confirm: Delete</button>
                <!--                </div>-->
            </div>
        </form>

    </div>
</div>
<?php include('footer.php');?>

</body>
</html>