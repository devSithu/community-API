<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MJCSN | Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/css.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link href="{{ asset('dist/css/ionicons.min.css') }}" rel="stylesheet">
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
            <a class="dropdown-item dropdown-footer btn-danger" href="login.html" role="button">
              <i class="fas fa-sign-out-alt mr-2"></i>Log out
            </a>
          </div>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-light-danger elevation-2">
      <a href="{{url('home')}}" class="brand-link navbar-light">
        <img src="../../../../img/logo.png" alt="MJCSN" class="brand-image">
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
<section class="content-header">
  <div class="container-fluid">
    <div class="row m-2 mt-4">
      <div class="col-sm-6">
        <h1>Introduced User List</h1>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 p-4">
        <div class="card">
          <div class="card-header">
            <h2 class="card-title">
              <table>
                <tr>
                  <td>User Name</td>
                  <td>&emsp;&emsp;:&emsp;&emsp;</td>
                  <td>{{$userData->user_name}}</td>
                </tr>
                <tr>
                  <td>Operator</td>
                  <td>&emsp;&emsp;:&emsp;&emsp;</td>
                  <td>{{$userData->operator_type}}</td>
                </tr>
                <tr>
                  <td>Phone No</td>
                  <td>&emsp;&emsp;:&emsp;&emsp;</td>
                  <td>{{$userData->phone_number}}</td>
                </tr>
              </table>  
            </h2>
            <small class="float-right"></small>
          </div>
          <form method="post"  action="{{url('payBill')}}">
            @csrf
            @if(session('success'))
            <p class="alert alert-success">{{session('success')}}</p>
            @endif
            <div class="card-body p-4">
              @foreach ($introducedUsers as $item)

                <div class="form-group">
                  <label>{{$item->user_name}}</label>
                  <div class="input-group mb-4">
                    <div class="input-group-prepend">
                      <span class="input-group-text">{{$userData->operator_type}}</span>
                    </div>
                    <input type="number" class="form-control"  name="{{$item->introducer_user_number}}" value="{{$item->charge_code}}">
                  </div>
                </div>
              @endforeach
              
              <div class="card-footer clearfix">
                <button type="submit" class="btn btn-danger float-right">Submit</button>
                <a class="btn btn-default" href="{{url('home')}}">Back</a>
              </div>
            </div>
          </form>
          
        </div>
      </div>
    </div>

  </div>
</section>

</div>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->

<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}
"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
</body>
</html>