<!--    Bryan Bibb, CPT283-W01, Feb 1 2024
        Program: Project Lab 3: form data input with INSERT INTO database. Demonstrates the use of form input,
                 assigning PHP variables, and constructing a database query to create a new record.
        Related: config.php, projectlab2.php, projectlab3.php, add_vehicle.php -->

<!-- Simple error message returned if query construction fails -->
<!DOCTYPE html>
<html>
<!--    Bryan Bibb, CPT283-W01, Feb 1 2024
-->

<?php include('header.php') ?>

<body class="bg-secondary"> <!-- gray background -->

<!--Page header with white background and centered text -->

<div class="container px-5">
    <div class="container px-lg-3 py-3 bg-light">
    <h1>Error</h1>
    <p><?php echo $error; ?></p>
        <button class="btn btn-primary btn-outline" onclick="history.back()">Go Back</button>
</div>
</div>
</body>
