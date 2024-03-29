<?php
include "head.php";
?>
<!-- post-container -->
<div class="row m-3">
  <div class="col-md-8 bg-white">
    <div class="container p-3">
      <?php
      $connection = mysqli_connect("localhost", "root", "", "newsite") or die("not connected" . mysqli_error($connection));
      $limit = 3;
      if (isset($_GET['page'])) {
        $page = $_GET['page'];
      } else {
        $page = 1;
      }
      $offset = ($page - 1) * $limit;
      $sql = "SELECT post.ID, post.Title,post.Category,category.Category_Name,post.Description,post.AUTHOR, post.DATE,post.Picture, user.User_Name FROM post 
            LEFT JOIN category ON post.Category = category.ID
            LEFT JOIN user ON post.AUTHOR = user.ID
            LIMIT {$offset},{$limit}";

      $result = mysqli_query($connection, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-4 justify-conetnt-center align-items-center">
                  <a href="more.php?id=<?php echo $row['ID']?>">
                    <img class="img-fluid h-auto" src="admin-panel/upload/<?php echo $row['Picture']; ?>" alt="" />
                  </a>
                </div>
                <div class="col-md-8 p-2">
                  <h4><a href="more.php?id=<?php echo $row['ID'];?>" class="text-decoration-none text-dark"><?php echo $row['Title'] ?></a></h4>
                  <div>
                    <span>
                      <i class="fa fa-tags" aria-hidden="true"></i>
                      <a href="categories.php?id=<?php echo $row['Category']?>" class="text-decoration-none text-dark"><?php echo $row['Category_Name'] ?></a>
                    </span>
                    <span>
                      <i class="fa fa-user" aria-hidden="true"></i>
                      <a href="author.php?id=<?php echo $row['AUTHOR']?>" class="text-decoration-none text-dark"><?php echo $row['User_Name'] ?></a>
                    </span>
                    <span>
                      <i class="fa fa-calendar" aria-hidden="true"></i>
                      <?php echo $row['DATE'] ?>
                    </span>
                  </div>
                  <p class="description">
                    <?php echo substr($row['Description'],0,100)."...." ?>
                  </p>
                  <a class="btn btn-primary btn-sm" href="more.php?id=<?php echo $row['ID'];?>">Read more</a>
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

      $sql1 = "SELECT * FROM post";
      $result1 = mysqli_query($connection, $sql1);
      $total_records = mysqli_num_rows($result1);
      $total_pages = ceil($total_records / $limit);

      echo "<ul class='pagination justify-content-center mt-5 mb-5'>";
      if ($page > 1) {
        echo "<li class='page-item'><a class='page-link' href='index.php?page=" . ($page - 1) . "'>Previous</a></li>";
      }
      for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $page) {
          $active = "active";
      } else {
          $active = "";
      }
        echo " <li class='page-item {$active}'><a class='page-link' href='index.php?page=" . $i . "'>{$i}</a></li>";
      }
      if ($page < $total_pages) {
        echo "<li class='page-item'><a class='page-link' href='index.php?page=" . ($page + 1) . "'>Next</a></li>";
      }
      echo "</ul>";

      ?>

    </div>
  </div>
  <div class="col-md-4 bg-white border border-outline-secondary">
    <div class="container  " style="overflow-y: auto">
      <div class="row justify-content-center align-items-center text-center mt-3">
        <h5>Recent Posts</h5>
      </div>
      <div class="row mt-3 align-items-center">
        <div class="col-md-6">
          <img src="images/post-format.jpg" class="img-fluid" alt="post-thumbnail" />
        </div>
        <div class="col-md-5">
          <div class="row">
            <p class="small m-0">Lorem ipsum dolor sit amet.</p>
            <span class="fa fa-calendar small"> 01 Nov, 2019 </span>
          </div>
          <div class="row justify-content-start mt-1">
            <button class="btn btn-secondary btn-sm w-auto">
              Readmore
            </button>
          </div>
        </div>
      </div>
      <hr />
      <div class="row mt-3 align-items-center">
        <div class="col-md-6">
          <img src="images/post-format.jpg" class="img-fluid" alt="post-thumbnail" />
        </div>
        <div class="col-md-5">
          <div class="row">
            <p class="small m-0">Lorem ipsum dolor sit amet.</p>
            <span class="fa fa-calendar small"> 01 Nov, 2019 </span>
          </div>
          <div class="row justify-content-start mt-1">
            <button class="btn btn-secondary btn-sm w-auto">
              Readmore
            </button>
          </div>
        </div>
      </div>
      <hr />
      <div class="row mt-3 align-items-center">
        <div class="col-md-6">
          <img src="images/post-format.jpg" class="img-fluid" alt="post-thumbnail" />
        </div>
        <div class="col-md-5">
          <div class="row">
            <p class="small m-0">Lorem ipsum dolor sit amet.</p>
            <span class="fa fa-calendar small"> 01 Nov, 2019 </span>
          </div>
          <div class="row justify-content-start mt-1">
            <button class="btn btn-secondary btn-sm w-auto">
              Readmore
            </button>
          </div>
        </div>
      </div>
      <hr />
      <div class="row mt-3 align-items-center">
        <div class="col-md-6">
          <img src="images/post-format.jpg" class="img-fluid" alt="post-thumbnail" />
        </div>
        <div class="col-md-5">
          <div class="row">
            <p class="small m-0">Lorem ipsum dolor sit amet.</p>
            <span class="fa fa-calendar small"> 01 Nov, 2019 </span>
          </div>
          <div class="row justify-content-start mt-1">
            <button class="btn btn-secondary btn-sm w-auto">
              Readmore
            </button>
          </div>
        </div>
      </div>
      <hr />
      <div class="row mt-3 align-items-center">
        <div class="col-md-6">
          <img src="images/post-format.jpg" class="img-fluid" alt="post-thumbnail" />
        </div>
        <div class="col-md-5">
          <div class="row">
            <p class="small m-0">Lorem ipsum dolor sit amet.</p>
            <span class="fa fa-calendar small"> 01 Nov, 2019 </span>
          </div>
          <div class="row justify-content-start mt-1">
            <button class="btn btn-secondary btn-sm w-auto">
              Readmore
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>


</div><!-- /post-container -->



<?php
include "foot.php";
?>