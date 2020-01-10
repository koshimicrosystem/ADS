<template>
  <div class="container mt-2">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary">
            <h4>Fee Defaulters</h4>
          </div>
          <div class="card-header">
            <b-row>
              <b-col lg="6" class="my-1">
                <b-form-group label-align-sm="right" label-size="sm" class="mb-0">
                  <b-form-checkbox-group v-model="filterOn" class="mt-1">
                    <!-- <b-form-checkbox value="name">Name</b-form-checkbox>
                      <b-form-checkbox value="age">Age</b-form-checkbox>
                      <b-form-checkbox value="isActive">Active</b-form-checkbox>
                      <b-form-checkbox value="name">Name</b-form-checkbox>
                      <b-form-checkbox value="age">Age</b-form-checkbox>
                    <b-form-checkbox value="isActive">Active</b-form-checkbox>-->
                  </b-form-checkbox-group>
                </b-form-group>
              </b-col>

              <b-col lg="4" class="my-1">
                <b-form-group
                  label="Filter"
                  label-cols-sm="2"
                  label-align-sm="right"
                  label-size="sm"
                  label-for="filterInput"
                  class="mb-0"
                >
                  <b-input-group size="sm">
                    <b-form-input
                      v-model="filter"
                      type="search"
                      id="filterInput"
                      placeholder="Type to Search"
                    ></b-form-input>
                    <b-input-group-append>
                      <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
                    </b-input-group-append>
                  </b-input-group>
                </b-form-group>
              </b-col>

              <b-col lg="2" class="my-1">
                <b-form-group
                  label-cols-sm="6"
                  label-cols-md="4"
                  label-cols-lg="3"
                  label-align-sm="right"
                  label-size="sm"
                  label-for="perPageSelect"
                  class="mb-0"
                >
                  <b-form-select
                    v-model="perPage"
                    id="perPageSelect"
                    size="sm"
                    :options="pageOptions"
                  ></b-form-select>
                </b-form-group>
              </b-col>
            </b-row>
          </div>

          <div class="card-body">
            <b-container fluid>
              <!-- User Interface controls -->

              <!-- Main table element -->
              <b-table
                show-empty
                stacked="md"
                :tbody-tr-class="rowClass"
                :items="items"
                :fields="fields"
                :current-page="currentPage"
                :per-page="perPage"
                :filter="filter"
                :filterIncludedFields="filterOn"
                :sort-by.sync="sortBy"
                :sort-desc.sync="sortDesc"
                :sort-direction="sortDirection"
                @filtered="onFiltered"
              >
                <template v-slot:cell(user.profile_pic)="data">
                  <img
                    class="img-circle img-bordered-sm m-0 p-0"
                    :src="`/storage/${data.value}`"
                    alt="User Image"
                    height="35px"
                  />
                </template>

                <template v-slot:cell(user)="data">
                  <router-link :to="`/student-profile/${data.item.user.id}`">{{ data.value }}</router-link>
                </template>

                <template v-slot:cell(std.name)="data">{{ data.value }}</template>

                <template v-slot:cell(dues)="data">{{ data.value }}</template>
                <template v-slot:cell(advances)="data">{{ data.value }}</template>
                <template v-slot:cell(user.contacts)="data">{{ data.value }}</template>

                <template v-slot:cell(action)="data">
                  <!-- <a :href="`#${data.value.replace(/[^a-z]+/i,'-').toLowerCase()}`"></a>  -->
                  <!-- <router-link class="btn btn-outline-secondary btn-sm"  :to="`/student-profile/${data.item.user.id}`">Notify</router-link>
                  <router-link class="btn btn-outline-secondary btn-sm"  :to="`/student-profile/${data.item.user.id}`">Pay</router-link>-->
                  <div class="dropdown">
                    <button
                      class="btn btn-outline-secondary btn-sm dropdown-toggle"
                      type="button"
                      id="dropdownMenuButton"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >Pay / Notify</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Pay</a>
                      <a class="dropdown-item" href="#">Notify</a>
                      <a class="dropdown-item" href="#">Custom Notify</a>
                    </div>
                  </div>
                </template>
              </b-table>

              <b-row>
                <b-col sm="12" class="my-1">
                  <b-pagination
                    v-model="currentPage"
                    :total-rows="totalRows"
                    :per-page="perPage"
                    align="fill"
                    class="my-0"
                  ></b-pagination>
                </b-col>
              </b-row>
            </b-container>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      items: [],
      fields: [
        {
          key: "user.profile_pic",
          label: ""
        },
        {
          key: "user",
          label: "Name",
          formatter: "user",
          sortable: true,
          sortByFormatted: true,
          filterByFormatted: true
        },
        {
          key: "id",
          sortable: true,
          label: "Adm No"
        },
        {
          key: "std.name",
          sortable: true,
          label: "Std"
        },
        {
          key: "dues",
          sortable: true,
          label: "Due",
          formatter: "dues",
          sortable: true,
          sortByFormatted: true,
          filterByFormatted: true
        },
        {
          key: "advances",
          sortable: true,
          label: "Advance",
          formatter: "advances",
          sortable: true,
          sortByFormatted: true,
          filterByFormatted: true
        },
        {
          key: "user.contacts",
          sortable: true,
          label: "Contacts",
          formatter: "contacts",
          sortable: true,
          sortByFormatted: true,
          filterByFormatted: true
        },
        {
          key: "action",
          label: "Action",
          class: "text-center"
        }
      ],
      totalRows: 1,
      currentPage: 1,
      perPage: 10,
      pageOptions: [10, 15, 20],
      sortBy: "",
      sortDesc: false,
      sortDirection: "asc",
      filter: null,
      filterOn: [],
      infoModal: {
        id: "info-modal",
        title: "",
        content: ""
      }
    };
  },
  computed: {
    sortOptions() {
      // Create an options list from our fields
      return this.fields
        .filter(f => f.sortable)
        .map(f => {
          return { text: f.label, value: f.key };
        });
    }
  },
  mounted() {
    // Set the initial number of items
    this.get_items();
  },
  methods: {
    get_items() {
      axios
        .get("/fee/defaulters")
        .then(
          response => (
            (this.items = response.data), (this.totalRows = this.items.length)
          )
        );
    },

    rowClass(item, type) {
      if (!item || type !== "row") return;
      var due = false;
      var advance = false;
      item.dues.forEach(element => {
        if (element.status == "due") {
          due = true;
        }
      });
      item.advances.forEach(element => {
        if (element.status == "advance") {
          advance = true;
        }
      });
      if (due) {
        return "table-danger";
      }else{
        if (advance) return "table-success";
        return "table-light";
      }
    },

    contacts(value) {
      var contacts = "";
      for (let index = 0; index < value.length; index++) {
        const element = value[index];
        if (element.type == "Number")
          contacts = contacts + element.email_number + ", ";
      }
      return contacts;
    },

    user(value) {
      var name = "";
      if (value.f_name) name += value.f_name + " ";
      if (value.m_name) name += value.f_name + " ";
      if (value.l_name) name += value.f_name + " ";
      return name;
    },

    dues(value) {
      var total = 0;
      value.forEach(element => {
        if (element.status == "due") {
          total += element.fee.amount;
        }
      });
      return total;
    },

    advances(value) {
      var total = 0;
      value.forEach(element => {
        if (element.status == "advance") {
          total += element.amount;
        }
      });
      return total;
    },

    gender(value) {
      return value;
      // console.log(value);
    },

    dob(value) {
      return value;
      // console.log(value);
    },
    std(value) {
      return value.name;
    },

    onFiltered(filteredItems) {
      // Trigger pagination to update the number of buttons/pages due to filtering
      this.totalRows = filteredItems.length;
      this.currentPage = 1;
    }
  }
};
</script>