<template>
  <div>
    <auth-admin>
      <template v-slot:content>
        <div class="content">
          <h5 class="input-label">
            Add a new Role <i class="fa fa-tasks"></i>
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
                  @click.prevent="createRole"
                >
                  CREATE ROLE <i class="fa fa-cloud-upload"></i>
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
import Role from "../../../apis/admin/Role";

export default {
  name: "CreateRole",
  data: () => ({
    validationErrors: "",
    formFields: {
      title: "",
      description: "Please Provide an Explicit Description",
    },
    misc: {
      isLoading: false,
    },
  }),
  methods: {
    resetFormFields() {
      this.formFields.title = "";
      this.formFields.description = "Please Provide an Explicit Description";
    },

    isLoadingTrue() {
      this.misc.isLoading = true;
    },

    isLoadingFalse() {
      this.misc.isLoading = false;
    },

    createRole() {
      this.isLoadingTrue();
      Role.createRole(this.formFields)
        .then((response) => {
          this.isLoadingFalse();
          let message = response.data;
          this.alertSuccess(message);
          this.resetFormFields();
          this.$router.push({ name: "role" });
        })
        .catch((errors) => {
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


<style>
</style>
