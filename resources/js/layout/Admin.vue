<template>
    <div>
        <div class="wrapper">
            <auth-sidenav></auth-sidenav>

            <div class="main-panel" style="background: #fff">
                <auth-nav :user="user"></auth-nav>

                <slot name="content"></slot>

                <auth-footer></auth-footer>
            </div>
        </div>
    </div>
</template>

<script>
import User from "../apis/admin/User";
export default {
    name: "Admin",
    data() {
        return {
            user: {}
        };
    },
    mounted() {
        User.auth()
            .then(response => {
                this.user = response.data;
            })
            .catch(error => {
                console.error(error.response);
                if (error.response.status == 401) {
                    this.alertError(
                        "Your session has expired, please sign in!"
                    );
                    localStorage.clear("auth");

                    this.$router.push({ name: "login" });
                }
            });
    },
    methods: {
        alertError(message) {
            Vue.$toast.open({
                message: message,
                type: "error",
                position: "top-right"
            });
        }
    }
};
</script>
