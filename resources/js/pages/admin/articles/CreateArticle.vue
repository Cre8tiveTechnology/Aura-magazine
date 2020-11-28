<template>
  <div>
    <auth-admin>
      <template v-slot:content>
        <div class="content">
          <!-- ========= PAGE TITLE============ -->
          <h5 class="input-label">
            Add a new Article <i class="fa fa-book"></i>
          </h5>

          <aura-loader v-if="misc.isLoading"></aura-loader>
          <!-- ========ARTICLE FORM========== -->
          <form class="fade-in" enctype="Multipart/form-data" v-else>
            <validation-error
              :errors="validationErrors"
              v-if="validationErrors"
            ></validation-error>

            <!-- Title Field -->
            <div class="mt-5">
              <h5 class="input-label">Title</h5>
              <div class="form-group">
                <input
                  type="text"
                  class="input-control form-control"
                  name="title"
                  v-model="formFields.title"
                  id="title"
                  autocomplete="off"
                  placeholder="Please Provide a Suitable title"
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

            <!-- Content Field -->
            <div class="mt-4">
              <h5 class="input-label">Content</h5>
              <editor
                name="content"
                v-model="formFields.content"
                api-key="s0a0a2vky79uza8yzxwbe4khvedd7mdehfrp4e1b4rxoplw4"
                :init="{
                  height: 400,
                  menubar: true,
                  plugins: [
                    'advlist codesample autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount',
                  ],
                  toolbar:
                    'undo redo | codesample | formatselect | bold italic backcolor | \
                    alignleft aligncenter alignright alignjustify | \
                    bullist numlist outdent indent | removeformat | help',
                }"
              />
            </div>

            <!-- Image Fields -->
            <div class="container-fluid p-0 m-0">
              <div class="row">
                <!-- Cover Photo Field -->
                <div class="col-md-4 mt-5">
                  <h5 class="input-label">Choose a Cover photo</h5>
                  <input
                    type="file"
                    @change="selectFile"
                    id="image"
                    name="image"
                    class="form-control input-control py-1"
                  />
                </div>

                <div class="col-md-4 text-center mt-5">
                  <img
                    :src="!formFields.image ? misc.thumbnail : formFields.image"
                    class="img-responsive rounded-circle"
                    height="80"
                    width="90"
                  />
                </div>

                <!-- Cover Photo Orientation Field -->
                <div class="col-md-4 mt-5">
                  <h5 class="input-label">Choose an Image Orientation</h5>
                  <toggle-switch
                    :options="myOptions"
                    name="image_orientation"
                    v-model="formFields.image_orientation"
                  />
                </div>
              </div>
            </div>

            <!-- Category and Slug Fields -->
            <div class="container-fluid p-0 m-0">
              <div class="row">
                <!-- Category Field -->
                <div class="col-md-6 mt-5">
                  <h5 class="input-label">Select a Category</h5>
                  <select
                    name="category"
                    v-model="formFields.category"
                    id="category"
                    class="form-control input-control"
                  >
                    <option value="News">News</option>
                    <option value="Beauty">Beauty</option>
                    <option value="Fashion">Fashion</option>
                    <option value="Culture">Culture</option>
                    <optgroup label="Life and Love">
                      <option value="Ask Ruby">Ask Ruby</option>
                      <option value="Sex and Relationship">
                        Sex and Relationship
                      </option>
                    </optgroup>
                  </select>
                </div>

                <!-- Slug Field -->
                <div class="col-md-6 mt-5">
                  <h5 class="input-label">Slug</h5>
                  <div class="form-group">
                    <input
                      type="text"
                      class="input-control form-control"
                      name="slug"
                      id="slug"
                      disabled
                      v-model="formFields.title"
                      placeholder="Slug should be the same as title"
                    />
                  </div>
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
                  @click.prevent="createArticle"
                >
                  PUBLISH ARTICLE <i class="fa fa-upload"></i>
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
import Editor from "@tinymce/tinymce-vue";
import Article from "../../../apis/admin/Article";
import User from "../../../apis/admin/User";

export default {
  name: "CreateArticle",
  components: {
    editor: Editor,
  },
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
  data: () => ({
    user: {},
    validationErrors: "",
    myOptions: {
      layout: {
        color: "black",
        backgroundColor: "white",
        borderColor: "lightgrey",
        fontFamily: "Tahoma",
        fontWeight: "normal",
        fontWeightSelected: "bold",
        squareCorners: false,
        noBorder: false,
      },
      size: {
        fontSize: 0.8,
        height: 2,
        padding: 0.4,
        width: 18,
      },
      items: {
        delay: 0.4,
        preSelected: "",
        disabled: false,
        labels: [
          {
            name: "Landscape",
            color: "white",
            backgroundColor: "pink",
          },
          {
            name: "Portrait",
            color: "white",
            backgroundColor: "black",
          },
        ],
      },
    },
    formFields: {
      title: "",
      description: "Please Provide an Explicit Description",
      category: "",
      image: "",
      content: "",
      image_orientation: "",
    },
    supportedFiles: ["image/jpeg", "image/jpg", "image/png"],
    misc: {
      isLoading: false,
      thumbnail:
        "https://res.cloudinary.com/cre8tive-technologies/image/upload/v1604580085/aura/Preview-icon_mzat3j.png",
    },
  }),
  computed: {},
  methods: {
    saveDraft() {
      return alert("Draft is Coming Soon!");
    },
    resetFormFields() {
      this.formFields.title = "";
      this.formFields.description = "Please Provide an Explicit Description";
      this.formFields.category = "";
      this.formFields.image = "";
      this.formFields.content = "";
      this.formFields.image_orientation = "";
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

    createArticle() {
      if (Object.entries(this.user).length > 0) {
        this.isLoadingTrue();
        Article.createArticle(this.formFields, this.user.id)
          .then((response) => {
            this.isLoadingFalse();
            let message = response.data;
            this.alertSuccess(message);
            this.resetFormFields();
            this.$router.push({ name: "article" });
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
