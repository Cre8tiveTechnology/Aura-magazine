<template>
  <div>
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-0">
          <div class="img"></div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 opacity py-5 px-3">
          <h5 class="text-white">
            Our non-relenting editors are working to serve you with exclusive
            contents. Please check back in a moment...
          </h5>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "homeemptyresource",
};
</script>

<style scoped>
.img {
  background: url("/image/background/homepage.png");
  width: 100%;
  height: 25em;
}

.opacity {
  background: rgba(0, 0, 0, 0.4);
  border-radius: 1rem;
}
</style>
