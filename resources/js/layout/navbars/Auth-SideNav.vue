<template>
  <div>
    <div class="sidebar" data-color="dark" data-active-color="danger">
      <div class="logo">
        <a href="/" class="simple-text logo-normal"> AURA </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="">
            <a href="/">
              <i class="nc-icon nc-bank"></i>
              <p>Overview</p>
            </a>
          </li>

          <li class="">
            <router-link to="/article">
              <i class="nc-icon nc-diamond"></i>
              <p>Articles</p></router-link
            >
          </li>
          <li class="">
            <a href="">
              <i class="nc-icon nc-pin-3"></i>
              <p>Users</p>
            </a>
          </li>
          <li class="">
            <a href="">
              <i class="nc-icon nc-bell-55"></i>
              <p>Roles</p>
            </a>
          </li>
          <li class="">
            <a href="">
              <i class="nc-icon nc-tile-56"></i>
              <p>Magazine</p>
            </a>
          </li>
          <li class="">
            <a href="">
              <i class="nc-icon nc-caps-small"></i>
              <p>Video</p>
            </a>
          </li>
          <li class="">
            <a href="">
              <i class="nc-icon nc-caps-small"></i>
              <p>Invoice</p>
            </a>
          </li>
          <li class="">
            <a href="">
              <i class="nc-icon nc-caps-small"></i>
              <p>Advertisement</p>
            </a>
          </li>
          <li class="">
            <a href="">
              <i class="nc-icon nc-caps-small"></i>
              <p>Orders</p>
            </a>
          </li>
          <li class="">
            <a href="">
              <i class="nc-icon nc-caps-small"></i>
              <p>Calendar</p>
            </a>
          </li>
          <li class="">
            <a href="">
              <i class="nc-icon nc-caps-small"></i>
              <p>Files</p>
            </a>
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
