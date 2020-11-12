<template>
  <div>
    <!-- NavBar -->
    <navbar />
    <!-- Navbar -->

    <empty-resource v-if="articles.data.length === 0"></empty-resource>

    <div v-else>
      <!-- TOP ARTICLE -->
      <div class="mt-1">
        <div class="container mt-5">
          <div class="row">
            <div
              class="col-12 col-lg-8 col-md-8 col-sm-12 order-sm-last order-md-first"
            >
              <a data-fancybox="gallery" :href="articles.data[0].image">
                <img
                  :src="articles.data[0].image"
                  :alt="articles.data[0].title"
                  class="w-100 img-fluid"
                />
              </a>
            </div>
            <div
              class="p-4 col-12 col-lg-4 col-md-4 col-sm-12 order-sm-first order-md-last"
            >
              <div class="home-ads-container h-100">
                <div class="text-center">
                  <p>ADS BANNER</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container mt-3">
          <span class="news-date font-weight-bold">{{
            articles.data[0].created_at | formatDate
          }}</span>
          <h3 class="mt-2">
            <router-link
              :to="{
                name: 'post',
                params: {
                  id: articles.data[0].id,
                  title: articles.data[0].slug,
                },
              }"
              class="aura-post-title"
            >
              {{ articles.data[0].title }}
            </router-link>
          </h3>
          <p class="mt-3">
            {{ articles.data[0].description | truncate(100) }}
          </p>
          <span>
            <i class="fa fa-user"></i>
            {{ articles.data[0].user_name }}
          </span>
        </div>
      </div>
      <!-- TOP ARTICLE -->

      <!-- SINGLE ARTICLE -->
      <div
        class="container mt-5"
        v-for="(article, index) in articles.data"
        :key="article.id"
      >
        <div class="row" v-if="index > 0">
          <div
            class="col-lg-6 col-md-6 col-sm-12 col-12 order-first order-lg-last"
          >
            <a data-fancybox="gallery" :href="article.image">
              <img
                :src="article.image"
                :alt="article.title"
                class="w-100 img-fluid"
              />
            </a>
          </div>
          <div
            class="mt-0 col-lg-6 col-md-6 col-sm-12 col-12 order-last order-lg-first"
          >
            <div class="border-top border-dark pt-2">
              <span class="news-date font-weight-bold">{{
                article.created_at | formatDate
              }}</span>
              <h4 class="mt-4">
                <router-link
                  :to="{
                    name: 'post',
                    params: {
                      id: article.id,
                      title: article.slug,
                    },
                  }"
                  class="aura-post-title"
                >
                  {{ article.title }}
                </router-link>
              </h4>
              <p class="mt-3">
                {{ article.description | truncate(100) }}
              </p>
              <span>
                <i class="fa fa-user"></i>
                {{ article.user_name }}
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- SINGLE ARTICLE -->

      <!-- ===== Pagination ====== -->
      <div class="container d-flex mt-5">
        <pagination
          class="btn-aura"
          :data="articles"
          @pagination-change-page="getArticles"
        >
          <span slot="prev-nav">Previous </span>
          <span slot="next-nav">Next</span>
        </pagination>
      </div>

      <!-- Footer -->
      <user-footer />
      <!-- Footer -->
    </div>
  </div>
</template>

<script>
import Article from "../apis/client/Article";

export default {
  name: "Post",
  props: {
    name: String,
    id: String,
  },

  mounted() {
    //Google analytics
    let authorArticleUrl = this.$route.fullPath;
    this.$ga.page(authorArticleUrl);
    this.getArticles();
  },

  methods: {
    getArticles(page, user) {
      user = this.id;
      if (typeof page === "undefined") {
        page = 1;
      }
      Article.getAuthorArticles(page, user)
        .then((response) => {
          this.articles = response.data;
        })
        .catch((err) => {
          let message = err.response.data.message;
          console.log(message);
        });
    },
  },
  data() {
    return {
      articles: {},
    };
  },
};
</script>

<style scoped>
</style>
