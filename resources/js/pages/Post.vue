<template>
  <div>
    <!-- NavBar -->
    <navbar :current="links[article.category]" />
    <!-- Navbar -->

    <!-- Portrait -->
    <div class="container rounded-0" v-if="isProtrait">
      <div
        class="row justify-content-between justify-content-sm-center align-items-center"
      >
        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
          <a data-fancybox="gallery" :href="article.image">
            <img
              :src="article.image"
              :alt="article.title"
              class="col-12 p-0 img-fluid"
            />
          </a>
        </div>
        <div
          class="col-12 col-lg-6 col-md-6 col-sm-12 text-center p-lg-4 p-md-3 p-2"
        >
          <h1>{{ article.title }}</h1>
          <hr class="story-card-hr mx-auto" />
          <router-link
            :to="{
              name: 'authorArticles',
              params: {
                id: article.user_id,
                name: article.user_name,
              },
            }"
            class="aura-post-title"
          >
            <i class="mt-4 fa fa-user"></i> {{ article.user_name }}
          </router-link>

          <p class="mt-4 post-intro">
            {{ article.description | truncate(150) }}
          </p>
          <div class="mt-4 row p-3 justify-content-center">
            <a href="#" class="aura-post-social-icon mx-2">
              <i class="fa fa-facebook p-2" aria-hidden="true"></i>
            </a>
            <a href="#" class="aura-post-social-icon mx-2">
              <i class="fa fa-twitter p-2" aria-hidden="true"></i>
            </a>
            <a href="#" class="aura-post-social-icon mx-2">
              <i class="fa fa-instagram p-2" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- LandScape -->
    <div class="container-fluid p-0" v-else>
      <div class="card bg-dark text-white rounded-0">
        <a data-fancybox="gallery" :href="article.image">
          <img
            :src="article.image"
            :alt="article.title"
            height="550"
            class="card-img"
          />
        </a>
        <div
          class="card-img-overlay col-lg-8 col-sm-12 col-12"
          style="top: 40%"
        >
          <div style="background: rgba(0, 0, 0, 0.7)" class="p-4">
            <h1 class="card-title">{{ article.title }}</h1>
            <router-link
              :to="{
                name: 'authorArticles',
                params: {
                  id: article.user_id,
                  name: article.user_name,
                },
              }"
              class="aura-post-title"
            >
              <i class="mt-4 fa fa-user"></i> {{ article.user_name }}
            </router-link>
          </div>
        </div>
      </div>
      <div class="container text-center">
        <p class="mt-4 post-intro">
          {{ article.description | truncate(150) }}
        </p>
        <div class="mt-4 row p-3 justify-content-center">
          <a href="#" class="aura-post-social-icon mx-2">
            <i class="fa fa-facebook p-2" aria-hidden="true"></i>
          </a>
          <a href="#" class="aura-post-social-icon mx-2">
            <i class="fa fa-twitter p-2" aria-hidden="true"></i>
          </a>
          <a href="#" class="aura-post-social-icon mx-2">
            <i class="fa fa-instagram p-2" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- Body -->
    <div class="container sp-mt-7">
      <p v-html="article.content"></p>
    </div>

    <!--===================== ADS BANNER =====================-->
    <div class="home-ads-container mt-5 w-50 mx-auto h-100">
      <div class="container text-center">
        <p>ADS BANNER</p>
      </div>
    </div>
    <!--===================== ADS BANNER =====================-->

    <!-- IMAGES -->
    <div class="container sp-mt-7" v-show="this.images.length > 0">
      <h5 class="news headline-font font-weight-bolder ml-0 mt-4">
        <span class="text-aura" style="font-size: 30px">+</span> MEDIA CORNER
      </h5>
      <div class="row justify-content-between">
        <div
          class="col-lg-3 col-md-5 col-sm-12 col-12 mt-4 p-3"
          v-for="(post, index) in images"
          :key="post"
        >
          <img :src="post" class="col-12 p-0 img-fluid" alt="News Cover" />
          <span>{{ ++index }}/{{ imagesLenght }}</span>
        </div>
      </div>
    </div>

    <!-- RECOMMENDATIONS -->
    <div class="container sp-mt-8">
      <h5 class="news headline-font font-weight-bolder ml-0">
        <span class="text-aura" style="font-size: 30px">+</span> AURA RECOMMENDS
      </h5>
      <div
        class="mt-2 row justify-content-lg-between justify-content-md-center justify-content-sm-center"
      >
        <div
          class="col-lg-6 col-md-8 col-sm-12 col-12 mt-4"
          v-for="r in filteredRecommendations"
          :key="r.title"
        >
          <div class="card">
            <div class="row no-gutters">
              <div class="col-md-5 p-0">
                <a data-fancybox="gallery" :href="r.image">
                  <img
                    :src="r.image"
                    :alt="r.title"
                    class="card-img rounded-0"
                  />
                </a>
              </div>
              <div class="col-md-7">
                <div class="card-body justify-content-end">
                  <h5 class="card-title recom-link" @click="navigate(r)">
                    {{ r.title }}
                  </h5>
                  <span class="card-title">
                    <router-link
                      :to="{
                        name: 'authorArticles',
                        params: {
                          id: r.user_id,
                          name: r.user_name,
                        },
                      }"
                      class="aura-post-title"
                    >
                      <i class="mt-4 fa fa-user"></i> {{ r.user_name }}
                    </router-link>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- RECOMMENDATIONS STOP -->

    <!-- Footer -->
    <user-footer />
    <!-- Footer -->
  </div>
