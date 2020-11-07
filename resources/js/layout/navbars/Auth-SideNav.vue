<template>
  <div>
    <div class="sidebar" data-color="black" data-active-color="danger">
      <div class="logo">
        <router-link to="/dashboard" class="simple-text logo-normal">
          <p>AURA</p></router-link
        >
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="">
            <router-link to="/overview">
              <i class="nc-icon nc-bank"></i>
              <p>Overview</p></router-link
            >
          </li>

          <li class="">
            <router-link to="/articles">
              <i class="nc-icon nc-diamond"></i>
              <p>Articles</p></router-link
            >
          </li>
          <li class="">
            <router-link to="/users">
              <i class="nc-icon nc-pin-3"></i>
              <p>Users</p></router-link
            >
          </li>
          <li class="">
            <router-link to="/roles">
              <i class="nc-icon nc-bell-55"></i>
              <p>Roles</p></router-link
            >
          </li>
          <li class="">
            <router-link to="/magazine">
              <i class="nc-icon nc-tile-56"></i>
              <p>Magazine</p></router-link
            >
          </li>
          <li class="">
            <router-link to="/video">
              <i class="nc-icon nc-caps-small"></i>
              <p>Video</p></router-link
            >
          </li>
          <li class="">
            <router-link to="/invoice">
              <i class="nc-icon nc-caps-small"></i>
              <p>Invoice</p></router-link
            >
          </li>
          <li class="">
            <router-link to="/adverts">
              <i class="nc-icon nc-caps-small"></i>
              <p>Advertisement</p></router-link
            >
          </li>
          <li class="">
            <router-link to="/orders">
              <i class="nc-icon nc-caps-small"></i>
              <p>Orders</p></router-link
            >
          </li>
          <li class="">
            <router-link to="/calendar">
              <i class="nc-icon nc-caps-small"></i>
              <p>Calendar</p></router-link
            >
          </li>
          <li class="">
            <router-link to="/files">
              <i class="nc-icon nc-caps-small"></i>
              <p>Files</p></router-link
            >
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Auth-SideNav",
};
</script>
