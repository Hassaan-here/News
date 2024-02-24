<?php include 'nav.php' ?>

<style>
    body {
        background-color: lightgrey;
    }
</style>
<div class="container bg-light w-50 mt-5 mb-5 vh-100">
    <div class="row">
        <h1>Add New Post</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-offset-3 col-md-6 ">
            <!-- Form -->
            <form action="savePost.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="post_title">Title</label>
                    <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="Description"> Description</label>
                    <textarea name="post_Description" class="form-control" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="Category">Category</label>
                    <select name="category" class="form-control">
                        <option disabled> Select Category</option>
                        <?php
                        include 'config.php';
                        $sql = "Select * from category";
                        $result = mysqli_query($connection, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='{$row['ID']}'> {$row['Category_Name']} </option>";
                            }
                        }

                        ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="Post_image">Post image</label>
                    <input type="file" name="fileToUpload" required>
                </div>
                <input type="submit" name="submit" class="btn btn-primary w-auto" value="Save" required />
            </form>
            <!--/Form -->
        </div>
    </div>

</div>

<?php include 'foot.php' ?>