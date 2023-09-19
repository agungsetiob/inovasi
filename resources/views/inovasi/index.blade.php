<!-- End of Topbar -->
@extends('layouts.header')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-dark">Inovasi</h1>
        <a href="{{ route('inovasi.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white fa-flip"></i> Add Proposal</a>
    </div>
</div>
<!-- /.container-fluid -->


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Proposals</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="30%">Nama Inovasi</th>
                            <th>SKPD</th>
                            <th>Uji Coba</th>
                            <th>Implementasi</th>
                            <th width="9%">Tahapan</th>
                            <th width="5%">File Bukti</th>
                            <th width="12%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($proposals as $prop)
                        <tr>
                            <td> {{ $prop->nama }} </td>
                            <td> {{ $prop->skpd->nama }}</td>
                            <td> {{ $prop->ujicoba }} </td>
                            <td> {{ $prop->implementasi }} </td>
                            <td> 
                                @if ($prop->tahapan_inovasi == 'ujicoba')
                                <span class="badge bg-indigo">{{$prop->tahapan_inovasi}}</span>
                                @elseif ($prop->tahapan_inovasi == 'penerapan')
                                <span class="badge bg-green">{{$prop->tahapan_inovasi}}</span>
                                @else ($prop->tahaoan_inovasi == 'inisiatif')
                                <span class="badge bg-orange">{{$prop->tahapan_inovasi}}</span>
                                @endif
                            </td>
                            <td> 
                                <a href="{{url('bukti-dukung')}}" class="btn btn-outline-primary btn-sm"><i class="fas fa-eye fa-bounce"></i></a>
                            </td>
                            <td>

                                <button class="btn btn-outline-danger btn-sm" title="hapus" data-toggle="modal" data-target="#deleteModal{{$prop->id}}"><i class="fas fa-trash"></i></button>
                                
                                <a href="{{route('inovasi.edit', $prop->id)}}" class="btn btn-outline-success btn-sm" title="edit"><i class="fas fa-pencil-alt" alt="edit"></i></a>

                                <a href="{{url('print/report', $prop->id)}}" class="btn btn-outline-secondary btn-sm" title="cetak"><i class="fas fa-file-alt"></i></a>
                            </tr>
                            @empty
                            <div class="alert alert-danger">
                                Data is not available.
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

<!-- delete Modal-->
@foreach ($proposals as $prop)
<div class="modal fade" id="deleteModal{{$prop->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form method="POST" action="{{ route('inovasi.destroy', $prop->id) }}">
                    @csrf
                    @method ('DELETE')
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
<script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>

<!-- delete modal script -->
{{--<script>
    function deletePost(id){
        var link = document.getElementById('deleteLink')
        link.href = "{{ url('posts')}}/" + id
        $('#deleteModal').modal('show')
    }
</script>--}}
@endsection