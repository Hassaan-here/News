<!-- PHP code to delete User entry -->
<?php
 $connection = mysqli_connect("localhost", "root", "", "newsite") or die("not connected" . mysqli_error($connection));

 $user_id=$_GET['id'];

 $sql = "DELETE FROM user where ID={$user_id}";  // SQL query to delete a record from the table.

if (mysqli_query($connection, $sql)) {
    header("Location:http://localhost/PHP/News-BlogSite/admin-panel/user.php");
} else {
    echo "Query Failed";
}

mysqli_close($connection);
?>