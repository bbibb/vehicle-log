<?php
include('session_ok.php');


//  Bryan Bibb, CPT283-W01, Feb 1 2024

// filtering of variables
$user_id = filter_input(INPUT_POST, 'user_id');
$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$user_role = filter_input(INPUT_POST, 'user_role');
$date_modified = filter_input(INPUT_POST, 'date_modified');

// just in case the database has not been initialized
require_once('config.php');


//// test to make sure that all fields have been filled in.
if (
    $first_name == NULL || $last_name == NULL || $username == NULL || $email == NULL || $user_role == NULL)
{
    $error = "Invalid data. Check all fields and try again.";
    include('error.php');
} else {
// if so, the INSERT query runs, inserting each variable into its database column
    $query = 'UPDATE users
              SET
                first_name = :first_name, 
                last_name = :last_name, 
                email = :email, 
                user_role = :user_role,
                date_modified = :date_modified
              WHERE
                  user_id = :user_id;';

    $statement = $db->prepare($query);
    // each value in the query statement must be bound to the PHP variable
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':user_role', $user_role);
    $statement->bindValue(':date_modified', $date_modified);
    // query is executed after preparation
    $statement->execute();
    $statement->closeCursor();
    // after the record is created, load the page that views all user records
    header("Location: profile.php");
}
?>