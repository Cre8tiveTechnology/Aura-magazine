<template>
    <div>
        <router-link @click.prevent="logout" class="nav-link" to="/logout"
            >Logout</router-link
        >
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
        User.auth().then(response => {
            this.user = response.data;
        });
    },
    methods: {
        logout() {
            User.logout().then(() => {
                localStorage.removeItem("token");
                this.$router.push({ name: "home" });
            });
        }
    }
};
</script>
