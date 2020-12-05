<template>
  <div>
    <!-- Dummy -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light d-none">
      <a class="navbar-brand" href="#">Navbar</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
            <a
              class="nav-link disabled"
              href="#"
              tabindex="-1"
              aria-disabled="true"
              >Disabled</a
            >
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input
            class="form-control mr-sm-2"
            type="search"
            placeholder="Search"
            aria-label="Search"
          />
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            Search
          </button>
        </form>
      </div>
    </nav>

    <!-- Nav -->
    <nav
      class="navbar navbar-expand-lg navbar-light bg-transparent text-small py-4 mb-0"
    >
      <div class="container">
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
            class="nav-ico fa fa-bars mt-n1"
            style="font-size: 33px; color: #000"
          ></span>
        </button>

        <router-link class="navbar-brand" to="/">
          <img
            class="ml-3 m-lg-0"
            src="https://res.cloudinary.com/aura-magazine/image/upload/v1605190201/backgrounds/footer/AURA_LOGO_BLACK_FOR_HEADER_zwujbp.png"
            height="28"
        /></router-link>

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
                :class="
                  current == 'BEAUTY' ? 'active-link nav-link' : 'nav-link'
                "
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
                :class="
                  current == 'VIDEOS' ? 'active-link nav-link' : 'nav-link'
                "
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

        <div class="ml-auto">
          <router-link class="mr-3" to="#"
            ><span class="badge badge-pill badge-light py-2 px-3 shadow-sm"
              >SUBSCRIBE</span
            ></router-link
          >

          <router-link to="#">
            <span class="badge badge-pill badge-dark py-2 px-3 shadow-sm"
              >SIGN IN</span
            ></router-link
          >
        </div>
      </div>
    </nav>
  </div>
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
  color: #ff63b6 !important;
  font-weight: bold;
}
</style>
