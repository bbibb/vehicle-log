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
    <h1>Edit Profile</h1>
</div>

<div class="container px-lg-4 py-0 d-flex w-25 justify-content-center">
    <div class="container px-lg-3 py-0 bg-light">
        <!-- The form creates a POST array and sends to user.php -->
        <form action="edit_profile_db.php" method="post"
              id="edit_user_form">
            <div class="row py-5 mx-5 justify-content-center">
                <!-- Each input box creates a variable with a name that matches the database columns (for convenience)-->
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" value="<?php echo $user['username']; ?>" placeholder="Username" name="username" readonly>
                </div>
                <div class="mb-3">
                    <label for="first_name" class="form-label">First:</label>
                    <input type="text" class="form-control" id="first_name" value="<?php echo $user['first_name']; ?>" placeholder="First Name" name="first_name">
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last:</label>
                    <input type="text" class="form-control" id="last_name" value="<?php echo $user['last_name']; ?>" placeholder="Last Name" name="last_name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="email" value="<?php echo $user['email']; ?>" placeholder="Email" name="email">
                </div>
                <div class="mb-3">
                    <label for="user_role" class="form-label">User Role:</label>
                    <input type="text" class="form-control bg-secondary text-light" id="user_role" value="<?php echo $user['user_role']; ?>" placeholder="User Role" name="user_role" readonly>
                </div>
                <div>
                    <input type="hidden" id="date_modified" name="date_modified" value="<?php echo date("Y-m-d H:i:s");?>" />
                </div>

                <!-- Submit button triggers the POST method and sending of data to users.php -->
                <input type="hidden" class="form-control" id="user_id" value="<?php echo $user['user_id']; ?>" name="user_id">
                <button type="submit" class="btn btn-primary" value="edit user">Submit</button>
                <!--                </div>-->
            </div>
        </form>
    </div>
</div>
</body>
<?php include('footer.php');?>

</body>
</html>

