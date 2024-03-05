<?php
include "config.php";

$post_id = $_GET['id'];
$category_id = $_GET['category'];

$sql1="SELECT Picture FROM post WHERE ID={$post_id}";
$result=mysqli_query($connection,$sql1) or die("Query Failed");
$row=mysqli_fetch_assoc($result);

unlink("upload/".$row['Picture']);

$sql = "DELETE FROM post WHERE ID={$post_id};";

$sql .= "UPDATE category SET No_of_Posts=No_of_Posts-1 WHERE ID={$category_id}";

if (mysqli_multi_query($connection, $sql)) {
    header("Location:{$hostName}/admin-panel/post.php");
} else {
    echo "Query Failed";
}
?>