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
            name: "K",
            user: null
        };
    },
    mounted() {
        let token = localStorage.getItem("token");
        User.auth(token).then(response => {
            this.user = response.data;
            console.log(this.user);
        });
    },
    methods: {
        logout() {
            User.logout(this.user).then(response => {
                console.log(response.data);
                localStorage.removeItem("token");
                this.$router.push({ name: "login" });
            });
        }
    }
};
</script>