</template>

<script>
import Article from "../apis/client/Article";

export default {
  name: "Post",
  props: {
    title: String,
    id: String,
  },
  computed: {
    imagesLenght() {
      return this.images.length;
    },

    filteredRecommendations() {
      let newrecommendations = this.recommendations.filter((r) => {
        return r.title !== this.article.title;
      });

      return newrecommendations;
    },

    isProtrait() {
      if (this.article.image_orientation == "Landscape") {
        return false;
      } else {
        return true;
      }
    },
  },
  mounted() {
    //Google analytics
    let articleUrl = this.$route.fullPath;
    this.$ga.page(articleUrl);
    this.getArticle();
    //Updates the views count after 10secs
    setTimeout(this.updateViewsCount, 10000);
    // Extract All Images from the HTML String
    setTimeout(this.getImages, 8000);
  },
  watch: {
    $route() {
      this.getArticle();
    },
  },
  methods: {
    getImages() {
      let imgRex = /<img.*?src="(.*?)"[^>]+>/g;
      let img;
      while ((img = imgRex.exec(this.article.content))) {
        this.images.push(img[1]);
      }
    },
    scrollToTop() {
      window.scrollTo(0, 0);
    },
    navigate(r) {
      this.$router.push({
        name: "post",
        params: { id: r.id, title: r.slug },
      });
    },
    getArticle(article) {
      article = this.id;
      Article.getArticle(article)
        .then((response) => {
          this.article = response.data.article;
          this.recommendations = response.data.recommendations;
        })
        .catch((err) => {
          let message = err.response.data.message;
          console.log(message);
        });
      this.scrollToTop();
    },

    updateViewsCount() {
      let article = {
        id: this.id,
      };
      Article.updateViewsCount(article)
        .then((response) => {
          console.info(response.data);
        })
        .catch((error) => {
          console.error(error.data);
        });
    },
  },
  data() {
    return {
      article: {},
      images: [],
      hasImages: false,
      recommendations: [],
      links: {
        Culture: "CULTURE",
        Beauty: "BEAUTY",
        "Ask Ruby": "ASKRUBY",
        Fashion: "FASHION",
        "Sex and Relationship": "SEX/RELATIONSHIP",
        News: "NEWS",
      },
    };
  },
};
</script>

<style scoped>
.recom-link {
  cursor: pointer;
  transition: 0.4s all;
  transition-timing-function: ease-in-out;
}

.recom-link:hover {
  transform: scale(1.05);
}
</style>
