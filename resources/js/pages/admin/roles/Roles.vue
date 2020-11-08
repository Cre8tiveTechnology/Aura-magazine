<template>
  <div>
    <auth-admin>
      <template v-slot:content>
        <div class="content">
          <h1>ROLES</h1>

          {{ roles }}

          <router-link to="/role/create"
            >Create New <i class="fa fa-plus"></i
          ></router-link>
        </div>
      </template>
    </auth-admin>
  </div>
</template>

<script>
import Role from "../../../apis/admin/Role";
export default {
  name: "Roles",
  data: () => ({
    roles: [],
  }),
  mounted() {
    Role.listRoles()
      .then((response) => {
        console.log(response.data);
        this.roles = response.data;
      })
      .catch((err) => {
        let message = err.response.data.message;
        this.alertError(message);
      });
  },
  methods: {
    alertError(message) {
      Vue.$toast.open({
        message: message,
        type: "error",
        position: "top-right",
      });
    },

    alertWarning(message) {
      Vue.$toast.open({
        message: message,
        type: "warning",
        position: "top-right",
      });
    },

    alertSuccess(message) {
      Vue.$toast.open({
        message: message,
        type: "success",
        position: "top-right",
      });
    },
  },
};
</script>
