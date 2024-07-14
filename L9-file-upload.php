<?php
if (isset($_POST['upFile123'])) {
    $fileName = $_FILES['immgFile']['name'];
    $fileTmp = $_FILES['immgFile']['tmp_name'];
    $fileSize = $_FILES['immgFile']['size'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];

    if (empty($fileName)) {
        $errMesg = "<span style='color: red'>Please select a file</span>";
    } elseif (!in_array($fileActualExt, $allowed)) {
        $errMesg = "<span style='color: red'>File type not allowed</span>";
    } elseif ($fileSize > 2000000) {
        $errMesg = "<span style='color: red'>File size too large</span>";
    } else {
        $newFileName = uniqid('', true) . "." . $fileActualExt;
        $fileDestination = "uploads/" . $newFileName;
        $move = move_uploaded_file($fileTmp, $fileDestination);
        if ($move) {
            $errMesg = "<span style='color: green'>File uploaded successfully</span>";
        } else {
            $errMesg = "<span style='color: red'>File upload failed</span>";
        }
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="immgFile">
    <input type="submit" name="upFile123">
</form>
<?= $errMesg ?? null ?>