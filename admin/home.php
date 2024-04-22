<?php include('session_ok.php');?>
<?php include('admin_ok.php');?>


<!DOCTYPE html>
<!--    Bryan Bibb, CPT283-W01, Feb 1 2024
        Program: Project Lab 3: form data input with INSERT INTO database. Demonstrates the use of form input,
                 assigning PHP variables, and constructing a database query to create a new record.
        Related: config.php, error.php, projectlab2.php, projectlab3.php, add_vehicle.php -->
<!-- This is a landing page that shows information about the program and includes placeholders
     links to the main sections. The first section that is working is the ability to view all
      vehicles (projectlab2.php) and to add a vehicle to the database (projectlab3.php) -->
<html lang="en">

<?php include('header.php') ?>


<body class="bg-secondary pb-5">

        <!-- Header-->
        <header class="py-3">
            <div class="container px-lg-5 py-lg-5">
                <div class="bg-light rounded-3 text-center row justify-content-center text-dark d-flex">
                    <p class="pt-3">
                        <a class="btn btn-primary btn-lg" href="profile.php">Welcome back, <?=htmlspecialchars($_SESSION['first_name'], ENT_QUOTES)?>!</a>

                    </p>

                </div>
            </div>
        </header>

        <!-- Page Content-->
<!-- One box for each section of the application with a link. Each link gets a custom icon from
     the Bootstrap svg icon collection -->
        <section class="pt-4">
            <div class="container px-lg-5">
                <!-- Page Features-->
                <div class="row gx-lg-5">
                    <div class="col-lg-6 col-xl-3 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
<!-- Change this temporary URL when the filenames get refactored at the end -->
                                <a href="vehicles.php" class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-car-front"></i></a>
                                <h2 class="fs-4 fw-bold">Vehicles</h2>
                                <p class="mb-0">View data about all fleet vehicles</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <a href="fuel.php" class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-fuel-pump"></i></a>
                                <h2 class="fs-4 fw-bold">Fuel Data</h2>
                                <p class="mb-0">View fuel usage and cost report</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <a href="maintenance.php" class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-wrench-adjustable"></i></a>
                                <h2 class="fs-4 fw-bold">Maintenance</h2>
                                <p class="mb-0">View maintenance history and costs</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <a href="users.php" class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-database-fill-gear"></i></a>
                                <h2 class="fs-4 fw-bold">Users</h2>
                                <p class="mb-0">View, edit, and delete user accounts.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

<!--  Temporary links for the Project Lab assignments    -->

<?php include('footer.php');?>
    </body>
</html>
