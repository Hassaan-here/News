<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>News 24</title>
    <!-- icon -->
    <link rel="icon" href="images/Logo.jpg" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <!-- bootstrap css file link  -->
    <link rel="stylesheet" href="css/index.css" />
    <link
      rel="stylesheet"
      href="bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css"
    />
    <!-- Js link  -->
    <script src="bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js"></script>
  </head>

  <body class="bg-light">
    <div id="header" class="relative-top">
      <!-- navbar start here-->
      <div class="container-fluid">
        <nav
          class="navbar navbar-expand-lg navbar-expand-md navbar-light bg-primary"
        >
          <a class="navbar-brand" href="#"
            ><img
              id="logo-img"
              class="img-fluid"
              src="images/Logo.jpg"
              alt="Brand-Logo"
          /></a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav px-4">
              <li class="nav-item active">
                <a
                  class="nav-link text-white fs-5 fw-bolder text-white px-2 mx-2"
                  href="index.php"
                  >Home</a
                >
              </li>
              <li class="nav-item active">
                <a
                  class="nav-link fs-5 fw-bolder text-white px-2 mx-2"
                  href="#Categories"
                  >Categories</a
                >
              </li>
              <li class="nav-item active">
                <a class="nav-link fs-5 fw-bolder text-white px-2 mx-2" href="#"
                  >Contact</a
                >
              </li>
              <li class="nav-item active">
                <a class="nav-link fs-5 fw-bolder text-white px-2 mx-2" href="#"
                  >Blog</a
                >
              </li>
            </ul>
          </div>
          <!-- For Large screens -->
          <div
            class="row justify-content-center align-items-center mt-1 d-none"
            id="largeScreens"
          >
            <div class="input-group px-4 py-4">
              <input type="text" class="form-control" placeholder="Search" />
              <button
                class="btn btn-dark"
                style="width: 50px; height: 50px"
                type="submit"
              >
                <img src="images/search.png" class="w-75" />
              </button>
            </div>
          </div>
        </nav>
        <!-- For small screens -->
        <div
          class="row justify-content-center align-items-center mt-1 d-none"
          id="smallScreens"
        >
          <div class="input-group px-4 py-4">
            <input type="text" class="form-control" placeholder="Search" />
            <button
              class="btn btn-dark"
              style="width: 50px; height: 50px"
              type="submit"
            >
              <img src="images/search.png" class="w-75" />
            </button>
          </div>
        </div>
      </div>
    </div>
</body>

<!-- Script -->
<script defer>
    let smallScreens = document.getElementById("smallScreens");
    if (window.innerWidth <= 768) {
      smallScreens.classList.remove("d-none");
    } else {
      smallScreens.classList.add("d-none");
    }

    window.addEventListener("resize", function () {
      if (window.innerWidth <= 768) {
        smallScreens.classList.remove("d-none");
      } else {
        smallScreens.classList.add("d-none");
      }
    });

    let largeScreens = document.getElementById("largeScreens");
    if (window.innerWidth > 768) {
      largeScreens.classList.remove("d-none");
    } else {
      largeScreens.classList.add("d-none");
    }

    window.addEventListener("resize", function () {
      if (window.innerWidth > 768) {
        largeScreens.classList.remove("d-none");
      } else {
        largeScreens.classList.add("d-none");
      }
    });
  </script>
</html>