<?php
include('session_ok.php');

//  Bryan Bibb, CPT283-W01, Feb 1 2024

// receive fuel_id data input from maintenance type table

$maintenance_type_id = $_POST['maintenance_type_id'];

// database connection info
require_once('config.php');

$query = 'SELECT * FROM maintenance_type
        WHERE maintenance_type_id = :maintenance_type_id' ;
$statement = $db->prepare($query);
$statement->bindValue("maintenance_type_id", $maintenance_type_id);
$statement->execute();
$type = $statement->fetch();
$statement->closeCursor();
?>


<html lang="en">

<?php include('header.php') ?>

<body class="bg-secondary"> <!-- gray background -->

<div class="card-header py-3 text-center text-light m-5 my-3">
    <h1>Edit Maintenance Type</h1>
</div>
<!-- The outer container keeps the two inner containers in sync viz. width -->
<div class="container px-5 w-50">
    <div class="container px-lg-3 py-0 bg-light">
        <!-- The form creates a POST array and sends to add_vehicle.php -->
        <form action="edit_maintenance_type_db.php" method="post"
              id="edit_maintenance_type_form">
            <div class="row py-5 mx-5 justify-content-center">
                <!-- Each input box creates a variable with a name that matches the database columns (for convenience)-->
                <div class="mb-3 mt-3">
                    <label for="type_id" class="form-label">Maintenance Type Code:</label>
                    <input readonly type="text" class="form-control" id="maintenance_type_id" value="<?php echo $type['maintenance_type_id']; ?>" placeholder="Maintenance Type Code" name="maintenance_type_id">
                </div>
                <div class="mb-3 mt-3">
                    <label for="Maintenance Type Description" class="form-label">Maintenance Type:</label>
                    <input type="text" class="form-control" id="maintenance_type" value="<?php echo $type['maintenance_type']; ?>" placeholder="Description" name="maintenance_type">
                </div>
                <!-- Submit button triggers the POST method and sending of data to add_vehicle.php -->
                <input type="hidden" class="form-control id="maintenance_type_id" value="<?php echo $type['maintenance_type_id']; ?>" name="maintenance_type_id">
                <button type="submit" class="btn btn-primary" value="edit maintenance type">Submit</button>
                <!--                </div>-->
            </div>
        </form>

    </div>
</div>
<?php include('footer.php');?>

</body>
</html>