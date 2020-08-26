<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <table>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </table>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title" style="margin-bottom: 0;">SYSTEM USER REGISTRATION</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" @submit.prevent="registerFaculty" id="formFaculty">
            <div class="card-body">
              <!--department and advisory-->
              <fieldset class="col-md-12 mt-1">
                <legend>Department and Advisory</legend>
                <!--Designation-->
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtdesignation">Designation</label>
                      <select
                        v-model="form.designation"
                        class="form-control"
                        id="txtdesignation"
                        required
                      >
                        <option value="Academe only">Academe only</option>
                        <option value="Office and Academe">Office and Academe</option>
                        <option value="Office only">Office only</option>
                        <option value disabled selected>Select Designation</option>
                      </select>
                    </div>
                  </div>
                </div>
                <!--/Designation-->

                <!--department-->
                <div class="row" v-show="academeOffice">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtdepartment">Department</label>
                      <select
                        v-model="form.department"
                        class="form-control"
                        id="txtdepartment"
                        required
                      >
                        <option value="CBAM">CBAM</option>
                        <option value="CTE">CTE</option>
                        <option value="IT">IT</option>
                        <option value="SHS">SHS</option>
                        <option value="NA">None</option>
                        <option value disabled selected>Select a Department</option>
                      </select>
                    </div>
                  </div>
                </div>
                <!--/department-->

                <!--Advisory course, year level, and section-->
                <div class="row" v-show="academeOffice">
                  <div class="col-md-12">
                    <b>ADVISORY CLASS</b>
                  </div>
                </div>
                <div class="row" v-show="academeOffice">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtcourse">Course</label>
                      <select v-model="form.course" class="form-control" id="txtcourse" required>
                        <option value="BS in Information Technology">BS in Information Technology</option>
                        <option
                          value="Bachelor of Elementary Education"
                        >Bachelor of Elementary Education</option>
                        <option value="BSBA Financial Management">BSBA Financial Management</option>
                        <option value="BSBA Operations Management">BSBA Operations Management</option>
                        <option value="SHS-ABM">SHS-ABM</option>
                        <option value="SHS-HUMSS">SHS-HUMSS</option>
                        <option value="SHS-ICT">SHS-ICT</option>
                        <option value="NA">None</option>
                        <option value selected disabled>Select a Course</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtyearlevel">Year Level</label>
                      <select
                        v-model="form.yearlevel"
                        class="form-control"
                        id="txtyearlevel"
                        required
                      >
                        <option value="I">I</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                        <option value="NA">None</option>
                        <option value selected disabled>Select a Year Level</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtsection">Section</label>
                      <select v-model="form.section" class="form-control" id="txtsection" required>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="NA">None</option>
                        <option value selected disabled>Select a Section</option>
                      </select>
                    </div>
                  </div>
                </div>
                <!--/Advisory course, year level, and section-->

                <!--Office-->
                <div class="row" v-if="officeOnly">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtoffice">Office</label>
                      <select v-model="form.office" class="form-control" id="txtoffice" required>
                        <option value="Admin Office">Admin Office</option>
                        <option value="Cashier's Office">Cashier's Office</option>
                        <option value="Medical and Dental Unit">Medical and Dental Unit</option>
                        <option value="IQA Office">IQA Office</option>
                        <option value="Registrar's Office">Registrar's Office</option>
                        <option value="MIS Office">MIS Office</option>
                        <option value="Supply Office">Supply Office</option>
                        <option value="SAS Office">SAS Office</option>
                        <option value="Guidance and Admission Office">Guidance and Admission Office</option>
                        <option value="Library">Library</option>
                        <option value="N">None</option>
                        <option value selected disabled>Select an Office</option>
                      </select>
                    </div>
                  </div>
                </div>
                <!--/Office-->
              </fieldset>
              <!--/department and advisory-->

              <!--Personal Information-->
              <fieldset class="col-md-12 mt-2">
                <legend>Personal Information</legend>
                <!--id number-->
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtidnumber">ID Number</label>
                      <input
                        v-model="form.idnumber"
                        type="text"
                        class="form-control"
                        id="txtIdnumber"
                        placeholder="ID Number"
                        required
                      />
                    </div>
                  </div>
                </div>
                <!--/id number-->
                <!--name-->
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtlastname">Last Name</label>
                      <input
                        v-model="form.lastname"
                        type="text"
                        class="form-control"
                        id="txtlastname"
                        placeholder="Last Name"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtfirstname">First Name</label>
                      <input
                        v-model="form.firstname"
                        type="text"
                        class="form-control"
                        id="txtfirstname"
                        placeholder="First Name"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtmiddlename">Middle Name</label>
                      <input
                        v-model="form.middlename"
                        type="text"
                        class="form-control"
                        id="txtmiddlename"
                        placeholder="Middle Name"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtextensionname">Extension Name</label>
                      <input
                        v-model="form.extensionname"
                        type="text"
                        class="form-control"
                        id="txtextensionname"
                        placeholder="Extension Name"
                      />
                    </div>
                  </div>
                </div>
                <!--/name-->
                <!--bdate,email,telnum-->
                <div class="row">
                  <!--sex-->
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtsex">Gender</label>
                      <div class="input-group">
                        <select v-model="form.gender" class="form-control" id="txtgender" required>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value selected disabled>Select a Gender</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!--/sex-->
                  <!--birthdate-->
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtbirthdate">Birthdate</label>
                      <div class="input-group">
                        <input
                          v-model="form.birthdate"
                          type="date"
                          class="form-control"
                          id="txtbirthdate"
                          data-inputmask-alias="datetime"
                          data-inputmask-inputformat="dd/mm/yyyy"
                          data-mask
                          im-insert="false"
                          required
                        />
                      </div>
                    </div>
                  </div>
                  <!--/birthdate-->
                  <!--email-->
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtemail">Email Address</label>
                      <div class="input-group">
                        <input
                          v-model="form.emailaddress"
                          type="email"
                          class="form-control"
                          :class="{ 'is-invalid': form.errors.has('emailaddress') }"
                          placeholder="Email Address"
                          id="txtemail"
                          name="emailaddress"
                          required
                        />
                        <has-error :form="form" field="emailaddress"></has-error>
                      </div>
                    </div>
                  </div>
                  <!--/email-->
                  <!--contact number-->
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtstudentcontactnumber">Contact Number</label>
                      <div class="input-group">
                        <input
                          v-model="form.contactnumber"
                          type="tel"
                          class="form-control"
                          :class="{ 'is-invalid': form.errors.has('contactnumber') }"
                          placeholder="Contact Number"
                          id="txtstudentcontactnumber"
                          name="contactnumber"
                          v-mask="'####-###-####'"
                          required
                        />
                        <has-error :form="form" field="contactnumber"></has-error>
                      </div>
                    </div>
                  </div>
                  <!--/contact number-->
                </div>
                <!--/bdate,email,telnum-->
                <!--address-->
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtpurok">Purok/Sitio</label>
                      <input
                        v-model="form.purok"
                        type="text"
                        class="form-control"
                        id="txtpurok"
                        placeholder="Purok or Sitio"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtbarangay">Barangay</label>
                      <input
                        v-model="form.barangay"
                        type="text"
                        class="form-control"
                        id="txtbarangay"
                        placeholder="Barangay"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtmunicipality">Municipality</label>
                      <input
                        v-model="form.municipality"
                        type="text"
                        class="form-control"
                        id="txtmunicipality"
                        placeholder="Municipality"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtprovince">Province</label>
                      <input
                        v-model="form.province"
                        type="text"
                        class="form-control"
                        id="txtprovince"
                        placeholder="Province"
                        required
                      />
                    </div>
                  </div>
                </div>
                <!--/address-->
              </fieldset>
              <!--/Personal Information-->

              <!--password-->
              <fieldset class="col-md-12 mt-2">
                <legend>Account</legend>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtpassword">Password</label>
                      <input
                        v-model="form.password"
                        type="password"
                        class="form-control"
                        id="txtpassword"
                        placeholder="Password"
                        v-on:blur="passwordValidation"
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtrepassword">Re-type Password</label>
                      <input
                        v-model="form.repassword"
                        type="password"
                        class="form-control"
                        id="txtrepassword"
                        placeholder="Re-type Password"
                        v-on:blur="passwordValidation"
                        required
                      />
                    </div>
                  </div>
                </div>
              </fieldset>
              <!--/password-->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
          <!-- /form-->
        </div>
      </div>
    </div>
    <!--/.row mt-5-->
  </div>
  <!--/.container-->
