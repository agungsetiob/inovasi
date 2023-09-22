@extends('layouts.header')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-dark">Messages</h1>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <div class="row g-3">
                <div class="col">
                    <label class="font-weight-bold">Mulai tanggal :</label>
                    <input type="date" name="startdate" class="form-control" id="startdate">
                </div>
                <div class="col">
                    <label class="font-weight-bold">Sampai tanggal :</label>
                    <input type="date" name="enddate" class="form-control" id="enddate">
                </div>
                <div class="col" style="padding-top: 2rem;" >
                    <a href="" onclick="this.href='messages/laporan/'+ document.getElementById('startdate').value + '/' +document.getElementById('enddate').value" class=" d-sm-inline-block btn btn-danger shadow-sm" target="_blank"><i class="fas fa-print text-white"></i> Cetak</a>
                </div>

            </div>
        </div>
    </div>   

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of messages</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th width="20%">Email</th>
                            <th width="35%">Message</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($messages as $mes)
                        <tr>
                            <td> {{$mes->name}} </td>
                            <td> {{$mes->email}} </td>
                            <td> {{$mes->message}} </td>
                            <td> {{$mes->created_at}} </td>
                            <td>
                                <button class="btn btn-outline-danger btn-sm" title="hapus" data-toggle="modal" onclick="deleteMessage({{$mes->id}})"><i class="fas fa-trash"></i> Hapus</button>       
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
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
            @csrf
            @method ('delete')
            <a id="deleteLink" class="btn btn-danger" type="button">Delete</a>
        </div>
    </div>
</div>
</div>

<!-- Add Modal -->


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

<!-- delete modal script -->
<script>
    function deleteMessage(id){
        var link = document.getElementById('deleteLink')
        link.href = "{{ url('delete/message')}}/" + id
        $('#deleteModal').modal('show')
    }
</script>
@endsection