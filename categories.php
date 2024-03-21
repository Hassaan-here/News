<?php include 'head.php'; ?>
<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                    <?php
                    $connection = mysqli_connect("localhost", "root", "", "newsite") or die("not connected" . mysqli_error($connection));
                    if (isset($_GET['id'])) {
                        $category_id = $_GET['id'];
                        $sql1 = "SELECT * FROM post JOIN category
                        ON post.Category=category.ID WHERE post.Category = {$category_id}";
                        $result1 = mysqli_query($connection, $sql1) or die("Query Failed");
                        $row1 = mysqli_fetch_assoc($result1);
                    }
                    ?>
                    <h2 class="page-heading"><?php echo $row1['Category_Name'] ?></h2>
                    <?php
                    $sql = "SELECT post.ID, post.Title,post.Category,category.Category_Name,post.Description, post.DATE,post.Picture, user.User_Name FROM post 
                    LEFT JOIN category ON post.Category = category.ID
                    LEFT JOIN user ON post.AUTHOR = user.ID
                    WHERE post.Category = {$category_id}";

                    $result = mysqli_query($connection, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4 justify-content-center align-items-center">
                                            <a href="more.php?id=<?php echo $row['ID'] ?>">
                                                <img class="img-fluid h-auto" src="admin-panel/upload/<?php echo $row['Picture']; ?>" alt="" />
                                            </a>
                                        </div>
                                        <div class="col-md-8 p-2">
                                            <h4><a href="more.php?id=<?php echo $row['ID']; ?>" class="text-decoration-none text-dark"><?php echo $row['Title'] ?></a></h4>
                                            <div>
                                                <span>
                                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                                    <a href="categories.php?id=<?php echo $row['Category'] ?>" class="text-decoration-none text-dark"><?php echo $row['Category_Name'] ?></a>
                                                </span>
                                                <span>
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    <a href="author.php" class="text-decoration-none text-dark"><?php echo $row['User_Name'] ?></a>
                                                </span>
                                                <span>
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    <?php echo $row['DATE'] ?>
                                                </span>
                                            </div>
                                            <p class="description">
                                                <?php echo substr($row['Description'], 0, 100) . "...." ?>
                                            </p>
                                            <a class="btn btn-primary btn-sm" href="more.php?id=<?php echo $row['ID']; ?>">Read more</a>
                                        </div>
                                        <hr class="mt-2" />
                                    </div>
                                </div>
                            </div>
                    <?php
                        }  //while loop closed
                    } else {
                        echo "No Record Found";
                    }
                    ?>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
    </div>
</div>
<?php include 'foot.php'; ?>