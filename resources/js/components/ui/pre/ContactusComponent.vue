<template>
  <div class="container_contactus">
    <div class="contact_form">
      <div class="contact_info_title">Contact Form</div>
      <form action="#" class="comment_form">
        <div class="row">
          <div class="col-6">
            <div class="form_title">
              Name
              <span class="mandatory_field">*</span>
            </div>
            <input type="text" class="comment_input" v-model="contact.name" required="required" />
          </div>
          <div class="col-6">
            <div class="form_title">
              Phone
              <span class="mandatory_field">*</span>
            </div>
            <input type="number" class="comment_input" v-model="contact.phone" required="required" />
          </div>
        </div>
        <div>
          <div class="form_title">Email</div>
          <input type="text" class="comment_input" v-model="contact.email" />
        </div>
        <div>
          <div class="form_title">
            Message <b>(Min : 50)</b>
            <span class="mandatory_field">*</span>
            <span v-if="message_length < 50" class="badge badge-danger right">Char {{message_length}}</span>
            <span v-else class="badge badge-success right">Char {{message_length}}</span>
          </div>
          <textarea
            class="comment_input comment_textarea"
            v-model="contact.message"
            required="required"
          ></textarea>
        </div>
        <div>
          <button @click.prevent="store()" class="comment_button trans_200">submit now</button>
        </div>
      </form>
      <overlay-component :loading="this.loading"></overlay-component>
    </div>
  </div>
</template>
<script>
import OverlayComponent from "../common/OverlayComponent";
export default {
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      contact: {},
      errors: false,
      loading: false
    };
  },
  methods: {
    store() {
      this.errors=false;
      this.validation();
      if(!this.errors){
      this.loading = true;
      axios
        .post("/contactus/store", this.contact)
        .then(response => {
          this.loading = false;
          this.$bvToast.toast("Your request is submitted successfully.", {
            title: "Success !",
            variant: "success"
          });
          this.resetcontact();
        })
        .catch(error => {
          this.errormessage("Something went wrong try again !");
        })
        .finally(() => (this.loading = false));
      }
    },
    resetcontact() {
      this.contact = {};
    },
    validation() {
      if (this.contact.email) {
          var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
          if (reg.test(this.contact.email) == false){
            this.errormessage("Email is not valid.");
            this.errors = true;
          }
        }
      if (!this.contact.name) {
          this.errormessage("Name is mandatory field.");
          this.errors = true;
        }
      if (!this.contact.phone) {
          this.errormessage("Phone is mandatory field.");
          this.errors = true;
        }
      if(this.contact.message){
      if(this.contact.message.length < 50){
        this.errormessage("Min char for message is 50.");
        this.errors = true;
      }
      }else{
         this.errormessage("Message is mandatory field.");
          this.errors = true;
      }
    }, 
    errormessage($msg) {
      this.$bvToast.toast($msg, {
        title: "Error !",
        variant: "danger"
      });
    }
  },
  computed: {
    message_length() {
      if(this.contact.message){
        return this.contact.message.length;
      }else{
        return 0;
      }
    },
  },
  components: {
    OverlayComponent
  }
};
</script>
<style>
</style>