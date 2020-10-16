<template>
    <div>
        <a href="/logout" @click.prevent="logout" class="text-dark">logout</a>
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
        User.auth.then(response => {
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
