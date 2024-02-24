<?php
include "config.php";

if (isset($_FILES['fileToUpload'])) {
   $errors=array();
   $file_name=$_FILES['fileToUpload']['name'];
   $file_size=$_FILES['fileToUpload']['size'];
   $file_tmp=$_FILES['fileToUpload']['tmp_name'];
   $file_type=$_FILES['fileToUpload']['type'];
   $file_ext=strtolower(end(explode('.',$file_name)));

   $extensions=array("jpeg","jpg","png");

   if(!in_array($file_ext,$extensions)){
       $errors[]="This extension file is not allowed, Please choose a JPG or PNG file.";
   }
    if($file_size>2097152){
         $errors[]="File size must be 2mb or lower.";
    }
    if (empty($errors)==true) {
        move_uploaded_file($file_tmp,"upload/".$file_name);
    }
    else{
        print_r($errors);
        die();
    }
}
session_start();
$post_title=mysqli_real_escape_string($connection,$_POST['post_title']);
$post_description=mysqli_real_escape_string($connection,$_POST['post_Description']);
$post_category=mysqli_real_escape_string($connection,$_POST['category']);;
$date= date("d M, Y");
$author=$_SESSION['user_id'];

$sql = "INSERT INTO post (Title, Description, Category, DATE, AUTHOR, Picture)
        VALUES ('{$post_title}', '{$post_description}', {$post_category}, '{$date}', {$author}, '{$file_name}')";

$sql .= ";";  // Add a semicolon to separate the statements

$sql .= "UPDATE category SET No_of_Posts = No_of_Posts + 1 WHERE ID = {$post_category}";


    if(mysqli_multi_query($connection,$sql)){
        header("Location:{$hostName}/admin-panel/post.php");
    }
    else{
        echo "Query Failed";
    }
?>