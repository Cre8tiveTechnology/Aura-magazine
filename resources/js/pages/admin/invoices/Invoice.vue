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
                                <h1>INVOICES</h1>
                            </div>

                            <div
                                class="col-xl-4 col-lg-4 col-md-4 col-sm-4 text-right"
                            >
                                <router-link
                                    to="/invoice/create"
                                    class="btn btn-outline-secondary"
                                    >Create New <i class="fa fa-plus"></i
                                ></router-link>
                            </div>
                        </div>
                    </div>
                    <!--============== Invoices Table ================-->
                    <empty-resource
                        v-if="invoices.data.length === 0"
                    ></empty-resource>

                    <div class="table-responsive mt-5" v-else>
                        <table class="table shadow-sm">
                            <thead class="table-aura text-center">
                                <tr>
                                    <th scope="col">Client Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Segments</th>
                                    <th scope="col">DATE</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr
                                    v-for="invoice in invoices.data"
                                    :key="invoice.id"
                                >
                                    <td>
                                        {{ invoice.client_name }}
                                    </td>
                                    <td>
                                        {{ invoice.amount }}
                                    </td>
                                    <td>
                                        {{ invoice.email }}
                                    </td>
                                    <td>
                                        {{ invoice.segments }}
                                    </td>
                                    <td>
                                        {{ invoice.created_at | formatDate }}
                                    </td>

                                    <!-- ====TABLE ACTIONS======= -->
                                    <td>
                                        <!-- =====Remove Invoice ======= -->
                                        <button
                                            class="btn btn-sm btn-aura"
                                            v-if="invoice.deleted_at === null"
                                            @click.prevent="
                                                removeInvoice(invoice.id)
                                            "
                                        >
                                            <i class="fa fa-trash"></i>
                                        </button>

                                        <!-- =====Restore Invoice ======= -->
                                        <button
                                            class="btn btn-sm btn-aura"
                                            v-else
                                            @click.prevent="
                                                restoreInvoice(invoice.id)
                                            "
                                        >
                                            <i class="fa fa-undo"></i>
                                        </button>
                                        <!-- =====Edit Invoice ======= -->
                                        <button
                                            class="btn btn-sm btn-aura"
                                            id="show-modal"
                                            @click="showEditModal(invoice)"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <!-- =====Download Invoice ======= -->
                                        <a
                                            class="btn btn-sm btn-secondary"
                                            :href="invoice.document"
                                            target="blank"
                                        >
                                            <i class="fa fa-download"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- ===== Pagination ====== -->
                        <div class="d-flex container mt-5">
                            <pagination
                                class="btn-aura"
                                :data="invoices"
                                @pagination-change-page="getInvoices"
                            >
                                <span slot="prev-nav">Previous </span>
                                <span slot="next-nav">Next</span>
                            </pagination>
                        </div>
                    </div>
                    <!-- =========Edit Modal Component========= -->
                    <modal v-if="showModal" @close="showModal = false">
                        <h5 slot="header" class="text-dark text-center">
                            Edit Invoice
                        </h5>
                        <div slot="body">
                            <form class="fade-in" enctype="Multipart/form-data">
                                <validation-error
                                    :errors="validationErrors"
                                    v-if="validationErrors"
                                ></validation-error>

                                <!-- Client name Field -->
                                <div class="mt-3">
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
                                        <div class="col-md-6 mt-5">
                                            <h5 class="input-label">
                                                Select Invoice * (PDF format
                                                Only)
                                            </h5>
                                            <input
                                                type="file"
                                                @change="selectFile"
                                                id="document"
                                                name="document"
                                                class="form-control input-control "
                                            />
                                        </div>

                                        <!-- Segment field -->
                                        <div class="col-md-6 mt-5">
                                            <h5 class="input-label">
                                                Select Segment
                                            </h5>
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
                                            @click.prevent="editInvoice"
                                        >
                                            UPDATE INVOICE
                                            <i class="fa fa-upload"></i>
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
import Invoice from "../../../apis/admin/Invoice";
import User from "../../../apis/admin/User";
export default {
    name: "Invoice",
    data: () => ({
        user: {},
        invoices: {},
        isLoading: false,
        showModal: false,
        validationErrors: "",
        //Form Object
        formFields: {
            client_name: "",
            amount: "",
            email: "",
            segments: [],
            document: ""
        },
        //Supported files array
        supportedFiles: ["application/pdf"],
        segments: ["Look Book", "Fashion", "Arts and Culture"]
    }),

    mounted() {
        this.getInvoices();
    },

    methods: {
        /* -------------------------------------------------------------------------- */
        /*                               Fetch Invoices                               */
        /* -------------------------------------------------------------------------- */

        getInvoices(page) {
            this.isLoading = true;
            if (typeof page === "undefined") {
                page = 1;
            }
            Invoice.listInvoices(page)
                .then(response => {
                    this.isLoading = false;
                    this.invoices = response.data.invoices;
                    this.role = response.data.user.role;
                    console.log(this.role.key);
                })
                .catch(error => {
                    this.isLoading = false;
                    let message = error.response.data.message;
                    this.alertError(message);
                });
        },

        /* -------------------------------------------------------------------------- */
        /*                               Remove Invoice                               */
        /* -------------------------------------------------------------------------- */

        removeInvoice(invoice) {
            Invoice.removeInvoice(invoice)
                .then(response => {
                    if (response.status == 200) {
                        this.alertSuccess(response.data);
                    }
                    //Fetch invoice
                    this.getInvoices();
                })
                .catch(error => {
                    if (error.response.status == 404) {
                        this.alertError(
                            "The invoice you are trying to remove does not exist."
                        );
                    }
                    console.error(error);
                });
        },
        /* -------------------------------------------------------------------------- */
        /*                               Restore Invoice                               */
        /* -------------------------------------------------------------------------- */
        restoreInvoice(invoice) {
            Invoice.restoreInvoice({
                id: invoice
            })
                .then(response => {
                    if (response.status == 200) {
                        this.alertSuccess(response.data);
                    }
                    //Fetch invoice
                    this.getInvoices();
                })
                .catch(error => {
                    if (error.response.status == 404) {
                        this.alertError(
                            "The invoice you are trying to restore does not exist."
                        );
                    }
                    console.error(error);
                });
        },

        /* -------------------------------------------------------------------------- */
        /*                               Update Invoice                               */
        /* -------------------------------------------------------------------------- */
        editInvoice() {
            console.log(this.formFields);
            Invoice.editInvoice(this.formFields, this.formFields.id)
                .then(response => {
                    this.showModal = false;
                    if (response.status == 200) {
                        this.alertSuccess(response.data);
                    }
                    //Fetch invoice
                    this.getInvoices();
                })
                .catch(error => {
                    this.showModal = false;
                    if (error.response.status == 404) {
                        this.alertError(
                            "The invoice you are trying to update does not exist."
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
        },

        /* -------------------------------------------------------------------------- */
        /*                              Reset Form Field                              */
        /* -------------------------------------------------------------------------- */

        resetFormFields() {
            this.formFields.title = "";
            this.formFields.description =
                "Please Provide an Explicit Description";
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
                this.createFile(files[0]);
            } else {
                this.alertError(
                    "Oops! File Type not Supported OR File too Large [3MB]."
                );
            }
        },

        /* -------------------------------------------------------------------------- */
        /*                                Create File                                */
        /* -------------------------------------------------------------------------- */

        createFile(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = e => {
                vm.formFields.document = e.target.result;
            };
            reader.readAsDataURL(file);
        },

        /* -------------------------------------------------------------------------- */
        /*                    Show Modal & Set formFields Object                      */
        /* -------------------------------------------------------------------------- */

        showEditModal(invoice) {
            this.showModal = true;
            this.formFields = invoice;
        }
    }
};
</script>
