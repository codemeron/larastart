<template>
  <div class="container">
    <div class="row mt-5">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Users Table</h3>

            <div class="card-tools">
              <!--data-toggle="modal" data-target="#divApproveRoleAs"-->
              <button class="btn btn-success" @click="showModal = true" >
                Approve All As
                <i class="fas fa-check-square fa-fw"></i>
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

              <tbody v-if ="users.length !=0">
                <tr v-for="user in users" :key="user.idnumber">
                  <td>{{ user.idnumber }}</td>
                  <td>{{ user.lastname }}</td>
                  <td>{{ user.firstname }}</td>
                  <td>{{ user.middlename }}</td>
                  <td>{{ user.created_at | myDate }}</td>
                  <td>
                    <select
                      v-bind:id="user.idnumber"
                      class="form-control"
                      @change="approvedRoleIndividual(user.idnumber, $event)"
                    >
                      <option value selected disabled>--Select a Role--</option>
                      <option value="Faculty">Faculty</option>
                      <option value="Program Head">Program Head</option>
                      <option value="School Administrator">School Administrator</option>
                    </select>
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
            <!--<pagination :data="users" @pagination-change-page="getResults"></pagination>-->
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>

    <!--<div class="row mt-5" v-if="!$gate.isSystemAdministrator()">
            <not-found></not-found>
    </div>-->

    <!-- Modal -->
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
    //app/Http/Controllers/API/UserController.php/roleUpdateAll()
    //Assign individual role to newly registered users.
    approveRoleAll() {
      var varApproveAll = document.getElementById('cboApproveAll').value;
      if (varApproveAll != ""){
        axios.post('api/user/roleUpdateAll', {
          role: varApproveAll,
          users: this.users
        })
        .then(() => {
          this.loadUsers();
          this.showModal = false;
        }); 
      }
    },  
    loadUsers() {
      //if(this.$gate.isSystemAdministrator())
      //{
      axios.get("api/user").then(({ data }) => {
        this.users = data;
      });

      //}
    },
    //app/Http/Controllers/API/UserController.php/roleUpdate()
    //Assign individual role to newly registered users.  
    approvedRoleIndividual(idnumber, event) {
      Swal.fire({
        title: "Role",
        text: "Assign this user as " + event.target.value + "?",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
      }).then((result) => {
        if (result.value) {
          console.log(event.target.value);
          axios
            .post("api/roleUpdate/" + idnumber, {
              role: event.target.value,
              _method: "put",
            })
            .then(() => {
              $('#divApproveRoleAs').modal(hide);
              this.loadUsers();
            });
        }
      });
    },
  },
  created() {
    this.loadUsers();
  },
};
</script>
