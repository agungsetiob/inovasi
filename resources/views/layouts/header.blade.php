<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.title') }}</title>

  <!-- Custom fonts for this template-->
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link
  href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
  rel="stylesheet">
  <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <script type="text/javascript" src="{{asset('vendor/htmx/htmx.min.js')}}"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.bootstrap4.min.css" integrity="sha512-ht3CSPjgWsxdbLti7wtKNEk5hLoGtP2J8C40muB5/PCWwNw9M/NMJpyvHdeko7ADC60SEOiCenU5pg+kJiG9lg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="shortcut icon" href="{{url ('assets/img/logo.png')}}" type="image/x-icon"/>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <x-collapse-menu/>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content" @foreach ($backgrounds as $background) style="background: url('{{url("storage/backgrounds/" . $background->background)}}'); background-position: center; background-repeat: no-repeat; background-size: cover;" @endforeach>

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-gradient-primary topbar mb-4 shadow">
          <button title="bars" id="sidebarToggleTop" class="btn btn-link rounded mr-3">
            <i class="fa fa-bars text-dark"></i>
          </button>
          <ul class="navbar-nav ml-auto">

              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-caret-down text-white mr-1"></i> 
                <span class="mr-2 d-none d-lg-inline text-white small">{{Auth::user()->name}}</span>
                <img class="img-profile rounded-circle"
                src="{{url('storage/ava/'.Auth::user()->avatar)}}" alt="ava">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
              aria-labelledby="userDropdown">
              <a class="dropdown-item" href="{{url('edit-profile', Auth::user()->id)}}">
                <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                Edit Profile
              </a>
              <a class="dropdown-item" href="{{url('change-password')}}">
                <i class="fas fa-key fa-sm fa-fw mr-2"></i>
                Change password
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                Logout
              </a>
            </div>
          </li>

        </ul>
      </nav>
      @yield ('content')
</body>
</html>