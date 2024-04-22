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
$maintenance_date = date("m-d-Y", strtotime($main['maintenance_date']));
//echo $maintenance_date;
?>


<html lang="en">

<?php include('header.php') ?>

<body class="bg-secondary"> <!-- gray background -->

<div class="card-header py-3 text-center text-light m-5 my-3">
    <h1>Edit Maintenance Record</h1>
</div>
<!-- The outer container keeps the two inner containers in sync viz. width -->
<div class="container px-5">
    <div class="container px-lg-3 py-0 bg-light">
        <!-- The form creates a POST array and sends to add_vehicle.php -->
        <form action="edit_maintenance_db.php" method="post"
              id="edit_maintenance_form">
            <!-- The form is divided into two columns for ease of use -->
            <div class="row py-5 mx-5 justify-content-center">
                <!-- Each input box creates a variable with a name that matches the database columns (for convenience)-->
                <div class="mb-3">
                    <label for="date" class="form-label">Date:</label>
                    <input type="text" class="form-control" id="date" value="<?php echo $maintenance_date; ?>" placeholder="Enter date" name="maintenance_date">
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
                    <input type="text" class="form-control" id="vendor" value="<?php echo $main['maintenance_vendor']; ?>" placeholder="Enter vendor" name="maintenance_vendor">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <input type="text" class="form-control" id="description" value="<?php echo $main['maintenance_description']; ?>" placeholder="Enter description of service" name="maintenance_description">
                </div>
                <div class="mb-3">
                    <label for="vendor_address" class="form-label">Vendor Address:</label>
                    <input type="text" class="form-control" id="vendor_address" value="<?php echo $main['maintenance_vendor_address']; ?>" placeholder="Enter vendor address" name="maintenance_vendor_address">
                </div>
                <div class="mb-3">
                    <label for="cost" class="form-label">Cost:</label>
                    <input type="text" class="form-control" id="cost" value="<?php echo $main['maintenance_cost']; ?>" placeholder="Enter cost" name="maintenance_cost">
                </div>
                <div class="mb-3">
                    <label for="mileage" class="form-label">Mileage:</label>
                    <input type="text" class="form-control" id="mileage" value="<?php echo $main['maintenance_mileage']; ?>" placeholder="Enter current mileage" name="maintenance_mileage">
                </div>
                <!-- Submit button triggers the POST method and sending of data to add_vehicle.php -->
                <input type="hidden" class="form-control id="maintenance_id" value="<?php echo $main['maintenance_id']; ?>" name="maintenance_id">
                <button type="submit" class="btn btn-primary" value="edit maintenance">Submit</button>
                <!--                </div>-->
            </div>
        </form>

    </div>
</div>
<?php include('footer.php');?>

</body>
</html>