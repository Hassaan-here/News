<?php
$connection=mysqli_connect("localhost","root","","newsite") or die("not connected".mysqli_error($connection));
$category_id=$_GET['id'];
$sql="DELETE FROM category where ID={$category_id}";  //SQL injection is possible here. Use prepared statements instead!

if(mysqli_query($connection,$sql)){
    header("Location:http://localhost/PHP/News-BlogSite/admin-panel/category.php");
}
else{
    echo "Query Failed";
}
?>