</template>
<script>
export default {
  data() {
    return {
      passwordLength: "",
      passwordMatch: "",
      form: new Form({
        idnumber: "",
        lastname: "",
        firstname: "",
        middlename: "",
        password: "",
        repassword: "",
      }),
    };
  },
  methods: {
    resetForm(){
      document.getElementById('formFaculty').reset(); 
      for (var prop in this.form){
        if(Object.prototype.hasOwnProperty.call(this.form, prop)){
          if(prop != "busy" && prop != "errors" && prop != "originalData"){
            this.form[prop] = "";
            console.log(prop);
          }
        }
      }
    },
    registerFaculty() {
      if (this.passwordLength == "" && this.passwordMatch == "") {
        console.log("Save");
        this.$Progress.start();
        this.form.put("api/addFaculty")
          .then((response) => {
            Toast.fire({
              icon: "success",
              title: "Save successfully",
            });     
            this.resetForm();
            this.$Progress.finish();
          })
          .catch((response) => {
          });
      }else{
          Swal.fire({
            icon: "error",
            title: "Registration Error",
            text: "Either your passwords are not match or lesser than "
          });  
      }
    },
    passwordValidation() {
      if (this.form.password.length < 8) {
        this.passwordLength = "Password must atleat 8 characters.";
      } else {
        this.passwordLength = "";
      }

      if (this.form.password != this.form.repassword) {
        this.passwordMatch = "Password not match.";
      } else {
        this.passwordMatch = "";
      }
    },
  },
  computed: {
    academeOffice() {
      if (this.form.designation && this.form.designation != "Office only") {
        this.form.office = "NA";
        return true;
      } else {
        return false;
      }
    },
    officeOnly() {
      if (this.form.designation && this.form.designation == "Office only") {
        this.form.department = "NA";
        this.form.course = "NA";
        this.form.yearlevel = "NA";
        this.form.section = "NA";
        return true;
      } else if (
        this.form.designation &&
        this.form.designation == "Office and Academe"
      ) {
        return true;
      } else {
        return false;
      }
    },
  },
};
</script>