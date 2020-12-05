<template>
  <div style="margin-top: 20% !important">
    <footer class="container-fluid aura-bg-grey px-0 py-4">
      <!-- First Part -->
      <div class="container-fluid aura-bg-dark py-3 py-sm-4">
        <div class="container">
          <div class="row justify-content-around align-items-center">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
              <img
                class=""
                src="https://res.cloudinary.com/aura-magazine/image/upload/v1605190201/backgrounds/footer/AURA_LOGO_GREY_FOR_FOOTER_ljggjk.png"
                height="70"
              />
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
              <div
                class="d-flex justify-content-lg-center justify-content-md-center justify-content-start mt-md-0 mt-lg-0 mt-5"
              >
                <a href="#" class="mx-2 footer-social">
                  <i class="fa fa-instagram"></i>
                </a>

                <a href="#" class="mx-2 footer-social">
                  <i class="fa fa-twitter"></i>
                </a>

                <a href="#" class="mx-2 footer-social">
                  <i class="fa fa-facebook"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Second Part -->
      <div class="container py-4">
        <div class="row">
          <div class="col-lg-3 col-md-5 col-sm-12 col-12 mt-3">
            <ul class="footer-links-list px-0">
              <li>
                <router-link class="text-white" to="#">Newsletter</router-link>
              </li>
              <li>
                <router-link class="text-white" to="#">Contact Us</router-link>
              </li>
              <li>
                <router-link class="text-white" to="#">Media Kit</router-link>
              </li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-5 col-sm-12 col-12 mt-3">
            <ul class="footer-links-list px-0">
              <li>
                <router-link class="text-white" to="#">Press Room</router-link>
              </li>
              <li>
                <router-link class="text-white" to="#">Site Map</router-link>
              </li>
              <li>
                <router-link class="text-white" to="#"
                  >Community Guidelines</router-link
                >
              </li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-5 col-sm-12 col-12 mt-3">
            <ul class="footer-links-list px-0">
              <li>
                <router-link class="text-white" to="#"
                  >Advertise Online</router-link
                >
              </li>
              <li>
                <router-link class="text-white" to="#"
                  >Customer Service</router-link
                >
              </li>
              <li>
                <router-link class="text-white" to="#">Subscribe</router-link>
              </li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-5 col-sm-12 col-12 mt-3">
            <ul class="footer-links-list px-0">
              <li>
                <router-link class="text-white" to="#">Give a Gift</router-link>
              </li>
              <li>
                <router-link class="text-white" to="#"
                  >Events &amp; Promotions</router-link
                >
              </li>
              <li>
                <router-link class="text-white" to="#">Giveaways</router-link>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
export default {
  name: "Footer",
};
</script>

<style scoped>
.aura-bg-grey {
  background: rgba(0, 0, 0, 0.8);
}

a.footer-social {
  text-decoration: none !important;
  color: #fff;
}

a.footer-social i {
  font-size: 1.5em;
}

.footer-links-list {
  list-style-type: none !important;
}

.footer-links-list li a {
  text-decoration: none !important;
}

.footer-links-list li {
  margin-top: 0.4em !important;
  margin-bottom: 0.4em !important;
}
</style>
