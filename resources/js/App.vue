<template>
    <div>
        <nav
            class="navbar navbar-expand-lg navbar-light bg-transparent text-small"
        >
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img
                        src="https://aura.com.ng/storage/logo/regular.svg"
                        height="28"
                    />
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
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarDropdown">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/category/news">NEWS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/category/fashion"
                                >FASHION</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/category/beauty"
                                >BEAUTY</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/category/lifestyle"
                                >LIFESTYLE</a
                            >
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="/category/arts-and-culture"
                                >ARTS & CULTURE</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/category/videos"
                                >VIDEOS</a
                            >
                        </li>
                        <li class="nav-item d-lg-none d-xl-block">
                            <a class="nav-link" href="/magazine">MAGAZINE</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="moreDropdown"
                                role="button"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                MORE
                            </a>
                            <div
                                class="dropdown-menu"
                                aria-labelledby="moreDropdown"
                            >
                                <a
                                    href="/magazine"
                                    class="dropdown-item text-black-50 d-none d-lg-block d-xl-none"
                                    >MAGAZINE</a
                                >
                                <div
                                    class="dropdown-divider d-none d-lg-block d-xl-none"
                                ></div>
                                <a
                                    href="/category/horoscope"
                                    class="dropdown-item text-black-50"
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
                    <ul class="navbar-nav">
                        <li class="mr-2">
                            <span class="badge badge-pill badge-light p-2"
                                >Subscribe</span
                            >
                        </li>
                        <li>
                            <span class="badge badge-pill badge-light p-2"
                                >Sign In</span
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <transition name="fade" mode="out-in">
            <router-view></router-view>
        </transition>
    </div>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition-duration: 0.3s;
    transition-property: opacity;
    transition-timing-function: ease;
}

.fade-enter,
.fade-leave-active {
    opacity: 0;
}
</style>
