<template>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4>New Student</h4>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 order-md-2 mb-4">
                                    <b-alert
                                        v-if="user.id"
                                        show
                                        dismissible
                                        variant="success"
                                    >
                                        New Faculty added with username :
                                        {{ user.email }}, Password : Phone
                                        Number. Click
                                        <router-link
                                            :to="{
                                                name: 'faculty-profile',
                                                params: { id: user.id }
                                            }"
                                            class="alert-link"
                                            >here</router-link
                                        >to see details.
                                    </b-alert>
                                    <user-count></user-count>
                                </div>
                                <div class="col-md-8 order-md-1">
                                    <!-- <h4 class="mb-3">Billing address</h4> -->
                                    <form class="needs-validation" novalidate>
                                        <fieldset>
                                            <legend>Search</legend>
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <b-form-input
                                                        v-model="search"
                                                        list="my-list-id"
                                                    ></b-form-input>

                                                    <datalist id="my-list-id">
                                                        <option
                                                            >Manual
                                                            Option</option
                                                        >
                                                        <option
                                                            @click.prevent="alert($event.target.dataset.id)"
                                                            v-for="(item,
                                                            index) in dataset"
                                                            :key="index"
                                                            ><a @click.prevent="alert($event.target.dataset.id)">{{ item }}</a></option
                                                        >
                                                    </datalist>
                                                </div>
                                                <!-- <datalist id="my-dataset">
                                                    <option>Manual Option</option>
                                                    <option v-for="(item, index) in dataset" :key="index">{{ item }}</option>
                                                </datalist>
                                                <div class="col-md-6 mb-3">
                                                    <label for="name"
                                                        >Name</label
                                                    >
                                                    <b-form-input
                                                        type="text"
                                                        v-model="search.name"
                                                        list="my-dataset"
                                                        id="name"
                                                        class="form-control"
                                                        
                                                    ></b-form-input>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="search.admission_number"
                                                        >Admission Number</label
                                                    >
                                                    <input
                                                        type="number"
                                                        id="search.admission_number"
                                                        v-model="search.admission_number"
                                                        class="form-control"
                                                        placeholder
                                                        value
                                                        required
                                                    />
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="search.phone_number"
                                                        >Phone Number</label
                                                    >
                                                    <input
                                                        type="number"
                                                        id="search.phone_number"
                                                        v-model="search.phone_number"
                                                        class="form-control"
                                                        placeholder
                                                        value
                                                        required
                                                    />
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="std"
                                                        >STD</label
                                                    >
                                                    <select
                                                        class="custom-select d-block w-100"
                                                        v-model="search.std"
                                                        id="std"
                                                        required
                                                    >
                                                        <option value
                                                            >Choose...</option
                                                        >
                                                        <option
                                                            v-for="(item,
                                                            index) in stds"
                                                            :key="index"
                                                            :value="item.id"
                                                            >{{
                                                                item.name
                                                            }}</option
                                                        >
                                                    </select>
                                                </div> -->
                                            </div>
                                        </fieldset>
                                        <br />

                                        <fieldset>
                                            <legend>Payment</legend>

                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label
                                                        for="phone_number"
                                                        class="badge-pill badge-danger m-2"
                                                        >Dues : Rs 5000</label
                                                    >
                                                    <label
                                                        for="phone_number"
                                                        class="badge-pill badge-success m-2"
                                                        >Advance : Rs 10</label
                                                    >
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="phone_number"
                                                        >Pay</label
                                                    >
                                                    <input
                                                        type="number"
                                                        id="phone_number"
                                                        v-model="phone_number"
                                                        class="form-control"
                                                        placeholder
                                                        value
                                                        required
                                                    />
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label for="phone_number"
                                                        >Remark</label
                                                    >
                                                    <span class="text-muted"
                                                        >(Optional)</span
                                                    >
                                                    <textarea
                                                        type="number"
                                                        id="phone_number"
                                                        v-model="phone_number"
                                                        class="form-control"
                                                        placeholder
                                                        value
                                                        required
                                                    />
                                                </div>
                                            </div>
                                            <!-- <hr class="mb-4" /> -->
                                            <button
                                                class="btn btn-primary btn-lg btn-block"
                                                @click.prevent="submit()"
                                            >
                                                Continue to Save
                                            </button>
                                        </fieldset>
                                    </form>
                                </div>
                                <overlay-component
                                    :loading="this.loading"
                                ></overlay-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import OverlayComponent from "../ui/common/OverlayComponent";
import { required, minLength, between, email } from "vuelidate/lib/validators";

export default {
    mounted() {
        // this.get_stds();
    },
    data() {
        return {
            phone_number : '',
            search: "",
            loading: false,
            errored: false,
            user: {},
            dataset: [],
        };
    },
    watch: {
        // whenever question changes, this function will run
        search() {
             this.debouncedsearch_apicall()
        },
    },
    created: function () {
   
    this.debouncedsearch_apicall = _.debounce(this.search_apicall, 600)
  },
    methods: {
        search_apicall(){
            axios
                .get("/fee/dataset/"+this.search)
                .then(response => (this.dataset = response.data))
                .catch(error => (this.dataset = null))
        },
        reset_form() {
            this.f_name = "";
            this.m_name = "";
            this.l_name = "";
            this.dob = "";
            this.gender = "";
            this.email = "";
            this.phone_number = "";
            this.loading = false;
            this.errored = false;
            this.doj = "";
        },
        alert($a){
            console.log($a);
        },
        submit() {
            this.errored = false;
            this.validation();

            if (!this.errored) {
                this.loading = true;
                axios
                    .post("/faculty/store", {
                        f_name: this.f_name,
                        m_name: this.m_name,
                        l_name: this.l_name,
                        dob: this.dob,
                        doj: this.doj,
                        gender: this.gender,
                        email: this.email,
                        phone_number: this.phone_number
                    })
                    .then(response => {
                        this.user = response.data;
                        this.loading = false;
                        this.$bvToast.toast(
                            "Your request is submitted successfully.",
                            {
                                title: "Success !",
                                variant: "success"
                            }
                        );
                        this.reset_form();
                    })
                    .catch(error => {
                        this.errormessage(
                            "Email id already exists. Try again !"
                        );
                    })
                    .finally(() => (this.loading = false));
            }
        },
        errormessage($msg) {
            this.$bvToast.toast($msg, {
                title: "Error !",
                variant: "danger"
            });
        },
        get_stds() {
            axios
                .get("/std/index")
                .then(response => (this.stds = response.data));
        }
    },
    validations: {
        f_name: {
            required,
            minLength: minLength(3)
        },
        m_name: {
            minLength: minLength(3)
        },
        l_name: {
            minLength: minLength(3)
        },
        phone_number: {
            required,
            between: between(6000000000, 9999999999)
        },
        dob: {
            required
        },
        email: {
            email,
            required
        },
        gender: {
            required
        },
        doj: {
            required
        }
    },
    components: {
        OverlayComponent
    }
};
</script>
