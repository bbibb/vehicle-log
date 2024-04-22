<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
$user_id = $_SESSION['id'];
//echo $user_id;
require_once('config.php');
$query = 'SELECT * FROM users
           WHERE user_id = :user_id';
$statement = $db->prepare($query);
$statement->bindValue("user_id", $user_id);
$statement->execute();
$user = $statement->fetch();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html>
<?php include('header.php');?>

<body>

<div class="card-header py-3 text-center text-secondary m-5 my-3">
    <h1>User Profile</h1>
</div>

    <div class="container px-lg-4 py-0 d-flex justify-content-center">
    <div>
        <table class="table w-auto table-striped table-bordered table-responsive bg-light"->
            <tr>
                <td>Name:</td>
                <td><?php echo $user['first_name'] . ' ' . $user['last_name'];?></td>
            </tr>

            <tr>
                <td>Username:</td>
                <td><?php echo $user['username']?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?php echo $user['email'];?></td>
            </tr>
            <tr>
                <td>Server Role:</td>
                <td><?php echo $user['user_role'];?></td>
            </tr>
        </table>

        </table>
        <a class="btn btn-outline-primary" role="button"
                href="edit_profile.php">Edit</a>
        <a class="btn btn-outline-primary" role="button"
           href="logout.php">Log Out</a>

    </div>
</div>
</body>
<?php include('footer.php');?>

</body>
</html>
