<?php
include"config.php";

session_start();

if (isset($_SESSION['username'])) {
    header("Location:{$hostName}/admin-panel/post.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Login</title>
    <link rel="stylesheet" href="css/index.css">


</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="image/Logo.jpg" alt="">
            <h2>Get Updated with us.</h2>
        </div>
        <div class="card">
            <form action="<?php echo  $_SERVER['PHP_SELF']; ?>" method="post">
               
                <label for="user_name">Username:</label>
                <input type="text" id="Username" name="Username" placeholder="Username">

                <label for="pass_word">Password:</label>
                <input type="password" name="password" id="Password" placeholder="Password">

                <button value="submit" id="log-in" name="submit" style="background: rgb(26, 86, 138);">Log in</button>

                <hr id="hr">

            </form>
            <?php
            if (isset($_POST['submit'])) {
                $connection = mysqli_connect("localhost", "root", "", "newsite") or die("not connected" . mysqli_error($connection));

                $username = mysqli_real_escape_string($connection, $_POST['Username']);
                $password = mysqli_real_escape_string($connection, md5($_POST['password']));

                $sql = "SELECT ID,User_Name,Role FROM user where User_Name='{$username}' and password='{$password}'";

                $result = mysqli_query($connection, $sql) or die("Query Failed");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        session_start();
                        $_SESSION['username'] = $row['User_Name'];
                        $_SESSION['user_id'] = $row['ID'];
                        $_SESSION['user_role'] = $row['Role'];
                        header("Location:http://localhost/PHP/News-BlogSite/admin-panel/post.php");
                    }
                } else {
                   echo"<span style= 'color:red';>Invalid Username and Password!</span>";
                }
            }
            ?>
        </div>
    </div>


</body>

</html>