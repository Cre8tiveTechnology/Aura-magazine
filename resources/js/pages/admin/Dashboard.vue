<template>
  <div>
    <auth-admin>
      <template v-slot:content>
        <div class="content">
          <aura-loader v-if="misc.isLoading"></aura-loader>

          <h1>OVERVIEW</h1>
        </div>
      </template>
    </auth-admin>
  </div>
</template>

<script>
import User from "../../apis/admin/User";

export default {
  name: "Dashboard",
  mounted() {
    this.isLoadingTrue();
    User.auth()
      .then((response) => {
        this.isLoadingFalse();
        this.user = response.data;
      })
      .catch((error) => {
        console.error(error.response);
        return;
        if (error.response.status == 401) {
          this.alertError("Your session has expired, please sign in!");
          localStorage.clear();
          this.$router.push({ name: "login" });
        }
      });
  },
  data: () => ({
    user: {},
    misc: {
      isLoading: false,
    },
  }),

  methods: {
    isLoadingTrue() {
      this.misc.isLoading = true;
    },

    isLoadingFalse() {
      this.misc.isLoading = false;
    },

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
