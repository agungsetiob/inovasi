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
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

    <link rel="shortcut icon" href="{{url ('img/logo.png')}}" type="image/x-icon"/>

    <script src="https://cdn.tiny.cloud/1/9s1s817h0tyv1a4jhlghnqoofc647ifzh5zh6z1in2bqpjb9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
     tinymce.init({
       selector: 'textarea#editor',
       plugins: 'code table lists autosave fullscreen media link',
       toolbar: 'undo redo | formatselect| bold italic underline| alignleft aligncenter alignright alignjustify | fontsize fontfamily | indent outdent | bullist numlist | code link | table | media image | fullscreen | text color',
       paste_as_text: true,
       image_title: true,
       automatic_uploads: true,
       file_picker_types: 'image',
       file_picker_callback: function (cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.onchange = function () {
            var file = this.files[0];

            var reader = new FileReader();
            reader.onload = function () {
                var id = 'blobid' + (new Date()).getTime();
                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                cb(blobInfo.blobUri(), { title: file.name });
            };
            reader.readAsDataURL(file);
        };

        input.click();
    },
});
</script>

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
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="#">
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
        <h1 class="h3 mb-0 text-dark">Create Proposal</h1>
    </div>
</div>
</div>
<!-- End of Main Content -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="input-group ">
                                <label class="input-group-btn">
                                    <span class="btny btn-outline-primary">
                                        Browse<input accept="image/*" id="uploadBtn" type="file" style="display: none;" multiple name="image">
                                    </span>
                                </label>
                                <input id="uploadFile" type="text" class="form-control @error('image') is-invalid @enderror" readonly placeholder="Choose an image logo">
                            </div>
                            @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror  
                        </div>
                        <script type="text/javascript">
                            document.getElementById("uploadBtn").onchange = function (){
                                document.getElementById("uploadFile").value = this.value;
                            }
                        </script>

                        <div class="form-group">
                            <label class="font-weight-bold">Nama inovasi:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan nama inovasi">
                            
                            <!-- error message untuk title -->
                            @error('title')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Dibuat oleh:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan nama skpd pembuat inovasi">
                            
                            <!-- error message untuk title -->
                            @error('title')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Tahapan inovasi:</label>
                            <textarea rows="5" id="editor" class="form-control @error('content') is-invalid @enderror" name="content" rows="5" placeholder="Masukkan tahapan pembuatan inovasi">{{ old('content') }}</textarea>
                            
                            <!-- error message untuk content -->
                            @error('content')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Inisiator inovasi:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan nama pembuat inovasi">
                            
                            <!-- error message untuk title -->
                            @error('title')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label class="font-weight-bold">Jenis inovasi:</label>
                            <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" required>
                                <option value="" disabled selected>Pilih jenis inovasi</option>
                                @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category') == $cat->id ? 'selected' : ''}}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Bentuk inovasi:</label>
                            <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" required>
                                <option value="" disabled selected>Pilih bentuk inovasi</option>
                                @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category') == $cat->id ? 'selected' : ''}}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Urusan inovasi daerah:</label>
                            <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" required>
                                <option value="" disabled selected>Pilih urusan inovasi</option>
                                @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category') == $cat->id ? 'selected' : ''}}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Rancang bangun:</label>
                            <textarea rows="10" id="" class="form-control @error('content') is-invalid @enderror" name="content" rows="5" placeholder="Masukkan rancang bangun dan pokok perubahan yang dilakukan">{{ old('content') }}</textarea>
                            
                            <!-- error message untuk content -->
                            @error('content')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Tujuan inovasi:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan tujuan pembuatan inovasi Daerah">
                            
                            <!-- error message untuk title -->
                            @error('title')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Manfaat yang diperoleh:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan manfaat inovasi">
                            
                            <!-- error message untuk title -->
                            @error('title')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Hasil inovasi:</label>
                            <textarea rows="7" id="" class="form-control @error('content') is-invalid @enderror" name="content" rows="5" placeholder="Masukkan hasil dari inovasi yang dilakukan">{{ old('content') }}</textarea>
                            
                            <!-- error message untuk content -->
                            @error('content')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Waktu ujicoba:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan waktu uji coba inovasi">
                            
                            <!-- error message untuk title -->
                            @error('title')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Waktu implementasi:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan waktu implementasi inovasi">
                            
                            <!-- error message untuk title -->
                            @error('title')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Anggaran:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan anggaran inovasi">
                            
                            <!-- error message untuk title -->
                            @error('title')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">Publish</button>
                        <button type="reset" class="btn btn-md btn-warning" disabled>Draft</button>

                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Bappedalitbang Tanah Bumbu 2023</span>
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

<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>
</body>
</html>