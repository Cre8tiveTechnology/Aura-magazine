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
                <h1>ADVERTS</h1>
              </div>

              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 text-right">
                <router-link
                  to="/advert/create"
                  class="btn btn-outline-secondary"
                  >Create New <i class="fa fa-plus"></i
                ></router-link>
              </div>
            </div>
          </div>
          <!--============== Adverts Table ================-->
          <empty-resource v-if="adverts.data.length === 0"></empty-resource>

          <div class="table-responsive mt-5" v-else>
            <table class="table shadow-sm">
              <thead class="table-aura text-center">
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Position</th>
                  <th scope="col">User</th>
                  <th scope="col">Status</th>
                  <th scope="col">Date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <tr v-for="advert in adverts.data" :key="advert.id">
                  <td>{{ advert.name }}</td>
                  <td>{{ advert.position }}</td>
                  <td>
                    {{ advert.created_by }} -- {{ advert.created_by_role }}
                  </td>
                  <td>{{ advert.status }}</td>
                  <td>
                    {{ advert.created_at | formatDate }}
                  </td>

                  <td>
                    <!-- =====Remove Advert ======= -->
                    <button
                      class="btn btn-sm btn-aura"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Remove this t"
                      v-if="advert.deleted_at === null"
                      @click.prevent="removeAdvert(advert.id)"
                    >
                      <i class="fa fa-trash"></i>
                    </button>
                    <!--  -->

                    <!-- =====Restore Advert ======= -->
                    <button
                      class="btn btn-sm btn-aura"
                      v-else
                      @click.prevent="restoreAdvert(advert.id)"
                    >
                      <i class="fa fa-undo"></i>
                    </button>
                    <!--  -->
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- ===== Pagination ====== -->
            <div class="d-flex container mt-5">
              <pagination
                class="btn-aura"
                :data="adverts"
                @pagination-change-page="getAdverts"
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
import Advert from "../../../apis/admin/Advert";

export default {
  name: "Adverts",

  data: () => ({
    adverts: {},
    isLoading: false,
    role: {},
    validationErrors: "",
  }),

  mounted() {
    this.getAdverts();
  },

  methods: {
    /* -------------------------------------------------------------------------- */
    /*                               Fetch Adverts                               */
    /* -------------------------------------------------------------------------- */

    getAdverts(page) {
      this.isLoading = true;
      if (typeof page === "undefined") {
        page = 1;
      }
      Advert.listAdverts(page)
        .then((response) => {
          this.isLoading = false;
          this.adverts = response.data.adverts;
          this.role = response.data.user.role;
          console.log(this.role.key);
        })
        .catch((error) => {
          this.isLoading = false;
          let message = error.response.data.message;
          this.alertError(message);
        });
    },

    /* -------------------------------------------------------------------------- */
    /*                               Remove Advert                               */
    /* -------------------------------------------------------------------------- */

    removeAdvert(advert) {
      Advert.removeAdvert(advert)
        .then((response) => {
          if (response.status == 200) {
            this.alertSuccess(response.data);
          }
          //Fetch ADVERTS
          this.getAdverts();
        })
        .catch((error) => {
          if (error.response.status == 404) {
            this.alertError(
              "The Advert you are trying to remove does not exist."
            );
          }
          console.error(error);
        });
    },
    /* -------------------------------------------------------------------------- */
    /*                               Restore Advert                               */
    /* -------------------------------------------------------------------------- */
    restoreAdvert(advert) {
      Advert.restoreAdvert({
        id: advert,
      })
        .then((response) => {
          if (response.status == 200) {
            this.alertSuccess(response.data);
          }
          //Fetch ADVERTS
          this.getAdverts();
        })
        .catch((error) => {
          if (error.response.status == 404) {
            this.alertError(
              "The Advert you are trying to restore does not exist."
            );
          }
          console.error(error);
        });
    },

    /* -------------------------------------------------------------------------- */
    /*                             Alert Toast - Error                            */
    /* -------------------------------------------------------------------------- */
    alertError(message) {
      Vue.$toast.open({
        message: message,
        type: "error",
        position: "top-right",
      });
    },

    /* -------------------------------------------------------------------------- */
    /*                            Alert Toast - Success                           */
    /* -------------------------------------------------------------------------- */
    alertSuccess(message) {
      Vue.$toast.open({
        message: message,
        type: "success",
        position: "top-right",
      });
    },

    /* -------------------------------------------------------------------------- */
    /*                              Reset Form Field                              */
    /* -------------------------------------------------------------------------- */

    resetFormFields() {
      this.formFields.title = "";
      this.formFields.description = "Please Provide an Explicit Description";
      this.formFields.category = "";
      this.formFields.image = "";
      this.formFields.content = "";
      this.formFields.image_orientation = "";
    },

    /* -------------------------------------------------------------------------- */
    /*                                 Select File                                */
    /* -------------------------------------------------------------------------- */

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

    /* -------------------------------------------------------------------------- */
    /*                                Create Image                                */
    /* -------------------------------------------------------------------------- */

    createImage(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = (e) => {
        vm.formFields.image = e.target.result;
      };
      reader.readAsDataURL(file);
    },
  },
};
</script>
