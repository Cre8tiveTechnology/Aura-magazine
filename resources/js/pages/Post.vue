<template>
  <div>
    <!-- NavBar -->
    <navbar />
    <!-- Navbar -->
    <!-- Top -->
    {{ article }}
    <!-- Portrait -->
    <div class="container rounded-0" v-if="post.isProtrait">
      <div
        class="row justify-content-between justify-content-sm-center align-items-center"
      >
        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
          <img
            :src="post.image"
            class="col-12 p-0 img-fluid"
            alt="Article Cover"
          />
        </div>
        <div
          class="col-12 col-lg-6 col-md-6 col-sm-12 text-center p-lg-4 p-md-3 p-2"
        >
          <h1>{{ post.title }}</h1>
          <hr class="story-card-hr" />
          <i class="mt-4 fa fa-user"></i> {{ post.author.name }}
          <p class="mt-4 post-intro">{{ post.intro }}</p>
          <div class="mt-4 row p-3 justify-content-center">
            <a href="#" class="aura-post-social-icon mx-2">
              <i class="fa fa-facebook p-2" aria-hidden="true"></i>
            </a>
            <a href="#" class="aura-post-social-icon mx-2">
              <i class="fa fa-twitter p-2" aria-hidden="true"></i>
            </a>
            <a href="#" class="aura-post-social-icon mx-2">
              <i class="fa fa-instagram p-2" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- LandScape -->
    <div class="container-fluid p-0" v-else>
      <div class="card bg-dark text-white rounded-0">
        <img
          :src="post.image"
          class="card-img"
          height="550"
          alt="Article Cover"
        />
        <div
          class="card-img-overlay col-lg-8 col-sm-12 col-12"
          style="top: 45%"
        >
          <h1 class="card-title">{{ post.title }}</h1>
          <i class="mt-4 fa fa-user"></i> {{ post.author.name }}
        </div>
      </div>
      <div class="container text-center">
        <p class="mt-4 post-intro">{{ post.intro }}</p>
        <div class="mt-4 row p-3 justify-content-center">
          <a href="#" class="aura-post-social-icon mx-2">
            <i class="fa fa-facebook p-2" aria-hidden="true"></i>
          </a>
          <a href="#" class="aura-post-social-icon mx-2">
            <i class="fa fa-twitter p-2" aria-hidden="true"></i>
          </a>
          <a href="#" class="aura-post-social-icon mx-2">
            <i class="fa fa-instagram p-2" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- Body -->

    <div class="container sp-mt-7">
      <p v-html="post.body"></p>
    </div>

    <!--===================== ADS BANNER =====================-->
    <div class="home-ads-container mt-5 w-50 mx-auto h-100">
      <div class="container text-center">
        <p>ADS BANNER</p>
      </div>
    </div>
    <!--===================== ADS BANNER =====================-->

    <!-- IMAGES -->
    <div class="container sp-mt-7" v-if="post.hasImages">
      <div class="row justify-content-between">
        <div
          class="col-lg-3 col-md-5 col-sm-12 col-12 mt-4 p-3"
          v-for="(post, index) in post.images"
          :key="post"
        >
          <img :src="post" class="col-12 p-0 img-fluid" alt="News Cover" />
          <span>{{ ++index }}/{{ imagesLenght }}</span>
        </div>
      </div>
    </div>

    <!-- RECOMMENDATIONS -->
    <div class="container sp-mt-8">
      <h5 class="news headline-font font-weight-bolder ml-0">
        <span class="text-aura" style="font-size: 30px">+</span> AURA RECOMMENDS
      </h5>
      <div class="mt-2 row justify-content-between justify-content-md-center">
        <div
          class="col-lg-6 col-md-8col-sm-12 col-12 mt-4"
          v-for="r in recommendations"
          :key="r.title"
        >
          <div class="card">
            <div class="row no-gutters">
              <div class="col-md-5 p-0">
                <img
                  :src="r.image"
                  class="card-img rounded-0"
                  alt="Recommendation"
                />
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <h5 class="card-title">{{ r.title }}</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- RECOMMENDATIONS STOP -->
  </div>
</template>

<script>
export default {
  name: "Post",
  props: {
    article: String,
  },
  computed: {
    imagesLenght() {
      return this.post.images.length;
    },
  },
  data() {
    return {
      post: {
        title:
          'Yomi Adegoke: "Lockdown Revolutionised The Respect Your Elders Dynamic With My Parents"',
        image: "/image/article/portrait.png",
        author: {
          name: "Omoh eli",
        },
        intro:
          "When Yomi Adegoke’s mother moved in with her during lockdown, she was forced to confront an uncomfortable dynamic many diaspora kids will recognise: the notion that disagreeing with your elders is inherently insubordinate.",
        body:
          "It’s a landmark moment in anyone’s life, that irreversible realisation that your parents don’t know everything. Watching your dad fumble a maths question whilst helping you with your Year 7 homework is a bombshell akin to learning that he is also Father Christmas, because Father Christmas isn't real. Everyone, regardless of background, learns this truth at some point. Childre n never truly grow up in the eyes of their parents, but for many adult children n of African, Caribbean and Asian immigrants, this is less a figure of speech and more a lifestyle. At any age, attempts at correcting our parents can be in terpreted as akin to a declaration of war. Respecting your elders is of param ount importance, and respecting tends to mean “agreeing with at all time. How right you are is dependent on how old you are, a game rigged so that even when you hit adulthood, your parents still win, because they are still older than you. It leaves many of us perpetually suspended in eternal infancy by the dungaree straps.\n It’s a landmark moment in anyone’s life, that irreversible realisation that your parents don’t know everything. Watching your dad fumble a maths question whilst helping you with your Year 7 homework is a bombshell akin to learning that he is also Father Christmas, because Father Christmas isn't real. Everyone, regardless of background, learns this truth at some point. Childre n never truly grow up in the eyes of their parents, but for many adult children n of African, Caribbean and Asian immigrants, this is less a figure of speech and more a lifestyle. At any age, attempts at correcting our parents can be in terpreted as akin to a declaration of war. Respecting your elders is of param ount importance, and respecting tends to mean “agreeing with at all time. How right you are is dependent on how old you are, a game rigged so that even when you hit adulthood, your parents still win, because they are still older than you. It leaves many of us perpetually suspended in eternal infancy by the dungaree straps.",
        // isProtrait: false,
        isProtrait: true,
        hasImages: true,
        images: [
          "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
        ],
      },
      recommendations: [
        {
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          title: "It’s a landmark moment in anyone’s life",
        },

        {
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          title: "It’s a landmark moment in anyone’s life",
        },

        {
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          title: "It’s a landmark moment in anyone’s life",
        },

        {
          image:
            "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
          title: "It’s a landmark moment in anyone’s life",
        },
      ],
    };
  },
};
</script>

<style>
</style>
