<?php
 include 'nav.php';
 if ($_SESSION['user_role'] == '0') {
    header("Location:{$hostName}/admin-panel/post.php");  //redirecting to the login page after logout
};

if (isset($_POST['save'])) {
    $connection = mysqli_connect("localhost", "root", "", "newsite") or die("not connected" . mysqli_error($connection));
    $fname = mysqli_real_escape_string($connection, $_POST['fname']);
    $lname = mysqli_real_escape_string($connection, $_POST['lname']);
    $user = mysqli_real_escape_string($connection, $_POST['user']);
    $pass = mysqli_real_escape_string($connection, md5($_POST['password']));
    $role = mysqli_real_escape_string($connection, $_POST['role']);

$sql="Select User_Name from user where User_Name='$user'";
$result=mysqli_query($connection,$sql);
   
if (mysqli_num_rows($result)>0) {
    echo "<h5 style=color:red;text-align:center;margin:20px 0px>User Name already exists</h5>";
}
else{
    $sql1 = "INSERT INTO user (First_Name,Last_Name,User_Name,Password,Role) VALUES('{$fname}','{$lname}','{$user}','{$pass}','{$role}')";
    if (mysqli_query($connection, $sql1)) {
        header("Location:http://localhost/PHP/News-BlogSite/admin-panel/user.php");
    } else {
        echo "Query Failed";
    }
}
}
else{
    echo "Please fill all the fields";
   
}
?>

<div class="container  mt-5 mb-5 w-75 vh-100">
    <div class="row  bg-light">

        <h1 class="admin-heading">Add User</h1>
        <div class="d-flex justify-content-center">
            <div class="col-md-6">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                    <div class="form-group mb-2">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="form-group mb-2">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="form-group mb-2">
                        <label>User Name</label>
                        <input type="text" name="user" class="form-control" placeholder="Username" required>
                    </div>

                    <div class="form-group mb-2">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group mb-2">
                        <label>User Role</label>
                        <select class="form-control" name="role">
                            <option value="1">Admin</option>
                            <option value="0">Editor</option>
                        </select>
                    </div>
                    <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                </form>
            </div>
        </div>
    </div>

</div>

<?php include 'foot.php' ?>