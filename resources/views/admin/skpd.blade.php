<!-- UI for skpd inovasi -->
@extends('layouts.header')
@section('content')
<!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-dark">SKPD/UPTD</h1>
                    <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addCategory"><i class="fas fa-plus fa-sm text-white fa-flip"></i> Tambah SKPD</a>
                </div>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar SKPD</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless table-striped text-dark" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th width="51%">Nama</th>
                                        <th>Dibuat pada</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="tabel-skpd">
                                    @forelse ($skpds as $skpd)
                                    <tr id="index_{{$skpd->id}}">
                                        <td width="5%">{{ $loop->iteration }}.</td>
                                        <td> {{$skpd->nama}} </td>
                                        <td width="20%"> {{$skpd->created_at}} </td>
                                        <td width="14%">
                                            <button class="btn btn-outline-danger btn-sm delete-button" title="hapus" 
                                                data-toggle="modal" 
                                                data-target="#deleteModal" 
                                                data-skpd-id="{{ $skpd->id }}"
                                                data-skpd-name="{{ $skpd->nama }}"><i class="fas fa-trash"></i></button>
                                            <div class="dropdown mb-4 d-inline">
                                                <button
                                                    class="btn btn-outline-primary dropdown-toggle btn-sm"
                                                    type="button"
                                                    id="dropdownMenuButton"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false"
                                                    data-skpd-id="{{ $skpd->id }}"
                                                    data-skpd-status="{{ $skpd->status }}">
                                                    {{ $skpd->status }}
                                                </button>
                                                <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                                    <button class="dropdown-item toggle-status-button" data-action="toggle-status">Change Status</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <div class="alert alert-danger">
                                        Data  is not available.
                                    </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
<!-- /.container-fluid -->
        </div>
<!-- End of Main Content -->
            <x-footer/>
    </div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>
<script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@include ('components.modal-add-skpd')
<x-alert-modal/>
@include ('components.modal-delete-skpd')
<x-logout/>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on("click",".toggle-status-button",function(){
            var button = $(this);
            var skpdId = button.closest('.dropdown').find('.dropdown-toggle').data('skpd-id');
            var currentStatus = button.closest('.dropdown').find('.dropdown-toggle').data('skpd-status');

            $.ajax({
                url: '/skpd/change-status/' + skpdId,
                type: 'PUT',
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    if (response.success) {
                        var newStatus = response.newStatus;
                        button.closest('.dropdown').find('.dropdown-toggle').data('skpd-status', newStatus);
                        button.closest('.dropdown').find('.dropdown-toggle').text(newStatus);
                        $('#success-modal').modal('show');
                        $('#success-message').text(response.message);
                        setTimeout(function() {
                            $('#success-modal').modal('hide');
                        }, 3700);
                    }
                },
                error: function(response) {
                    $('#error-message').text('Error! gagal merubah status');
                    $('#error-modal').modal('show');
                }
            });
        });
    });
</script>
@endsection