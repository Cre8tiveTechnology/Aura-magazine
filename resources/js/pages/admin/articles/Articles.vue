<template>
  <div>
    <auth-admin>
      <template v-slot:content>
        <div class="content">
          <h1>ARTICLES</h1>

          {{ articles }}

          <router-link to="/article/create"
            >Create New <i class="fa fa-plus"></i
          ></router-link>
        </div>
      </template>
    </auth-admin>
  </div>
</template>

<script>
import Article from "../../../apis/admin/Article";
export default {
  name: "Articles",
  data: () => ({
    articles: [],
  }),
  mounted() {
    Article.listArticles()
      .then((response) => {
        this.articles = response.data;
      })
      .catch((err) => {
        let message = err.response.data.message;
        this.alertError(message);
      });
  },
  methods: {
    alertError(message) {
      Vue.$toast.open({
        message: message,
        type: "error",
        position: "top-right",
      });
    },

    alertWarning(message) {
      Vue.$toast.open({
        message: message,
        type: "warning",
        position: "top-right",
      });
    },

    alertSuccess(message) {
      Vue.$toast.open({
        message: message,
        type: "success",
        position: "top-right",
      });
    },
  },
};
</script>
