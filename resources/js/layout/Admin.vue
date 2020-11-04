<template>
  <div>
    <div class="wrapper">
      <auth-sidenav></auth-sidenav>

      <div class="main-panel" style="background: #fff">
        <auth-nav :user="user"></auth-nav>

        <slot name="content"></slot>

        <auth-footer></auth-footer>
      </div>
    </div>
  </div>
</template>

<script>
import User from "../apis/User";
export default {
  name: "Admin",
  data() {
    return {
      user: {},
    };
  },
  mounted() {
    User.auth().then((response) => {
      this.user = response.data;
      // console.log(this.user.email);
    });
  },
};
</script>
