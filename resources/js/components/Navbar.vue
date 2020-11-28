<template>
  <nav
    class="navbar navbar-expand-lg navbar-light bg-transparent text-small py-4 mb-0"
  >
    <div class="container">
      <router-link class="navbar-brand" to="/">
        <img
          src="https://res.cloudinary.com/aura-magazine/image/upload/v1605190201/backgrounds/footer/AURA_LOGO_BLACK_FOR_HEADER_zwujbp.png"
          height="28"
      /></router-link>

      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarDropdown"
        aria-controls="navbarDropdown"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span
          class="nav-ico fa fa-ellipsis-h mt-1"
          style="font-size: 30px"
        ></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarDropdown">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item mr-1">
            <router-link
              :class="current == 'NEWS' ? 'active-link nav-link' : 'nav-link'"
              to="/category/news"
              >NEWS</router-link
            >
          </li>
          <li class="nav-item mr-1">
            <router-link
              :class="
                current == 'FASHION' ? 'active-link nav-link' : 'nav-link'
              "
              to="/category/fashion"
              >FASHION</router-link
            >
          </li>
          <li class="nav-item mr-1">
            <router-link
              :class="current == 'BEAUTY' ? 'active-link nav-link' : 'nav-link'"
              to="/category/beauty"
              >BEAUTY</router-link
            >
          </li>

          <li class="nav-item mr-1">
            <router-link
              :class="
                current == 'CULTURE' ? 'active-link nav-link' : 'nav-link'
              "
              to="/category/culture"
              >CULTURE</router-link
            >
          </li>

          <li class="nav-item dropdown mr-1">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="moreDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
              >LIFE &amp; LOVE
            </a>
            <div class="dropdown-menu" aria-labelledby="moreDropdown">
              <router-link
                :class="
                  current == 'ASKRUBY' ? 'active-link nav-link' : 'nav-link'
                "
                to="/category/ask-ruby"
                >ASK RUBY</router-link
              >
              <div class="dropdown-divider d-none d-lg-block d-xl-none"></div>

              <router-link
                :class="
                  current == 'SEX/RELATIONSHIPS'
                    ? 'active-link nav-link'
                    : 'nav-link'
                "
                to="/category/sex-and-relationships"
                >SEX &amp; RELATIONSHIPS</router-link
              >
            </div>
          </li>

          <li class="nav-item mr-1">
            <router-link
              :class="current == 'VIDEOS' ? 'active-link nav-link' : 'nav-link'"
              to="/category/videos"
              >VIDEOS</router-link
            >
          </li>
          <li class="nav-item d-lg-none d-xl-block mr-1">
            <router-link
              :class="
                current == 'MAGAZINE' ? 'active-link nav-link' : 'nav-link'
              "
              to="/magazine"
              >MAGAZINE</router-link
            >
          </li>
          <li class="nav-item dropdown mr-1">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="moreDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
              >MORE
            </a>
            <div class="dropdown-menu" aria-labelledby="moreDropdown">
              <router-link
                :class="
                  current == 'LOOKBOOK' ? 'active-link nav-link' : 'nav-link'
                "
                to="/lookbook"
                >LOOK BOOK</router-link
              >
              <div class="dropdown-divider d-none d-lg-block d-xl-none"></div>

              <router-link
                :class="
                  current == 'AURASHOP' ? 'active-link nav-link' : 'nav-link'
                "
                to="/shop"
                >AURA SHOP <sup>TM</sup></router-link
              >
            </div>
          </li>
        </ul>

        <!-- Collapse -->
      </div>

      <div class="d-none d-lg-block">
        <router-link class="mr-3" to="/category/sex-and-relationships"
          ><span class="badge badge-pill badge-light py-2 px-3 shadow-sm"
            >SUBSCRIBE</span
          ></router-link
        >

        <router-link to="/login">
          <span class="badge badge-pill badge-dark py-2 px-3 shadow-sm"
            >SIGN IN</span
          ></router-link
        >
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Navbar",
  props: ["current"],
};
</script>

<style scoped>
.nav-link {
  color: #000 !important;
}

.active-link {
  border-bottom: 0.15em solid #ff63b6;
  font-weight: bold;
}
</style>
