<template>
    <div class="container">
        <div class="row mt-5" v-if="$gate.isSystemAdministrator()">
          <div class="col-12">
            <div class="card" >
              <div class="card-header">
                <h3 class="card-title">Users Table</h3>

                <div class="card-tools">
                    <button class="btn btn-success" @click="newModal">Add New <i class="fas fa-user-plus fa-fw"></i></button>
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
                      <th>Registered At</th>
                      <th>Controls</th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr v-for="user in users.data" :key="user.id">
                      <td>{{ user.id }}</td>
                      <td>{{ user.name }}</td>
                      <td>{{ user.email }}</td>
                      <td>{{ user.type | upText }}</td>
                      <td>{{ user.created_at | myDate }}</td>
                      <td>
                          <a href="#" title="Edit" @click="editModal(user)">
                              <i class="fas fa-edit text-blue"></i>
                          </a> 
                          <a href="#" title="Delete" @click="deleteUser(user.id)">
                              <i class="fas fa-trash text-red"></i>
                          </a>
                      </td>
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

        <div class="row mt-5" v-if="!$gate.isSystemAdministrator()">
            <not-found></not-found>
        </div>
    
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" v-show="editMode"> <i class="fas fa-user-plus"> </i>Update User Record</h5>
                    <h5 class="modal-title" v-show="!editMode"> <i class="fas fa-user-plus"> </i>Add New User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <form @submit.prevent="editMode ? updateUser() : createUser()">
                    <div class="modal-body">
                        <div class="form-group">
                            <input v-model="form.name" type="text" name="name" id="name"
                                placeholder="Name"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>

                        <div class="form-group">
                            <input v-model="form.email" type="text" name="email" id="email"
                                placeholder="Email Address"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                            <has-error :form="form" field="email"></has-error>
                        </div>

                        <div class="form-group">
                            <textarea v-model="form.bio" type="text" name="bio" id="bio"
                                placeholder="Short bio of the user (Optional)"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>
                            <has-error :form="form" field="bio"></has-error>
                        </div>

                        <div class="form-group">
                            <select v-model="form.type" type="text" name="type" id="type"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                                <option value="" selected disabled>Select User Role</option>
                                <option value="Admin">System Administrator</option>
                                <option value="User">School Administrator</option>
                                <option value="Author">Program Head</option>
                                <option value="Author">Adviser</option>
                            </select>
                            <has-error :form="form" field="type"></has-error>
                        </div>

                        <div class="form-group">
                            <input v-model="form.password" type="password" name="password" id="password"
                                placeholder="Password"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                            <has-error :form="form" field="password"></has-error>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button v-show="editMode" type="submit" class="btn btn-primary">Update</button>
                        <button v-show="!editMode" type="submit" class="btn btn-success">Save</button>
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
            return{
                editMode: true,
                users: {},
                //Create new form instance
                form: new Form({
                    id: '',
                    name: '',
                    email: '',
                    password: '',
                    type: '',
                    bio: '',
                    photos: ''
                }),
            }
        },
        methods: {
            getResults(page = 1) 
            {
                axios.get('api/user?page=' + page)
                .then(response => {
                    this.users = response.data;
                });
		    },
            updateUser(){
                this.$Progress.start();
                this.form.put('api/user/' + this.form.id).then( () => {
                    Fire.$emit('RecordAdded');
                    $('#modelId').modal('hide');
                    Swal.fire('Updated!', 'User information updated.', 'success');
                    this.$Progress.finish();
                }).catch( () => {
                    this.$Progress.start();
                });
            },
            editModal(user){
                this.editMode = true;
                this.form.reset();
                $('#modelId').modal('show');
                this.form.fill(user);
            },
            newModal(){
                this.editMode = false;
                this.form.reset();
                $('#modelId').modal('show');
            },
            loadUsers(){
                if(this.$gate.isSystemAdministrator())
                {
                    axios.get("api/user").then(({ data }) => (this.users = data));
                }
            },
            createUser(){
                this.$Progress.start();
                this.form.post('api/user')
                .then(() => {
                    Fire.$emit('RecordAdded');

                    $('#modelId').modal('hide');

                    Toast.fire({
                        icon: 'success',
                        title: 'Save successfully'
                        });

                    this.$Progress.finish();
                })
                .catch(() => {

                });


            },
            deleteUser(id){
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
                            //Send request to the server.
                            this.form.delete('api/user/' + id).then( () => {
                                Swal.fire('Deleted!', 'Your file has been deleted.', 'success');
                                Fire.$emit('RecordAdded');
                            }).catch((result) => {
                                Swal.fire('Failed', result.message, 'error');
                            });    
                        }
                    });
            }
            
        },
        created() {
            Fire.$on('searching', () => {
                let query = this.$parent.search;
                axios.get('api/findUser?q=' + query)
                .then((data) => {
                    this.users =data.data;
                })
                .catch(() =>{

                });
            });
            
            this.loadUsers();

            Fire.$on('RecordAdded', () => {
                this.loadUsers();
            });
        }
    }
</script>
