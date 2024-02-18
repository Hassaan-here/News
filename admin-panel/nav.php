<?php include'library.php';
include"config.php";

session_start();

if (!isset($_SESSION['username'])) {
    header("Location:{$hostName}/admin-panel/");
}
?>


<style>
   
    .navbar-nav {
        margin-left: auto;
        margin-right: auto;
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
        max-height: 60px;
    }
    .log-out{
       float: right;
    }
</style>



<div id="header">
    <!-- navbar start here-->
    <div class="container-fluid"> 
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <a class="navbar-brand" href="#"><img id="logo-img" class="img-fluid" src="image/Logo.jpg" alt="Brand-Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link " href="post.php">POST</a>
                    </li>
                    <?php
                    if ( $_SESSION['user_role'] == '1' ) {    
                    ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="category.php">CATEGORY</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="user.php">USERS</a>
                    </li>
                    <?php } ?>
                </ul>
                 <div>
            <ul class="navbar-nav">
                 <li class="nav-item active">
                        <a class="nav-link log-out" href="logout.php">LOG OUT</a>
            </li>
            </ul>
           </div>
            </div>
        </nav>

    </div>
</div>

