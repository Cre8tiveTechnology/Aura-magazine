<template>
  <nav
    class="navbar navbar-expand-lg navbar-light bg-transparent text-small py-4"
  >
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="https://aura.com.ng/storage/logo/regular.svg" height="28" />
      </a>
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
            <a class="nav-link" href="/category/news">NEWS</a>
          </li>
          <li class="nav-item mr-1">
            <a class="nav-link" href="/category/fashion">FASHION</a>
          </li>
          <li class="nav-item mr-1">
            <a class="nav-link" href="/category/beauty">BEAUTY</a>
          </li>
          <li class="nav-item mr-1">
            <a class="nav-link" href="/category/lifestyle">LIFESTYLE</a>
          </li>
          <li class="nav-item mr-1">
            <a class="nav-link" href="/category/arts-and-culture"
              >ARTS & CULTURE</a
            >
          </li>
          <li class="nav-item mr-1">
            <a class="nav-link" href="/category/videos">VIDEOS</a>
          </li>
          <li class="nav-item d-lg-none d-xl-block mr-1">
            <a class="nav-link" href="/magazine">MAGAZINE</a>
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
              >MORE</a
            >
            <div class="dropdown-menu" aria-labelledby="moreDropdown">
              <a
                href="/magazine"
                class="dropdown-item text-black-50 d-none d-lg-block d-xl-none"
                >MAGAZINE</a
              >
              <div class="dropdown-divider d-none d-lg-block d-xl-none"></div>
              <a href="/category/horoscope" class="dropdown-item text-black-50"
                >HOROSCOPE</a
              >
              <a
                href="/category/sex-and-relationships"
                class="dropdown-item text-black-50"
                >SEX &amp; RELATIONSHIPS</a
              >
            </div>
          </li>
        </ul>

        <!-- Collapse -->
      </div>

      <div class="d-none d-lg-block">
        <a href="#" class="mr-3">
          <span class="badge badge-pill badge-light py-2 px-3 shadow-sm"
            >SUBSCRIBE</span
          >
        </a>

        <a href="#">
          <span class="badge badge-pill badge-dark py-2 px-3 shadow-sm"
            >SIGN IN</span
          >
        </a>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Navbar",
};
</script>

<style>
</style>
