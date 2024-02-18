<?php include'head.php'?>



<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div id="carouselExampleIndicators" class="carousel slide h-vh m-3" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class=" img-fluid h-vh " src="images/roman-kraft-_Zua2hyvTBk-unsplash.jpg"
                            alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class=" img-fluid h-vh" src="images/markus-winkler-aId-xYRTlEc-unsplash.jpg"
                            alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class=" img-fluid h-vh" src="images/ian-schneider-TamMbr4okv4-unsplash.jpg"
                            alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <form action="#" method="GET" class="bg-light border border-light m-3">
                
                    <div class="row justify-content-center align-items-center text-center mt-3">
                        <h5>Search</h5>
                    </div>
                    <div class="row justify-content-center align-items-center mt-1">
                        <div class="input-group px-4 py-4">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <input class="btn btn-outline-primary" type="submit" value="search">
                            </div>
                        </div>
                    </div>
                
            </form>
            <hr>

            <div class="container bg-light border border-outline-secondary">
                <div class="row justify-content-center align-items-center text-center mt-3">
                    <h5>Recent Posts</h5>
                </div>
                <div class="row mt-3">
                    <div class="col-md-5">
                        <img src="images/post-format.jpg" class="img-fluid" alt="post-thumbnail">
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <p class="small m-0">Lorem ipsum dolor sit amet.</p>
                            <span class="fa fa-calendar small">
                                01 Nov, 2019
                            </span>
                        </div>
                        <div class="row justify-content-start mt-1">
                            <button class="btn btn-secondary btn-sm w-auto">Readmore</button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mt-3">
                    <div class="col-md-5">
                        <img src="images/post-format.jpg" class="img-fluid" alt="post-thumbnail">
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <p class="small m-0">Lorem ipsum dolor sit amet.</p>
                            <span class="fa fa-calendar small">
                                01 Nov, 2019
                            </span>
                        </div>
                        <div class="row justify-content-start mt-1">
                            <button class="btn btn-secondary btn-sm w-auto">Readmore</button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mt-3 mb-3">
                    <div class="col-md-5">
                        <img src="images/post-format.jpg" class="img-fluid" alt="post-thumbnail">
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <p class="small m-0">Lorem ipsum dolor sit amet.</p>
                            <span class="fa fa-calendar small">
                                01 Nov, 2019
                            </span>
                        </div>
                        <div class="row justify-content-start mt-1">
                            <button class="btn btn-secondary btn-sm w-auto">Readmore</button>
                        </div>
                    </div>
                </div>
               
            </div>

        </div>
    </div>
</div>