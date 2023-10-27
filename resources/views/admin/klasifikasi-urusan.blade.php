@extends('layouts.header')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-dark">Klasifikasi Urusan</h1>
        <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addCategory"><i class="fas fa-plus fa-sm text-white fa-flip"></i> Tambah klasifikasi</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar klasifikasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless table-striped text-dark" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th width="51%">Nama</th>
                            <th>Dibuat pada</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tabel-klasifikasi">
                        @forelse ($klasifikasis as $klasifikasi)
                        <tr id="index_{{ $klasifikasi->id }}">
                            <td>{{ $loop->iteration }}.</td>
                            <td> {{$klasifikasi->nama}} </td>
                            <td> {{$klasifikasi->created_at}} </td>
                            <td>
                                <button class="btn btn-outline-danger btn-sm" title="hapus" data-toggle="modal" data-target="#deleteModal{{$klasifikasi->id}}"><i class="fas fa-trash"></i> Hapus</button>
                                <div class="dropdown mb-4 d-inline">
                                    <button
                                    class="btn btn-outline-primary dropdown-toggle btn-sm"
                                    type="button"
                                    id="dropdownMenuButton"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    data-klasifikasi-id="{{$klasifikasi->id}}"
                                    data-klasifikasi-status="{{$klasifikasi->status}}">
                                    {{$klasifikasi->status}}
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
                    <div id="success-alert" class="alert alert-success alert-dismissible fade show d-none" role="alert">
                        <span id="success-message"></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div id="error-alert" class="alert alert-danger alert-dismissible fade show d-none" role="alert">
                        <span id="error-message"></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

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

<!-- delete Modal-->
@foreach ($klasifikasis as $klasifikasi)
<div class="modal fade" id="deleteModal{{$klasifikasi->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form method="POST" action="{{ route('klasifikasi.destroy', $klasifikasi->id) }}">
                    @csrf
                    @method ('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>
@include ('components.modal-add-klasifikasi')
<x-logout/>

<script type="text/javascript">
    $(document).ready(function () {
        $('.dropdown-item[data-action="toggle-status"]').click(function () {
            var button = $(this).closest('.dropdown').find('button.dropdown-toggle');
            var klasifikasiId = button.data('klasifikasi-id');
            var currentStatus = button.data('klasifikasi-status');

            // Perform an AJAX request to toggle the status
            $.ajax({
                url: '/toggle-status/klasifikasi/' + klasifikasiId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    currentStatus: currentStatus
                },
                success: function (response) {
                    // Update the button text and data attributes
                    var newStatus = response.newStatus;
                    button.text(newStatus);
                    button.data('klasifikasi-status', newStatus);
                    $('#success-alert').removeClass('d-none').addClass('show');
                    $('#success-message').text(response.message);
                    setTimeout(function() {
                            $('#success-alert').addClass('d-none').removeClass('show');
                        }, 3700);
                },
                error: function (error) {
                    $('#error-message').text('An error occurred.');
                    $('#error-alert').removeClass('d-none').addClass('show');
                }
            });
        });
    });

</script>

@endsection