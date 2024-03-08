<?php include 'head.php'; ?>
<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="container">
                    <?php
                    $connection = mysqli_connect("localhost", "root", "", "newsite") or die("not connected" . mysqli_error($connection));
                    $post_id = $_GET['id'];

                    $sql = "SELECT post.ID, post.Title,post.Category,category.Category_Name,post.Description, post.DATE,post.Picture, user.User_Name FROM post 
            LEFT JOIN category ON post.Category = category.ID
            LEFT JOIN user ON post.AUTHOR = user.ID
            WHERE post.ID={$post_id}";

                    $result = mysqli_query($connection, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <div>
                                <h3><?php echo $row['Title'] ?></h3>
                                <div class="post-information">
                                    <span>
                                        <i class="fa fa-tags" aria-hidden="true"></i>
                                        <?php echo $row['Category_Name'] ?>
                                    </span>
                                    <span>
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <a href='author.php' class="text-decoration-none text-dark"><?php echo $row['User_Name'] ?></a>
                                    </span>
                                    <span>
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <?php echo $row['DATE'] ?>
                                    </span>
                                </div>
                                <img class="img-fluid" src="admin-panel/upload/<?php echo $row['Picture']; ?>" alt="" />
                                <p class="description">
                                    <?php echo $row['Description'] ?>
                                </p>
                            </div>
                    <?php
                        }  //while loop closed    
                    } else {
                        echo "No Record Found";
                    }
                    ?>
                </div>
                <!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
    </div>
</div>