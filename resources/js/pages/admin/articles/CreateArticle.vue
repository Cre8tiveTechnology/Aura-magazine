<template>
    <div>
        <auth-admin>
            <template v-slot:content>
                <div class="content">
                    <h5 class="input-label">
                        Add a new Article <i class="fa fa-book"></i>
                    </h5>

                    <!-- <div class="body" v-if="data">
                        <div class="bottom-container txt">AURA</div>

                        <div class="top-container txt">AURA</div>
                    </div> -->

                    <form
                        @submit.prevent="createArticle"
                        enctype="Multipart/form-data"
                    >
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
                                    class="input-control form-control"
                                >
                                    Please Provide an Explicit Description</textarea
                                >
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
                                        'insertdatetime media table paste code help wordcount'
                                    ],
                                    toolbar:
                                        'undo redo | codesample | formatselect | bold italic backcolor | \
                    alignleft aligncenter alignright alignjustify | \
                    bullist numlist outdent indent | removeformat | help'
                                }"
                            />
                        </div>

                        <!-- Image Fields -->
                        <div class="container-fluid p-0 m-0">
                            <div class="row">
                                <!-- Cover Photo Field -->
                                <div class="col-md-6 mt-5">
                                    <h5 class="input-label">
                                        Choose a Cover photo
                                    </h5>
                                    <input
                                        type="file"
                                        @change="selectFile"
                                        id="image"
                                        name="image"
                                        class="form-control input-control py-1"
                                    />
                                </div>

                                <!-- Cover Photo Orientation Field -->
                                <div class="col-md-6 mt-5">
                                    <h5 class="input-label">
                                        Choose an Image Orientation
                                    </h5>
                                    <toggle-switch
                                        :options="myOptions"
                                        name="image_orientation"
                                        @change="imageOrientation"
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- Category and Slug Fields -->
                        <div class="container-fluid p-0 m-0">
                            <div class="row">
                                <!-- Category Field -->
                                <div class="col-md-6 mt-5">
                                    <h5 class="input-label">
                                        Select a Category
                                    </h5>
                                    <select
                                        name="category"
                                        v-model="formFields.category"
                                        id="category"
                                        class="form-control input-control"
                                    >
                                        <optgroup label="Culture">
                                            <option value="ll"
                                                >Love and Hope</option
                                            >
                                            <option value="oo"
                                                >Horoscope</option
                                            >
                                        </optgroup>
                                        <option value="oo">News</option>
                                        <option value="oo">Beauty</option>
                                    </select>
                                </div>

                                <!-- Slug Field -->
                                <div class="col-md-6 mt-5">
                                    <h5 class="input-label">Slug</h5>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            class="input-control form-control"
                                            name=""
                                            id=""
                                            placeholder="Slug should be the same as title"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Control Buttons -->
                        <div class="container-fluid mt-5 d-flex p-0">
                            <div class="mr-4">
                                <button
                                    class="btn btn-md btn-aura"
                                    @click.prevent="showIt"
                                >
                                    SAVE AS DRAFT <i class="fa fa-save"></i>
                                </button>
                            </div>
                            <div class="ml-4">
                                <input
                                    type="submit"
                                    class="btn btn-md btn-success"
                                    value="  PUBLISH ARTICLE"
                                />
                                <!-- <button
                                    class="btn btn-md btn-success"
                                    @click.prevent="createArticle"
                                >
                                    PUBLISH ARTICLE <i class="fa fa-upload"></i>
                                </button> -->
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
import validationError from "../../../components/ValidationError";
import Article from "../../../apis/admin/Article";

export default {
    name: "CreateArticle",
    components: {
        editor: Editor
    },
    data: () => ({
        validationErrors: [],
        myOptions: {
            layout: {
                color: "black",
                backgroundColor: "white",
                borderColor: "lightgrey",
                fontFamily: "Tahoma",
                fontWeight: "normal",
                fontWeightSelected: "bold",
                squareCorners: false,
                noBorder: false
            },
            size: {
                fontSize: 0.8,
                height: 2,
                padding: 0.4,
                width: 18
            },
            items: {
                delay: 0.4,
                preSelected: "",
                disabled: false,
                labels: [
                    {
                        name: "Landscape",
                        color: "white",
                        backgroundColor: "pink"
                    },
                    {
                        name: "Portrait",
                        color: "white",
                        backgroundColor: "black"
                    }
                ]
            }
        },
        formFields: {
            title: "",
            description: "",
            category: "",
            image: "",
            content: "",
            image_orientation: ""
        },
        formData: new FormData()
    }),
    computed: {},
    methods: {
        /* -------------------------------------------------------------------------- */
        /*                         Show  error on toast alert                         */
        /* -------------------------------------------------------------------------- */
        showIt() {
            Vue.$toast.open({
                message: "Something went wrong!",
                type: "error",
                position: "top-right"
            });
        },

        selectFile(event) {
            // `files` is always an array because the file input may be in multiple mode
            return (this.formFields.image = event.target.files[0]);
        },

        imageOrientation(event) {
            // `files` is always an array because the file input may be in multiple mode
            return (this.formFields.imageOrientation = event.value);
        },

        /* -------------------------------------------------------------------------- */
        /*                        Register - @param  Form Data                        */
        /* -------------------------------------------------------------------------- */
        createArticle() {
            this.formData.append("title", this.formFields.title);
            this.formData.append("description", this.formFields.description);
            this.formData.append("category", this.formFields.category);
            this.formData.append("image", this.formFields.image);
            this.formData.append(
                "image_orientation",
                this.formFields.image_orientation
            );
            console.log(this.formFields);
            Article.createArticle(this.formFields)
                .then(response => {
                    this.$router.push({ name: "article" });
                })
                .catch(errors => {
                    if (errors.response.status != 201) {
                        this.validationErrors = errors.response.data;
                    }
                });
        }
    }
};
</script>

<style>
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

.body {
    height: 80vh;
    font-family: "Nunito", "sans-serif";
    font-size: 5vw;
}

.bottom-container,
.top-container {
    width: 40vw;
    height: 35vh;
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 35vh;
    left: 30vw;
    padding: 1vw;
}

.bottom-container {
    color: #232323;
}

.top-container {
    background-color: #ff63b6;
    color: white;
    clip-path: circle(13% at 85% 50%);
    animation: circleMove 30s ease-in-out infinite;
}

.txt {
    font-family: cursive;
    font-size: 2em;
    font-weight: bold;
    letter-spacing: 15px;
}

@keyframes circleMove {
    0%,
    100% {
        clip-path: circle(13% at 85% 50%);
    }
    50% {
        clip-path: circle(13% at 15% 50%);
    }
}
</style>
