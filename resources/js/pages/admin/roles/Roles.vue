<template>
    <div>
        <auth-admin>
            <template v-slot:content>
                <div class="content">
                    <aura-loader v-if="isLoading"></aura-loader>
                    <!--==============Page Title  ================-->
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                <h1>ROLES</h1>
                            </div>

                            <div
                                class="col-xl-4 col-lg-4 col-md-4 col-sm-4 text-right"
                            >
                                <router-link
                                    to="/role/create"
                                    class="btn btn-outline-secondary"
                                    >Create New <i class="fa fa-plus"></i
                                ></router-link>
                            </div>
                        </div>
                    </div>

                    <!--============== Roles Table ================-->
                    <empty-resource v-if="roles.length === 0"></empty-resource>

                    <div class="table-responsive mt-5" v-else>
                        <marquee
                            ><span class="text-small text-danger"
                                ><b>NB: </b>Deleting a <b>Role</b> that has
                                <b>Users</b> assigned to it already will delete
                                all <b>Users</b> in that <b>Role</b> and all
                                associated <b>Data</b> to each
                                <b>User</b>.</span
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
                                    <td>
                                        {{ role.description | truncate(40) }}
                                    </td>
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
                                            @click.prevent="
                                                restoreRole(role.id)
                                            "
                                        >
                                            <i class="fa fa-undo"></i>
                                        </button>
                                        <button
                                            class="btn btn-sm btn-aura"
                                            id="show-modal"
                                            @click="showEditModal(role)"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </td>

                                    <td>
                                        <span
                                            class="badge badge-pill badge-success"
                                            v-if="role.deleted_at === null"
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
                                :data="roles"
                                @pagination-change-page="getRoles"
                            >
                                <span slot="prev-nav">Previous </span>
                                <span slot="next-nav">Next</span>
                            </pagination>
                        </div>
                    </div>
                    <!-- =========Edit Modal Component========= -->
                    <modal v-if="showModal" @close="showModal = false">
                        <h5 slot="header" class="text-dark text-center">
                            Edit Role
                        </h5>
                        <div slot="body">
                            <form class="fade-in">
                                <validation-error
                                    :errors="validationErrors"
                                    v-if="validationErrors"
                                ></validation-error>

                                <!-- Name Field -->
                                <div class="mt-5">
                                    <h5 class="input-label">Name</h5>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            class="input-control form-control"
                                            name="name"
                                            v-model="formFields.name"
                                            id="name"
                                            autocomplete="off"
                                            placeholder="Please Provide a Suitable Name"
                                        />
                                    </div>
                                </div>

                                <!-- Description Field -->
                                <div class="mt-4">
                                    <h5 class="input-label">Description</h5>
                                    <div class="form-group">
                                        <textarea
                                            name="description"
                                            v-model="formFields.description"
                                            id="description"
                                            autocomplete="off"
                                            class="input-control form-control"
                                        ></textarea>
                                    </div>
                                </div>

                                <!-- Control Button -->
                                <div class="container-fluid mt-5 d-flex p-0">
                                    <div class="ml-4">
                                        <button
                                            class="btn btn-md btn-success"
                                            @click.prevent="editRole"
                                        >
                                            EDIT ROLE
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </modal>
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
        showModal: false,
        validationErrors: "",
        formFields: {
            title: "",
            description: "Please Provide an Explicit Description",
            id: ""
        }
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
            let isForRoles = true;
            Role.listRoles(page, isForRoles)
                .then(response => {
                    this.isLoading = false;
                    this.roles = response.data.roles;
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

        removeRole(role) {
            Role.removeRole(role)
                .then(response => {
                    if (response.status == 200) {
                        this.alertSuccess(response.data);
                    }
                    //Fetch roles
                    this.getRoles();
                })
                .catch(error => {
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
                id: role
            })
                .then(response => {
                    if (response.status == 200) {
                        this.alertSuccess(response.data);
                    }
                    //Fetch role
                    this.getRoles();
                })
                .catch(error => {
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
        },

        /* -------------------------------------------------------------------------- */
        /*                               EDIT ROLE                               */
        /* -------------------------------------------------------------------------- */
        editRole() {
            console.log(this.formFields);
            Role.editRole(this.formFields, this.formFields.id)
                .then(response => {
                    this.showModal = false;
                    if (response.status == 200) {
                        this.alertSuccess(response.data);
                    }
                    //Fetch article
                    this.getRoles();
                })
                .catch(error => {
                    this.showModal = false;
                    if (error.response.status == 404) {
                        this.alertError(
                            "The article you are trying to update does not exist."
                        );
                    } else if (error.response.status == 403) {
                        this.alertError(
                            "You do not have permission to perform this operation"
                        );
                    }
                    console.error(error);
                });
        },
        /* -------------------------------------------------------------------------- */
        /*                       SHOW MODAL AND SET FORM FIELDS                       */
        /* -------------------------------------------------------------------------- */
        showEditModal(role) {
            this.showModal = true;
            this.formFields = role;
        }
    }
};
</script>
