<?php include'library.php' ?>


<style>
   
    .navbar-nav {
        margin-left: auto;
        padding: 0px 20px 0px 20px;
    }

    .nav-link {
        font-size: 18px;
        font-weight: bolder;
        color: white;
        padding: 0px 5px 0px 5px;
        margin: 0px 5px 0px 5px;
    }

    #logo-img {
        max-height: 70px;
    }
</style>



<div id="header">
    <!-- navbar start here-->
    <div class="container-fluid"> 
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <a class="navbar-brand" href="#"><img id="logo-img" class="img-fluid" src="images/Logo.jpg" alt="Brand-Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link text-white " href="#">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                </ul>
            </div>
        </nav>

    </div>
</div>