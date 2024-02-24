<?php include 'nav.php' ?>

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
        $sql = "SELECT * FROM post";
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
                            <td><?php
                                if ($row['Category'] == 1) {
                                    echo "Technology";
                                } else if ($row['Category'] == 2) {
                                    echo "Travel";
                                } else if ($row['Category'] == 3) {
                                    echo "Food";
                                } else if ($row['Category'] == 4) {
                                    echo "Health";
                                } else {
                                    echo "Sports";
                                }
                                ?></td>
                            <td><?php echo $row['DATE'] ?></td>
                            <td><?php echo $row['AUTHOR'] ?></td>
                            <td><button class="btn btn-primary btn-sm w-auto">Edit</button></td>
                            <td><button class="btn btn-danger btn-sm w-auto">Delete</button></td>
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
        ?>

    </div>
</div>

<?php include 'foot.php' ?>