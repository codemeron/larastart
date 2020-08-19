<style>
    .widget-user-header{
        background-position: center center;
        background-size: cover;
        height: 150px;
    }
    #profile_widget_user_image{
        width: 100% !important;
        left: 0;
        margin-left: 0;
        position: absolute;
        top: 80px;
        text-align: center;
    }
    #profile_img_circle{
        width: 100px;
    }
</style>
<template>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-12">
                <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header text-white text-center" style="background-image: url('./img/user_background.jpg');">
                    <h3 class="widget-user-username">{{form.name}}</h3>
                    <h5 class="widget-user-desc">{{form.type}}</h5>
                </div>
                <div class="widget-user-image" id="profile_widget_user_image">
                    <img class="img-circle" id="profile_img_circle" :src="'img/profile/' + form.photo" alt="User Avatar">
                </div>
                <div class="card-footer">
                    <div class="row">
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                        <h5 class="description-header">45</h5>
                        <span class="description-text">STUDENTS</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                        <h5 class="description-header">3</h5>
                        <span class="description-text">SUBJECT</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                        <div class="description-block">
                        <h5 class="description-header">CAST-IT</h5>
                        <span class="description-text">DEPARTMENT</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                            <!-- The timeline -->
                            <div class="timeline timeline-inverse">
                            <!-- timeline time label -->
                            <div class="time-label">
                                <span class="bg-danger">
                                10 Feb. 2014
                                </span>
                            </div>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <div>
                                <i class="fas fa-envelope bg-primary"></i>

                                <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

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
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <div>
                                <i class="fas fa-user bg-info"></i>

                                <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                </h3>
                                </div>
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <div>
                                <i class="fas fa-comments bg-warning"></i>

                                <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                <div class="timeline-body">
                                    Take me to your leader!
                                    Switzerland is small and neutral!
                                    We are more like Germany, ambitious and misunderstood!
                                </div>
                                <div class="timeline-footer">
                                    <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                </div>
                                </div>
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline time label -->
                            <div class="time-label">
                                <span class="bg-success">
                                3 Jan. 2014
                                </span>
                            </div>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <div>
                                <i class="fas fa-camera bg-purple"></i>

                                <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                <div class="timeline-body">
                                    <img src="http://placehold.it/150x100" alt="...">
                                    <img src="http://placehold.it/150x100" alt="...">
                                    <img src="http://placehold.it/150x100" alt="...">
                                    <img src="http://placehold.it/150x100" alt="...">
                                </div>
                                </div>
                            </div>
                            <!-- END timeline item -->
                            <div>
                                <i class="far fa-clock bg-gray"></i>
                            </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="active tab-pane" id="settings">
                            <form @submit.prevent="updateProfile" class="form-horizontal">
                                <div class="form-group row">
                                    <label for="txtName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                    <input  v-model="form.name" type="text" class="form-control" id="txtName" placeholder="Name"> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="txtEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input  v-model="form.email" type="email" class="form-control" id="txtEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="txtPassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input v-model="form.password" type="password" class="form-control" id="txtPassword" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cboType" class="col-sm-2 col-form-label">Type</label>
                                    <div class="col-sm-10">
                                        <select v-model="form.type" type="text" id="cboType" class="form-control">
                                            <option value="" selected disabled>Select User Role</option>
                                            <option value="Admin">System Administrator</option>
                                            <option value="User">School Administrator</option>
                                            <option value="Author">Program Head</option>
                                            <option value="Author">Adviser</option>
                                        </select>
                                    </div>
                                </div>                         
                                <div class="form-group row">
                                    <label for="txtBio" class="col-sm-2 col-form-label">Bio</label>
                                    <div class="col-sm-10">
                                        <textarea v-model="form.bio" class="form-control" id="txtBio" placeholder="Bio"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Profile Picture</label>
                                    <div class="col-sm-10">
                                        <input type="file" @change="uploadProfile" class="form-input" name="photo">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
            <!-- /.nav-tabs-custom -->
            </div>            
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                form: new Form({
                    id: '',
                    name: '',
                    email: '',
                    password: '',
                    type: '',
                    bio: '',
                    photo: ''
                })
            }
        },
        methods:{

            updateProfile(){
                this.form.put('api/profile/').then( (response) => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Profile Update',
                        text: 'Update successfully!',
                    });
                    if(response.data.picture){this.form.photo = response.data.picture;}
                }).catch( (response) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message
                    })
                });
            },
            uploadProfile(e){
                //console.log('Update Profile.')
                let file = e.target.files[0];
                let reader = new FileReader();

                console.log(file);

                if (file['size'] < 2111775){
                    reader.onloadend = (file) =>  {
                        this.form.photo = reader.result;
                    }

                    reader.readAsDataURL(file);

                    console.log("Photo read tango!")
                }else{
                    Swal.fire('Ooops!', 'File too large.', 'error');
                }


            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            axios('api/profile').then( ({data}) => (this.form.fill(data)));
        }
    }
</script>
