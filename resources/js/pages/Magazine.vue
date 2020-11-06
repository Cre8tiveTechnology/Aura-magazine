<template>
  <div>
    <!-- NavBar -->
    <navbar :current="'MAGAZINE'" />
    <!-- Navbar -->
    <div class="container mt-5">
      <div class="row justify-content-between align-items-center">
        <div class="col-lg-4 col-md-4 col-12 col-sm-12 text-center">
          <img
            src="/image/magazine/mag-1.png"
            height="100"
            class="p-0 img-fluid"
            alt="Mag One"
          />
        </div>
        <div class="col-lg-8 col-md-8 col-12 col-sm-12 text-center">
          <h3>AMAZING SUBSCRIPTION OFFERS</h3>
          <p class="text-left mt-3">
            Get your copy of VOGUE delivered FREE to your door before it hits
            the shops + FREE digital editions on Apple and Android devices!
            Alternatively, choose from one of our fantastic digital-only offers.
          </p>
        </div>
      </div>

      <!--  -->

      <div class="row justify-content-around mt-3 mb-5">
        <div
          class="px-3 py-4 col-lg-5 col-md-5 col-12 col-sm-12 mt-5 text-center bg-mag"
        >
          <h5>Print Only</h5>
          <img
            src="/image/magazine/mag-2.png"
            class="p-0 add-img-fluid"
            height="300px"
            alt="Mag Two"
          />
          <ul class="text-left mt-3">
            <li>Subscribe and save up to 33%</li>
            <li>Plus start with a FREE trial!</li>
            <li>Also available on Google Play and Amazon</li>
          </ul>
          <a href="#" class="btn btn-outline-aura btn-sm mt-2"
            >Get a digital copy for $2.00
          </a>
        </div>
        <div
          class="px-3 py-4 col-lg-5 col-md-5 col-12 col-sm-12 mt-5 text-center bg-mag"
        >
          <h5>Print + Digital</h5>
          <img
            src="/image/magazine/mag-3.png"
            class="p-0 add-img-fluid"
            height="300px"
            alt="Mag Three"
          />
          <ul class="text-left mt-3">
            <li>Subscribe and save up to 33%</li>
            <li>Plus start with a FREE trial!</li>
            <li>Also available on Google Play and Amazon</li>
          </ul>
          <a href="#" class="btn btn-outline-aura btn-sm mt-2"
            >Subscribe from only $5.29 per month</a
          >
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Magazine",
  data() {
    return {
      name: "Oluwatobi",
    };
  },
};
</script>

<style>
</style>
