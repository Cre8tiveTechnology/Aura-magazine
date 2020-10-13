<template>
  <div class="login-body">
    <div class="container login-inner">
      <div class="row justify-content-lg-start justify-content-center">
        <div class="col-lg-5 col-md-7 col-sm-12 col-12">
          <div class="card shadow">
            <h2>LOGIN FORM HERE</h2>
            <p>To remove these data below and put the login design</p>
            <img :src="p.image" class="card-img-top" alt="Product Image" />
            <div class="card-body pl-3 py-4 p-0">
              <h5 class="card-title">{{ p.name }}</h5>
              <p class="card-text">{{ p.caption }}</p>
              <p class="card-text">{{ p.currency }} {{ p.price }}</p>
              <a href="#" class="btn btn-sm btn-outline-aura">Add to Cart</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Login",
  data() {
    return {
      p: {
        name: "Product Name",
        image:
          "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
        caption: "It’s a landmark moment in anyone’s life",
        currency: "₦",
        price: "200,000.00",
      },
    };
  },
};
</script>

<style>
</style>
