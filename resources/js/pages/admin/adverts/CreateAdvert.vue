<template>
  <div>
    <auth-admin>
      <template v-slot:content>
        <div class="content">
          <!-- ========= PAGE TITLE============ -->
          <h5 class="input-label">
            Place a new Advert <i class="fa fa-tripadvisor"></i>
          </h5>

          <div class="mt-3">
            <span class="text-small text-danger">
              <i class="fa fa-info-circle" aria-hidden="true"></i> Please make
              sure the Advert sizes to be uploaded are of the right size. Don't
              know the right size? Contact the Admin. If not the rendering of
              the advert to users will be displeasing.</span
            >
          </div>

          <aura-loader v-if="misc.isLoading"></aura-loader>
          <!-- ========ADVERT FORM========== -->
          <form class="fade-in" enctype="Multipart/form-data" v-else>
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

            <!-- Position field -->
            <div class="mt-4">
              <h5 class="input-label">Choose a Position</h5>
              <v-select
                label="position"
                :options="positions"
                :reduce="(position) => position"
                v-model="formFields.position"
                aria-placeholder="Please select a Position"
              >
              </v-select>
            </div>

            <!-- Image Fields -->
            <div class="container-fluid p-0 m-0">
              <div class="row">
                <!-- Image Field lg-->
                <div class="col-md-6 mt-5">
                  <h5 class="input-label">Advert File -- Large</h5>
                  <input
                    type="file"
                    @change="selectFile"
                    id="image"
                    name="image"
                    class="form-control input-control py-1"
                  />
                </div>

                <!-- Image Field sm-->
                <div class="col-md-6 mt-5">
                  <h5 class="input-label">Advert File -- Small</h5>
                  <input
                    type="file"
                    @change="selectFilee"
                    id="image_sm"
                    name="image_sm"
                    class="form-control input-control py-1"
                  />
                </div>
              </div>
            </div>

            <!-- Control Buttons -->
            <div class="container-fluid mt-5 d-flex p-0">
              <!-- Draft -->
              <div class="mr-4">
                <button class="btn btn-md btn-aura" @click.prevent="saveDraft">
                  SAVE AS DRAFT <i class="fa fa-save"></i>
                </button>
              </div>

              <!-- Publish -->
              <div class="ml-4">
                <button
                  class="btn btn-md btn-success"
                  @click.prevent="createAdvert"
                >
                  PLACE ADVERT <i class="fa fa-upload"></i>
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
import Advert from "../../../apis/admin/Advert";
import User from "../../../apis/admin/User";

export default {
  name: "CreateAdvert",
  mounted() {
    this.isLoadingTrue();
    User.auth()
      .then((response) => {
        this.isLoadingFalse();
        this.user = response.data;
      })
      .catch((error) => {
        if (error.response.status == 401) {
          this.alertError("Your session has expired, please sign in!");
          localStorage.clear();
          this.$router.push({ name: "login" });
        }
      });
  },
  data: () => ({
    user: {},
    positions: [
      "Homepage -- Slot 1",
      "Homepage -- Slot 2",
      "Homepage -- Slot 3",
      "News Page -- Slot 1",
    ],

    validationErrors: "",

    formFields: {
      name: "",
      position: "",
      image: "",
      image_sm: "",
    },
    supportedFiles: ["image/jpeg", "image/jpg", "image/png"],
    misc: {
      isLoading: false,
    },
  }),
  methods: {
    saveDraft() {
      return alert("Draft is Coming Soon!");
    },
    resetFormFields() {
      this.formFields.name = "";
      this.formFields.position = "";
      this.formFields.image = "";
      this.formFields.image_sm = "";
    },

    isLoadingTrue() {
      this.misc.isLoading = true;
    },

    isLoadingFalse() {
      this.misc.isLoading = false;
    },

    selectFile(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;
      if (
        this.supportedFiles.includes(files[0]["type"]) &&
        files[0]["size"] < 3e6
      ) {
        this.createImage(files[0]);
      } else {
        this.alertError(
          "Oops! File Type not Supported OR File too Large [3MB]."
        );
      }
    },

    createImage(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = (e) => {
        vm.formFields.image = e.target.result;
      };
      reader.readAsDataURL(file);
    },

    selectFilee(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;
      if (
        this.supportedFiles.includes(files[0]["type"]) &&
        files[0]["size"] < 3e6
      ) {
        this.createImagee(files[0]);
      } else {
        this.alertError(
          "Oops! File Type not Supported OR File too Large [3MB]."
        );
      }
    },

    createImagee(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = (e) => {
        vm.formFields.image_sm = e.target.result;
      };
      reader.readAsDataURL(file);
    },

    createAdvert() {
      if (Object.entries(this.user).length > 0) {
        this.isLoadingTrue();
        Advert.createAdvert(this.formFields, this.user.id)
          .then((response) => {
            this.isLoadingFalse();
            let message = response.data;
            this.alertSuccess(message);
            this.resetFormFields();
            this.$router.push({ name: "adverts" });
          })
          .catch((error) => {
            this.isLoadingFalse();
            let message = error.response.data.message;
            if (error.response.status == 422) {
              this.alertWarning(message);
              this.validationErrors = error.response.data.errors;
            } else {
              this.alertError(
                message
                  ? message
                  : "Oops! An Error was Encountered while creating Advert. Please Try Again."
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
