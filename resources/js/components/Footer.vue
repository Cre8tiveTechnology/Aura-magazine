<template>
  <div>
    <footer
      class="body footer-area footer--light"
      style="margin-top: 10% !important"
    >
      <div class="footer-big">
        <!-- start .container -->
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-12">
              <div class="footer-widget">
                <div class="widget-about">
                  <img
                    src="https://aura.com.ng/storage/logo/regular.svg"
                    alt="Logo Here"
                    class="img-fluid"
                  />
                  <p>Bringing Magazine from core...</p>
                  <ul class="contact-details">
                    <li>
                      <span class="icon-earphones"></span> Call Us:
                      <a href="tel:09033030100">09033030100</a>
                    </li>
                    <li>
                      <span class="icon-envelope-open"></span>
                      <a href="mailto:support@aura.com">support@aura.com</a>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- Ends: .footer-widget -->
            </div>
            <!-- end /.col-md-4 -->
            <div class="col-md-3 col-sm-4">
              <div class="footer-widget">
                <div class="footer-menu footer-menu--1">
                  <h4 class="footer-widget-title">Popular Category</h4>
                  <ul>
                    <li>
                      <router-link to="/category/news"> News </router-link>
                    </li>
                    <li>
                      <router-link to="/category/fashion">
                        Fashion
                      </router-link>
                    </li>
                    <li>
                      <router-link to="/category/beauty"> Beauty </router-link>
                    </li>
                    <li>
                      <router-link to="/category/lifestyle">
                        Lifestyle
                      </router-link>
                    </li>
                    <li>
                      <router-link to="/category/arts-and-culture">
                        Arts &amp; Culture
                      </router-link>
                    </li>
                    <li>
                      <router-link to="/category/horoscope">
                        Horoscope
                      </router-link>
                    </li>
                    <li>
                      <router-link to="/category/sex-and-relationships">
                        Sex and Relationships
                      </router-link>
                    </li>
                  </ul>
                </div>
                <!-- end /.footer-menu -->
              </div>
              <!-- Ends: .footer-widget -->
            </div>
            <!-- end /.col-md-3 -->

            <div class="col-md-3 col-sm-4">
              <div class="footer-widget">
                <div class="footer-menu">
                  <h4 class="footer-widget-title">Our Company</h4>
                  <ul>
                    <li>
                      <router-link to="#"> About Us </router-link>
                    </li>
                    <li>
                      <router-link to="#"> Contact Us </router-link>
                    </li>
                    <li>
                      <router-link to="/magazine"> Magazine </router-link>
                    </li>
                    <li>
                      <router-link to="/shop"> Shop </router-link>
                    </li>
                    <li>
                      <router-link to="/videos"> Videos </router-link>
                    </li>
                    <li>
                      <router-link to="#"> Testimonials </router-link>
                    </li>
                    <li>
                      <router-link to="#"> Plan &amp; Pricing </router-link>
                    </li>
                  </ul>
                </div>
                <!-- end /.footer-menu -->
              </div>
              <!-- Ends: .footer-widget -->
            </div>
            <!-- end /.col-lg-3 -->

            <div class="col-md-3 col-sm-4">
              <div class="footer-widget">
                <div class="footer-menu no-padding">
                  <h4 class="footer-widget-title">Help &amp; Support</h4>
                  <ul>
                    <li>
                      <router-link to="#"> Terms &amp; Conditions </router-link>
                    </li>
                    <li>
                      <router-link to="#"> Support Policy </router-link>
                    </li>
                    <li>
                      <router-link to="#"> Refund Policy </router-link>
                    </li>
                    <li>
                      <router-link to="#"> FAQs </router-link>
                    </li>
                    <li>
                      <router-link to="#"> Buyers Faq </router-link>
                    </li>
                    <li>
                      <router-link to="#"> Sellers Faq </router-link>
                    </li>
                  </ul>
                </div>
                <!-- end /.footer-menu -->
              </div>
              <!-- Ends: .footer-widget -->
            </div>
            <!-- Ends: .col-lg-3 -->
          </div>
          <!-- end /.row -->
        </div>
        <!-- end /.container -->
      </div>
      <!-- end /.footer-big -->

      <div class="mini-footer">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="copyright-text">
                <p>
                  © 2020 <a href="/">AURA</a>. All rights reserved. Created by
                  <a href="https://www.hinodegeeks.ng">Hinode Geeks</a>
                </p>
              </div>
            </div>
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
@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700);
.body {
  font-family: Rubik, sans-serif;
  position: relative;
  font-weight: 400;
  font-size: 15px;
}
ul {
  padding: 0;
  margin: 0;
}
li {
  list-style: none;
}
a:focus,
a:hover {
  text-decoration: none;
  -webkit-transition: 0.3s ease;
  -o-transition: 0.3s ease;
  transition: 0.3s ease;
}
a:focus {
  outline: 0;
}
img {
  max-width: 100%;
}
p {
  font-size: 16px;
  line-height: 30px;
  color: #898b96;
  font-weight: 300;
}
h4 {
  font-family: Rubik, sans-serif;
  margin: 0;
  font-weight: 400;
  padding: 0;
  color: rgb(233, 220, 220);
}
a {
  color: #ff63b6;
}
.no-padding {
  padding: 0 !important;
}
.footer-big {
  padding: 105px 0 65px 0;
}
.footer-big .footer-widget {
  margin-bottom: 40px;
}
.footer--light {
  background: #202024;
}
.footer-big .footer-menu ul li a,
.footer-big p,
.footer-big ul li {
  color: #898b96;
}
.footer-menu {
  padding-left: 48px;
}
.footer-menu ul li a {
  font-size: 15px;
  line-height: 32px;
  -webkit-transition: 0.3s;
  -o-transition: 0.3s;
  transition: 0.3s;
}
.footer-menu ul li a:hover {
  color: #ff63b6;
}
.footer-menu--1 {
  width: 100%;
}
.footer-widget-title {
  line-height: 42px;
  margin-bottom: 10px;
  font-size: 18px;
}
.mini-footer {
  background: #000;
  text-align: center;
  padding: 32px 0;
}
.mini-footer p {
  margin: 0;
  line-height: 26px;
  font-size: 15px;
  color: #999;
}
.mini-footer p a {
  color: #ff63b6;
}
.mini-footer p a:hover {
  color: #fff;
}
.widget-about img {
  display: block;
  margin-bottom: 30px;
}
.widget-about p {
  font-weight: 400;
}
.widget-about .contact-details {
  margin: 30px 0 0 0;
}
.widget-about .contact-details li {
  margin-bottom: 10px;
}
.widget-about .contact-details li:last-child {
  margin-bottom: 0;
}
.widget-about .contact-details li span {
  padding-right: 12px;
}
.widget-about .contact-details li a {
  color: #ff63b6;
}
@media (max-width: 991px) {
  .footer-menu {
    padding-left: 0;
  }
}
</style>
