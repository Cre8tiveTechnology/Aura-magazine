<template>
    <div>
        <auth-admin>
            <template v-slot:content>
                <div class="content">
                    <h5 class="input-label">
                        Add a new User <i class="fa fa-user"></i>
                    </h5>

                    <aura-loader v-if="misc.isLoading"></aura-loader>

                    <form class="fade-in" v-else>
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
                                    placeholder="Please Provide User's Name"
                                />
                            </div>
                        </div>

                        <!-- Description Field -->
                        <div class="mt-4">
                            <h5 class="input-label">Email</h5>
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="input-control form-control"
                                    name="name"
                                    v-model="formFields.email"
                                    id="name"
                                    autocomplete="off"
                                    placeholder="Please Provide a Valid Email Address"
                                />
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="mt-4">
                            <h5 class="input-label">Password</h5>
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="input-control form-control"
                                    name="name"
                                    v-model="formFields.password"
                                    id="name"
                                    autocomplete="off"
                                    placeholder="Please Provide a Secured Password"
                                />
                            </div>
                        </div>
                        <div class="mt-4">
                            <h5 class="input-label">Select User Role</h5>
                            <v-select
                                label="name"
                                :options="roles"
                                :reduce="role => role.id"
                                v-model="formFields.role_id"
                                aria-placeholder="Please select user role"
                            >
                            </v-select>
                        </div>
                        <!-- Control Buttons -->
                        <div class="container-fluid mt-5 d-flex p-0">
                            <!-- Reset -->
                            <div class="mr-4">
                                <button
                                    class="btn btn-md btn-danger"
                                    @click.prevent="resetFormFields"
                                >
                                    RESET <i class="fa fa-undo"></i>
                                </button>
                            </div>

                            <!-- Create -->
                            <div class="ml-4">
                                <button
                                    class="btn btn-md btn-success"
                                    @click.prevent="createUser"
                                >
                                    SAVE
                                    <i class="fa fa-cloud-upload"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </template>
        </auth-admin>
    </div>
</template>

<script>
import User from "../../../apis/admin/User";
import Role from "../../../apis/admin/Role";

export default {
    name: "CreateUser",
    data: () => ({
        validationErrors: "",
        formFields: {
            name: "",
            email: "",
            role_id: "Please select role",
            password: ""
        },
        misc: {
            isLoading: false
        },
        roles: []
    }),
    mounted() {
        this.getRoles();
    },
    methods: {
        resetFormFields() {
            (this.name = ""),
                (this.email = ""),
                (this.role_id = "Please select role"),
                (this.password = "");
        },

        isLoadingTrue() {
            this.misc.isLoading = true;
        },

        isLoadingFalse() {
            this.misc.isLoading = false;
        },

        createUser() {
            this.isLoadingTrue();
            User.register(this.formFields)
                .then(response => {
                    this.isLoadingFalse();
                    let message = response.data;
                    this.alertSuccess(message);
                    this.resetFormFields();
                    this.$router.push({ name: "role" });
                })
                .catch(errors => {
                    this.isLoadingFalse();
                    let message = errors.response.data.message;
                    if (errors.response.status == 422) {
                        this.alertWarning(message);
                        this.validationErrors = errors.response.data.errors;
                    } else {
                        this.alertError(
                            message
                                ? message
                                : "Oops! An Error was Encountered. Please Try Again."
                        );
                    }
                });
        },

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
        getRoles() {
            this.isLoading = true;
            Role.listRoles()
                .then(response => {
                    this.isLoading = false;
                    this.roles = response.data.roles;
                    console.log(this.roles);
                })
                .catch(err => {
                    this.isLoading = false;
                    let message = err.response.data.message;
                    this.alertError(message);
                });
        }
    }
};
</script>
