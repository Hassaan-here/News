<?php
 include'nav.php';


 if ($_SESSION['user_role'] == '0') {
    header("Location:{$hostName}/admin-panel/post.php");  //redirecting to the login page after logout
}
if (isset($_POST['submit'])) {
  include "config.php"; 

  $category=$_POST['category_name'];
  $sql= "INSERT INTO category (Category_Name) VALUES ('{$category}')";
  $result=mysqli_query($connection,$sql) or die("Query Failed");
if ($result) {
  header("Location:{$hostName}/admin-panel/category.php");
}else{  
  echo "Query Failed";
}

}


?>

<style>
body{
    background-color: lightgrey;
}
</style>
<div class="container  mt-5 w-75 vh-100">
         
                 <h1 class="admin-heading">Add Category</h1>
        
              <div class="row justify-content-center bg-light">
                <div class="col-md-offset-3 col-md-6 ">
                  <!-- Form -->
                  <form  action="" method="POST" enctype="multipart/form-data" >
                      <div class="form-group mb-3">
                          <label for="category_name">Category Name</label>
                          <input type="text" name="category_name" class="form-control" autocomplete="off" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary w-auto" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
            </div>
          
      </div>

      <?php include "foot.php"; ?>