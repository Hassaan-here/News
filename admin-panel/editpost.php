<?php include "nav.php"; ?>



<div class="container  w-50 vh-100 ">
    <h1 class="mt-2">Update Post</h1>

    <?php
    include 'config.php';
    $post_id = $_GET['id'];

    $sql = "SELECT post.ID, post.Title,category.Category_Name,post.Description,post.Category, post.DATE,post.Picture, user.User_Name FROM post 
 LEFT JOIN category ON post.Category = category.ID
 LEFT JOIN user ON post.AUTHOR = user.ID
where post.ID = {$post_id}";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {


    ?>

            <form action="save-Updatepost.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="post_id" hidden value="<?php echo $row['ID'] ?>" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="post_title">Title</label>
                    <input type="text" name="post_title" value="<?php echo $row['Title'] ?>" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="Description"> Description</label>
                    <textarea name="post_Description" class="form-control" rows="5" required><?php echo $row['Description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="Category">Category</label>
                    <select name="category" class="form-control">
                        <option disabled> Select Category</option>
                        <?php

                        $sql1 = "Select * from category";
                        $result1 = mysqli_query($connection, $sql1);

                        if (mysqli_num_rows($result1) > 0) {
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                if ($row['Category'] == $row1['ID']) {
                                    $selected = "selected";
                                } else {
                                    $selected = "";
                                }

                                echo "<option {$selected} value='{$row1['ID']}'> {$row1['Category_Name']} </option>";
                            }
                        }

                        ?>
                    </select>
                </div>
                <div class="form-group mt-2 mb-3">
                    <label for="Post_image">Post image</label>
                    <input type="file" name="fileToUpload">
                    <img src="upload/<?php echo $row['Picture'] ?>" class="h-25">
                    <input type="hidden" name="previous_img" value="<?php echo $row['Picture'] ?>">
                </div>
                <input type="submit" name="submit" class="btn btn-primary w-auto" value="Update"/>
            </form>
    <?php     }
    } else {
        echo "No Record Found";
    } ?>
</div>

<?php include "foot.php"; ?>