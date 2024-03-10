  <?php 
  include "head.php";
  ?>
  <!--News Categories -->
  <section id="Categories" class="h-vh">
      <div class="container-fluid mb-3">
        <div class="row justify-content-center align-items-center mt-3">
          <div class="col-12 text-center">
            <p class="display-4">Categories</p>
          </div>
        </div>
        
        <div class="row justify-content-center align-items-center mt-3">
          <?php
          $connection=mysqli_connect("localhost","root","","newsite") or die("not connected".mysqli_error($connection));
          $sql="SELECT * FROM category";
          $result=mysqli_query($connection,$sql) or die("Query Failed");
          if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
          ?>
          <div class="col-md-3">
            <div class="card bg-light m-2">
              <img
                src="images/business.png"
                class="card-img-top p-2"
                alt="Card image cap"
              />
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['Category_Name']?></h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up
                  the bulk of the card's content.
                </p>
                <div class="row justify-content-center">
                  <a href="#" class="btn btn-primary w-50">Explore</a>
                </div>
              </div>
            </div>
          </div>
          <?php 
            }
          }else{
            echo "No Category Found";
          }
          ?>
        </div>
      </div>
    </section>

    <?php 
  include "admin-panel/foot.php";
  ?>