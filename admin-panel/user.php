<?php
include 'nav.php';
if ($_SESSION['user_role'] == '0') {
    header("Location:{$hostName}/admin-panel/post.php");  //redirecting to the login page after logout
}
?>

<style>
    body {
        background-color: lightgrey;
    }

    #btn {
        margin-left: auto;
    }
</style>

<div class="container-fluid col-sm-12 col-md-12 vh-100">

    <div class=" d-flex flex-row mt-5 mx-2">
        <h1>All USERS</h1>
        <a href="adduser.php" id="btn"><button class="btn btn-primary">ADD USER</button></a>
    </div>
    <div class="table-responsive">
        <!-- PHP code to display data dynamically -->
        <?php
        $connection = mysqli_connect("localhost", "root", "", "newsite") or die("not connected" . mysqli_error($connection));

        $limit = 5;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $offset = ($page - 1) * $limit;

        $sql = "SELECT * FROM user LIMIT {$offset},{$limit}";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
        ?>
            <table class="table table-dark table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.NO.</th>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Role</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['ID'] ?></td>
                            <td><?php echo $row['First_Name'] . ' ' . $row['Last_Name']; ?></td>
                            <td><?php echo $row['User_Name'] ?></td>
                            <td><?php
                                if ($row['Role'] == '1') {
                                    echo "Admin";
                                } else {
                                    echo "Editor";
                                }
                                ?></td>
                            <td>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm w-auto">
                                    <a href="edituser.php?id=<?php echo $row['ID'] ?>" class="text-light text-decoration-none">Edit</a>
                                </button>
                            </td>
                            <td><button class="btn btn-danger btn-sm w-auto"><a href="deleteuser.php?id=<?php echo $row['ID'] ?>" class="text-light text-decoration-none">Delete</a></button></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

    </div>

<?php
        } else {
            echo "No Records Found";
        }

        $sql1 = "SELECT * FROM user";
        $result1 = mysqli_query($connection, $sql1);
        if (mysqli_num_rows($result1) > 0) {
            $total_records = mysqli_num_rows($result1);
            $total_pages = ceil($total_records / $limit);

            echo "<ul class='pagination justify-content-center'>";
            if ($page > 1) {
                echo "<li class='page-item'><a class='page-link' href='user.php?page=" . ($page - 1) . "'>Previous</a></li>";
            }
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    $active = "active";
                } else {
                    $active = "";
                }
                echo " <li class='page-item {$active}'><a class='page-link' href='user.php?page=" . $i . "'>{$i}</a></li>";
            }
            if ($page < $total_pages) {
                echo "<li class='page-item'><a class='page-link' href='user.php?page=" . ($page + 1) . "'>Next</a></li>";
            }
            echo "</ul>";
        }
?>

</div>


<?php
include "foot.php";
?>