<template>
  <div>
    <auth-admin>
      <template v-slot:content>
        <div class="content">
          <!-- ========= PAGE TITLE============ -->
          <h5 class="input-label">
            Add a new Invoice <i class="fa fa-book"></i>
          </h5>

          <aura-loader v-if="isLoading"></aura-loader>
          <!-- ========INVOICE FORM========== -->
          <form class="fade-in" enctype="Multipart/form-data" v-else>
            <validation-error
              :errors="validationErrors"
              v-if="validationErrors"
            ></validation-error>

            <!-- Client name Field -->
            <div class="mt-5">
              <h5 class="input-label">Client Name</h5>
              <div class="form-group">
                <input
                  type="text"
                  class="input-control form-control"
                  name="client_name"
                  v-model="formFields.client_name"
                  id="client_name"
                  autocomplete="off"
                  placeholder="Please Provide Client's Name"
                />
              </div>
            </div>
            <!-- Amount field -->
            <div class="mt-4">
              <h5 class="input-label">Amount</h5>
              <div class="form-group">
                <input
                  type="text"
                  class="input-control form-control"
                  name="amount"
                  v-model="formFields.amount"
                  id="amount"
                  autocomplete="off"
                  placeholder="Please Provide Amount"
                />
              </div>
            </div>

            <!-- Email field -->
            <div class="mt-4">
              <h5 class="input-label">Email</h5>
              <div class="form-group">
                <input
                  type="email"
                  class="input-control form-control"
                  name="email"
                  v-model="formFields.email"
                  id="email"
                  autocomplete="off"
                  placeholder="Please Provide Client's Email"
                />
              </div>
            </div>

            <div class="container-fluid p-0 m-0">
              <div class="row">
                <!-- Select Invoice  File -->
                <div class="col-md-4 mt-5">
                  <h5 class="input-label">
                    Select Invoice * (PDF format Only)
                  </h5>
                  <input
                    type="file"
                    @change="selectFile"
                    id="document"
                    name="document"
                    class="form-control input-control py-1"
                  />
                </div>

                <!-- Segment field -->
                <div class="col-md-4 mt-5">
                  <h5 class="input-label">Select Segment</h5>
                  <v-select
                    multiple
                    label="name"
                    :options="segments"
                    v-model="formFields.segments"
                  >
                  </v-select>
                </div>
              </div>
            </div>

            <!-- Control Buttons -->
            <div class="container-fluid mt-5 d-flex p-0">
              <!-- Publish -->
              <div class="ml-4">
                <button
                  class="btn btn-md btn-success"
                  @click.prevent="createInvoice"
                >
                  SAVE INVOICE <i class="fa fa-upload"></i>
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
import Invoice from "../../../apis/admin/Invoice";
import Article from "../../../apis/admin/Invoice";
import User from "../../../apis/admin/User";

export default {
  name: "CreateInvoice",
  data: () => ({
    user: {},
    validationErrors: "",
    //Form Object
    formFields: {
      client_name: "",
      amount: "",
      email: "",
      segments: [],
      document: "",
    },
    supportedFiles: ["application/pdf"],
    isLoading: false,
    segments: ["Look Book", "Fashion", "Arts and Culture"],
  }),
  computed: {},
  mounted() {
    this.isLoadingTrue();
    User.auth()
      .then((response) => {
        this.isLoadingFalse();
        this.user = response.data;
      })
      .catch((error) => {
        console.error(error.response);
        if (error.response.status == 401) {
          this.alertError("Your session has expired, please sign in!");
          localStorage.clear();

          this.$router.push({ name: "login" });
        }
      });
  },
  methods: {
    resetFormFields() {
      this.formFields.client_name = "";
      this.formFields.amount = "Please Provide an Explicit Description";
      this.formFields.email = "";
      this.formFields.image = "";
      this.formFields.segments = "";
      this.formFields.document = "";
    },

    isLoadingTrue() {
      this.isLoading = true;
    },

    isLoadingFalse() {
      this.isLoading = false;
    },

    selectFile(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;

      if (
        this.supportedFiles.includes(files[0]["type"]) &&
        files[0]["size"] < 3e6
      ) {
        this.createFile(files[0]);
      } else {
        this.alertError(
          "Oops! File Type not Supported OR File too Large [3MB]."
        );
      }
    },

    createFile(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = (e) => {
        vm.formFields.document = e.target.result;
      };
      reader.readAsDataURL(file);
    },

    createInvoice() {
      if (Object.entries(this.user).length > 0) {
        this.isLoadingTrue();
        Invoice.createInvoice(this.formFields, this.user.id)
          .then((response) => {
            this.isLoadingFalse();
            let message = response.data;
            this.alertSuccess(message);
            this.resetFormFields();
            this.$router.push({ name: "invoice" });
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
      } else {
        this.alertError("Oops! An Error was Encountered. Please Reload.");
      }
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
.fade-in {
  animation: fadeinout 0.7s linear;
}

@keyframes fadeinout {
  0% {
    opacity: 0;
  }
  50% {
    opacity: 0.5;
  }
  100% {
    opacity: 1;
  }
}

.input-label {
  font-size: 1.2em;
  font-weight: bold;
}

.input-control:focus {
  border-color: burlywood !important;
  outline: none !important;
  outline-width: 0 !important;
  box-shadow: none !important;
  -moz-box-shadow: none;
  -webkit-box-shadow: none;
}
</style>
