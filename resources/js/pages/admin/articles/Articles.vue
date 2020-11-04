<template>
  <div>
    <auth-admin>
      <template v-slot:content>
        <div class="content">
          <h1>ARTICLES</h1>

          <router-link to="/article/create"
            >Create New <i class="fa fa-plus"></i
          ></router-link>
        </div>
      </template>
    </auth-admin>
  </div>
</template>

<script>
export default {
  name: "Articles",
};
</script>
