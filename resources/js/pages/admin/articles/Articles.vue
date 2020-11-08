<template>
    <div>
        <auth-admin>
            <template v-slot:content>
                <div class="content">
                    <aura-loader v-if="isLoading"></aura-loader>
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                <h1>ARTICLES</h1>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                <router-link
                                    to="/article/create"
                                    class="btn btn-outline-aura"
                                    >Create New <i class="fa fa-plus"></i
                                ></router-link>
                            </div>
                        </div>
                    </div>
                    <!--============== Articles Table ================-->
                    <empty-resource
                        v-if="articles.data.length === 0"
                    ></empty-resource>

                    <div class="table-responsive mt-5" v-else>
                        <table class="table shadow-sm">
                            <thead class="table-aura">
                                <tr>
                                    <th scope="col">Thumbnail</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">View</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="article in articles.data"
                                    :key="article.id"
                                >
                                    <td>
                                        <img
                                            v-bind:src="article.image"
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

                                    <!-- =====View Article @To be linked with users view page======= -->
                                    <td>
                                        <button class="btn btn-sm btn-aura">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <!-- =====Remove Article ======= -->
                                        <button
                                            class="btn btn-sm btn-aura"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Remove this t"
                                            v-if="article.deleted_at === null"
                                            @click.prevent="
                                                removeArticle(article.id)
                                            "
                                        >
                                            <i class="fa fa-trash"></i>
                                        </button>

                                        <!-- =====Restore Article ======= -->
                                        <button
                                            class="btn btn-sm btn-aura"
                                            v-else
                                            @click.prevent="
                                                restoreArticle(article.id)
                                            "
                                        >
                                            <i class="fa fa-undo"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- ===== Pagination ====== -->
                        <div class="d-flex justify-content-center">
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
                </div>
            </template>
        </auth-admin>
    </div>
</template>

<script>
import Article from "../../../apis/admin/Article";
export default {
    name: "Articles",

    data: () => ({
        articles: {},
        isLoading: false
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
                .then(response => {
                    this.isLoading = false;
                    this.articles = response.data;
                    console.table(this.articles.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },

        /* -------------------------------------------------------------------------- */
        /*                               Remove Article                               */
        /* -------------------------------------------------------------------------- */

        removeArticle(article) {
            Article.removeArticle(article)
                .then(response => {
                    if (response.status == 200) {
                        this.alertSuccess(response.data);
                    }
                    //Fetch article
                    this.getArticles();
                })
                .catch(error => {
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
                id: article
            })
                .then(response => {
                    if (response.status == 200) {
                        this.alertSuccess(response.data);
                    }
                    //Fetch article
                    this.getArticles();
                })
                .catch(error => {
                    if (error.response.status == 404) {
                        this.alertError(
                            "The article you are trying to restore does not exist."
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
                position: "top-right"
            });
        },

        /* -------------------------------------------------------------------------- */
        /*                            Alert Toast - Success                           */
        /* -------------------------------------------------------------------------- */
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
