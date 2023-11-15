@extends('layouts.header')
@section('content')
<!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-dark">Jenis Bukti Inovasi</h1>
                    <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addCategory"><i class="fas fa-plus fa-sm text-white fa-flip"></i> Tambah Jenis Bukti</a>
                </div>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Jenis Bukti Inovasi</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless table-striped text-dark" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="5%"></th>
                                        <th width="38%">Nama</th>
                                        <th width="5%">Bobot</th>
                                        <th width="37%">Indikator</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                @fragment ('daftar-bukti')
                                <tbody id="tabel-bukti">
                                    @forelse ($buktis as $bukti)
                                    <tr id="index_{{$bukti->id}}">
                                        <td>{{ $loop->iteration }}.</td>
                                        <td> {{$bukti->nama}} </td>
                                        <td> {{$bukti->bobot}} </td>
                                        <td> {{$bukti->indikator->nama}} </td>
                                        <td>
                                            <button class="btn btn-outline-danger btn-sm delete-button" title="hapus" 
                                            data-toggle="modal" 
                                            data-target="#deleteModal" 
                                            data-bukti-id="{{ $bukti->id }}"
                                            data-bukti-name="{{ $bukti->nama }}"><i class="fas fa-trash"></i></button>
                                            <div class="dropdown mb-4 d-inline">
                                                <button
                                                    class="btn btn-outline-primary dropdown-toggle btn-sm"
                                                    type="button"
                                                    id="dropdownMenuButton"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false"
                                                    data-bukti-id="{{ $bukti->id }}"
                                                    data-bukti-status="{{ $bukti->status }}">
                                                    {{ $bukti->status }}
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
                                @endfragment
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js" integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@include ('components.modal-add-bukti')
<x-alert-modal/>
<x-logout/>
@include ('components.modal-delete-bukti')
<script type="text/javascript">
    $(document).ready(function() {
        //$(".toggle-status-button").click(function() 
        $(".container-fluid").on("click", ".toggle-status-button", function(){
            var button = $(this);
            var buktiId = button.closest('.dropdown').find('.dropdown-toggle').data('bukti-id');
            var currentStatus = button.closest('.dropdown').find('.dropdown-toggle').data('bukti-status');

            $.ajax({
                url: '/bukti/change-status/' + buktiId,
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    if (response.success) {
                        var newStatus = response.newStatus;
                        button.closest('.dropdown').find('.dropdown-toggle').data('bentuk-status', newStatus);
                        button.closest('.dropdown').find('.dropdown-toggle').text(newStatus);
                        $('#success-modal').modal('show');
                        $('#success-message').text(response.message);
                        setTimeout(function() {
                            $('#success-').modal('hide');
                        }, 3900);
                    }
                },
                error: function(response) {
                    $('#error-message').text('Sebuah error terjadi');
                    $('#error-modal').modal('show');
                }
            });
        });
    });
</script>
@endsection