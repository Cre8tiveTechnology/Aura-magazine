<template>
    <!--=========== ADS BANNER =====================-->
    <div>
        <div class="home-ads-container  mt-3 mb-3 w-50 mx-auto h-100">
            <div class="container text-center">
                <p>ADS BANNER</p>
            </div>
        </div>

        <!--========== Top Stories Slider =============-->
        <div
            class="container-fluid bg-dark p-5"
            style="background-color:#676465 !important;"
        >
            <h5 class="top-stories text-white">Top Stories >></h5>
            <div
                id="carouselExampleIndicators"
                class="carousel slide w-75 mx-auto rounded"
                data-ride="carousel"
            >
                <ol class="carousel-indicators">
                    <li
                        data-target="#carouselExampleIndicators"
                        data-slide-to="0"
                        class="active"
                    ></li>
                    <li
                        data-target="#carouselExampleIndicators"
                        data-slide-to="1"
                    ></li>
                    <li
                        data-target="#carouselExampleIndicators"
                        data-slide-to="2"
                    ></li>
                </ol>
                <div class="carousel-inner rounded">
                    <div class="carousel-item active">
                        <img
                            class="d-block w-100"
                            src="https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80"
                            alt="First slide"
                        />
                    </div>
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="headline-font">Lorem Ipsum</h5>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Pariatur asperiores sunt rerum, quidem
                            accusantium deserunt? Itaque, sint! Cumque, amet
                            corporis voluptates earum odio nam perspiciatis aut
                            distinctio itaque ut illo?
                        </p>
                    </div>
                    <div class="carousel-item">
                        <img
                            class="d-block w-100"
                            src="https://images.unsplash.com/photo-1496747611176-843222e1e57c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80"
                            alt="Second slide"
                        />
                    </div>
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="headline-font">Lorem Ipsum</h5>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Pariatur asperiores sunt rerum, quidem
                            accusantium deserunt? Itaque, sint! Cumque, amet
                            corporis voluptates earum odio nam perspiciatis aut
                            distinctio itaque ut illo?
                        </p>
                    </div>
                </div>
                <a
                    class="carousel-control-prev text-aura"
                    href="#carouselExampleIndicators"
                    role="button"
                    data-slide="prev"
                >
                    <span
                        class="carousel-control-prev-icon"
                        aria-hidden="true"
                    ></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a
                    class="carousel-control-next text-aura"
                    href="#carouselExampleIndicators"
                    role="button"
                    data-slide="next"
                >
                    <span
                        class="carousel-control-next-ico"
                        aria-hidden="true"
                    ></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <!--======================== Story cards =================-->
        <div class="container mt-4">
            <div class="card-deck">
                <!-- ===========CARD ONE============== -->
                <div class="card aura-shadow " style="width: 18rem;">
                    <img
                        class="card-img-top"
                        src="https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80"
                        alt="Card image cap"
                    />
                    <div class="card-body">
                        <p class="card-text">
                            Some quick example text to build on the card title
                            and make up the bulk of the card's content.
                        </p>
                        <hr class="card-hr" />
                        <h5 class="card-title headline-font">
                            Some quick example text to build on the card title
                            and make up the bulk of the card's content.
                        </h5>
                    </div>
                </div>

                <!-- ===========CARD TWO============== -->
                <div class="card aura-shadow border-none" style="width: 18rem;">
                    <img
                        class="card-img-top"
                        src="https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80"
                        alt="Card image cap"
                    />
                    <div class="card-body">
                        <p class="card-text">
                            Some quick example text to build on the card title
                            and make up the bulk of the card's content.
                        </p>
                        <hr class="card-hr" />
                        <h5 class="card-title headline-font">
                            Some quick example text to build on the card title
                            and make up the bulk of the card's content.
                        </h5>
                    </div>
                </div>

                <!-- ===========CARD THREE============== -->
                <div class="card aura-shadow border-none" style="width: 18rem;">
                    <img
                        class="card-img-top"
                        src="https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80"
                        alt="Card image cap"
                    />
                    <div class="card-body">
                        <p class="card-text">
                            Some quick example text to build on the card title
                            and make up the bulk of the card's content.
                        </p>
                        <hr class="card-hr" />
                        <h5 class="card-title headline-font">
                            Some quick example text to build on the card title
                            and make up the bulk of the card's content.
                        </h5>
                    </div>
                </div>
                <!-- ===========CARD FOUR============== -->
                <div class="card aura-shadow border-none" style="width: 18rem;">
                    <img
                        class="card-img-top"
                        src="https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80"
                        alt="Card image cap"
                    />
                    <div class="card-body">
                        <p class="card-text">
                            Some quick example text to build on the card title
                            and make up the bulk of the card's content.
                        </p>
                        <hr class="card-hr" />
                        <h5 class="card-title headline-font">
                            Some quick example text to build on the card title
                            and make up the bulk of the card's content.
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <!--=========== ADS BANNER =====================-->
        <div class="home-ads-container  mt-3 mb-3 w-50 mx-auto h-100">
            <div class="container text-center">
                <p>ADS BANNER</p>
            </div>
        </div>
    </div>
</template>
