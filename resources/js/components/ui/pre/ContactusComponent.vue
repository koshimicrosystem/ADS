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
            <input type="text" class="comment_input" v-model="contact.phone" required="required" />
          </div>
        </div>
        <div>
          <div class="form_title">Email</div>
          <input type="text" class="comment_input" v-model="contact.email" />
        </div>
        <div>
          <div class="form_title">
            Message
            <span class="mandatory_field">*</span>
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
    </div>
  </div>
</template>
<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      contact: {},
      id : '',
      errored :'',
      loading : false,
    };
  },
  methods: {
    store() {
      axios
        .post("/contactus/store",this.contact)
        .then(response => {
        //   this.id = response.data.id;
        })
        .catch(error => {
          console.log(error);
          this.errored = true;
        })
        .finally(() => (this.loading = false));
    }
  }
};
</script>
<style>
</style>