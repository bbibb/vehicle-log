<?php include('session_ok.php');?>

<!DOCTYPE html>
<html>
<!--    Bryan Bibb, CPT283-W01, Feb 1 2024
-->

<?php include('header.php') ?>

<body class="bg-secondary"> <!-- gray background -->

<!--Page header with white background and centered text -->
<div class="card-header py-5 text-center text-light m-5 my-3">
    <h1>Add Maintenance Type</h1>
</div>
<!-- The outer container keeps the two inner containers in sync viz. width -->
<div class="container w-50 px-5">
    <div class="container px-lg-3 py-1 bg-light">
        <!-- The form creates a POST array and sends to add_vehicle.php -->
        <form action="add_maintenance_type_db.php" method="post"
              id="add_maintenance_type_form">

                    <label for="maintenance_type" class="form-label">New Maintenance Type Description:</label>
                    <input type="text" class="form-control" id="maintenance_type" name="maintenance_type">
                </div>
                <!-- Submit button triggers the POST method and sending of data to add_vehicle.php -->
                <button type="submit" class="btn btn-primary my-3" value="add maintenance_type">Submit</button>
                <!--                </div>-->
            </div>
        </form>

    </div>
</div>
<?php include('footer.php');?>

</body>
</html>