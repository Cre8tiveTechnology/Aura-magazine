<template>
  <div>
    <!-- NavBar -->
    <navbar />
    <!-- Navbar -->
    <div class="login-body">
      <div class="container login-inner mt-5">
        <div
          class="row justify-content-lg-start justify-content-md-start justify-content-center"
        >
          <div class="col-lg-5 col-md-7 col-sm-12 col-12 rounded">
            <div class="card shadow p-4 rounded">
              <img
                src="https://aura.com.ng/storage/logo/regular.svg"
                height="28"
              />
              <p class="text-center font-weight-light mb-5 mt-4">
                Create an Account
              </p>
              <div class="card-body py-2">
                <form>
                  <div class="form-group">
                    <h6>Please Enter Token</h6>
                    <div class="input-group">
                      <input
                        type="text"
                        v-model="token"
                        class="form-control shadow-none"
                        id="token"
                        @change="validateToken"
                        autocomplete="off"
                        placeholder="Enter Token"
                        aria-describedby="tokenCode"
                      />
                      <div class="input-group-append">
                        <button
                          class="btn btn-success m-0"
                          @click.prevent="validateToken"
                          type="button"
                          id="tokenCode"
                        >
                          Validate
                        </button>
                      </div>
                    </div>
                    <span class="text-danger txt-small" v-if="tokenErr">
                      {{ tokenErr }}
                    </span>
                  </div>

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
                    <span class="text-danger" v-if="errors.name">{{
                      errors.name[0]
                    }}</span>
                    <input
                      type="text"
                      v-model="form.name"
                      class="form-control shadow-none"
                      id="name"
                      autocomplete="off"
                      placeholder="Name"
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
                  <div class="form-group">
                    <button
                      type="button"
                      :disabled="!isAuthorized"
                      class="btn btn-aura btn-md btn-block text-white shadow-none"
                      @click.prevent="register"
                    >
                      Create Account
                    </button>
                  </div>
                  <router-link
                    class="text-right form-text"
                    style="text-decoration: none; font-size: 14px"
                    to="/login"
                  >
                    <span class="text-dark aura-font"
                      >Already have an account?</span
                    >
                    Sign in</router-link
                  >

                  <div class="col-md-12 mt-4 mb-4">
                    <div class="login-or">
                      <hr class="hr-or" />
                      <span class="span-or">or</span>
                    </div>
                  </div>
                  <div class="row d-flex justify-content-center">
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
                        Signup Using Google
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
                        Signup Using Facebook
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import User from "../../apis/admin/User";
export default {
  name: "Register",
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      showPassword: false,
      errors: [],
      token: "",
      tokenCode: "",
      tokenErr: "",
      isAuthorized: false,
    };
  },
  mounted() {
    this.tokenCode = process.env.SUPER_ADMIN_TOKEN_CODE ?? "11223344??";
  },
  methods: {
    /* -------------------------------------------------------------------------- */
    /*                        Register - @param  Form Data                        */
    /* -------------------------------------------------------------------------- */

    register() {
      User.register(this.form)
        .then(() => {
          this.$router.push({ name: "login" });
        })
        .catch((errors) => {
          if (errors.response.status == 400) {
            this.errors = errors.response.data;
          }
        });
    },

    validateToken() {
      if (this.token.length === 0) {
        return (this.tokenErr = "Please Provide a Token");
      }
      if (this.token === this.tokenCode) {
        this.tokenErr = "";
        return (this.isAuthorized = true);
      } else {
        this.isAuthorized = false;
        this.tokenErr = "Invalid Token Supplied";
        return;
      }
    },
  },
};
</script>

<style>
.txt-small {
  font-size: 0.8em;
}
</style>
