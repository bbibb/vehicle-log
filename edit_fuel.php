<?php include('session_ok.php');?>

<?php
//  Bryan Bibb, CPT283-W01, Feb 1 2024

// receive fuel_id data input from fuel list table

$fuel_id = $_POST['fuel_id'];
//echo $fuel_id;
// database connection info
require_once('config.php');

$query = 'SELECT * FROM fuel
            WHERE fuel_id = :fuel_id' ;
$statement = $db->prepare($query);
$statement;
$statement->bindValue("fuel_id", $fuel_id);
$statement->execute();
$fuel = $statement->fetch();
$statement->closeCursor();
// print_r($fuels);
$fuel_date = date("m-d-Y", strtotime($fuel['fuel_date']));
//echo $fuel_date
?>

<html lang="en">

<?php include('header.php') ?>

<body class="bg-secondary"> <!-- gray background -->

<div class="card-header py-3 text-center text-light m-5 my-3">
    <h1>Edit Fuel Record</h1>
</div>
<!-- The outer container keeps the two inner containers in sync viz. width -->
<div class="container px-5 w-50">
    <div class="container px-lg-3 py-0 bg-light">
        <!-- The form creates a POST array and sends to fuel.php -->
        <form action="edit_fuel_db.php" method="post"
              id="edit_fuel_form">
            <!-- The form is divided into two columns for ease of use -->
            <div class="row py-5 mx-5 justify-content-center">
                <!-- Each input box creates a variable with a name that matches the database columns (for convenience)-->
                <div class="mb-3">
                    <label for="date" class="form-label">Date:</label>
                    <input type="text" class="form-control" id="date" value="<?php echo $fuel_date; ?>" placeholder="Enter date" name="fuel_date">
                </div>
<!--                <div class="mb-3 mt-3">-->
<!--                    <label for="vehicle" class="form-label">Vehicle ID:</label>-->
                    <input type="hidden" class="form-control" id="vehicle" value="<?php echo $fuel['vehicle_id']; ?>" placeholder="Vehicle" name="vehicle_id" readonly>
<!--                </div>-->
                <div class="mb-3">
                    <label for="source" class="form-label">Source:</label>
                    <input type="text" class="form-control" id="source" value="<?php echo $fuel['fuel_source']; ?>" placeholder="Enter fuel source" name="fuel_source">
                </div>
                <div class="mb-3">
                    <label for="gallons" class="form-label">Gallons:</label>
                    <input type="text" class="form-control" id="gallons" value="<?php echo $fuel['fuel_gallons']; ?>" placeholder="Enter gallons purchased" name="fuel_gallons">
                </div>
                <div class="mb-3">
                    <label for="cost" class="form-label">Cost:</label>
                    <input type="text" class="form-control" id="cost" value="<?php echo $fuel['fuel_cost']; ?>" placeholder="Enter fuel cost per gallon" name="fuel_cost">
                </div>
                <div class="mb-3">
                    <label for="mileage" class="form-label">Mileage:</label>
                    <input type="text" class="form-control" id="mileage" value="<?php echo $fuel['fuel_mileage']; ?>" placeholder="Enter mileage since last fill" name="fuel_mileage">
                </div>
                <!-- Submit button triggers the POST method and sending of data to fuel.php -->
                <input type="hidden" class="form-control" id="fuel_id" value="<?php echo $fuel['fuel_id']; ?>" name="fuel_id">
                <button type="submit" class="btn btn-primary" value="edit fuel">Submit</button>
                <!--                </div>-->
            </div>
        </form>

    </div>
</div>
<?php include('footer.php');?>

</body>
</html>