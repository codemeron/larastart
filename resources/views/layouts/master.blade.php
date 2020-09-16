<?php
   use App\Http\Controllers\API\UserController;
?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>KONEKtayo: Pro-file</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper" id="app">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" @keyup="searchit" v-model="search" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" @click.prevent="searchit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="/img/logo.png" alt="LaraStart Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">PRO-FILE</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="/img/user.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">  {{ Auth::user()->firstname . " " .  Auth::user()->lastname }} </a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!--app/Providers/AuthService.php-->
            @can('isSystemAdministrator' || 'isSchoolAdministrator' || 'isProgramHead' || 'isAdviser')
            <li class="nav-item">
              <router-link to="/home" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt text-blue"></i>
                <p>
                  Dashboard
                </p>
              </router-link>
            </li>
            @endcan
            <!--registration-->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-plus text-teal"></i>
                <p>
                  Registration
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/registerfaculty" class="nav-link">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Faculty | Employee</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/registerstudent" class="nav-link">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Students</p>
                  </router-link>
                </li>
              </ul>
            </li>
            <!--/registration-->

            <!--record-->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-server text-teal"></i>
                <p>
                  Records
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/faculty" class="nav-link">
                    <i class="fas fa-database nav-icon"></i>
                    <p>Faculty/Employee</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/students" class="nav-link">
                    <i class="fas fa-database nav-icon"></i>
                    <p>Students</p>
                  </router-link>
                </li>
              </ul>
            </li>
            <!--/record-->
            
            <li class="nav-item">
              <router-link to="/profile" class="nav-link">
                <i class="nav-icon fas fa-user text-orange"></i>
                <p>
                  Profile
                </p>
              </router-link>
            </li>
            
            @can('isSystemAdministrator' || )
            <li class="nav-item">
              <router-link to="/applicantlist" class="nav-link">
                <i class="nav-icon fas fa-user-check"></i>
                <p>
                  Users Request &nbsp; 
                  <span class="badge badge-info" id="spanNewlyRegisteredUser"></span>
                </p>
              </router-link>
            </li>
            @endcan

            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  <i class="nav-icon fa fa-power-off text-red"></i>
                 <p> {{ __('Logout') }} </p>
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <router-view></router-view>
          <!-- set progressbar -->
          <vue-progress-bar></vue-progress-bar>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        konektayo. konektado.
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2020 <a href="https://codemeron.github.io/">IT'sMambu</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->
  @auth
    <script>
      window.user = @json(auth()->user());
    </script>
  @endauth

  <!-- REQUIRED SCRIPTS -->
  <script src="/js/app.js"></script>
  <script>
    //app/Http/Controllers/API/UserController.php/newRegisteredUser()
    //Get total number of newly registered user.
    function numberOfNewlyRegisteredUser(){
      axios.post('api/user/newRegisteredUser', {}).then((response) => {
        document.getElementById('spanNewlyRegisteredUser').innerHTML = response.data;
      });
    }
    numberOfNewlyRegisteredUser();
    window.setInterval(numberOfNewlyRegisteredUser, 10000);
  </script>

</body>
</html>
