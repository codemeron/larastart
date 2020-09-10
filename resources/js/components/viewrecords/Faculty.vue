<template>
  <div class="container">
    <div class="row mt-5">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">REGISTERED FACULTY AND EMPLOYEE</h3>

            <div class="card-tools">
              <button class="btn btn-success" @click="showModal = true" >
                Add Faculty/Employee
                <i class="fas fa-user-plus fa-fw"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Type</th>
                  <th>Date Registered</th>
                  <th>Role</th>
                </tr>
              </thead>

              <tbody v-if ="Object.keys(users.data).length">
                <tr v-for="user in users.data" :key="user.idnumber">
                  <td>{{ user.idnumber }}</td>
                  <td>{{ user.lastname }}</td>
                  <td>{{ user.firstname }}</td>
                  <td>{{ user.middlename }}</td>
                  <td>{{ user.created_at | myDate }}</td>
                  <td>{{ user.role }}</td>
                  <td>
                      <a href="#" title="Edit" @click="editModal(user)">
                          <i class="fas fa-edit text-blue"></i>
                      </a> 
                      <a href="#" title="Delete" @click="deleteUser(user.idnumber)">
                          <i class="fas fa-trash text-red"></i>
                      </a>
                  </td>
                </tr>
              </tbody>
              <tbody v-else>
                <tr>
                  <td colspan="6" class="text-center font-italic">No newly registered user.</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <pagination :data="users" @pagination-change-page="getResults"></pagination>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>

    <!--<div class="row mt-5" v-if="!$gate.isSystemAdministrator()">
            <not-found></not-found>
    </div>-->

    <!-- Adding Modal -->
    <div v-if="showModal" class="modal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Approve Role As</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" @click="showModal = false">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="">
                <div class="form-group">
                  <input v-model="form.idnumber" type="text" name="idnumber" id="idnumber"
                      placeholder="ID Number"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('idnumber') }">
                  <has-error :form="form" field="idnumber"></has-error>
                </div>

                <div class="form-group">
                  <input v-model="form.lastname" type="text" name="lastname" id="lastname"
                      placeholder="Last Name"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('lastname') }">
                  <has-error :form="form" field="lastname"></has-error>
                </div>

                <div class="form-group">
                  <input v-model="form.firstname" type="text" name="firstname" id="firstname"
                      placeholder="First Name"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('firstname') }">
                  <has-error :form="form" field="firstname"></has-error>
                </div>

                <div class="form-group">
                  <input v-model="form.middlename" type="text" name="middlename" id="middlename"
                      placeholder="Middle Name"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('middlename') }">
                  <has-error :form="form" field="middlename"></has-error>
                </div>

                <div class="form-group">
                  <select v-model="form.role" type="text" name="role" id="role"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                          <option value selected disabled>--Select a Role--</option>
                          <option value="Faculty">Faculty</option>
                          <option value="Program Head">Program Head</option>
                          <option value="School Administrator">School Administrator</option>
                  </select>
                  <has-error :form="form" field="role"></has-error>
                </div>

                <div class="form-group">
                  <input v-model="form.password" type="text" name="password" id="password"
                      placeholder="Password"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                  <has-error :form="form" field="password"></has-error>
                </div>

                <div class="form-group">
                  <input v-model="form.repassword" type="text" name="repassword" id="repassword"
                      placeholder="Re-type Password"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('repassword') }">
                  <has-error :form="form" field="repassword"></has-error>
                </div>


                <select class="form-control" id="cboApproveAll">
                  <option value selected disabled>--Select a Role--</option>
                  <option value="Faculty">Faculty</option>
                  <option value="Program Head">Program Head</option>
                  <option value="School Administrator">School Administrator</option>
                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" @click="showModal = false">Close</button>
                <button type="button" class="btn btn-primary" @click="approveRoleAll()">Save</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      showModal: false,
      users: {},
      form: new Form({
        id: "",
        name: "",
        email: "",
        password: "",
        type: "",
        bio: "",
        photos: "",
      }),
    };
  },
  methods: {
    //app/Http/Controllers/API/UserController.php/facultyEmployeePagination()
    //Pagination for faculty and employee.
    getResults(page = 1){
      axios.post('api/user/facultyEmployeePagination?page=' + page).then( ( {data} ) => this.users = data);
    },

    //app/Http/Controllers/API/UserController.php/roleUpdateAll()
    //Load and display the records of faculty and employees.
    loadFacultyEmployee() {
      //if(this.$gate.isSystemAdministrator())
      //{
      axios.post("api/user/viewFacultyEmployee").then(({ data }) => {
        this.users = data;
      });

      //}
    },
    
  },
  created() {
    this.loadFacultyEmployee();
  },
};
</script>
