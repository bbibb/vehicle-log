<?php include('session_ok.php');?>

<!DOCTYPE html>
<html lang="en">
<!--    Bryan Bibb, CPT283-W01, Feb 1 2024 -->

<?php include('header.php') ?>

<body class="bg-secondary">

<!-- PHP to get table data from the database. -->
<?php require('config.php');

$query = 'SELECT * 
            FROM maintenance
            LEFT JOIN vehicles ON maintenance.vehicle_id = vehicles.vehicle_id';
$statement = $db->prepare($query);
$statement->execute();
$mains = $statement->fetchAll();
$statement->closeCursor();
?>


<!--table header-->
<div class="card-header py-3 text-center text-light m-5 my-3">
    <h1>Maintenance Data</h1>
</div>


<div class="container container-fluid w-auto px-lg-5 py-0">
    <input class="my-3" id="search" type="text" placeholder="Search keyword">

    <table class="table table-striped table-bordered table-responsive bg-light">
<thead>
        <tr>
            <th>Date</th>
<!--            <th>Maintenance Code</th>-->
            <th>Vehicle</th>
            <th>Service</th>
            <th>Vendor</th>
            <th>Description</th>
            <th>Vendor Address</th>
            <th>Cost</th>
            <th>Mileage</th>

        </tr>
</thead>
        <tbody id="maintenance">
        <!-- PHP foreach loop prints out the cells for each row, one at a time-->
        <?php foreach ($mains as $main) : ?>
            <?php $vehicle_name = $main['vehicle_year'] . ' ' . $main['vehicle_model']; ?>
            <tr>
                <td><?php echo date('m-d-Y', strtotime($main['maintenance_date'])); ?></td>
<!--                <td>--><?php //echo $main['maintenance_id']; ?><!--</td>-->
                <td><?php echo $vehicle_name; ?></td>
                <td><?php echo $main['maintenance_type_id']; ?></td>
                <td><?php echo $main['maintenance_vendor']; ?></td>
                <td><?php echo $main['maintenance_description']; ?></td>
                <td><?php echo $main['maintenance_vendor_address']; ?></td>
                <td><?php echo $main['maintenance_cost']?></td>
                <td><?php echo $main['maintenance_mileage']; ?></td>
                <td>
                    <form action="edit_maintenance.php" method="post"
                          id="edit_maintenance_form">
                        <button type="submit" class="btn btn-outline-primary btn-sm" name="maintenance_id"
                                value="<?php echo $main['maintenance_id'];?>">edit</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="row justify-content-center">
    <div class="card py-3 text-center bg-light m-5 my-3 col-3">
        <h3><a class="link-secondary" href="add_maintenance.php">Add a new maintenance record</a></h3>
    </div>
</div>
<?php include('footer.php');?>

<script>
    $(document).ready(function () {
        $("#search").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#maintenance tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
</body>
</html>
