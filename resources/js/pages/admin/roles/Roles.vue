<template>
  <div>
    <auth-admin>
      <template v-slot:content>
        <div class="content">
          <aura-loader v-if="isLoading"></aura-loader>
          <div class="container">
            <div class="row justify-content-between">
              <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                <h1>ROLES</h1>
              </div>

              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 text-right">
                <router-link to="/role/create" class="btn btn-outline-secondary"
                  >Create New <i class="fa fa-plus"></i
                ></router-link>
              </div>
            </div>
          </div>

          <!--============== Roles Table ================-->
          <empty-resource v-if="roles.data.length === 0"></empty-resource>

          <div class="table-responsive mt-5" v-else>
            <marquee
              ><span class="text-small text-danger"
                ><b>NB: </b>Deleting a <b>Role</b> that has
                <b>Users</b> assigned to it already will delete all
                <b>Users</b> in that <b>Role</b> and all associated
                <b>Data</b> to each <b>User</b>.</span
              ></marquee
            >
            <table class="table shadow-sm">
              <thead class="table-aura text-center">
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Desc</th>
                  <th scope="col">Key</th>
                  <th scope="col">Created by</th>
                  <th scope="col">Created at</th>
                  <th scope="col">Action</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <tr v-for="role in roles.data" :key="role.id">
                  <td>
                    {{ role.name }}
                  </td>
                  <td>{{ role.description | truncate(40) }}</td>
                  <td>{{ role.key }}</td>
                  <td>{{ role.created_by | splitName }}</td>
                  <td>
                    {{ role.created_at | formatDate }}
                  </td>
                  <td>
                    <!-- =====Remove Role ======= -->
                    <button
                      class="btn btn-sm btn-aura"
                      data-toggle="tooltip"
                      data-placement="top"
                      v-if="role.deleted_at === null"
                      @click.prevent="removeRole(role.id)"
                    >
                      <i class="fa fa-trash"></i>
                    </button>

                    <!-- =====Restore Role ======= -->
                    <button
                      class="btn btn-sm btn-aura"
                      v-else
                      @click.prevent="restoreRole(role.id)"
                    >
                      <i class="fa fa-undo"></i>
                    </button>
                  </td>

                  <td>
                    <span
                      class="badge badge-pill badge-success"
                      v-if="role.deleted_at === null"
                      >Active</span
                    >
                    <span class="badge badge-pill badge-danger" v-else
                      >Deleted</span
                    >
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- ===== Pagination ====== -->
            <div class="d-flex container mt-5">
              <pagination
                class="btn-aura"
                :data="roles"
                @pagination-change-page="getRoles"
              >
                <span slot="prev-nav">Previous </span>
                <span slot="next-nav">Next</span>
              </pagination>
            </div>
          </div>
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
    roles: {},
    isLoading: false,
  }),
  mounted() {
    this.getRoles();
  },
  methods: {
    /* -------------------------------------------------------------------------- */
    /*                               Get Roles                                */
    /* -------------------------------------------------------------------------- */
    getRoles(page) {
      this.isLoading = true;
      if (typeof page === "undefined") {
        page = 1;
      }
      Role.listRoles(page)
        .then((response) => {
          this.isLoading = false;
          this.roles = response.data.roles;
        })
        .catch((err) => {
          this.isLoading = false;
          let message = err.response.data.message;
          this.alertError(message);
        });
    },

    /* -------------------------------------------------------------------------- */
    /*                               Remove Role                               */
    /* -------------------------------------------------------------------------- */

    removeRole(role) {
      Role.removeRole(role)
        .then((response) => {
          if (response.status == 200) {
            this.alertSuccess(response.data);
          }
          //Fetch roles
          this.getRoles();
        })
        .catch((error) => {
          if (error.response.status == 404) {
            this.alertError(
              "The role you are trying to remove does not exist."
            );
          }
          console.error(error);
        });
    },

    /* -------------------------------------------------------------------------- */
    /*                               Restore Role                               */
    /* -------------------------------------------------------------------------- */
    restoreRole(role) {
      Role.restoreRole({
        id: role,
      })
        .then((response) => {
          if (response.status == 200) {
            this.alertSuccess(response.data);
          }
          //Fetch role
          this.getRoles();
        })
        .catch((error) => {
          if (error.response.status == 404) {
            this.alertError(
              "The role you are trying to restore does not exist."
            );
          }
          console.error(error);
        });
    },

    /* -------------------------------------------------------------------------- */
    /*                               Toast Alerts                               */
    /* -------------------------------------------------------------------------- */
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
