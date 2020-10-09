<template>
  <div>
    <!-- HEADER -->
    <div class="container my-4">
      <div class="row justify-content-between align-items-center">
        <div
          class="d-md-block d-lg-block d-none col-lg-3 col-md-3 col-sm-12 col-12"
        >
          <h2>AURA SHOP</h2>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-10 col-10">
          <div class="content">
            <div class="search">
              <input
                type="text"
                class="search__input"
                aria-label="search"
                placeholder="Search for an Item"
              />
              <button class="search__btn" aria-label="submit search">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="text-right col-lg-3 col-md-3 col-sm-2 col-2">
          <a href="#" class="shop-cart">
            <i class="fa fa-cart-plus" aria-hidden="true"></i> Cart
          </a>
        </div>
      </div>
    </div>
    <!-- HEADER ENDS-->

    <!-- TOP  -->
    <div class="container p-0">
      <div class="row container-fluid m-0 p-0">
        <div class="col-md-3 order-last p-0">
          <!-- categories starts-->
          <div class="card rounded-0">
            <div class="card-header">
              <h4 class="aura-category">AURA CATEGORIES</h4>
            </div>
            <ul class="list-group list-group-flush category">
              <li
                class="list-group-item category-list"
                v-for="c in categories"
                :key="c"
              >
                <a href="#">{{ c }}</a>
              </li>
            </ul>
          </div>
          <!-- categories ends -->
        </div>

        <div class="col-md-9 p-0">
          <!-- carousel starts -->
          <div
            id="carouselExampleCaptions"
            class="carousel slide"
            data-ride="carousel"
          >
            <ol class="carousel-indicators">
              <li
                data-target="#carouselExampleCaptions"
                data-slide-to="0"
                class="active"
              ></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
              <div class="carousel-item active">
                <img
                  src="https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80"
                  height="450"
                  class="d-block w-100"
                  alt="WEARS"
                />
                <div class="carousel-caption d-none d-md-block">
                  <h5>First slide label</h5>
                  <p>
                    Nulla vitae elit libero, a pharetra augue mollis interdum.
                  </p>
                </div>
              </div>

              <div class="carousel-item">
                <img
                  src="https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80"
                  height="450"
                  class="d-block w-100"
                  alt="WEARS"
                />
                <div class="carousel-caption d-none d-md-block">
                  <h5>Second slide label</h5>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  </p>
                </div>
              </div>

              <div class="carousel-item">
                <img
                  src="https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80"
                  height="450"
                  class="d-block w-100"
                  alt="WEARS"
                />
                <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>
                    Praesent commodo cursus magna, vel scelerisque nisl
                    consectetur.
                  </p>
                </div>
              </div>
            </div>

            <a
              class="carousel-control-prev"
              href="#carouselExampleCaptions"
              role="button"
              data-slide="prev"
            >
              <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
              ></span>
              <span class="sr-only">Previous</span>
            </a>

            <a
              class="carousel-control-next"
              href="#carouselExampleCaptions"
              role="button"
              data-slide="next"
            >
              <span
                class="carousel-control-next-icon"
                aria-hidden="true"
              ></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <!-- carousel ends -->
        </div>
      </div>
      <!-- row -->
    </div>
    <!-- TOP ENDS -->

    <!--===================== ADS BANNER =====================-->
    <div class="home-ads-container mt-5 w-50 mx-auto h-100">
      <div class="container text-center">
        <p>ADS BANNER</p>
      </div>
    </div>
    <!--===================== ADS BANNER =====================-->

    <div class="container sp-mt-5">
      <div class="row justify-content-between">
        <div
          class="col-lg-3 col-md-4 col-sm-12 col-12 mt-5"
          v-for="p in products"
          :key="p.name"
        >
          <div class="card shadow">
            <img :src="p.image" class="card-img-top" alt="Product Image" />
            <div class="card-body pl-3 py-4 p-0">
              <h5 class="card-title">{{ p.name }}</h5>
              <p class="card-text">{{ p.caption }}</p>
              <p class="card-text">{{ p.currency }} {{ p.price }}</p>
              <a href="#" @click="addToCart" class="btn btn-sm btn-outline-aura"
                >Add to Cart</a
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script src="https://kit.fontawesome.com/f64de7b412.js" crossorigin="anonymous"></script>
<script>
export default {
  name: "Shop",
  methods: {
    addToCart() {
      alert("Item Added to Cart");
    },
  },
  data() {
    return {
      products: [
        {
          name: "Product Name",
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          caption: "It’s a landmark moment in anyone’s life",
          currency: "₦",
          price: "200,000.00",
        },

        {
          name: "Product Name",
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          caption: "It’s a landmark moment in anyone’s life",
          currency: "₦",
          price: "200,000.00",
        },

        {
          name: "Product Name",
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          caption: "It’s a landmark moment in anyone’s life",
          currency: "₦",
          price: "200,000.00",
        },

        {
          name: "Product Name",
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          caption: "It’s a landmark moment in anyone’s life",
          currency: "₦",
          price: "200,000.00",
        },

        {
          name: "Product Name",
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          caption: "It’s a landmark moment in anyone’s life",
          currency: "₦",
          price: "200,000.00",
        },

        {
          name: "Product Name",
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          caption: "It’s a landmark moment in anyone’s life",
          currency: "₦",
          price: "200,000.00",
        },

        {
          name: "Product Name",
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          caption: "It’s a landmark moment in anyone’s life",
          currency: "₦",
          price: "200,000.00",
        },

        {
          name: "Product Name",
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          caption: "It’s a landmark moment in anyone’s life",
          currency: "₦",
          price: "200,000.00",
        },

        {
          name: "Product Name",
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          caption: "It’s a landmark moment in anyone’s life",
          currency: "₦",
          price: "200,000.00",
        },

        {
          name: "Product Name",
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          caption: "It’s a landmark moment in anyone’s life",
          currency: "₦",
          price: "200,000.00",
        },

        {
          name: "Product Name",
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          caption: "It’s a landmark moment in anyone’s life",
          currency: "₦",
          price: "200,000.00",
        },

        {
          name: "Product Name",
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          caption: "It’s a landmark moment in anyone’s life",
          currency: "₦",
          price: "200,000.00",
        },
        {
          name: "Product Name",
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          caption: "It’s a landmark moment in anyone’s life",
          currency: "₦",
          price: "200,000.00",
        },

        {
          name: "Product Name",
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          caption: "It’s a landmark moment in anyone’s life",
          currency: "₦",
          price: "200,000.00",
        },

        {
          name: "Product Name",
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          caption: "It’s a landmark moment in anyone’s life",
          currency: "₦",
          price: "200,000.00",
        },

        {
          name: "Product Name",
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          caption: "It’s a landmark moment in anyone’s life",
          currency: "₦",
          price: "200,000.00",
        },

        {
          name: "Product Name",
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          caption: "It’s a landmark moment in anyone’s life",
          currency: "₦",
          price: "200,000.00",
        },
        {
          name: "Product Name",
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          caption: "It’s a landmark moment in anyone’s life",
          currency: "₦",
          price: "200,000.00",
        },
        {
          name: "Product Name",
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          caption: "It’s a landmark moment in anyone’s life",
          currency: "₦",
          price: "200,000.00",
        },

        {
          name: "Product Name",
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          caption: "It’s a landmark moment in anyone’s life",
          currency: "₦",
          price: "200,000.00",
        },
      ],
      categories: [
        "Bags",
        "Fashion",
        "Wears",
        "Beauty",
        "Accesories",
        "Electronics",
        "Components",
        "Magazine",
      ],
    };
  },
};
</script>

<style>
</style>
