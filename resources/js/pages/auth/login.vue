<template>
  <div>
    <!-- NavBar -->
    <!-- <navbar /> -->
    <!-- Navbar -->
    <div class="login-body">
      <div class="container login-inner">
        <div class="row justify-content-center">
          <div class="col-lg-7 col-md-9 col-sm-12 col-12 rounded">
            <div class="card shadow p-4 rounded">
              <img
                src="https://res.cloudinary.com/aura-magazine/image/upload/v1605190201/backgrounds/footer/AURA_LOGO_BLACK_FOR_HEADER_zwujbp.png"
                height="28"
                width="100"
                class="mx-auto"
              />
              <p class="text-center font-weight-light mb-5 mt-4">Sign In</p>
              <div class="card-body py-2">
                <span class="text-danger" v-if="errors.message">{{
                  errors.message
                }}</span>
                <form>
                  <div class="form-group">
                    <span class="text-danger" v-if="errors.email">{{
                      errors.email[0]
                    }}</span>
                    <input
                      type="email"
                      v-model="form.email"
                      class="form-control shadow-none"
                      id="email"
                      autocomplete="off"
                      placeholder="Email"
                    />
                  </div>
                  <div class="form-group">
                    <span class="text-danger" v-if="errors.password">{{
                      errors.password[0]
                    }}</span>
                    <div class="input-group mb-3">
                      <input
                        v-model="form.password"
                        class="form-control shadow-none"
                        placeholder="Password"
                        autocomplete="password"
                        id="password"
                        v-bind:type="[showPassword ? 'text' : 'password']"
                      />

                      <div class="input-group-append">
                        <span
                          class="input-group-text"
                          @click="showPassword = !showPassword"
                        >
                          <i
                            class="fa"
                            :class="[showPassword ? 'fa-eye' : 'fa-eye-slash']"
                            aria-hidden="true"
                          ></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <a href="#" style="text-decoration: none"
                    ><small class="form-text mb-4 aura-font"
                      >Forgot Password?</small
                    ></a
                  >
                  <div class="form-group">
                    <button
                      type="button"
                      class="btn btn-aura btn-md btn-block text-white shadow-none aura-font"
                      @click.prevent="login"
                    >
                      Sign In
                    </button>
                  </div>
                  <router-link
                    class="text-right form-text"
                    style="text-decoration: none; font-size: 14px"
                    to="/admin/register"
                  >
                    <span class="text-dark aura-font"
                      >Don't have an account?</span
                    >
                    Sign up</router-link
                  >

                  <!-- <div class="col-md-12 mt-4 mb-4">
                    <div class="login-or">
                      <hr class="hr-or" />
                      <span class="span-or">or</span>
                    </div>
                  </div> -->
                  <!-- <div class="row d-flex justify-content-center">
                    <div
                      class="btn-group btn btn-lg shadow-sm btn-light aura-font"
                      role="group"
                    >
                      <button type="button" class="btn shadow-none" disabled>
                        <i
                          class="fa fa-google-plus-circle fa-2x"
                          style="color: #db3236"
                        ></i>
                      </button>
                      <button type="button" class="btn shadow-none">
                        Signin Using Google
                      </button>
                    </div>
                    <div
                      class="btn-group btn btn-lg shadow-sm btn-light mt-3 aura-font"
                      role="group"
                    >
                      <button type="button" class="btn shadow-none" disabled>
                        <i
                          class="fa fa-facebook fa-2x"
                          style="color: #3b5998"
                        ></i>
                      </button>
                      <button type="button" class="btn shadow-none">
                        Signin Using Facebook
                      </button>
                    </div>
                  </div> -->
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <user-footer style="margin-top: 0%" />
    <!-- Footer -->
  </div>
</template>

<script>
import User from "../../apis/admin/User";

export default {
  name: "Login",
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      showPassword: false,
      errors: [],
    };
  },

  methods: {
    /* -------------------------------------------------------------------------- */
    /*                                   Login @param- form data                   */
    /* -------------------------------------------------------------------------- */
    login() {
      User.login(this.form)
        .then((response) => {
          let role = response.data.role;
          localStorage.setItem("auth", "true");
          localStorage.setItem(role, "true");
          this.$router.push({ name: "dashboard" });
        })
        .catch((errors) => {
          if (errors.response.status != 200) {
            console.log(errors.response.data);
            this.errors = errors.response.data;
          }
        });
    },
  },
};
</script>

<style></style>
