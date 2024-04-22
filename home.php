<?php include('session_ok.php');?>

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
        <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-1 p-lg-1 bg-light rounded-3 text-center row justify-content-center text-dark d-flex">
<!-- header is divided into two columns, one for the title and one for the description -->
                    <div class="m-3 m-lg-5 col-4 flex-fill">
                        <h1 class="display-5 fw-bold">Vehicle Log</h1>
<!--                        <p class="fs-4">Welcome to the Vehicle Log Web Application <br>-->
<!--                            Developed by Bryan Bibb for CPT283 PHP Programming, at-->
<!--                            <a href="https://www.gvltec.edu/academics_learning/business-computer/computer_technology/index.html" target="_blank ">Greenville Technical College</a>.</p>-->
                        <p class="lead m-0">Here you can track and organize your vehicles, fuel usage, and maintenance.</p><br>
                        <p class="lead m-0">Click on the buttons below to view information.</p><br>

                        <p class="fs-4">
                            <a class="btn btn-primary btn-lg" href="profile.php">Welcome back, <?=htmlspecialchars($_SESSION['first_name'], ENT_QUOTES)?>!</a>

                        </p>
<!--                        <p>--><?php //echo $_SESSION['name'];?><!--</p>-->
<!--                        <p>--><?php //echo $_SESSION['loggedin'];?><!--</p>-->
                    </div>
<!--                    <div class="m-4 m-lg-5 col-4">-->
<!--                    <ul class="list-group text-start list-group-flush">-->
<!--                        <li class="list-group-item">Track your fleet of vehicles</li>-->
<!--                        <li class="list-group-item">Add and edit vehicle information</li>-->
<!--                        <li class="list-group-item">Monitor fuel usage and calculate costs</li>-->
<!--                        <li class="list-group-item">Document maintenance history and expenses</li>-->
<!--                        <li class="list-group-item">Generate vehicle reports and fuel/maintenance records</li>-->
<!--                        <li class="list-group-item">Administrator account: edit users, add data entities, export and delete records</li>-->
<!--                    </ul>-->
                </div>
                </div>
                </div>
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
                                <a href="admin/home.php" class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-database-fill-gear"></i></a>
                                <h2 class="fs-4 fw-bold">Admin</h2>
                                <p class="mb-0">Administrative area</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

<!--<!--  Temporary links for the Project Lab assignments    -->-->
<!--        <div class="row justify-content-center">-->
<!--            <div class="card py-3 text-center text-dark m-5 my-3 col-3">-->
<!--                <h4>Temp Links for Project Labs</a></h4>-->
<!--                <h5><a href="vehicles.php">Project Lab 2</a></h5>-->
<!--                <h5><a href="add_vehicle.php">Project Lab 3</a></h5>-->
<!--                <h5><form action="edit_vehicle.php" method="post"-->
<!--                      id="edit_vehicle_form">-->
<!--                    <button type="submit" class="btn btn-outline-primary" name="vehicle_VIN"-->
<!--                            value="--><?php //echo '2A8HR54169R633896';?><!--">Project Lab 4</button>-->
<!--                </form></h5>-->
<!--                <h5><a href="fuel.php">Project Lab 6: Fuel</a></h5>-->
<!--                <h5><a href="maintenance.php">Project Lab 6: Maintenance</a></h5>-->
<!--                <h5><a href="maintenance_type.php">Project Lab 6: Maintenance Types</a></h5>-->
<!---->
<!--            </div>-->
<!--        </div>-->

<?php include('footer.php');?>
    </body>
</html>
