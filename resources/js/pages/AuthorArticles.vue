<template>
  <div>
    <!-- NavBar -->
    <navbar :current="links[article.category]" />
    <!-- Navbar -->
    {{ name }}
    {{ id }}
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
    name: String,
    id: String,
  },

  mounted() {
    //Google analytics
    let authorarticleUrl = this.$route.fullPath;
    this.$ga.page(authorarticleUrl);
    this.getArticle();
  },
  watch: {
    $route() {
      this.getArticle();
    },
  },
  methods: {
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
      hasImages: false,
      post: {
        images: [
          "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
        ],
      },
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
