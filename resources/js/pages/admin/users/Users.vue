<template>
    <div>
        <auth-admin>
            <template v-slot:content>
                <div class="content">
                    <aura-loader v-if="isLoading"></aura-loader>
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                <h1>Users</h1>
                            </div>

                            <div
                                class="col-xl-4 col-lg-4 col-md-4 col-sm-4 text-right"
                            >
                                <router-link
                                    to="/user/create"
                                    class="btn btn-outline-secondary"
                                    >Create New <i class="fa fa-plus"></i
                                ></router-link>
                            </div>
                        </div>
                    </div>

                    <!--============== Roles Table ================-->
                    <empty-resource
                        v-if="users.data.length === 0"
                    ></empty-resource>

                    <div class="table-responsive mt-5" v-else>
                        <table class="table shadow-sm">
                            <thead class="table-aura text-center">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr v-for="user in users.data" :key="user.id">
                                    <td>
                                        {{ user.name }}
                                    </td>
                                    <td>{{ user.email }}</td>
                                    <td>{{ user.role.name }}</td>
                                    <td>
                                        {{ user.created_at | formatDate }}
                                    </td>
                                    <td>
                                        <!-- =====Remove user ======= -->
                                        <button
                                            class="btn btn-sm btn-aura"
                                            v-if="user.deleted_at === null"
                                            @click.prevent="removeUser(user.id)"
                                        >
                                            <i class="fa fa-trash"></i>
                                        </button>

                                        <!-- =====Restore Role ======= -->
                                        <button
                                            class="btn btn-sm btn-aura"
                                            v-else
                                            @click.prevent="
                                                restoreUser(user.id)
                                            "
                                        >
                                            <i class="fa fa-undo"></i>
                                        </button>
                                    </td>

                                    <td>
                                        <span
                                            class="badge badge-pill badge-success"
                                            v-if="user.deleted_at === null"
                                            >Active</span
                                        >
                                        <span
                                            class="badge badge-pill badge-danger"
                                            v-else
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
                                :data="users"
                                @pagination-change-page="getUsers"
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
import User from "../../../apis/admin/User";
export default {
    name: "Users",
    data: () => ({
        users: {},
        isLoading: false
    }),
    mounted() {
        this.getUsers();
    },
    methods: {
        /* -------------------------------------------------------------------------- */
        /*                               Get Roles                                */
        /* -------------------------------------------------------------------------- */
        getUsers(page) {
            this.isLoading = true;
            if (typeof page === "undefined") {
                page = 1;
            }
            User.listUsers(page)
                .then(response => {
                    this.isLoading = false;
                    this.users = response.data.users;
                })
                .catch(err => {
                    this.isLoading = false;
                    let message = err.response.data.message;
                    this.alertError(message);
                });
        },

        /* -------------------------------------------------------------------------- */
        /*                               Remove Role                               */
        /* -------------------------------------------------------------------------- */

        removeUser(user) {
            User.removeUser(user)
                .then(response => {
                    if (response.status == 200) {
                        this.alertSuccess(response.data);
                    }
                    //Fetch users
                    this.getUsers();
                })
                .catch(error => {
                    if (error.response.status == 404) {
                        this.alertError(
                            "The user you are trying to remove does not exist."
                        );
                    }
                    console.error(error);
                });
        },

        /* -------------------------------------------------------------------------- */
        /*                               Restore Role                               */
        /* -------------------------------------------------------------------------- */
        restoreUser(user) {
            User.restoreUser({
                id: user
            })
                .then(response => {
                    if (response.status == 200) {
                        this.alertSuccess(response.data);
                    }
                    //Fetch role
                    this.getUsers();
                })
                .catch(error => {
                    if (error.response.status == 404) {
                        this.alertError(
                            "The user you are trying to restore does not exist."
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
                position: "top-right"
            });
        },

        alertWarning(message) {
            Vue.$toast.open({
                message: message,
                type: "warning",
                position: "top-right"
            });
        },

        alertSuccess(message) {
            Vue.$toast.open({
                message: message,
                type: "success",
                position: "top-right"
            });
        }
    }
};
</script>
