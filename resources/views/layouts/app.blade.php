<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MJCSN | Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="dist/css/css.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="dist/css/ionicons.min.css" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-dark navbar-danger">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user mr-2"></i>Aung Ko Minn
        </a>
        <div class="dropdown-menu dropdown-menu-sm-left dropdown-menu-right">
          <a href="#" class="dropdown-item">View Profile</a>
          <a href="#" class="dropdown-item">Update Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item dropdown-footer btn-danger" href="#" role="button">
            <i class="fas fa-sign-out-alt mr-2"></i>Log out
          </a>
        </div>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-light-danger elevation-2">
    <a href="{{url('home')}}" class="brand-link navbar-light">
      <img src="img/logo.png" alt="MJCSN" class="brand-image">
      <span class="brand-text">MJCSN Admin</span>
    </a>

    <div class="sidebar">
      <nav class="mt-4">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header"></li>

          <li class="nav-item">
            <a href="{{url('home')}}" class="nav-link active">
              <i class="nav-icon fas fa-list"></i>
              <p>Introduce User List</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Account Control<i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('adminList')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Account List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('userRegister')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create New Account</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{url('userLogout')}}" class="nav-link">
              <i class="nav-icon fas fa-logout"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
      @yield('content')
  </div>

  <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2020 MJCSN.</strong> All rights reserved.
  </footer> -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
