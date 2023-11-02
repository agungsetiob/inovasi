<!-- UI for urusan inovasi -->
@extends('layouts.header')
@section('content')
<!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-dark">Urusan Inovasi</h1>
                    <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addCategory"><i class="fas fa-plus fa-sm text-white fa-flip"></i> Tambah Urusan</a>
                </div>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar urusan</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless table-striped text-dark" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th width="40%">nama</th>
                                        <th width="40%">urusan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="tabel-urusan">
                                    @forelse ($urusans as $urusan)
                                    <tr id="index_{{$urusan->id}}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td> {{$urusan->nama}} </td>
                                        <td id="urusan"> {{--$urusan->created_at--}}{{$urusan->klasifikasi->nama}} </td>
                                        <td>
                                            <button class="btn btn-outline-danger btn-sm delete-button" title="hapus" 
                                                data-toggle="modal" 
                                                data-target="#deleteModal" 
                                                data-urusan-id="{{ $urusan->id }}"
                                                data-urusan-name="{{ $urusan->nama }}"><i class="fas fa-trash"></i></button>
                                            <div class="dropdown mb-4 d-inline">
                                                <button
                                                    class="btn btn-outline-primary dropdown-toggle btn-sm"
                                                    type="button"
                                                    id="dropdownMenuButton"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false"
                                                    data-urusan-id="{{$urusan->id}}"
                                                    data-urusan-status="{{$urusan->status}}">
                                                    {{$urusan->status}}
                                                </button>
                                                <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                                    <button class="dropdown-item" data-action="toggle-status">change status</button>
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

<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>
<script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@include('components.modal-add-sub-urusan')
@include('components.modal-delete-urusan')
<x-alert-modal/>
<x-logout/>
<script type="text/javascript">
    $(document).ready(function () {
        $(".container-fluid").on("click", ".dropdown-item[data-action='toggle-status']", function() {
            var button = $(this).closest('.dropdown').find('button.dropdown-toggle');
            var urusanId = button.data('urusan-id');
            var currentStatus = button.data('urusan-status');

            // Perform an AJAX request to toggle the status
            $.ajax({
                url: '/toggle-status/urusan/' + urusanId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    currentStatus: currentStatus
                },
                success: function (response) {
                    $('#success-modal').modal('show');
                    $('#success-message').text(response.message);
                    // Update the button text and data attributes
                    var newStatus = response.newStatus;
                    button.text(newStatus);
                    button.data('urusan-status', newStatus);
                },
                error: function (error) {
                    $('#error-message').text('An error occurred.');
                    $('#error-modal').modal('show');
                }
            });
        });
    });

</script>
@endsection