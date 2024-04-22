<?php include('session_ok.php');?>
<?php include('admin_ok.php');?>


    <!DOCTYPE html>
    <html>
    <!--    Bryan Bibb, CPT283-W01, Feb 1 2024
    -->

<?php include('header.php') ?>

    <body class="bg-secondary"> <!-- gray background -->

    <div class="card-header py-3 text-center text-light w-auto m-5 my-3">
        <h1>Image Files</h1>
    </div>

    <?php
    $folder_path = '../uploads';
    $files = glob($folder_path.'/*');
    ?>

    <div class="container px-lg-4 py-0 d-flex justify-content-center">

    <table id="files" class="table table-striped table-bordered table-responsive table-bordered table-responsive bg-light w-25" style="width:100%">
    <?php foreach ($files as $file) : ?>
        <tr>
            <td><?php echo $file; ?></td>
            <td><?php echo '<img  src="' . $file . '" class="img-responsive" style="height:256px">';?></td>
            <td>
                <form action="delete_file.php" method="post"
                      id="delete_file_form">
                    <button type="submit" class="btn btn-outline-primary btn-sm" name="file"
                            value="<?php echo $file;?>">delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
    </div>
    </body>
</html>