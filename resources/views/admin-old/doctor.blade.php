<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RSUD dr. H. Andi Abdurrahman Noor</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <link rel="shortcut icon" href="{{url ('storage/logors.png')}}" type="image/x-icon"/>

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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="#{{ url('search') }}">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for something?"
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search" action="#{{ url('search') }}">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for something?" aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-caret-down text-primary"></i>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
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
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Doctors</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addDoctor"><i class="fas fa-plus fa-sm text-white-50"></i> Add Doctor</a>
                    </div>
                </div>
                <!-- /.container-fluid -->


                 <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of Doctor</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Specialization</th>
                                            <th>photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($doctors as $doc)
                                        <tr>
                                            <td> {{$doc->name}} </td>
                                            <td> {{$doc->specialization}} </td>
                                            <td> 
                                                @if ($doc->photo)
                                                <img class="img-profile" src="storage/doctor/{{$doc->photo}}" height="60px">
                                                @endif 
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm" title="hapus" data-toggle="modal" data-target="#deleteModal{{$doc->id}}"><i class="fas fa-trash"></i> Delete</button>

                                                <button class="btn btn-info btn-sm" title="edit" data-target="#editModal{{$doc->id}}" data-toggle="modal"><i class="fas fa-pen-square"></i> Edit</button> 
                                            </td>      
                                        </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data  is not available.
                                            </div>
                                        @endforelse
                                        @if(Session::has('success'))
                                            <div class="alert alert-success data-dismiss">
                                                {{ Session::get('success') }}
                                                    @php
                                                        Session::forget('success');
                                                    @endphp
                                            </div>
                                        @elseif (Session::has('error'))
                                            <div class="alert alert-danger">
                                                {{ Session::get('error') }}
                                                    @php
                                                        Session::forget('error');
                                                    @endphp
                                            </div>
                                        @endif
                                        @error('photo')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; RSUD dr. H. Andi Abdurrahman Noor</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form method="POST" action="{{ route('logout') }}">
                            @csrf
                        <button class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- delete Modal-->
    @foreach ($doctors as $doc)
    <div class="modal fade" id="deleteModal{{$doc->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tenane Lur?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you are sure to delete this data.</div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="button" data-dismiss="modal">Cancel</button>
                    <form action="{{url('delete/doctor', $doc->id)}}" method="POST">
                            @csrf
                            @method ('delete')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Add Modal -->
    <div class="modal fade" id="addDoctor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Doctor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('add/doctor') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input value="{{ old('name') }}" type="text" name="name" class="form-control" id="name" required>
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" required>
                                <option value="" disabled selected>Choose category</option>
                                <option value="umum" {{ old('category') == 'umum' ? 'selected' : '' }}>Umum</option>
                                <option value="spesialis" {{ old('category') == 'spesialis' ? 'selected' : '' }}>Spesialis</option>
                            </select>
                            <label for="specialization">Specialization</label>
                            <input value="{{ old('specialization') }}" type="text" name="specialization" class="form-control" id="Specialization" required>
                            <label for="photo">Choose photo</label>
                            <div class="form-group">
                                <div class="input-group ">
                                    <label class="input-group-btn">
                                        <span class="btny btn-outline-primary">
                                            Browse<input accept="image/*" id="uploadBtn" type="file" style="display: none;" multiple name="photo">
                                        </span>
                                    </label>
                                    <input id="uploadFile" type="text" class="form-control @error('photo') is-invalid @enderror" readonly placeholder="Choose an image">
                                </div>
                                @error('photo')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror  
                            </div>
                        </div>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div> 
            </div>
        </div>
    </div>


    <!-- Edit Modal -->
    @foreach ($doctors as $doc)
    <div class="modal fade" id="editModal{{$doc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Doctor Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('update/doctor', $doc->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method ('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input value="{{ old('name', $doc->name) }}" type="text" name="name" class="form-control" id="nameEdit" required>
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" required>
                                <option disabled>Choose category</option>
                                <option value="umum" @selected($doc->category == 'umum')>Umum</option>
                                <option value="spesialis" @selected($doc->category == 'spesialis')>Spesialis</option>
                            </select>
                            <label for="specialization">Specialization</label>
                            <input value="{{ old('specialization', $doc->specialization) }}" type="text" name="specialization" class="form-control" id="Specialization" required>
                            <label for="photo">Choose photo</label>
                            <div class="form-group">
                                <div class="input-group ">
                                    <label class="input-group-btn">
                                        <input accept="image/*" type="file" multiple name="photo">
                                    </label>
                                </div>
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror  
                            </div>

                        </div>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button id="editLink" type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div> 
            </div>
        </div>
    </div>
    @endforeach

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    {{--Page level custom scripts--}}
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

    <!-- -->
    <script type="text/javascript">
        // function deleteDoctor(id){
        //     var link = document.getElementById('deleteLink')
        //     link.href = "{{ url('delete/doctor')}}/" + id
        //     $('#deleteModal').modal('show')
        // }

        document.getElementById("uploadBtn").onchange = function () {
        document.getElementById("uploadFile").value = this.value;};
        
    </script>
</body>

</html>