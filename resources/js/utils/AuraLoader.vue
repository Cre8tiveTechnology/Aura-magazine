<template>
  <!-- <div class="body">
        <div class="bottom-container txt">AURA</div>

        <div class="top-container txt">AURA</div>
    </div> -->
  <div class="body container">
    <div class="row justify-content-center" id="loader">
      <img src="/image/aura-loader.png" class="img-fluid" alt="Aura-Loader" />
    </div>
  </div>
</template>

<script>
export default {
  name: "AuraLoader",
};
</script>

<style scoped>
#loader {
  margin-top: 20em;
}

.body {
  height: 100vh;
  font-family: "Nunito", "sans-serif";
}

.bottom-container,
.top-container {
  width: 40vw;
  height: 35vh;
  display: flex;
  justify-content: center;
  align-items: center;
  position: fixed;
  top: 35vh;
  left: 30vw;
  padding: 1vw;
}

.bottom-container {
  color: #232323;
}

.top-container {
  background-color: #ff63b6;
  color: white;
  clip-path: circle(13% at 85% 50%);
  animation: circleMove 30s ease-in-out infinite;
}

.txt {
  font-family: cursive;
  font-size: 2em;
  font-weight: bold;
  letter-spacing: 15px;
}

@keyframes circleMove {
  0%,
  100% {
    clip-path: circle(13% at 85% 50%);
  }
  50% {
    clip-path: circle(13% at 15% 50%);
  }
}
</style>
