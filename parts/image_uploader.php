<?php //Modified code from W3 School
echo $username;
$target_dir = 'uploads/'.$username.'/'.$primaryKey.'/';
echo $target_dir;
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0755, true);
}
$target_file = $target_dir . basename($_FILES["image"]["name"]);
echo $target_file;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
   $uploadOk = 0;
}
// Check file size
if ($_FILES["image"]["size"] > 500000) {
   $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
   $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<p>Sorry, your image could not be uploaded.</p>";
// if everything is ok, try to upload file
} else {
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
}
?>
