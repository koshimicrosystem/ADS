<template>
  <div class="container mt-2">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary">
            <h4>New Faculty</h4>
          </div>
          <div class="card-body">
            <div class="container">
              <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                  <b-alert v-if="user.id" show dismissible variant="success">
                    New Faculty added with username : {{user.email}}, Password : Phone Number. Click
                    <router-link
                      :to="{ name: 'faculty-profile', params: { id: user.id }}"
                      class="alert-link"
                    >here</router-link>to see details.
                  </b-alert>
                  <user-count></user-count>
                </div>
                <div class="col-md-8 order-md-1">
                  <!-- <h4 class="mb-3">Billing address</h4> -->
                  <form class="needs-validation" novalidate>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="f_name">First name</label>
                        <input
                          type="text"
                          v-model="f_name"
                          id="f_name"
                          class="form-control"
                          placeholder
                          value
                          required
                        />
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="m_name">Middle name</label>
                        <span class="text-muted">(Optional)</span>
                        <input
                          type="text"
                          v-model="m_name"
                          id="m_name"
                          class="form-control"
                          placeholder
                          value
                          required
                        />
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="l_name">Last name</label>
                        <span class="text-muted">(Optional)</span>
                        <input
                          type="text"
                          id="l_name"
                          v-model="l_name"
                          class="form-control"
                          placeholder
                          value
                          required
                        />
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="dob">Date of Birth</label>
                        <input
                          type="date"
                          id="dob"
                          v-model="dob"
                          class="form-control"
                          placeholder
                          value
                          required
                        />
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="l_name">Adhar Number</label>
                        <span class="text-muted">(Optional)</span>
                        <input
                          type="text"
                          id="adhar_number"
                          v-model="adhar_number"
                          class="form-control"
                        />
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="country">STD</label>
                        <select class="custom-select d-block w-100" v-model="std" id="std" required>
                          <option value>Choose...</option>
                          <option v-for="(item, index) in stds" :key="index" :value="item.id">{{item.name}}</option>
                        </select>
                      </div>
                    </div>

                    <div class="mb-3">
                      <label for="email">Email</label>
                      <input
                        type="email"
                        class="form-control"
                        id="email"
                        v-model="email"
                        placeholder="you@example.com"
                      />
                      <div
                        class="invalid-feedback"
                      >Please enter a valid email address for shipping updates.</div>
                    </div>

                    <h4 class="mb-3">Gender</h4>

                    <div class="d-block my-3">
                      <div class="custom-control custom-radio">
                        <input
                          id="credit"
                          name="paymentMethod"
                          type="radio"
                          class="custom-control-input"
                          v-model="gender"
                          value="Male"
                          required
                        />
                        <label class="custom-control-label" for="credit">Male</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input
                          id="debit"
                          name="paymentMethod"
                          type="radio"
                          class="custom-control-input"
                          v-model="gender"
                          value="Female"
                          required
                        />
                        <label class="custom-control-label" for="debit">Female</label>
                      </div>
                    </div>

                    <hr class="mb-4" />
                    <button
                      class="btn btn-primary btn-lg btn-block"
                      @click.prevent="submit()"
                    >Continue to Save</button>
                  </form>
                </div>
                <overlay-component :loading="this.loading"></overlay-component>
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
    this.get_stds();
  },
  data() {
    return {
      f_name: "",
      m_name: "",
      l_name: "",
      dob: "",
      gender: "",
      email: "",
      std: "",
      adhar_number: "",
      loading: false,
      errored: false,
      user: {},
      stds: []
    };
  },
  methods: {
    reset_form() {
      this.f_name = "";
      this.m_name = "";
      this.l_name = "";
      this.dob = "";
      this.gender = "";
      this.email = "";
      this.std = "";
      this.loading = false;
      this.errored = false;
      this.adhar_number = "";
    },
    
    submit() {
      this.errored = false;
      this.validation();

      if (!this.errored) {
        this.loading = true;
        axios
          .post("/student/store", {
            f_name: this.f_name,
            m_name: this.m_name,
            l_name: this.l_name,
            dob: this.dob,
            std: this.std,
            gender: this.gender,
            email: this.email,
            adhar_number: this.adhar_number
          })
          .then(response => {
            this.user = response.data;
            this.loading = false;
            this.$bvToast.toast("Your request is submitted successfully.", {
              title: "Success !",
              variant: "success"
            });
            this.reset_form();
          })
          .catch(error => {
            this.errormessage("Email id already exists. Try again !");
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
      axios.get("/std/index").then(response => (this.stds = response.data));
    },
    validation() {
      this.$v.$touch();
      if (!this.$v.f_name.required) {
        this.errormessage("First Name: required.");
        this.errored = true;
      } else {
        if (!this.$v.f_name.minLength) {
          this.errormessage("First Name: Minimum 3 char is required.");
          this.errored = true;
        }
      }

      if (!this.$v.adhar_number.between) {
        this.errormessage("Not a valid Adhar number.");
        this.errored = true;
      }
      if (!this.$v.m_name.minLength) {
        this.errormessage("Middle Name : Minimum 3 char is required.");
        this.errored = true;
      }
      if (!this.$v.l_name.minLength) {
        this.errormessage("Last Name : Minimum 3 char is required.");
        this.errored = true;
      }

      if (!this.$v.std.required) {
        this.errormessage("Std : Required.");
        this.errored = true;
      }

      if (!this.$v.gender.required) {
        this.errormessage("Gender : Required.");
        this.errored = true;
      }
      if (!this.$v.dob.required) {
        this.errormessage("Date of Birth : Required");
        this.errored = true;
      }
      if (!this.$v.email.required) {
        this.errormessage("Email : required.");
        this.errored = true;
      } else {
        if (!this.$v.email.email) {
          this.errormessage("Not a valid mail");
          this.errored = true;
        }
      }
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
    std: {
      required
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
    adhar_number: {
      between: between(10000000000000, 99999999999999)
    }
  },
  components: {
    OverlayComponent
  }
};
</script>