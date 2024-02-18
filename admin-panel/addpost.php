<?php include'nav.php'?>

<style>
body{
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
                  <form  action="savePost.php" method="POST" >
                      <div class="form-group">
                          <label for="post_title">Title</label>
                          <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="postDescription" class="form-control" rows="5"  required></textarea>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select name="category" class="form-control">
                              <option value="" selected> Select Category</option>
                          </select>
                      </div>
                      <div class="form-group mb-3">
                          <label for="exampleInputPassword1">Post image</label>
                          <input type="file" name="fileToUpload" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary w-auto" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
              </div>
          
      </div>

      <?php include'foot.php'?>