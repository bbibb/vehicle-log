<?php include('session_ok.php');?>
<?php include('admin_ok.php');?>


<!DOCTYPE html>
<html lang="en">
<!--    Bryan Bibb, CPT283-W01, Feb 1 2024 -->

<?php include('header.php') ?>

<body class="bg-secondary">

<!-- PHP to get table data from the database. -->
<?php require('config.php');

$query = 'SELECT * 
            FROM maintenance_type';
$statement = $db->prepare($query);
$statement->execute();
$types = $statement->fetchAll();
$statement->closeCursor();
?>


<!--table header-->
<div class="card-header py-3 text-center text-light m-5 my-3">
    <h1>Maintenance Codes</h1>
</div>


<div class="container container-fluid w-50 px-lg-5 py-0">
    <input class="my-3" id="search" type="text" placeholder="Search keyword">

    <table class="table table-striped table-bordered table-responsive bg-light">
<thead>
        <tr>
            <th>Maintenance Code</th>
            <th>Description</th>
            <th></th>
        </tr>
</thead>
        <tbody id="m-type">
        <!-- PHP foreach loop prints out the cells for each row, one at a time-->
        <?php foreach ($types as $type) : ?>
            <tr>
                <td><?php echo $type['maintenance_type_id']; ?></td>
                <td><?php echo $type['maintenance_type']; ?></td>
                <td>
                    <form action="edit_maintenance_type.php" method="post"
                          id="edit_maintenance_type_form">
                        <button type="submit" class="btn btn-outline-primary btn-sm" name="maintenance_type_id"
                                value="<?php echo $type['maintenance_type_id'];?>">edit</button>
                    </form>
                </td>
                <td>
                    <form action="delete_maintenance_type.php" method="post"
                          id="delete_maintenance_type_form">
                        <button type="submit" class="btn btn-outline-primary btn-sm" name="maintenance_type_id"
                                value="<?php echo $type['maintenance_type_id'];?>">delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="row justify-content-center">
    <div class="card py-3 text-center bg-light m-5 my-3 col-3">
        <h3><a class="link-secondary" href="add_maintenance_type.php">Add a new maintenance type</a></h3>
    </div>
</div>
<?php include('footer.php');?>


<script>
    $(document).ready(function () {
        $("#search").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#m-type tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
</body>
</html>
