<template>
  <div>
    <div class="wrapper">
      <auth-sidenav></auth-sidenav>

      <div class="main-panel">
        <auth-nav></auth-nav>

        <slot name="content"></slot>

        <auth-footer></auth-footer>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Admin",
};
</script>
