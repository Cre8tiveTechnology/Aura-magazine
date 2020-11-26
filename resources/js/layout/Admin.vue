<template>
    <div>
        <div class="wrapper">
            <auth-sidenav :role="role"></auth-sidenav>

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
            user: {},
            role: ""
        };
    },
    mounted() {
        User.auth()
            .then(response => {
                this.user = response.data;
                this.role = this.user.user_role.key;
            })
            .catch(error => {
                console.error(error.response);
                if (error.response.status == 401) {
                    localStorage.removeItem(this.user.user_role.key);
                    localStorage.removeItem("auth");
                    this.alertError(
                        "Your session has expired, please sign in!"
                    );
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
