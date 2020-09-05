<template>
  <div class="container">
    <div class="row mt-5">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Users Table</h3>

            <div class="card-tools">
              <button class="btn btn-success">
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

              <tbody>
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
                      @change="changeSelectedRole(user.idnumber, $event)"
                    >
                      <option value selected disabled>--Select a Role--</option>
                      <option value="Faculty">Faculty</option>
                      <option value="Program Head">Program Head</option>
                      <option value="School Administrator">School Administrator</option>
                    </select>
                  </td>
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
  </div>
</template>

<script>
export default {
  data() {
    return {
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
    approvedrole(id) {
      console.log(id.value);
    },
    loadUsers() {
      //if(this.$gate.isSystemAdministrator())
      //{
      axios.get("api/user").then(({ data }) => {
        this.users = data;
      });

      //}
    },
    changeSelectedRole(idnumber, event) {
      Swal.fire({
        title: "Role",
        text: "Assign this user as " + event.target.value + "?",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
      }).then((result) => {
          if (result.value){
              console.log(event.target.value);
              axios.post("api/update/" + idnumber, {
                role: event.target.value,
                _method: 'put'
              })
              .then( () =>{
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
