<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Inovasi Daerah</title>

  <!-- Custom fonts for this template-->
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <link
  href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
  rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

  <link rel="shortcut icon" href="{{url ('assets/img/logo.png')}}" type="image/x-icon"/>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <x-collapse-menu/>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar sticky-top navbar-expand navbar-light bg-gradient-primary topbar mb-4 shadow">
          <!-- Sidebar Toggle (Topbar) static-top(ini diatas td, kalu rusak balikin aja)-->
          <button id="sidebarToggleTop" class="btn btn-link rounded mr-3">
            <i class="fa fa-bars text-dark"></i>
          </button>
          <ul class="navbar-nav ml-auto">

              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-caret-down text-white"></i> 
                <span class="mr-2 d-none d-lg-inline text-white small"> {{Auth::user()->name}}</span>
                <img class="img-profile rounded-circle"
                src="{{url('storage/ava/'.Auth::user()->avatar)}}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
              aria-labelledby="userDropdown">
              <a class="dropdown-item" href="{{url('edit-profile', Auth::user()->id)}}">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Edit Profile
              </a>
              <a class="dropdown-item" href="{{url('change-password')}}">
                <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                Change password
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>

        </ul>
      </nav>
      @yield ('content')
</body>
</html>