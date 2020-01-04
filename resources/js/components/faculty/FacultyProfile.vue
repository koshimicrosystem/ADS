<template>
  <div class="container mt-2">
    <div class="row justify-content-center">
      <overlay-component :loading="this.loading"></overlay-component>
      <!-- models -->
      <b-modal v-model="modeladdress" id="modeladdress" @ok="addressOk">Hello From Modal!</b-modal>
      <b-modal
        v-model="modelcontact"
        id="modelcontact"
        @ok="contactOk"
        title="Contact"
        header-bg-variant="dark"
        header-text-variant="light"
      >
        <b-form @submit="contactOk">
          <b-form-group label="Name :" label-for="name">
            <b-form-input id="name" type="text" v-model="name" placeholder="Enter name"></b-form-input>
          </b-form-group>

          <b-form-group label="Email / Number:" label-for="email_phone">
            <b-form-input
              id="email_phone"
              v-model="email_number"
              type="text"
              required
              placeholder="Enter email / number"
            ></b-form-input>
          </b-form-group>

          <b-form-checkbox
            id="checkbox-1"
            v-model="status"
            name="checkbox-1"
            value="default"
            unchecked-value="not_default"
          >Make it default.</b-form-checkbox>
        </b-form>
      </b-modal>
      <!-- <b-modal id="address">Hello From My Modal!</b-modal>
      <b-modal id="contact">Hello From My Modal!</b-modal>-->
      <!-- models end -->
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary">
            <h4>Faculty Profile</h4>
          </div>
          <div class="card-body">
            <div class="container">
              <div class="row">
                <div class="col-md-3">
                  <!-- Profile Image -->
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <img
                          class="profile-user-img img-fluid img-circle"
                          :src="'/media/profile/boy.png'"
                          alt="User profile picture"
                        />
                      </div>

                      <h3
                        class="profile-username text-center"
                      >{{user.f_name}} {{user.m_name}} {{user.l_name}}</h3>

                      <p
                        class="text-muted text-center"
                        v-for="(item, index) in user.roles"
                        :key="index"
                      >{{item.name}}</p>

                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                          <b>Followers</b>
                          <a class="float-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                          <b>Following</b>
                          <a class="float-right">543</a>
                        </li>
                        <li class="list-group-item">
                          <b>Friends</b>
                          <a class="float-right">13,287</a>
                        </li>
                      </ul>

                      <a href="#" class="btn btn-primary btn-block">
                        <b>Follow</b>
                      </a>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                  <div class="card">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        <li class="nav-item">
                          <a class="nav-link active" href="#activity" data-toggle="tab">Activity</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#contact" data-toggle="tab">Contact</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#address" data-toggle="tab">Address</a>
                        </li>
                      </ul>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                          <!-- Post -->
                          <div class="post">
                            <div class="user-block">
                              <img
                                class="img-circle img-bordered-sm"
                                :src="'/media/profile/boy.png'"
                                alt="user image"
                              />
                              <span class="username">
                                <a href="#">Jonathan Burke Jr.</a>
                                <a href="#" class="float-right btn-tool">
                                  <i class="fa fa-times"></i>
                                </a>
                              </span>
                              <span class="description">Shared publicly - 7:30 PM today</span>
                            </div>
                            <!-- /.user-block -->
                            <p>
                              Lorem ipsum represents a long-held tradition for designers,
                              typographers and the like. Some people hate it and argue for
                              its demise, but others ignore the hate as they create awesome
                              tools to help create filler text for everyone from bacon lovers
                              to Charlie Sheen fans.
                            </p>

                            <p>
                              <a href="#" class="link-black text-sm mr-2">
                                <i class="fa fa-share mr-1"></i> Share
                              </a>
                              <a href="#" class="link-black text-sm">
                                <i class="fa fa-thumbs-o-up mr-1"></i> Like
                              </a>
                              <span class="float-right">
                                <a href="#" class="link-black text-sm">
                                  <i class="fa fa-comments-o mr-1"></i> Comments (5)
                                </a>
                              </span>
                            </p>

                            <input
                              class="form-control form-control-sm"
                              type="text"
                              placeholder="Type a comment"
                            />
                          </div>
                          <!-- /.post -->

                          <!-- Post -->
                          <div class="post clearfix">
                            <div class="user-block">
                              <img
                                class="img-circle img-bordered-sm"
                                :src="'/media/profile/boy.png'"
                                alt="User Image"
                              />
                              <span class="username">
                                <a href="#">Sarah Ross</a>
                                <a href="#" class="float-right btn-tool">
                                  <i class="fa fa-times"></i>
                                </a>
                              </span>
                              <span class="description">Sent you a message - 3 days ago</span>
                            </div>
                            <!-- /.user-block -->
                            <p>
                              Lorem ipsum represents a long-held tradition for designers,
                              typographers and the like. Some people hate it and argue for
                              its demise, but others ignore the hate as they create awesome
                              tools to help create filler text for everyone from bacon lovers
                              to Charlie Sheen fans.
                            </p>

                            <form class="form-horizontal">
                              <div class="input-group input-group-sm mb-0">
                                <input class="form-control form-control-sm" placeholder="Response" />
                                <div class="input-group-append">
                                  <button type="submit" class="btn btn-danger">Send</button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <!-- /.post -->

                          <!-- Post -->
                          <div class="post">
                            <div class="user-block">
                              <img
                                class="img-circle img-bordered-sm"
                                :src="'/media/profile/boy.png'"
                                alt="User Image"
                              />
                              <span class="username">
                                <a href="#">Adam Jones</a>
                                <a href="#" class="float-right btn-tool">
                                  <i class="fa fa-times"></i>
                                </a>
                              </span>
                              <span class="description">Posted 5 photos - 5 days ago</span>
                            </div>
                            <!-- /.user-block -->
                            <div class="row mb-3">
                              <div class="col-sm-6">
                                <img class="img-fluid" :src="'/media/profile/boy.png'" alt="Photo" />
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-6">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <img
                                      class="img-fluid mb-3"
                                      :src="'/media/profile/boy.png'"
                                      alt="Photo"
                                    />
                                    <img
                                      class="img-fluid"
                                      :src="'/media/profile/boy.png'"
                                      alt="Photo"
                                    />
                                  </div>
                                  <!-- /.col -->
                                  <div class="col-sm-6">
                                    <img
                                      class="img-fluid mb-3"
                                      :src="'/media/profile/boy.png'"
                                      alt="Photo"
                                    />
                                    <img
                                      class="img-fluid"
                                      :src="'/media/profile/boy.png'"
                                      alt="Photo"
                                    />
                                  </div>
                                  <!-- /.col -->
                                </div>
                                <!-- /.row -->
                              </div>
                              <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <p>
                              <a href="#" class="link-black text-sm mr-2">
                                <i class="fa fa-share mr-1"></i> Share
                              </a>
                              <a href="#" class="link-black text-sm">
                                <i class="fa fa-thumbs-o-up mr-1"></i> Like
                              </a>
                              <span class="float-right">
                                <a href="#" class="link-black text-sm">
                                  <i class="fa fa-comments-o mr-1"></i> Comments (5)
                                </a>
                              </span>
                            </p>

                            <input
                              class="form-control form-control-sm"
                              type="text"
                              placeholder="Type a comment"
                            />
                          </div>
                          <!-- /.post -->
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                          <!-- The timeline -->
                          <ul class="timeline timeline-inverse">
                            <!-- timeline time label -->
                            <li class="time-label">
                              <span class="bg-danger">10 Feb. 2014</span>
                            </li>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <li>
                              <i class="fa fa-envelope bg-primary"></i>

                              <div class="timeline-item">
                                <span class="time">
                                  <i class="fa fa-clock-o"></i> 12:05
                                </span>

                                <h3 class="timeline-header">
                                  <a href="#">Support Team</a> sent you an email
                                </h3>

                                <div class="timeline-body">
                                  Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                  weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                  jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                  quora plaxo ideeli hulu weebly balihoo...
                                </div>
                                <div class="timeline-footer">
                                  <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                  <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                              </div>
                            </li>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <li>
                              <i class="fa fa-user bg-info"></i>

                              <div class="timeline-item">
                                <span class="time">
                                  <i class="fa fa-clock-o"></i> 5 mins ago
                                </span>

                                <h3 class="timeline-header no-border">
                                  <a href="#">Sarah Young</a> accepted your friend request
                                </h3>
                              </div>
                            </li>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <li>
                              <i class="fa fa-comments bg-warning"></i>

                              <div class="timeline-item">
                                <span class="time">
                                  <i class="fa fa-clock-o"></i> 27 mins ago
                                </span>

                                <h3 class="timeline-header">
                                  <a href="#">Jay White</a> commented on your post
                                </h3>

                                <div class="timeline-body">
                                  Take me to your leader!
                                  Switzerland is small and neutral!
                                  We are more like Germany, ambitious and misunderstood!
                                </div>
                                <div class="timeline-footer">
                                  <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                </div>
                              </div>
                            </li>
                            <!-- END timeline item -->
                            <!-- timeline time label -->
                            <li class="time-label">
                              <span class="bg-success">3 Jan. 2014</span>
                            </li>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <li>
                              <i class="fa fa-camera bg-purple"></i>

                              <div class="timeline-item">
                                <span class="time">
                                  <i class="fa fa-clock-o"></i> 2 days ago
                                </span>

                                <h3 class="timeline-header">
                                  <a href="#">Mina Lee</a> uploaded new photos
                                </h3>

                                <div class="timeline-body">
                                  <img :src="'/media/profile/boy.png'" alt="..." class="margin" />
                                  <img :src="'/media/profile/boy.png'" alt="..." class="margin" />
                                  <img :src="'/media/profile/boy.png'" alt="..." class="margin" />
                                  <img :src="'/media/profile/boy.png'" alt="..." class="margin" />
                                </div>
                              </div>
                            </li>
                            <!-- END timeline item -->
                            <li>
                              <i class="fa fa-clock-o bg-gray"></i>
                            </li>
                          </ul>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="settings">
                          <form class="form-horizontal">
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">Name</label>

                              <div class="col-sm-10">
                                <input
                                  type="email"
                                  class="form-control"
                                  id="inputName"
                                  placeholder="Name"
                                />
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                              <div class="col-sm-10">
                                <input
                                  type="email"
                                  class="form-control"
                                  id="inputEmail"
                                  placeholder="Email"
                                />
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputName2" class="col-sm-2 control-label">Name</label>

                              <div class="col-sm-10">
                                <input
                                  type="text"
                                  class="form-control"
                                  id="inputName2"
                                  placeholder="Name"
                                />
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                              <div class="col-sm-10">
                                <textarea
                                  class="form-control"
                                  id="inputExperience"
                                  placeholder="Experience"
                                ></textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                              <div class="col-sm-10">
                                <input
                                  type="text"
                                  class="form-control"
                                  id="inputSkills"
                                  placeholder="Skills"
                                />
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" /> I agree to the
                                    <a href="#">terms and conditions</a>
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Submit</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="contact">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email/Number</th>
                                <th scope="col">Updated</th>
                                <th scope="col">
                                  <b-button
                                    class="btn btn-primary"
                                    @click="modelcontact = !modelcontact"
                                  >
                                    ADD
                                    <i class="fas fa-plus"></i>
                                  </b-button>
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="(item, index) in user.contacts" :key="index">
                                <th scope="row">{{item.name}}</th>
                                <td>{{item.email_number}}</td>
                                <td>{{item.updated_at}}</td>

                                <td>
                                  <a @click.prevent="contactdefault(item.id)">
                                    <i class="fas fa-star text-success" v-if="item.default"></i>
                                    <i class="fas fa-star text-secondary" v-else></i>
                                  </a>
                                  <!-- <a @click="contactupdate(item)">
                                    <i class="fas fa-edit text-info"></i>
                                  </a> -->
                                  <a @click.prevent="contactdestroy(item.id)">
                                    <i class="fas fa-trash-alt text-danger"></i>
                                  </a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                        <div class="tab-pane" id="address">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">State</th>
                                <th scope="col">Distric</th>
                                <th scope="col">Pin</th>
                                <th scope="col">Address</th>
                                <th scope="col">
                                  <b-button
                                    class="btn btn-primary"
                                    @click="modeladdress = !modeladdress"
                                  >
                                    ADD
                                    <i class="fas fa-plus"></i>
                                  </b-button>
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="(item, index) in user.addresses" :key="index">
                                <th scope="row">{{item.state}}</th>
                                <td>{{item.distric}}</td>
                                <td>{{item.pin}}</td>
                                <td>{{item.address}}</td>
                                <td>
                                  <i class="fas fa-star text-success" v-if="item.default"></i>
                                  <i class="fas fa-star text-secondary" v-else></i>
                                  <!-- <i class="fas fa-edit text-info"></i> -->
                                  <i class="fas fa-trash-alt text-danger"></i>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!-- /.tab-content -->
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { required, minLength, between, email } from "vuelidate/lib/validators";
import OverlayComponent from "../ui/common/OverlayComponent";

