<?php include 'nav.php'  ?>

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
        <h1>All POSTS</h1>
        <a href="addpost.php" id="btn"><button class="btn btn-primary">ADD POST</button></a>
    </div>
    <div class="table-responsive">
        <?php
        $connection = mysqli_connect("localhost", "root", "", "newsite") or die("not connected" . mysqli_error($connection));
        $limit = 3;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $offset = ($page - 1) * $limit;
        if ($_SESSION['user_role'] == '1') {
            $sql = "SELECT post.ID, post.Title,post.Category,category.Category_Name, post.DATE, user.User_Name FROM post 
            LEFT JOIN category ON post.Category = category.ID
            LEFT JOIN user ON post.AUTHOR = user.ID
            LIMIT {$offset},{$limit}";
        }else if(($_SESSION['user_role'] == '0')){
            $sql = "SELECT post.ID, post.Title,post.Category,category.Category_Name, post.DATE, user.User_Name FROM post 
            LEFT JOIN category ON post.Category = category.ID
            LEFT JOIN user ON post.AUTHOR = user.ID
            WHERE post.AUTHOR = {$_SESSION['user_id']}
            LIMIT {$offset},{$limit}";
        }
       
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {

        ?>
            <table class="table table-dark table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.NO.</th>
                        <th>TITLE</th>
                        <th>CATEGORY</th>
                        <th>DATE</th>
                        <th>AUTHOR</th>
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
                            <td><?php echo $row['Title'] ?></td>
                            <td><?php echo $row['Category_Name'] ?></td>
                            <td><?php echo $row['DATE'] ?></td> 
                            <td><?php echo $row['User_Name']  ?></td>
                            <td><button class="btn btn-primary btn-sm w-auto"><a href="editpost.php? id=<?php echo $row['ID']?>" class="text-light text-decoration-none">Edit</a></button></td>
                            <td><button class="btn btn-danger btn-sm w-auto"><a href="deletepost.php? id=<?php echo $row['ID']?> & category=<?php echo $row['Category']?>"class="text-light text-decoration-none">Delete</a></button></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

        <?php
        } else {
            echo "No records found";
        }
        if ($_SESSION['user_role'] == '1'){
            $sql1 = "SELECT * FROM post";
        }else if(($_SESSION['user_role'] == '0')){
            $sql1 = "SELECT * FROM post WHERE AUTHOR = {$_SESSION['user_id']}";
        }
        
        $result1 = mysqli_query($connection, $sql1);

        if (mysqli_num_rows($result1) > 0) {
            $total_records = mysqli_num_rows($result1);
            $total_pages = ceil($total_records / $limit);

            echo "<ul class='pagination justify-content-center'>";
            if ($page > 1) {
                echo "<li class='page-item'><a class='page-link' href='post.php?page=" . ($page - 1) . "'>Previous</a></li>";
            }
            for ($i = 1; $i <= $total_pages; $i++) {
                echo " <li class='page-item '><a class='page-link' href='post.php?page=" . $i . "'>{$i}</a></li>";
            }
            if ($page < $total_pages) {
                echo "<li class='page-item'><a class='page-link' href='post.php?page=" . ($page + 1) . "'>Next</a></li>";
            }
            echo "</ul>";
        }
        ?>

    </div>
</div>

<?php include 'foot.php' ?>