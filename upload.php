<?php
include('session_ok.php');

require_once('config.php');

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is an actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check == false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Sorry, there was an error uploading your file.";
    }
}
$vehicle_VIN = filter_input(INPUT_POST, 'vehicle_VIN');
$query = 'UPDATE vehicles
          SET
            image_file = :target_file
          WHERE
             vehicle_VIN = :vehicle_VIN;';
$statement = $db->prepare($query);
$statement->bindValue(':vehicle_VIN', $vehicle_VIN);
$statement->bindValue(':target_file', $target_file);
$statement->execute();
$statement->closeCursor();

?>


<script type="text/javascript">
    alert("Image uploaded successfully!");
    window.location = "vehicles.php";
</script>