export default {
  mounted() {
    this.get_user();
  },
  data() {
    return {
      user: {},
      // contact
      name: "",
      email_number: "",
      status: "not_default",
      contacttype: "",
      // contact end
      loading: false,
      modelcontact: false,
      contacterrored: false,
      modeladdress: false
    };
  },
  methods: {
    get_user() {
      axios
        .get("/faculty/show/" + this.$route.params.id)
        .then(response => (this.user = response.data))
        .catch();
    },
    
    contactOk(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.contacterrored = false;
      this.loading = false;
      this.contactvalidation();
      if (!this.contacterrored) {
        this.loading = true;
        axios
          .post("/contact/store", {
            name: this.name,
            email_number: this.email_number,
            status: this.status,
            user_id: this.user.id,
            contacttype: this.contacttype
          })
          .then(response => {
            this.user.contacts = response.data;
            this.loading = false;
            this.$bvToast.toast("Contact added successfully.", {
              title: "Success !",
              variant: "success"
            });
            this.reset_contact();
            this.$bvModal.hide("modelcontact");
          })
          .catch(error => {
            this.errormessage("Email id already exists. Try again !");
          })
          .finally(() => (this.loading = false));
      }
    },
    contactdestroy($id) {
      this.loading = true;
      axios
        .get("/contact/destroy/" + this.user.id + "/" + $id)
        .then(response => {
          this.user.contacts = response.data;
          this.loading = false;

          this.$bvToast.toast("Contact Deleted successfully.", {
            title: "Success !",
            variant: "success"
          });
        })
        .catch(error => {
          this.errormessage("Something went wrong. Try again !");
        });
    },

    contactdefault($id) {
      this.loading = true;
      axios
        .get("/contact/default/" + this.user.id + "/" + $id)
        .then(response => {
          this.user.contacts = response.data;
          this.loading = false;

          this.$bvToast.toast("Successful.", {
            title: "Success !",
            variant: "success"
          });
        })
        .catch(error => {
          this.errormessage("Something went wrong. Try again !");
        });
    },
    addressOk(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
    },
    errormessage($msg) {
      this.$bvToast.toast($msg, {
        title: "Error !",
        variant: "danger"
      });
    },
    reset_contact() {
      this.name = "";
      this.email_number = "";
      this.status = "not_default";
      this.loading = false;
      this.errored = false;
      this.contacttype = "";
    },
    contactvalidation() {
      this.$v.$touch();
      if (!this.$v.name.required) {
        this.errormessage("Name: required.");
        this.contacterrored = true;
      } else {
        if (!this.$v.name.minLength) {
          this.errormessage("Name: Minimum 3 char is required.");
          this.contacterrored = true;
        }
      }

      if (!this.$v.email_number.required) {
        this.errormessage("Email / Number: required.");
        this.contacterrored = true;
      } else {
        if (!this.$v.email_number.email) {
          if (!this.$v.email_number.between) {
            this.errormessage("Email / Number: Email / Number is not valid.");
            this.contacterrored = true;
          } else {
            this.contacttype = "Number";
          }
        } else {
          this.contacttype = "Email";
        }
      }
    }
  },
  validations: {
    name: {
      required,
      minLength: minLength(3)
    },
    email_number: {
      required,
      email,
      between: between(6000000000, 9999999999)
    }
  },
  components: {
    OverlayComponent
  }
};
</script>