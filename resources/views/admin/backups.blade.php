@extends('layouts.header')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-dark">Backups</h1>
        <a href="/backup/only-db" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white fa-flip"></i> Create Backup</a>
    </div>
</div>
<!-- /.container-fluid -->


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of Backups</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>File Name</th>
                            <th>Size</th>
                            <!-- <th>Created Date</th> -->
                            <th>Created Age</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($backups as $backup)
                        <tr>
                            <td> {{$backup['file_name']}} </td>
                            <td> {{ \App\Http\Controllers\BackupController::humanFilesize($backup['file_size']) }} </td>
                            <!-- <td> {{ date('F jS, Y, g:ia (T)',$backup['last_modified']) }} </td> -->
                            <td> {{ \Carbon\Carbon::parse($backup['last_modified'])->diffForHumans() }} </td>
                            <td>
                                <a class="btn btn-outline-warning btn-sm" href="{{ url('storage/RSUD/'.$backup['file_name']) }}"><i class="fa fa-download"></i> Download</a>

                                <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Do you really want to delete this file?')" data-button-type="delete"
                                href="{{ url('backup/delete/'.$backup['file_name']) }}"><i class="fa fa-trash"></i>
                            Delete</a> 
                        </td>      
                    </tr>
                    @empty
                    <div class="alert alert-danger">
                        No backup available.
                    </div>
                    @endforelse
                    @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                        @php
                        Session::forget('error');
                        @endphp
                    </div>
                    @elseif (Session::has('delete'))
                    <div class="alert alert-dark">
                        {{ Session::get('delete') }}
                        @php
                        Session::forget('delete');
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

<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

{{--Page level custom scripts--}}
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection