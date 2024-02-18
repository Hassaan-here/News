<?php include 'nav.php';

if ($_SESSION['user_role'] == '0') {
    header("Location:{$hostName}/admin-panel/post.php");  //redirecting to the login page after logout
}
 if (isset($_POST['save-btn'])) {
        $connection = mysqli_connect("localhost", "root", "", "newsite") or die("not connected" . mysqli_error($connection));
        $ID = mysqli_real_escape_string($connection, $_POST['user_ID']);
        $fname = mysqli_real_escape_string($connection, $_POST['f_name']);
        $lname = mysqli_real_escape_string($connection, $_POST['l_name']);
        $user = mysqli_real_escape_string($connection, $_POST['user_name']);
        $role = mysqli_real_escape_string($connection, $_POST['role']);

        $sql = "UPDATE user SET First_Name='{$fname}',Last_Name='{$lname}',User_Name='{$user}',Role='{$role}'
                                                 where ID='$ID'";
        $result = mysqli_query($connection, $sql);
        header("Location:http://localhost/PHP/News-BlogSite/admin-panel/user.php");
    } 
    
?>

<!-- Form to modify user details -->
<div class="container  mt-5 mb-5 w-50 vh-100">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <!-- PHP code to modify user details -->
    <?php
    $connection = mysqli_connect("localhost", "root", "", "newsite") or die("not connected" . mysqli_error($connection));
    $user_id=$_GET['id'];
    $sql = "SELECT * FROM user where ID={$user_id}";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row=mysqli_fetch_assoc($result)){
             ?>
    <div class="form-group">
        <input type="hidden" name="user_ID" class="form-control" value="<?php echo $row['ID'] ?>">
    </div>
    <div class="form-group m-3">
        <label for="fname" class="text-dark">First Name</label>
        <input type="text" name="f_name" class="form-control" value="<?php echo $row['First_Name'] ?>">
    </div>
    <div class="form-group m-3">
        <label for="lname" class="text-dark">Last Name</label>
        <input type="text" name="l_name" class="form-control" value="<?php echo $row['Last_Name'] ?>">
    </div>
    <div class="form-group m-3">
        <label for="user" class="text-dark">User Name</label>
        <input type="text" name="user_name" class="form-control" value="<?php echo $row['User_Name'] ?>">
    </div>
    <div class="form-group m-3">
        <label for="role" class="text-dark">User Role</label>
        <select class="form-control" name="role">
            <option value="0" <?php if ($row['Role'] == 1) echo 'selected="selected"'; ?>>Admin</option>
            <option value="1" <?php if ($row['Role'] == 0) echo 'selected="selected"'; ?>>Editor</option>
        </select>
    </div>
    <button class="btn btn-primary" type="submit" name="save-btn">Save</button>
</form>
</div>
<?php
        }
    }
?>
<?php include 'foot.php' ?>