<!-- UI for jenis inovasi -->
@extends('layouts.header')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-dark">Jenis Inovasi</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addCategory"><i class="fas fa-plus fa-sm text-white fa-flip"></i> Tambah Jenis</a>
    </div>
</div>
<!-- /.container-fluid -->


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Jenis Inovasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless table-striped table-hover text-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>name</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $cat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td> {{$cat->name}} </td>
                            <td> {{$cat->created_at}} </td>
                            <td>
                                <button class="btn btn-danger btn-sm" title="hapus" data-toggle="modal" data-target="#deleteModal{{$cat->id}}"><i class="fas fa-trash"></i> Hapus</button>
                                <div class="dropdown mb-4 d-inline">
                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    {{$cat->status}}
                                </button>
                                @if ($cat->status == 'disabled')
                                <form method="POST" action="{{url('enable/'. $cat->id)}}">
                                    @csrf
                                    <div class="dropdown-menu animated--fade-in bg-gray-400" aria-labelledby="dropdownMenuButton">
                                        <button class="dropdown-item">Enable</button>
                                    </div>
                                </form>
                                @elseif ($cat->status == 'enabled')
                                <form method="POST" action="{{url('disable/'. $cat->id)}}">
                                    @csrf
                                    <div class="dropdown-menu animated--fade-in bg-gray-400" aria-labelledby="dropdownMenuButton">
                                        <button class="dropdown-item">Disable</button>
                                    </div>
                                </form>
                                @endif
                            </div>
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

<!-- delete Modal-->
@foreach ($categories as $cat)
<div class="modal fade" id="deleteModal{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form method="POST" action="{{ route('jenis.destroy', $cat->id) }}">
                    @csrf
                    @method ('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Add Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah jenis inovasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('jenis.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Jenis inovasi</label>
                        <input type="text" name="name" class="form-control" id="name" required placeholder="Masukkan jenis inovasi">   
                    </div>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
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

<!-- Page level custom scripts -->
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection