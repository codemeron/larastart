<style>
fieldset {
  border: 1px solid #ddd !important;
  margin: 0;
  min-width: 0;
  padding: 10px;
  position: relative;
  border-radius: 4px;
  background-color: #f5f5f5;
  padding-left: 10px !important;
  background-color: #ffffff;
}

legend {
  font-size: 14px;
  font-weight: bold;
  margin-bottom: 0px;
  width: 35%;
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px 5px 5px 10px;
  background-color: #f5f5f5;
}
</style>
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
            <h3 class="card-title" style="margin-bottom: 0;">Registration</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" @submit.prevent="registerStudent">
            <div class="card-body">
              <!--Education Background-->
              <fieldset class="col-md-12 mt-2">
                <legend>Education Background</legend>
                <!--enrollee's status-->
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtenrolleesstatus">Enrollee's Status</label>
                      <select v-model="form.estatus" class="form-control" id="txtenrolleesstatus" required>
                        <option value="New Student">New Student</option>
                        <option value="Old - Continuing">Old - Continuing</option>
                        <option value="Old - Returning">Old - Returning</option>
                        <option value="Old - Shifter">Old - Shifter</option>
                        <option value="Old - Graduating">Old - Graduating</option>
                        <option value="Graduating">Graduating</option>
                        <option value="Transferee - Within OMSC">Transferee - Within OMSC</option>
                        <option value="Transferee - Other HEI">Transferee - Other HEI</option>
                        <option value disabled selected>Select Enrollee's Status</option>
                      </select>
                    </div>
                  </div>
                </div>
                <!--/enrollee's status-->
                <!--course, yearlevel, section-->
                <div class="row">
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
                        <option value selected disabled>Select a Course</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtyearlevel">Year Level</label>
                      <select v-model="form.yearlevel" class="form-control" id="txtyearlevel" required>
                        <option value="I">I</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
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
                        <option value selected disabled>Select a Section</option>
                      </select>
                    </div>
                  </div>
                </div>
                <!--/course, yearlevel, section-->
              </fieldset>
              <!--/Education Background-->

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
                        required
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
                          id="txtemail"
                          required
                        />
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
                          id="txtstudentcontactnumber"
                          required
                        />
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

              <!--Family Background-->
              <fieldset class="col-md-12 mt-2">
                <legend>Family Background</legend>
                <!--father name-->
                <div class="row p-2">
                  <div class="col-md-12">
                    <b>Father's Name</b>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtflastname">Last Name</label>
                      <input
                        v-model="form.flastname"
                        type="text"
                        class="form-control"
                        id="txtflastname"
                        placeholder="Last Name"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtffirstname">First Name</label>
                      <input
                        v-model="form.ffirstname"
                        type="text"
                        class="form-control"
                        id="txtffirstname"
                        placeholder="First Name"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtfmiddlename">Middle Name</label>
                      <input
                        v-model="form.fmiddlename"
                        type="text"
                        class="form-control"
                        id="txtfmiddlename"
                        placeholder="Middle Name"
                        required
                      />
                    </div>
                  </div>
                </div>
                <!--/father name-->
                <!--mother name-->
                <div class="row p-2">
                  <div class="col-md-12">
                    <b>Mother's Name</b>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtmlastname">Last Name</label>
                      <input
                        v-model="form.mlastname"
                        type="text"
                        class="form-control"
                        id="txtmlastname"
                        placeholder="Last Name"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtmfirstname">First Name</label>
                      <input
                        v-model="form.mfirstname"
                        type="text"
                        class="form-control"
                        id="txtmfirstname"
                        placeholder="First Name"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtmmiddlename">Middle Name</label>
                      <input
                        v-model="form.mmiddlename"
                        type="text"
                        class="form-control"
                        id="txtmmiddlename"
                        placeholder="Middle Name"
                        required
                      />
                    </div>
                  </div>
                </div>
                <!--/mother name-->
                <!--contact number-->
                <div class="row">
                  <!--contact number-->
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtgcontactnumber">Contact Number</label>
                      <div class="input-group">
                        <input
                          v-model="form.gcontactnumber"
                          type="tel"
                          class="form-control"
                          id="txtgcontactnumber"
                          placeholder="Contact Number"
                          required
                        />
                      </div>
                    </div>
                  </div>  
                  <!--/contact number-->
                </div>
                <!--/contact number-->
              </fieldset>
              <!--/Family Background-->
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
      curAcademicYear: "2020-2021",
      curSemester: "First Semester",

      form: new Form({
        estatus: "",
        course: "",
        yearlevel: "",
        section: "",
        idnumber: "",
        firstname: "",
        middlename: "",
        lastname: "",
        extensionname: "",
        gender: "",
        birthdate: "",
        emailaddress: "",
        contactnumber: "",
        purok: "",
        barangay: "",
        municipality: "",
        province: "",
        ffirstname: "",
        fmiddlename: "",
        flastname: "",
        mfirstname: "",
        mmiddlename: "",
        mlastname: "",
        gcontactnumber: "",
      }),
    };
  },
  methods: {
    registerStudent() {
      this.$Progress.start();
      this.form
        .put("api/addStudent")
        .then((response) => {
          Toast.fire({
            icon: "success",
            title: "Save successfully",
          });

          this.$Progress.finish();
        })
        .catch(() => {});
    },
  },
};
</script>