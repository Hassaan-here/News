<?php
include "config.php";

if (empty($_FILES['fileToUpload']['name'])) {
    $file_name = $_POST['previous_img'];
} else {
    $errors = array();
    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext = strtolower(end(explode('.', $file_name)));

    $extensions = array("jpeg", "jpg", "png");

    if (!in_array($file_ext, $extensions)) {
        $errors[] = "This extension file is not allowed, Please choose a JPG or PNG file.";
    }
    if ($file_size > 2097152) {
        $errors[] = "File size must be 2mb or lower.";
    }
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "upload/" . $file_name);
        $post_id = $_POST['post_id'];
        $sql1 = "SELECT Picture FROM post WHERE ID={$post_id}";
        $result = mysqli_query($connection, $sql1) or die("Query Failed");
        $row = mysqli_fetch_assoc($result);

        unlink("upload/" . $row['Picture']);
    } else {
        print_r($errors);
        die();
    }
}

$sql = "UPDATE post SET Title='{$_POST['post_title']}', Description='{$_POST['post_Description']}', Category={$_POST['category']}, Picture='{$file_name}' WHERE ID={$_POST['post_id']};";
$result = mysqli_query($connection, $sql) or die("Query Failed");
if ($result) {
    header("Location:{$hostName}/admin-panel/post.php");
} else {
    echo "Query Failed";
}
