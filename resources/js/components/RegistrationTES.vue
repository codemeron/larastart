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
    <div class="row mt-3">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title" style="margin-bottom: 0;">Registration</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form"  @submit.prevent="registerStudent">
            <div class="card-body">
              <!--Personal Information-->
              <fieldset class="col-md-12">
                <legend>Personal Information</legend>
                <!--id number-->
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtidnumber">ID Number</label>
                      <input
                        type="text"
                        class="form-control"
                        id="txtIdnumber"
                        placeholder="ID Number"
                      />
                    </div>
                  </div>
                </div>
                <!--/id number-->
                <!--name-->
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtlastname">Last Name</label>
                      <input
                        type="text"
                        class="form-control"
                        id="txtlastname"
                        placeholder="Last Name"
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtfirstname">First Name</label>
                      <input
                        type="text"
                        class="form-control"
                        id="txtfirstname"
                        placeholder="First Name"
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtmiddlename">Middle Name</label>
                      <input
                        type="text"
                        class="form-control"
                        id="txtmiddlename"
                        placeholder="Middle Name"
                      />
                    </div>
                  </div>
                </div>
                <!--/name-->
                <!--bdate,email,telnum-->
                <div class="row">
                  <!--birthdate-->
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtbirthdate">Birthdate</label>
                      <div class="input-group">
                        <input
                          type="date"
                          class="form-control"
                          id = "txtbirthdate"
                          data-inputmask-alias="datetime"
                          data-inputmask-inputformat="dd/mm/yyyy"
                          data-mask
                          im-insert="false"
                        />
                      </div>
                    </div>
                  </div><!--/birthdate-->
                  <!--email-->
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtemail">Email Address</label>
                      <div class="input-group">
                        <input
                          type="email"
                          class="form-control"
                          id = "txtemail"
                        />
                      </div>
                    </div>
                  </div><!--/email-->        
                  <!--contact number-->
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtstudentcontactnumber">Contact Number</label>
                      <div class="input-group">
                        <input
                          type="tel"
                          class="form-control"
                          id="txtstudentcontactnumber"
                        />
                      </div>
                    </div>
                  </div><!--/contact number-->                                  
                </div><!--/bdate,email,telnum-->
                <!--address-->
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtpurok">Purok/Sitio</label>
                      <input
                        type="text"
                        class="form-control"
                        id="txtpurok"
                        placeholder="Purok or Sitio"
                      />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtbarangay">Barangay</label>
                      <input
                        type="text"
                        class="form-control"
                        id="txtbarangay"
                        placeholder="Barangay"
                      />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtmunicipality">Municipality</label>
                      <input
                        type="text"
                        class="form-control"
                        id="txtmunicipality"
                        placeholder="Municipality"
                      />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txtprovince">Province</label>
                      <input
                        type="text"
                        class="form-control"
                        id="txtprovince"
                        placeholder="Province"
                      />
                    </div>
                  </div>
                </div>
                <!--/address-->
              </fieldset><!--/Personal Information-->
              <!--Family Background-->
              <fieldset class="col-md-12 mt-2">
                <legend>Family Background</legend>
                <!--father name-->
                <div class="row">
                  <div class="col-md-12">
                    <b>Father's Name</b>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtflastname">Last Name</label>
                      <input
                        type="text"
                        class="form-control"
                        id="txtflastname"
                        placeholder="Last Name"
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtffirstname">First Name</label>
                      <input
                        type="text"
                        class="form-control"
                        id="txtffirstname"
                        placeholder="First Name"
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtfmiddlename">Middle Name</label>
                      <input
                        type="text"
                        class="form-control"
                        id="txtfmiddlename"
                        placeholder="Middle Name"
                      />
                    </div>
                  </div>
                </div>
                <!--/father name-->
                <!--mother name-->
                <div class="row">
                  <div class="col-md-12">
                    <b>Mother's Name</b>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtmlastname">Last Name</label>
                      <input
                        type="text"
                        class="form-control"
                        id="txtmlastname"
                        placeholder="Last Name"
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtmfirstname">First Name</label>
                      <input
                        type="text"
                        class="form-control"
                        id="txtmfirstname"
                        placeholder="First Name"
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txtmmiddlename">Middle Name</label>
                      <input
                        type="text"
                        class="form-control"
                        id="txtmmiddlename"
                        placeholder="Middle Name"
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
                          type="tel"
                          class="form-control"
                          id="txtgcontactnumber"
                        />
                      </div>
                    </div>
                  </div><!--/contact number-->                                  
                </div><!--/contact number-->
              </fieldset><!--/Family Background-->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="button" class="btn btn-primary">Save</button>
            </div>
          </form>
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
    };
  },
  methods: {
    registerStudent()
    {
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
    }
  }
};
</script>