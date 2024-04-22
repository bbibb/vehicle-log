<?php include('session_ok.php');?>
<?php include('admin_ok.php');?>


<!DOCTYPE html>
<html lang="en">
<!--    Bryan Bibb, CPT283-W01, Feb 1 2024 -->

<?php include('header.php') ?>

<body class="bg-secondary">

<!-- PHP to get table data from the database. -->
<?php require('config.php');

$query = 'SELECT * FROM users
    WHERE status = 1';
$statement = $db->prepare($query);
$statement->execute();
$users = $statement->fetchAll();
$statement->closeCursor();
?>


<!--table header-->
<div class="card-header py-3 text-center text-light m-5 my-3">
    <h1>Users</h1>
</div>

<div class="container w-auto px-lg-4 py-0">
    <table class="table table-striped table-bordered table-responsive bg-light">
        <tr>
            <th>UserID</th>
            <th>First</th>
            <th>Last</th>
            <th>username</th>
            <th>email</th>
            <th>user_role</th>
            <th>date_created</th>
            <th>date_modified</th>
<!--            <th>date_lastlogin</th>-->
<!--            <th>date_modified/th>-->
        </tr>

        <!-- PHP foreach loop prints out the cells for each row, one at a time-->
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?php echo $user['user_id']; ?></td>
                <td><?php echo $user['first_name']; ?></td>
                <td><?php echo $user['last_name']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['user_role']; ?></td>
                <td><?php echo date('m-d-Y', strtotime($user['date_created'])); ?></td>
                <td><?php echo date('m-d-Y', strtotime($user['date_modified'])); ?></td>
                <td>
                    <form action="edit_user.php" method="post"
                          id="edit_user_form">
                        <button type="submit" class="btn btn-outline-primary btn-sm" name="user_id"
                                value="<?php echo $user['user_id'];?>">edit</button>
                    </form>
                </td>
                <td>
                    <form action="delete_user.php" method="post"
                          id="delete_user_form">
                        <button type="submit" class="btn btn-outline-primary btn-sm" name="fuel_id"
                                value="<?php echo $user['user_id'];?>">delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<!--<div class="row justify-content-center">-->
<!--    <div class="card py-3 text-center bg-light m-5 my-3 col-3">-->
<!--        <h3><a class="link-secondary" href="add_fuel.php">Add a new fuel record</a></h3>-->
<!--    </div>-->
<!--</div>-->
<?php include('footer.php');?>

</body>
</html>


