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
                                    <!-- <b-alert
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
                  </b-alert>-->
                                    <user-count></user-count>
                                </div>
                                <div class="col-md-8 order-md-1">
                                    <!-- <h4 class="mb-3">Billing address</h4> -->
                                    <form class="needs-validation" novalidate>
                                        <fieldset>
                                            <legend>Search</legend>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <b-form-input
                                                        v-model="search"
                                                    ></b-form-input>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <ul id="myUL">
                                                        <li
                                                            v-for="(item,
                                                            index) in dataset"
                                                            :key="index"
                                                        >
                                                            <a
                                                                href="#"
                                                                @click.prevent="
                                                                    select_user(
                                                                        item
                                                                    )
                                                                "
                                                            >
                                                                <img
                                                                    id="#profile"
                                                                    class="img-circle img-bordered-sm m-0 p-0"
                                                                    :src="
                                                                        `/storage/${item.profile_pic}`
                                                                    "
                                                                    alt="User Image"
                                                                    height="35px"
                                                                />
                                                                {{
                                                                    item.userable_id
                                                                }}
                                                                :
                                                                {{
                                                                    item.f_name
                                                                }}
                                                                {{
                                                                    item.m_name
                                                                }}
                                                                {{
                                                                    item.l_name
                                                                }}
                                                                ({{
                                                                    item
                                                                        .userable
                                                                        .std
                                                                        .name
                                                                }}) -
                                                                {{ item.email }}
                                                            </a>
                                                        </li>
                                                    </ul>
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
                        </div>-->
                                            </div>
                                        </fieldset>
                                        <br />

                                        <fieldset v-if="user.id">
                                            <legend>Payment</legend>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row no-gutters">
                                                        <div class="col-md-4">
                                                            <img
                                                                :src="
                                                                    `/storage/${user.profile_pic}`
                                                                "
                                                                class="card-img"
                                                                alt="..."
                                                            />
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div
                                                                class="card-body"
                                                            >
                                                                <h5
                                                                    class="card-title"
                                                                >
                                                                    {{
                                                                        user.f_name
                                                                    }}
                                                                    {{
                                                                        user.m_name
                                                                    }}
                                                                    {{
                                                                        user.l_name
                                                                    }}
                                                                </h5>
                                                                <p
                                                                    class="card-text"
                                                                >
                                                                    Admission
                                                                    Number :
                                                                    {{
                                                                        user.userable_id
                                                                    }}
                                                                </p>
                                                                <p
                                                                    class="card-text"
                                                                >
                                                                    STD :
                                                                    {{
                                                                        user
                                                                            .userable
                                                                            .std
                                                                            .name
                                                                    }}
                                                                </p>
                                                                <p
                                                                    class="card-text"
                                                                >
                                                                    User Id :
                                                                    {{
                                                                        user.email
                                                                    }}
                                                                </p>
                                                                <p
                                                                    class="card-text"
                                                                >
                                                                    Contacts :
                                                                    <span
                                                                        v-for="(item,
                                                                        index) in user.contacts"
                                                                        :key="
                                                                            index
                                                                        "
                                                                    >
                                                                        {{
                                                                            item.email_number
                                                                        }}
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center bg-danger"
                                                    >
                                                        Dues
                                                    </li>

                                                    <li
                                                        v-for="(item,
                                                        index) in user.userable
                                                            .dues"
                                                        :key="index"
                                                        class="list-group-item d-flex justify-content-between align-items-center"
                                                    >
                                                        {{ item.name }}
                                                        <span
                                                            class="badge badge-primary badge-pill"
                                                        >
                                                            ₹
                                                            {{ item.amount }}
                                                        </span>
                                                    </li>

                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center"
                                                    >
                                                        Total
                                                        <span
                                                            class="badge badge-primary badge-pill"
                                                        >
                                                            ₹
                                                            {{
                                                                calculate(
                                                                    user
                                                                        .userable
                                                                        .dues
                                                                )
                                                            }}
                                                        </span>
                                                    </li>
                                                </div>

                                                <div class="col-md-6">
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center bg-success"
                                                    >
                                                        Advance
                                                    </li>

                                                    <li
                                                        v-for="(item,
                                                        index) in user.userable
                                                            .advances"
                                                        :key="index"
                                                        v-if="user.userable.advances"
                                                        class="list-group-item d-flex justify-content-between align-items-center"
                                                    >
                                                        {{ item.updated_at }}
                                                        <span
                                                            class="badge badge-primary badge-pill"
                                                        >
                                                            ₹
                                                            {{ item.amount }}
                                                        </span>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center"
                                                    >
                                                        Total
                                                        <span
                                                            class="badge badge-primary badge-pill"
                                                        >
                                                            ₹
                                                            {{
                                                                calculate(
                                                                    user
                                                                        .userable
                                                                        .advances
                                                                )
                                                            }}
                                                        </span>
                                                    </li>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="phone_number"
                                                        >Pay</label
                                                    >
                                                    <input
                                                        type="number"
                                                        id="pay_amount"
                                                        v-model="pay_amount"
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
                                                    <textarea v-model="pay_remark" class="form-control" />
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
            pay_amount: "",
            pay_remark: "",
            search: "",
            loading: false,
            errored: false,
            user: {},
            dataset: []
        };
    },
    watch: {
        // whenever question changes, this function will run
        search() {
            this.debouncedsearch_apicall();
        }
    },
    created: function() {
        this.debouncedsearch_apicall = _.debounce(this.search_apicall, 600);
    },
    methods: {
        select_user(item) {
            this.user = item;
            this.loading = true;
            axios
                .get("/fee/getfee/" + this.user.userable_id)
                .then(
                    response => (
                        (this.user.userable.dues = response.data.dues),
                        (this.user.userable.advances = response.data.advances)
                    )
                );
            //.catch(error => (this.dataset = null));
            this.loading = false;
            this.search = "";
        },
        search_apicall() {
            if (this.search) {
                axios
                    .get("/fee/dataset/" + this.search)
                    .then(response => (this.dataset = response.data))
                    .catch(error => (this.dataset = null));
            } else {
                this.dataset = null;
            }
        },

        validation() {
            this.$v.$touch();
            if (!this.$v.pay_amount.required) {
                this.errormessage("Pay Amount : required.");
                this.errored = true;
            }
        },
        reset_form() {
            (this.pay_amount = ""),
                (this.pay_remark = ""),
                (this.errored = false);
        },

        submit() {
            this.errored = false;
            this.validation();

            if (!this.errored) {
                this.loading = true;
                axios
                    .post("/fee/submit", {
                        pay_amount: this.pay_amount,
                        pay_remark: this.pay_remark,
                        user_id: this.user.id,
                        student_id: this.user.userable_id
                    })
                    .then(response => {
                        this.user.userable.dues = response.data.duest;
                        this.user.userable.advances = response.data.advancest;
                        this.user.userable.transection = response.data.transection;
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
        },
        calculate(data) {
            if (data) {
                var this_ = this;
                var total = 0.0;
                data.forEach(element => {
                    total += element.amount;
                });
            }
            return total;
        }
    },
    validations: {
        pay_amount: {
            required
        }
    },
    computed: {},
    components: {
        OverlayComponent
    }
};
</script>
<style>
#myUL {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

#myUL li a {
    border: 1px solid #ddd;
    margin-top: -1px; /* Prevent double borders */
    background-color: #f6f6f6;
    padding: 5px;
    text-decoration: none;
    font-size: 15px;
    color: black;
    display: block;
}

#myUL li a:hover:not(.header) {
    background-color: rgba(59, 58, 58, 0.5);
    font-size: 20px;
    padding: 10px;
}
#myUL li a img:hover {
    height: 120px;
}
</style>
