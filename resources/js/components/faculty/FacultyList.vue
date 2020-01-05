<template>
  <div class="container mt-2">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary">
            <h4>Faculty List</h4>
          </div>
          <div class="card-header ">
            <b-row >
                <b-col lg="6" class="my-1">
                  <b-form-group
                    label-align-sm="right"
                    label-size="sm"
                    class="mb-0"
                  >
                    <b-form-checkbox-group v-model="filterOn" class="mt-1">
                      <!-- <b-form-checkbox value="name">Name</b-form-checkbox>
                      <b-form-checkbox value="age">Age</b-form-checkbox>
                      <b-form-checkbox value="isActive">Active</b-form-checkbox>
                      <b-form-checkbox value="name">Name</b-form-checkbox>
                      <b-form-checkbox value="age">Age</b-form-checkbox>
                      <b-form-checkbox value="isActive">Active</b-form-checkbox> -->
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

              <template v-slot:cell(name)="data">
                {{ data.item.f_name }} {{ data.item.m_name }} {{ data.item.l_name }}
              </template>

              <template v-slot:cell(contacts)="data">
                {{ data.value }}
              </template>

              <template v-slot:cell(userable)="data">
                {{ data.value }}
              </template>
              <template v-slot:cell(id)="data">
                  <!-- <a :href="`#${data.value.replace(/[^a-z]+/i,'-').toLowerCase()}`"></a> -->
                  <router-link class="btn btn-outline-secondary btn-sm"  :to="`/faculty-profile/${data.value}`">View Details</router-link>
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
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      items: [],
      fields: [
        {
            key: 'name',
            label: 'Name',
        },
        
        {
          key: "dob",
          label: "DOB",
          sortable: true,
          class: "text-center"
        },
        {
          key: "gender",
          label: "Gender",
          sortable: true,
          class: "text-center"
        },
        {
          key: "contacts",
          label: "Contact",
          formatter: 'contacts'
        },
        {
          key: "userable",
          label: "Date of Joining",
          formatter: 'doj'
        },
        {
          key: "id",
          label: "Action",
          class: "text-center"
        },
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
    get_items(){
      axios
      .get('/faculty/index')
      .then(response => (this.items = response.data,
      this.totalRows = this.items.length
      ))
    },

    contacts(value) {
      var contacts='';
      for (let index = 0; index < value.length; index++) {
        const element = value[index];
        if(element.type == "Number")
        contacts = contacts+element.email_number+', ';
      }
      return contacts;
    },

    doj(value){
      return value.doj;
    },
   
    onFiltered(filteredItems) {
      // Trigger pagination to update the number of buttons/pages due to filtering
      this.totalRows = filteredItems.length;
      this.currentPage = 1;
    }
  }
};
</script>