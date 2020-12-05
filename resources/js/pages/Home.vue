<template>
    <div>
        <!-- NavBar -->
        <navbar />

        <!-- Navbar -->
        <!--===================== ADS BANNER =====================-->
        <div class="home-ads-container mt-3 mb-3 w-50 mx-auto h-100">
            <div class="container text-center">
                <p>ADS BANNER</p>
            </div>
        </div>

        <!--================ Top Stories MOBILE Card ==================-->

        <div
            class="container-fluid p-2 d-md-none d-lg-none d-xl-none d-sm-block border-0"
            style="background-color: #676465 !important"
        >
            <h5 class="font-weight-bold ml-0 mt-4 text-white">
                Top Stories
                <i class="fa fa-angle-right text-aura"></i>
            </h5>
            <home-empty-resource
                v-if="highestViews.length === 0"
            ></home-empty-resource>
            <!-- Mobile carousel -->
            <div
                id="carouselExampleSlidesOnly"
                class="carousel slide border-bottom-0"
                data-ride="carousel"
                v-else
            >
                <div class="carousel-inner">
                    <div
                        class="carousel-item "
                        v-for="courselItem in highestViews"
                        :key="courselItem.id"
                    >
                        <div class="card w-100 border-0">
                            <img
                                class="card-img-top rounded"
                                :src="courselItem.image"
                                :alt="carouselItem.title"
                            />
                            <div
                                class="card-body text-white border-right-0 text-center"
                                style="background-color: #676465 !important"
                            >
                                <h4 class="card-title" style="font-size: 30px">
                                    {{ carouselItem.title | truncate(47) }}
                                </h4>
                                <hr class="top-story-hr" />

                                <p class="card-text mt-2">
                                    {{
                                        carouselItem.description | truncate(133)
                                    }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--================ Top Stories DESKTOP Slider ==================-->
        <div
            class="container-fluid p-5 d-none d-md-block d-lg-block d-xl-block"
            style="background-color: #676465 !important"
        >
            <h5
                class="font-weight-bold mt-4 text-white"
                style="margin-left: 7.5em"
            >
                Top Stories
                <i class="fa fa-angle-right text-aura"></i>
            </h5>
            <!-- Desktop Carousel -->
            <home-empty-resource
                v-if="highestViews.length === 0"
            ></home-empty-resource>
            <div
                id="carouselExampleIndicators"
                class="carousel slide w-75 mx-auto rounded-0 border-none"
                data-ride="carousel"
                v-else
            >
                <div class="carousel-inner bg-transparent">
                    <div
                        class="carousel-item active rounded"
                        v-for="courselItem in highestViews"
                        :key="courselItem.id"
                    >
                        <div class="card w-100 border-0">
                            <img
                                class="card-img-top rounded-0"
                                :src="courselItem.image"
                                :alt="carouselItem.title"
                            />
                            <div
                                class="card-body text-white border-right-0 text-center"
                                style="background-color: #676465 !important"
                            >
                                <h4 class="card-title" style="font-size: 30px">
                                    {{ carouselItem.title | truncate(47) }}
                                </h4>
                                <hr class="top-story-hr" />

                                <p class="card-text mt-2">
                                    {{
                                        carouselItem.description | truncate(133)
                                    }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <a
                    class="carousel-control-prev"
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
                    class="carousel-control-next"
                    href="#carouselExampleIndicators"
                    role="button"
                    data-slide="next"
                >
                    <span
                        class="carousel-control-next-icon"
                        aria-hidden="true"
                    ></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <!--======================== Story cards =================-->
        <div class="container mb-5" style="margin-top: 10%">
            <home-empty-resource
                v-if="stories.length === 0"
            ></home-empty-resource>
            <div
                class="row justify-content-lg-between justify-content-md-around justify-content-sm-center justify-content-center"
                v-else
            >
                <!-- Card -->
                <div
                    class="col-12 col-sm-10 col-md-6 col-lg-3 mb-md-3 mb-sm-3"
                    v-for="story in stories"
                    :key="story.id"
                >
                    <div class="card p-3 shadow-sm">
                        <div class="inner">
                            <img
                                :src="story.image"
                                :alt="story.title"
                                class="card-img-top p-1"
                            />
                        </div>
                        <div class="card-body px-0">
                            <p class="story-card-font-1">
                                {{ story.title | truncate(173) }}
                            </p>
                            <hr class="story-card-hr" />
                            <p class="story-card-font-2">
                                {{ story.content | truncate(143) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--==================== ADS BANNER =======================-->
        <div class="home-ads-container mt-3 mb-3 w-50 mx-auto h-100">
            <div class="container text-center">
                <p>ADS BANNER</p>
            </div>
        </div>

        <!--================= +NEWS BANNER =====================-->
        <div class="container-fluid mt-5">
            <div class="container">
                <h5 class="news headline-font font-weight-bolder ml-0">
                    <span class="text-aura" style="font-size: 30px">+</span>
                    NEWS
                </h5>
                <home-empty-resource
                    v-if="Object.keys(news).length === 0"
                ></home-empty-resource>
                <div class="row no-gutters justify-content-center" v-else>
                    <div class="col-sm-7 col-md-7 col-lg-7 col-xl-7">
                        <div class="card mb-3 border-0 rounded-0">
                            <a data-fancybox="gallery" :href="newsFirst.image">
                                <img
                                    :src="newsFirst.image"
                                    :alt="newsFirst.title"
                                    class="card-img-top rounded-0"
                                />
                            </a>
                            <div class="card-body">
                                <h4
                                    class="card-title font-weight-bold"
                                    style="font-size: 30px"
                                >
                                    {{ newsFirst.title }}
                                </h4>
                                <hr class="card-hr" />

                                <div class="container mt-5 mb-5 text-center">
                                    <router-link
                                        to="/category/news"
                                        class="see-more"
                                    >
                                        <div
                                            class="col-12 row justify-content-center align-items-baseline"
                                        >
                                            <h5 class="mr-2">SEE MORE</h5>
                                            <i
                                                class="see-more-icon fa fa-chevron-circle-right"
                                            ></i>
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 px-1">
                        <ul
                            class="list-unstyled m-0"
                            v-for="newsVal in news"
                            :key="newsVal.id"
                        >
                            <li class="media mb-2">
                                <img
                                    :src="newsVal.image"
                                    class="mr-3 news-side-cards rounded-0"
                                    alt="Generic placeholder image"
                                />
                                <div class="media-body">
                                    <h5>
                                        {{ newsVal.title }}
                                    </h5>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- <div class="col-1"></div> -->
                </div>
            </div>
        </div>

        <!--==================== ADS BANNER =======================-->
        <div class="home-ads-container mt-3 mb-3 w-50 mx-auto h-100">
            <div class="container text-center">
                <p>ADS BANNER</p>
            </div>
        </div>

        <!--=============== +FASHION BANNER =====================-->
        <div
            class="container-fluid mt-5"
            style="background-color: #d8d5d5 !important"
        >
            <h5 class="news headline-font font-weight-bolder">
                <span class="text-aura" style="font-size: 30px">+</span>
                FASHION
            </h5>

            <home-empty-resource
                v-if="Object.keys(fashionNews).length === 0"
            ></home-empty-resource>
            <!-- =====================FASHION NEWS -I =============================== -->
            <div class="card mx-auto border-0" v-else>
                <a data-fancybox="gallery " :href="fashionFirst.image">
                    <img
                        :src="fashionFirst.image"
                        :alt="fashionFirst.title"
                        class="card-img-top rounded-0"
                        height="700px"
                        width="auto"
                    />
                </a>
                <div
                    class="card-body"
                    style="background-color: #d8d5d5 !important"
                >
                    <h4
                        class="card-title font-weight-bold"
                        style="font-size: 30px"
                    >
                        {{ fashionFirst.title }}
                    </h4>
                    <hr class="card-hr-fashion" />
                </div>
            </div>

            <!-- =====================FASHION NEWS BANNERS -II =============================== -->
            <div class="container">
                <div
                    class="row justify-content-lg-between justify-content-md-around justify-content-sm-center justify-content-center"
                >
                    <div
                        class="col-12 col-sm-10 col-md-6 col-lg-3 mb-md-3 mb-sm-3"
                        v-for="fashion in fashionNews"
                        :key="fashion.id"
                    >
                        <div class="card p-3 shadow-sm">
                            <a data-fancybox="gallery" :href="fashion.image">
                                <img
                                    :src="fashion.image"
                                    :alt="fashion.title"
                                    class="card-img-top rounded-0"
                                    height="200"
                                />
                            </a>

                            <div class="card-body px-0">
                                <h6 class="card-title text-left">
                                    {{ fashion.title | truncate(47) }}
                                </h6>
                                <hr class="card-hr-fashion" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5 mb-5 text-center">
                <router-link to="/category/fashion" class="see-more">
                    <div
                        class="col-12 row justify-content-center align-items-baseline"
                    >
                        <h5 class="mr-2">SEE MORE</h5>
                        <i class="see-more-icon fa fa-chevron-circle-right"></i>
                    </div>
                </router-link>
            </div>
        </div>

        <!--===================== ADS BANNER =====================-->
        <div class="home-ads-container mt-5 mb-5 w-50 mx-auto h-100">
            <div class="container text-center">
                <p>ADS BANNER</p>
            </div>
        </div>

        <!--================ +BEAUTY  BANNER =======================-->
        <div class="container-fluid mt-5">
            <h5 class="news headline-font font-weight-bolder">
                <span class="text-aura" style="font-size: 30px">+</span>
                BEAUTY
            </h5>
            <home-empty-resource
                v-if="Object.keys(beautyNews).length === 0"
            ></home-empty-resource>

            <div v-else>
                <div class="row mb-5">
                    <div
                        class="col-md-6 col-lg-6 col-xl-6 col-sm-6 col-xs-6 p-3"
                    >
                        <h4 class="font-weight-bolder pr-3">
                            {{ beautyFirst.title }}
                        </h4>
                        <hr class="card-hr-fashion" />

                        <p class="mt-2">
                            {{ beautyFirst.content | truncate(300) }}
                        </p>
                    </div>
                    <div
                        class="col-md-6 col-lg-6 col-xl-6 col-sm-6 col-xs-6 p-5 aura-bg-dark"
                    >
                        <a data-fancybox="gallery" :href="beautyFirst.image">
                            <img
                                class="card-img-top rounded-0"
                                :src="beautyFirst.image"
                                :alt="beautyFirst.title"
                            />
                        </a>
                    </div>
                </div>
                <!--================ +BEAUTY  BANNERs =======================-->
                <div class="container">
                    <div
                        class="row justify-content-lg-between justify-content-md-around justify-content-sm-center justify-content-center"
                    >
                        <div
                            class="col-12 col-sm-10 col-md-6 col-lg-3 mb-md-3 mb-sm-3"
                        >
                            <div class="card p-3 shadow-sm">
                                <img
                                    class="card-img-top rounded-0"
                                    :src="beautyFirst.image"
                                    :alt="beautyFirst.title"
                                />

                                <div class="card-body px-0">
                                    <h6 class="card-title">
                                        {{ beautyFirst.title }}
                                    </h6>
                                    <hr class="card-hr-fashion" />
                                </div>
                            </div>
                        </div>

                        <div
                            class="col-12 col-sm-10 col-md-6 col-lg-3 mb-md-3 mb-sm-3"
                            v-for="beauty in beautyNews"
                            :key="beauty.id"
                        >
                            <div class="card p-3 shadow-sm">
                                <img
                                    class="card-img-top rounded-0"
                                    :src="beauty.image"
                                    :alt="beauty.title"
                                />
                                <div class="card-body px-0">
                                    <h6 class="card-title">
                                        {{ beauty.title }}
                                    </h6>
                                    <hr class="card-hr-fashion" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mt-5 mb-5 text-center">
                    <router-link to="/category/beauty" class="see-more">
                        <div
                            class="col-12 row justify-content-center align-items-baseline"
                        >
                            <h5 class="mr-2">SEE MORE</h5>
                            <i
                                class="see-more-icon fa fa-chevron-circle-right"
                            ></i>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>

        <!--====================== ADS BANNER =======================-->
        <div class="home-ads-container mt-5 mb-5 w-50 mx-auto h-100">
            <div class="container text-center">
                <p>ADS BANNER</p>
            </div>
        </div>

        <!--=================== +CULTURE  BANNER =======================-->
        <div
            class="container-fluid mt-5 p-0"
            style="background-color: #d8d5d5 !important"
        >
            <div class="container mb-3">
                <h5 class="news headline-font font-weight-bolder">
                    <span class="text-aura" style="font-size: 30px">+</span>
                    CULTURE
                </h5>
            </div>
            <home-empty-resource
                v-if="Object.keys(cultureNews).length === 0"
            ></home-empty-resource>
            <div v-else>
                <div
                    class="row justify-content-lg-between justify-content-md-around justify-content-sm-center justify-content-center"
                >
                    <div
                        class="col-12 col-sm-10 col-md-6 col-lg-3 mb-md-3 mb-sm-3"
                        v-for="culturetopItem in cultureNews"
                        :key="culturetopItem.id"
                    >
                        <div class="card p-3 shadow-sm">
                            <img
                                class="card-img-top rounded-0"
                                :src="culturetopItem.image"
                                :alt="culturetopItem.title"
                                height="200"
                            />
                            <div class="card-body px-0">
                                <h6 class="card-title">
                                    {{ culturetopItem.title | truncate(47) }}
                                </h6>
                                <hr class="card-hr-fashion" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="culture-mid-title text-white text-center mb-3">
                    <h3 class="card-title">
                        {{ cultureFirst.title }}
                    </h3>
                    <hr class="top-story-hr" />
                    <p class="mt-5">
                        {{ cultureFirst.content | truncate(300) }}
                    </p>
                </div>

                <div class="container">
                    <div
                        class="row justify-content-lg-between justify-content-md-around justify-content-sm-center justify-content-center"
                    >
                        <div
                            class="col-12 col-sm-10 col-md-6 col-lg-3 mb-md-3 mb-sm-3"
                            v-for="culturebottomItem in cultureSecondObj"
                            :key="culturebottomItem.id"
                        >
                            <div class="card p-3 shadow-sm">
                                <img
                                    class="card-img-top rounded-0"
                                    :src="culturebottomItem.image"
                                    :alt="culturebottomItem.title"
                                    height="200"
                                />
                                <div class="card-body px-0">
                                    <h6 class="card-title">
                                        {{
                                            culturebottomItem.title
                                                | truncate(41)
                                        }}
                                    </h6>
                                    <hr class="card-hr-fashion" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-5 mb-5 text-center">
                        <router-link to="/category/news" class="see-more">
                            <div
                                class="col-12 row justify-content-center align-items-baseline"
                            >
                                <h5 class="mr-2">SEE MORE</h5>
                                <i
                                    class="see-more-icon fa fa-chevron-circle-right"
                                ></i>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>

        <!--====================== + VIDEOS =======================-->
        <!-- <div
            class="container-fluid p-3"
            style="background-color: #2a2828 !important"
        >
            <div class="container">
                <h5 class="font-weight-bold mt-4 text-white">
                    VIDEOS
                    <i class="fa fa-play text-aura"></i>
                </h5>
                <div class="card mx-auto border-0">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe
                            class="embed-responsive-item"
                            src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"
                            allowfullscreen
                        ></iframe>
                    </div>
                    <div
                        class="card-body text-center text-white"
                        style="background-color: #2a2828 !important"
                    >
                        <h4 class="card-title" style="font-size: 30px">
                            Ashley Graham Wants to Cancel Mom-Shaming
                        </h4>
                        <hr class="card-hr mx-auto" />
                        <div class="container mt-5 mb-5 text-center">
                            <router-link to="/category/videos" class="see-more">
                                <div
                                    class="col-12 row justify-content-center align-items-baseline"
                                >
                                    <h5 class="mr-2">SEE MORE</h5>
                                    <i
                                        class="see-more-icon fa fa-chevron-circle-right"
                                    ></i>
                                </div>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!--====================== ADS BANNER =======================-->
        <div class="home-ads-container mt-5 mb-5 w-50 mx-auto h-100">
            <div class="container text-center">
                <p>ADS BANNER</p>
            </div>
        </div>

        <!--================ MAGAZINE BANNER =======================-->
        <div class="container-fluid mt-5">
            <div class="container mx-auto">
                <div class="row mb-5">
                    <div
                        class="col-md-6 col-lg-6 col-xl-6 col-sm-6 col-xs-6 p-3 aura-cards-shadow"
                    >
                        <img
                            class="card-img-top rounded-0"
                            src="/image/home/magazine.png"
                            alt="Card image cap"
                        />
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6 col-xs-6">
                        <h5 class="sp-mt-6">
                            Susan Garland Stars On The Cover Of The July Issue
                            Of Aura Magazine
                        </h5>
                        <hr class="magazine-hr" />
                        <h5>Edited by AKHIGBE IVERSON</h5>
                        <h5>Cover model SUSAN GARLAND</h5>
                        <h5>Photography by AREMU IFEOLUWA JOSHUA</h5>
                        <hr class="magazine-hr" />

                        <div
                            class="row justify-content-lg-between justify-content-md-around justify-content-sm-center justify-content-center"
                        >
                            <div
                                class="col-md-6 col-lg-6 col-xl-6 col-sm-6 col-xs-6 mb-4"
                            >
                                <button class="btn btn-aura text-white">
                                    Order Print Copy
                                </button>
                            </div>
                            <div
                                class="col-md-6 col-lg-6 col-xl-6 col-sm-6 col-xs-6"
                            >
                                <button class="btn btn-aura text-white">
                                    Get digital edition
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--================ +LIFE AND LOVE  BANNER =======================-->
        <div class="container-fluid mt-5">
            <div class="container">
                <h5 class="news headline-font font-weight-bolder">
                    <span class="text-aura" style="font-size: 30px">+</span>
                    LIFE & LOVE
                </h5>
                <home-empty-resource
                    v-if="Object.keys(lifenLoveNews).length === 0"
                ></home-empty-resource>
                <div v-else>
                    <div class="row mb-5">
                        <div
                            class="col-md-6 col-lg-6 col-xl-6 col-sm-6 col-xs-6 p-3"
                        >
                            <h4 class="font-weight-bolder pr-3">
                                {{ lifenLoveFirst.title }}
                            </h4>
                            <hr class="card-hr-fashion" />

                            <p class="mt-2">
                                {{ lifenLoveFirst.content | truncate(300) }}
                            </p>
                        </div>
                        <div
                            class="col-md-6 col-lg-6 col-xl-6 col-sm-6 col-xs-6 p-5 aura-bg-dark"
                        >
                            <img
                                class="card-img-top rounded-0"
                                :src="lifenLoveFirst.image"
                                :alt="lifenLoveFirst.title"
                            />
                        </div>
                    </div>
                    <!--================ + Life and Love  BANNERs =======================-->

                    <div
                        class="row justify-content-lg-between justify-content-md-around justify-content-sm-center justify-content-center"
                    >
                        <div
                            class="col-12 col-sm-10 col-md-6 col-lg-3 mb-md-3 mb-sm-3"
                            v-for="lifenLoveItem in lifenLoveNews"
                            :key="lifenLoveItem.id"
                        >
                            <div class="card p-3 shadow-sm">
                                <img
                                    class="card-img-top rounded-0"
                                    :src="lifenLoveItem.image"
                                    :alt="lifenLoveItem.title"
                                    height="200"
                                />
                                <div class="card-body px-0">
                                    <h6 class="card-title">
                                        {{ lifenLoveItem.title }}
                                    </h6>
                                    <hr class="card-hr-fashion" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-5 mb-5 text-center">
                        <router-link to="/category/beauty" class="see-more">
                            <div
                                class="col-12 row justify-content-center align-items-baseline"
                            >
                                <h5 class="mr-2">SEE MORE</h5>
                                <i
                                    class="see-more-icon fa fa-chevron-circle-right"
                                ></i>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>

        <!--=================== +HOROSCOPE  BANNER =======================-->
        <div
            class="container-fluid mt-5 p-0"
            style="background-color: #d8d5d5 !important"
        >
            <div class="container mb-3">
                <h5 class="news headline-font font-weight-bolder">
                    <span class="text-aura" style="font-size: 30px">+</span>
                    HOROSCOPE
                </h5>
                <home-empty-resource
                    v-if="Object.keys(horoscope).length === 0"
                ></home-empty-resource>

                <div v-else>
                    <div
                        class="row justify-content-lg-between justify-content-md-around justify-content-sm-center justify-content-center"
                    >
                        <div
                            class="col-12 col-sm-10 col-md-6 col-lg-3 mb-md-3 mb-sm-3"
                            v-for="horoscopeItem in horoscope"
                            :key="horoscopeItem.id"
                        >
                            <div class="card p-3 shadow-sm">
                                <img
                                    class="card-img-top rounded-0"
                                    :src="horoscopeItem.image"
                                    :alt="horoscopeItem.title"
                                    height="200"
                                />
                                <div class="card-body px-0">
                                    <h6 class="card-title">
                                        {{ horoscopeItem.title | truncate(47) }}
                                    </h6>
                                    <hr class="card-hr-fashion" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container mt-5 mb-5 text-center">
                        <router-link to="/category/videos" class="see-more">
                            <div
                                class="col-12 row justify-content-center align-items-baseline"
                            >
                                <h5 class="mr-2">SEE MORE</h5>
                                <i
                                    class="see-more-icon fa fa-chevron-circle-right"
                                ></i>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <user-footer />
        <!-- Footer -->
    </div>
</template>

<script>
import Article from "../apis/client/Article";

export default {
    name: "Home",
    data: () => ({
        articles: {},
        news: {},
        fashionNews: {},
        cultureNews: {},
        beautyNews: {},
        horoscope: {},
        lifenLoveNews: {},
        //First Items
        fashionFirst: {},
        newsFirst: {},
        beautyFirst: {},
        cultureFirst: {},
        cultureSecondObj: {},
        lifenLoveFirst: {},
        stories: {},
        highestViews: {}
    }),
    mounted() {
        this.getArticles();
        console.log(Object.keys(this.news).length);
    },
    methods: {
        /* -------------------------------------------------------------------------- */
        /*                               Get Articles                                */
        /* -------------------------------------------------------------------------- */
        getArticles() {
            Article.listAllArticles()
                .then(response => {
                    this.articles = response.data;
                })
                .catch(err => {
                    let message = err.response.data.message;
                    console.log(message);
                });
        }
    },

    computed: {},

    watch: {
        articles: function(list) {
            /* -------------------------------------------------------------------------- */
            /*                                   //News                                   */
            /* -------------------------------------------------------------------------- */
            this.news = list
                .filter(function(article) {
                    return article.category == "News";
                })
                .slice(0, 8)
                .sort();
            //Get the first Item for News
            this.newsFirst = this.news[0];
            this.news.shift();

            /* -------------------------------------------------------------------------- */
            /*                                  //Fashion                                 */
            /* -------------------------------------------------------------------------- */
            this.fashionNews = list
                .filter(function(article) {
                    return article.category == "Fashion";
                })
                .slice(0, 5)
                .reverse();

            //Get the first Item for Fashion
            this.fashionFirst = this.fashionNews[0];
            this.fashionNews.shift();

            /* -------------------------------------------------------------------------- */
            /*                             //Beauty       */
            /* -------------------------------------------------------------------------- */
            this.beautyNews = list
                .filter(function(article) {
                    return article.category == "Beauty";
                })
                .slice(0, 5)
                .reverse();

            //Get the first Item for Fashion
            this.beautyFirst = this.beautyNews[0];
            this.beautyNews.shift();

            /* -------------------------------------------------------------------------- */
            /*                            //Culture                                       */
            /* -------------------------------------------------------------------------- */
            this.cultureNews = list
                .filter(function(article) {
                    return article.category == "Culture";
                })
                .slice(0, 5)
                .reverse();
            //Get the first Item for Fashion
            this.cultureFirst = this.cultureNews[0];
            this.cultureNews.shift();
            this.cultureSecondObj = list
                .filter(function(article) {
                    return article.category == "Culture";
                })
                .slice(5, 9)
                .reverse();

            /* -------------------------------------------------------------------------- */
            /*                                //Life &Love                                 */
            /* -------------------------------------------------------------------------- */
            this.lifenLoveNews = list
                .filter(function(article) {
                    return article.category == "Life and Love";
                })
                .slice(0, 5)
                .reverse();
            //Get the first Item for Fashion
            this.lifenLoveFirst = this.lifenLoveNews[0];
            this.lifenLoveNews.shift();

            /* -------------------------------------------------------------------------- */
            /*                                //Horoscope                                 */
            /* -------------------------------------------------------------------------- */
            this.horoscope = list
                .filter(function(article) {
                    return article.category == "Horoscope";
                })
                .slice(0, 4)
                .reverse();

            /* -------------------------------------------------------------------------- */
            /*                               //Highest Views                              */
            /* -------------------------------------------------------------------------- */

            this.highestViews = list
                .filter(function(article) {
                    return article.views > 20;
                })
                .slice(0, 4)
                .reverse();

            this.stories = list
                .filter(function(article) {
                    return article.view > 100;
                })
                .slice(0, 4)
                .reverse();
        }
    }
};
</script>
