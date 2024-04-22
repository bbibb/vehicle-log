<?php include('session_ok.php');?>


<!DOCTYPE html>
<html lang="en">
<!--    Bryan Bibb, CPT283-W01, Feb 1 2024 -->

<?php include('header.php') ?>

<body class="bg-secondary">

<!-- PHP to get table data from the database. -->
<?php require('config.php');

$query = 'SELECT * 
            FROM fuel
            LEFT JOIN vehicles ON fuel.vehicle_id = vehicles.vehicle_id';
$statement = $db->prepare($query);
$statement->execute();
$fuels = $statement->fetchAll();
$statement->closeCursor();
?>


<!--table header-->
<div class="card-header py-3 text-center text-light m-5 my-3">
    <h1>Fuel Data</h1>
</div>

<div class="container w-auto px-lg-4 py-0">
    <input class="my-3" id="search" type="text" placeholder="Search keyword">

    <table class="table table-striped table-bordered table-responsive bg-light">
<thead>
        <tr>
<!--            <th>FuelID</th>-->
            <th>Date</th>
            <th>Vehicle</th>
            <th>Source</th>
            <th>Gallons</th>
            <th>Cost per gallon</th>
            <th>Cost total</th>
            <th>Mileage</th>
            <th>MPG</th>
        </tr>
</thead>
        <tbody id="fuel">
        <!-- PHP foreach loop prints out the cells for each row, one at a time-->
        <?php foreach ($fuels as $fuel) : ?>
        <?php $vehicle_name = $fuel['vehicle_year'] . ' ' . $fuel['vehicle_make'] . ' ' . $fuel['vehicle_model']; ?>
            <tr>
<!--                <td>--><?php //echo $fuel['fuel_id']; ?><!--</td>-->
                <td><?php echo date('m-d-Y', strtotime($fuel['fuel_date'])); ?></td>
                <td><?php echo $vehicle_name; ?></td>
                <td><?php echo $fuel['fuel_source']; ?></td>
                <td><?php echo $fuel['fuel_gallons']; ?></td>
                <td><?php echo $fuel['fuel_cost']; ?></td>
                <td><?php echo $fuel['fuel_cost'] * $fuel['fuel_gallons']?></td>
                <td><?php echo $fuel['fuel_mileage']; ?></td>
                <td><?php echo round($fuel['fuel_mileage'] / $fuel['fuel_gallons'], 1)?></td>
                <td>
                    <form action="edit_fuel.php" method="post"
                          id="edit_fuel_form">
                        <button type="submit" class="btn btn-outline-primary btn-sm" name="fuel_id"
                                value="<?php echo $fuel['fuel_id'];?>">edit</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="row justify-content-center">
    <div class="card py-3 text-center bg-light m-5 my-3 col-3">
        <h3><a class="link-secondary" href="add_fuel.php">Add a new fuel record</a></h3>
    </div>
</div>
<?php include('footer.php');?>

<script>
    $(document).ready(function () {
        $("#search").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#fuel tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
</body>
</html>
