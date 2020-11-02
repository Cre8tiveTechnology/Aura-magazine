<template>
    <div>
        <a @click.prevent="logout" class="nav-link">Logout</a>

        <h1>Hello! {{ user.email }}</h1>
    </div>
</template>

<script>
import User from "../../apis/User";
export default {
    name: "Dashboard",
    data() {
        return {
            user: {}
        };
    },
    mounted() {
        User.auth().then(response => {
            this.user = response.data;
            console.log(this.user.email);
        });
    },
    methods: {
        logout() {
            User.logout().then(response => {
                localStorage.removeItem("auth");
                this.$router.push({ name: "login" });
            });
        }
    }
};
</script>
