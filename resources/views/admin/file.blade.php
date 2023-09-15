@extends('layouts.header')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-dark">File Bukti Dukung</h1>
        @if (Auth::user()->role == 'admin')
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#uploadFile"><i class="fas fa-upload fa-sm text-white fa-bounce"></i> Upload File</a>
        @endif
    </div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar File</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama File</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($files as $file)
                        <tr>
                            <td> {{$file->name}} </td>
                            <td> {{$file->created_at}} </td>
                            <td>
                                <button class="btn btn-danger btn-sm" title="hapus" href="#" data-toggle="modal" data-target="#deleteModal{{$file->id}}">
                                    <i class="fas fa-trash fa-shake"></i> hapus
                                </button>
                                <a class="btn btn-success btn-sm" title="download" href="{{Storage::url('docs/'. $file->file )}}" target="_blank">
                                    <i class="fas fa-download"></i> download
                                </a>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">
                            Data file Belum tersedia.
                        </div>
                        @endforelse
                        @if(Session::has('success'))
                        <div class="alert alert-success">
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

<!-- Add Modal -->
<div class="modal fade" id="uploadFile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('upload/file') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">File name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                        <label for="photo">Choose file</label>
                        <div class="form-group">
                            <div class="input-group ">
                                <label class="input-group-btn">
                                    <span class="btny btn-outline-primary">
                                        Browse<input accept="application/pdf" id="uploadBtn" type="file" style="display: none;" multiple name="file">
                                    </span>
                                </label>
                                <input id="uploadFile" type="text" class="form-control @error('photo') is-invalid @enderror" readonly placeholder="Choose a .pdf file">
                            </div>  
                        </div>
                        <script type="text/javascript">
                            document.getElementById("uploadBtn").onchange = function () {
                                document.getElementById("uploadFile").value = this.value;};
                            </script>
                        </div>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div> 
            </div>
        </div>
    </div>

    <!-- delete Modal-->
    @foreach ($files as $file)
    <div class="modal fade" id="deleteModal{{$file->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you are sure to delete this data.</div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="button" data-dismiss="modal">Cancel</button>
                    <form action="{{url('delete/docs', $file->id)}}" method="POST">
                        @csrf
                        @method ('delete')
                        <button class="btn btn-danger" type="submit">Delete</button>
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
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection