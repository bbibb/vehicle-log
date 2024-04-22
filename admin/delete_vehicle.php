<?php
include('session_ok.php');
include('admin_ok.php');


//  Bryan Bibb, CPT283-W01, Mar 23 2024
//  Program: Project Lab 10: Interface for deleting records.
//
//  This PHP script deletes the chosen record from the database.

// receive VIN data input from vehicle list table

$vehicle_VIN = $_POST['vehicle_VIN'];

// database connection info
require_once('config.php');

// create select query to populate current values
$query = 'SELECT * FROM vehicles WHERE vehicle_VIN = :vehicle_VIN';
$statement = $db->prepare($query);
$statement->bindValue("vehicle_VIN", $vehicle_VIN);
$statement->execute();
$vehicle = $statement->fetch();
$statement->closeCursor();
?>


<html lang="en">


<?php include('header.php') ?>

<body class="bg-secondary"> <!-- gray background -->

<div class="card-header py-3 text-center text-light">
    <h2>Are you sure you want to delete Vehicle Information?</h2>
    <h5>Fuel and Maintenance records for this vehicle will also be deleted:</h5>
    <form action="delete_vehicle_db.php" method="post"
          id="delete_vehicle_form">
        <input type="hidden" class="form-control" id="vehicle_id" value="<?php echo $vehicle['vehicle_id']; ?>" name="vehicle_id">
        <button type="submit" class="btn btn-primary" value="delete fuel">Confirm: Delete</button>
    </form>
</div>
    <div class="card-header py-3 text-center text-light">
        <h1>Vehicle</h1>
    </div>

</div>
<div class="container container-fluid px-lg-5">
    <table id="vehicles" class="table table-striped table-bordered table-responsive table-bordered table-responsive bg-light" style="width:100%">
        <thead>
        <tr>
            <th>Class</th>
            <th>Make</th>
            <th>Model</th>
            <th>Year</th>
            <th>Purchased</th>
            <th>Color</th>
            <th>VIN</th>
            <th>Tag</th>
            <th>State</th>
            <th>Price</th>
            <th>Original Mileage</th>
            <th>Current Mileage</th>
            <th>   </th>
        </tr>
        </thead>
        <tbody>
        <!-- PHP foreach loop prints out the cells for each row, one at a time-->
        <tr>
            <td><?php echo $vehicle['vehicle_class']; ?></td>
            <td><?php echo $vehicle['vehicle_make']; ?></td>
            <td><?php echo $vehicle['vehicle_model']; ?></td>
            <td><?php echo $vehicle['vehicle_year']; ?></td>
            <td><?php echo $vehicle['vehicle_year_purchased']; ?></td>
            <td><?php echo $vehicle['vehicle_color']; ?></td>
            <td><?php echo $vehicle['vehicle_VIN']; ?></td>
            <td><?php echo $vehicle['vehicle_license_tag']; ?></td>
            <td><?php echo $vehicle['vehicle_license_state']; ?></td>
            <td><?php echo $vehicle['vehicle_purchase_price']; ?></td>
            <td><?php echo $vehicle['vehicle_purchase_mileage']; ?></td>
            <td><?php echo $vehicle['vehicle_current_mileage']; ?></td>
            <td>
                </form>
            </td>
        </tbody>
    </table>
</div>


<?php
$vehicle_id = $vehicle['vehicle_id'];
$query = 'SELECT *
FROM fuel
WHERE fuel.vehicle_id = :vehicle_id';
$statement = $db->prepare($query);
$statement->bindValue(':vehicle_id', $vehicle_id);
$statement->execute();
$fuels = $statement->fetchAll();
$statement->closeCursor();
?>


<!--table header-->
<div class="card-header py-3 text-center text-light">
    <h3>Associated Fuel Data</h3>
</div>

<div class="container w-auto px-lg-4 py-0">
    <table class="table table-striped table-bordered table-responsive bg-light">
        <tr>
            <!--            <th>FuelID</th>-->
            <th>Date</th>
<!--            <th>Vehicle</th>-->
            <th>Source</th>
            <th>Gallons</th>
            <th>Cost per gallon</th>
            <th>Cost total</th>
            <th>Mileage</th>
            <th>MPG</th>
        </tr>

        <!-- PHP foreach loop prints out the cells for each row, one at a time-->
        <?php foreach ($fuels as $fuel) : ?>
<!--        --><?php //$vehicle_name = $fuel['vehicle_year'] . ' ' . $fuel['vehicle_make'] . ' ' . $fuel['vehicle_model']; ?>
        <tr>
            <!--                <td>--><?php //echo $fuel['fuel_id']; ?><!--</td>-->
            <td><?php echo date('m-d-Y', strtotime($fuel['fuel_date'])); ?></td>
<!--            <td>--><?php //echo $vehicle_name; ?><!--</td>-->
            <td><?php echo $fuel['fuel_source']; ?></td>
            <td><?php echo $fuel['fuel_gallons']; ?></td>
            <td><?php echo $fuel['fuel_cost']; ?></td>
            <td><?php echo $fuel['fuel_cost'] * $fuel['fuel_gallons']?></td>
            <td><?php echo $fuel['fuel_mileage']; ?></td>
            <td><?php echo round($fuel['fuel_mileage'] / $fuel['fuel_gallons'], 1)?></td>
            <?php endforeach; ?>
    </table>
</div>


<?php
$vehicle_id = $vehicle['vehicle_id'];
$query = 'SELECT *
FROM maintenance
LEFT JOIN maintenance_type
ON maintenance.maintenance_type_id = maintenance_type.maintenance_type_id
WHERE vehicle_id = :vehicle_id';
$statement = $db->prepare($query);
$statement->bindValue(':vehicle_id', $vehicle_id);
$statement->execute();
$mains = $statement->fetchAll();
$statement->closeCursor();
?>

<div class="card-header py-3 text-center text-light m-5 my-3">
    <h3>Associated Maintenance Data</h3>
</div>

<div class="container w-auto px-lg-4 py-0">
    <table class="table table-striped table-bordered table-responsive bg-light">
        <tr>

            <th>Date</th>
            <!--            <th>Maintenance Code</th>-->
<!--            <th>Vehicle</th>-->
            <th>Service</th>
            <th>Vendor</th>
            <th>Description</th>
            <th>Vendor Address</th>
            <th>Cost</th>
            <th>Mileage</th>

        </tr>
        <!-- PHP foreach loop prints out the cells for each row, one at a time-->
        <?php foreach ($mains as $main) : ?>
<!--        --><?php //$vehicle_name = $main['vehicle_year'] . ' ' . $main['vehicle_model']; ?>
        <tr>
            <td><?php echo date('m-d-Y', strtotime($main['maintenance_date'])); ?></td>
            <!--                <td>--><?php //echo $main['maintenance_id']; ?><!--</td>-->
<!--            <td>--><?php //echo $vehicle_name; ?><!--</td>-->
            <td><?php echo $main['maintenance_type']; ?></td>
            <td><?php echo $main['maintenance_vendor']; ?></td>
            <td><?php echo $main['maintenance_description']; ?></td>
            <td><?php echo $main['maintenance_vendor_address']; ?></td>
            <td><?php echo $main['maintenance_cost']?></td>
            <td><?php echo $main['maintenance_mileage']; ?></td>
            <td>

                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include('footer.php');?>

</body>
</html>