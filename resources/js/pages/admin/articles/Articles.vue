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
                <h1>ARTICLES</h1>
              </div>

              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 text-right">
                <router-link
                  to="/article/create"
                  class="btn btn-outline-secondary"
                  >Create New <i class="fa fa-plus"></i
                ></router-link>
              </div>
            </div>
          </div>
          <!--============== Articles Table ================-->
          <empty-resource v-if="articles.data.length === 0"></empty-resource>

          <div class="table-responsive mt-5" v-else>
            <table class="table shadow-sm">
              <thead class="table-aura text-center">
                <tr>
                  <th scope="col">Thumbnail</th>
                  <th scope="col">Title</th>
                  <th scope="col">Editor</th>
                  <th scope="col">Date</th>
                  <th scope="col">Views</th>
                  <th scope="col">View</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <tr v-for="article in articles.data" :key="article.id">
                  <td>
                    <img
                      :src="!article.image ? misc.thumbnail : article.image"
                      class="rounded article-img"
                      width="50px"
                      height="50px"
                      alt="thumbnail"
                    />
                  </td>
                  <td>{{ article.title | truncate(76) }}</td>
                  <td>{{ article.user_name | splitName }}</td>
                  <td>
                    {{ article.created_at | formatDate }}
                  </td>
                  <td>
                    {{ article.views }}
                  </td>

                  <!-- =====View Article @To be linked with users view page======= -->
                  <td>
                    <router-link
                      class="btn btn-sm btn-aura"
                      :to="{
                        name: 'post',
                        params: {
                          id: article.id,
                          title: article.slug,
                        },
                      }"
                    >
                      <i class="fa fa-eye"></i>
                    </router-link>
                  </td>
                  <td>
                    <!-- =====Remove Article ======= -->
                    <button
                      class="btn btn-sm btn-aura"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Remove this t"
                      v-if="article.deleted_at === null"
                      @click.prevent="removeArticle(article.id)"
                    >
                      <i class="fa fa-trash"></i>
                    </button>

                    <!-- =====Restore Article ======= -->
                    <button
                      class="btn btn-sm btn-aura"
                      v-else
                      @click.prevent="restoreArticle(article.id)"
                    >
                      <i class="fa fa-undo"></i>
                    </button>
                    <!-- =====Edit Article ======= -->
                    <button
                      class="btn btn-sm btn-aura"
                      v-if="role.key === 'editorinchief'"
                      id="show-modal"
                      @click="showEditModal(article)"
                    >
                      <i class="fa fa-edit"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- ===== Pagination ====== -->
            <div class="d-flex container mt-5">
              <pagination
                class="btn-aura"
                :data="articles"
                @pagination-change-page="getArticles"
              >
                <span slot="prev-nav">Previous </span>
                <span slot="next-nav">Next</span>
              </pagination>
            </div>
          </div>
          <!-- =========Edit Modal Component========= -->
          <modal v-if="showModal" @close="showModal = false">
            <h5 slot="header" class="text-dark text-center">Edit Article</h5>
            <div slot="body">
              <form class="fade-in" enctype="Multipart/form-data">
                <validation-error
                  :errors="validationErrors"
                  v-if="validationErrors"
                ></validation-error>

                <!-- Title Field -->
                <div class="mt-2">
                  <h5 class="input-label">Title</h5>
                  <div class="form-group">
                    <input
                      type="text"
                      class="input-control form-control"
                      name="title"
                      v-model="formFields.title"
                      id="title"
                      autocomplete="off"
                      placeholder="Please Provide a
                                            Suitable title"
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
                        :src="
                          !formFields.image ? misc.thumbnail : formFields.image
                        "
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
                  <!-- Publish -->
                  <div class="ml-4">
                    <button
                      class="btn btn-block btn-success"
                      @click.prevent="editArticle()"
                    >
                      EDIT ARTICLE
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
import Article from "../../../apis/admin/Article";
import Editor from "@tinymce/tinymce-vue";

export default {
  name: "Articles",
  components: {
    editor: Editor,
  },
  data: () => ({
    articles: {},
    isLoading: false,
    role: {},
    showModal: false,
    validationErrors: "",

    //Tiny Editor Option
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
    //Form Object
    formFields: {
      title: "",
      description: "Please Provide an Explicit Description",
      category: "",
      image: "",
      content: "",
      image_orientation: "",
      id: "",
    },
    //Supported Image array
    supportedFiles: ["image/jpeg", "image/jpg", "image/png"],
    //Misc. Object
    misc: {
      thumbnail:
        "https://res.cloudinary.com/cre8tive-technologies/image/upload/v1604580085/aura/Preview-icon_mzat3j.png",
    },
  }),

  mounted() {
    this.getArticles();
  },

  methods: {
    /* -------------------------------------------------------------------------- */
    /*                               Fetch Articles                               */
    /* -------------------------------------------------------------------------- */

    getArticles(page) {
      this.isLoading = true;
      if (typeof page === "undefined") {
        page = 1;
      }
      Article.listArticles(page)
        .then((response) => {
          this.isLoading = false;
          this.articles = response.data.articles;
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
    /*                               Remove Article                               */
    /* -------------------------------------------------------------------------- */

    removeArticle(article) {
      Article.removeArticle(article)
        .then((response) => {
          if (response.status == 200) {
            this.alertSuccess(response.data);
          }
          //Fetch article
          this.getArticles();
        })
        .catch((error) => {
          if (error.response.status == 404) {
            this.alertError(
              "The article you are trying to remove does not exist."
            );
          }
          console.error(error);
        });
    },
    /* -------------------------------------------------------------------------- */
    /*                               Restore Article                               */
    /* -------------------------------------------------------------------------- */
    restoreArticle(article) {
      Article.restoreArticle({
        id: article,
      })
        .then((response) => {
          if (response.status == 200) {
            this.alertSuccess(response.data);
          }
          //Fetch article
          this.getArticles();
        })
        .catch((error) => {
          if (error.response.status == 404) {
            this.alertError(
              "The article you are trying to restore does not exist."
            );
          }
          console.error(error);
        });
    },

    /* -------------------------------------------------------------------------- */
    /*                               Update Article                               */
    /* -------------------------------------------------------------------------- */
    editArticle() {
      console.log(this.formFields);
      Article.editArticle(this.formFields, this.formFields.id)
        .then((response) => {
          this.showModal = false;
          if (response.status == 200) {
            this.alertSuccess(response.data);
          }
          //Fetch article
          this.getArticles();
        })
        .catch((error) => {
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

    /* -------------------------------------------------------------------------- */
    /*                    Show Modal & Set formFields Object                      */
    /* -------------------------------------------------------------------------- */

    showEditModal(article) {
      this.showModal = true;
      this.formFields = article;
    },
  },
};
</script>
