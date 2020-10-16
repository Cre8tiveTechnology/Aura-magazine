<template>
    <div class="login-body">
        <div class="container login-inner">
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
                                    <input
                                        type="email"
                                        v-model="email"
                                        class="form-control  shadow-none"
                                        id="exampleInputEmail1"
                                        aria-describedby="emailHelp"
                                        placeholder="Email"
                                    />
                                </div>
                                <div class="input-group mb-3">
                                    <input
                                        v-model="password"
                                        class="form-control  shadow-none"
                                        placeholder="Password"
                                        v-bind:type="[
                                            showPassword ? 'text' : 'password'
                                        ]"
                                    />
                                    <div class="input-group-append">
                                        <span
                                            class="input-group-text "
                                            @click="
                                                showPassword = !showPassword
                                            "
                                        >
                                            <i
                                                class="fa"
                                                :class="[
                                                    showPassword
                                                        ? 'fa-eye'
                                                        : 'fa-eye-slash'
                                                ]"
                                                aria-hidden="true"
                                            ></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button
                                        type="button"
                                        class="btn btn-aura btn-md btn-block text-white shadow-none  aura-font"
                                    >
                                        Create Account
                                    </button>
                                </div>

                                <a
                                    href="/login"
                                    class="text-right form-text "
                                    style="text-decoration:none; font-size:14px;"
                                >
                                    <span class="text-dark  aura-font"
                                        >Already have an account?</span
                                    >
                                    Sign in
                                </a>

                                <div class="col-md-12 mt-4 mb-4 ">
                                    <div class="login-or">
                                        <hr class="hr-or" />
                                        <span class="span-or">or</span>
                                    </div>
                                </div>
                                <div class=" row d-flex justify-content-center">
                                    <div
                                        class="btn-group btn btn-lg shadow-sm btn-light  aura-font"
                                        role="group"
                                    >
                                        <button
                                            type="button"
                                            class="btn shadow-none"
                                            disabled
                                        >
                                            <i
                                                class="fa fa-google-plus-circle fa-2x"
                                                style="color:#db3236;"
                                            ></i>
                                        </button>
                                        <button
                                            type="button"
                                            class="btn shadow-none"
                                        >
                                            Signup Using Google
                                        </button>
                                    </div>
                                    <div
                                        class="btn-group btn btn-lg shadow-sm btn-light mt-3 aura-font"
                                        role="group"
                                    >
                                        <button
                                            type="button"
                                            class="btn shadow-none"
                                            disabled
                                        >
                                            <i
                                                class="fa fa-facebook fa-2x"
                                                style="color:#3b5998;"
                                            ></i>
                                        </button>
                                        <button
                                            type="button"
                                            class="btn shadow-none"
                                        >
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
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            email: "",
            password: "",
            showPassword: false
        };
    }
};
</script>

<style></style>
