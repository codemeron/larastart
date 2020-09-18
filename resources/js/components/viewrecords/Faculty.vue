<template>
  <div class="container">
    <div class="row mt-5">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">REGISTERED FACULTY AND EMPLOYEE</h3>

            <div class="card-tools">
              <button class="btn btn-success" @click="saveModal" >
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
                  <th>Last Name</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>ID Number</th>
                  <th>Email Address</th>
                  <th>Role</th>
                  <th>Date Registered</th>
                </tr>
              </thead>

              <tbody v-if ="Object.keys(users.data).length">
                <tr v-for="user in users.data" :key="user.idnumber">
                  <td>{{ user.lastname }}</td>
                  <td>{{ user.firstname }}</td>
                  <td>{{ user.middlename }}</td>
                  <td>{{ user.idnumber }}</td>
                  <td>{{ user.email }}</td>
                   <td>{{ user.role }}</td>
                  <td>{{ user.created_at | myDate }}</td>
                  <td>
                      <a href="#" title="Edit" @click="updateModal(user)">
                          <i class="fas fa-edit text-blue"></i>
                      </a> 
                      <a href="#" title="Delete" @click="deleteEmployee(user.idnumber)">
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
    <div v-if="showAddingModal" class="modal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add New Employee</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" @click="showAddingModal = false">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="saveFaculty()">
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
                  <input v-model="form.email" type="email" name="email" id="email"
                      placeholder="Email Address"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                  <has-error :form="form" field="email"></has-error>
                </div>

                <div class="form-group">
                  <select v-model="form.role" name="role" id="role"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                          <option value="" selected disabled>--Select a Role--</option>
                          <option value="Faculty">Faculty</option>
                          <option value="Program Head">Program Head</option>
                          <option value="School Administrator">School Administrator</option>
                  </select>
                  <has-error :form="form" field="role"></has-error>
                </div>

                <div class="form-group">
                  <input v-model="form.password" type="password" name="password" id="password"
                      placeholder="Password"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                  <has-error :form="form" field="password"></has-error>
                </div>

                <div class="form-group">
                  <input v-model="form.repassword" type="password" name="repassword" id="repassword"
                      placeholder="Re-type Password"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('repassword') }">
                  <has-error :form="form" field="repassword"></has-error>
                </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" @click="showAddingModal = false">Close</button>
                <button type="button" class="btn btn-primary" @click="saveFaculty()">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Modal -->
    <div v-if="showUpdateModal" class="modal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">UPDATE EMPLOYEE'S DATA</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" @click="showUpdateModal = false">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="updateEmployee()">
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
                  <input v-model="form.email" type="email" name="email" id="email"
                      placeholder="Email Address"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                  <has-error :form="form" field="email"></has-error>
                </div>

                <div class="form-group">
                  <select v-model="form.role" name="role" id="role"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                          <option value="" selected disabled>--Select a Role--</option>
                          <option value="Faculty">Faculty</option>
                          <option value="Program Head">Program Head</option>
                          <option value="System Administrator">School Administrator</option>
                  </select>
                  <has-error :form="form" field="role"></has-error>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" @click="showUpdateModal = false">Close</button>
                  <button type="button" class="btn btn-primary" @click="updateEmployee()">Update</button>
                </div>
            </form>
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
      showAddingModal: false,
      showUpdateModal: false,
      users: {},
      form: new Form({
        id: "",
        idnumber: "",
        firstname: "",
        middlename: "",
        lastname: "",
        email: "",
        role: "",
        password: "",
        repassword: "",
      }),
    };
  },
  methods: {
    //app/Http/Controllers/API/FacultyController.php/facultyEmployeePagination()
    //Pagination for faculty and employee.
    getResults(page = 1) {
      axios.post('api/faculty/facultyEmployeePagination?page=' + page)
      .then( data => {
        this.users = data.data; 
      });
    },

    //app/Http/Controllers/API/FacultyController.php/roleUpdateAll()
    //Load and display the records of faculty and employees.
    loadFacultyEmployee() {
      //if(this.$gate.isSystemAdministrator())
      //{
      axios.post("api/faculty/loadFacultyEmployee").then(({ data }) => {
        this.users = data;
      });

      //}
    },

    saveModal(){
        this.form.idnumber = "";
        this.form.firstname = "";
        this.form.middlename = "";
        this.form.lastname = "";
        this.form.email = "";
        this.form.role = "";
        this.form.password = "";
        this.form.repassword = "";
        this.showAddingModal = true;
    },

    //app/Http/Controllers/API/FacultyController.php/saveFacultyEmployee(Request $request)
    saveFaculty(){
      this.form.post('api/faculty/saveFacultyEmployee')
      .then(() => {
          this.showAddingModal = false;
      });
    },

    updateModal(user){
      console.log(user);
      this.form.id = user.id;
      this.form.idnumber = user.idnumber;
      this.form.lastname = user.lastname;
      this.form.firstname = user.firstname;
      this.form.middlename = user.middlename;
      this.form.email = user.email;
      this.form.role =  user.role;
      this.showUpdateModal = true;
    },

    updateEmployee(){
      this.form.put( 'api/faculty/updateFacultyEmployee/' + this.form.id )
      .then( (data) => {
        console.log(data.statusText);
        if (data.statusText == 'OK'){
          Swal.fire('Update Record', 'Record has been updated.', 'success');
          this.showUpdateModal = false;
          this.loadFacultyEmployee();
        }
      })
      .catch ( (error) => {
        Swal.fire('Update Record', 'Error encountered during update.', 'error');
      });
    },
    
    deleteEmployee(idnumber) {
      Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true
      }).then((result) => {
        if (result.value){
          axios.delete('api/faculty/deleteFacultyEmployee/' + idnumber)
          .then( () => {
            Swal.fire('Delete Record', 'Record has been updated.', 'success');
            this.loadFacultyEmployee();
          })
          .catch( () => {
            Swal.fire('Delete Record', 'Delete not successful.', 'error');
          });
        }
      });
    },

  },

  created() {
    this.loadFacultyEmployee();
  },
};
</script>
