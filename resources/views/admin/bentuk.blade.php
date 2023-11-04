@extends('layouts.header')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-dark">Bentuk Inovasi</h1>
        <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addCategory"><i class="fas fa-plus fa-sm text-white fa-flip"></i> Tambah Bentuk</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Bentuk Inovasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless table-striped text-dark" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th width="50%">nama</th>
                            <th>Dibuat pada</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tabel-bentuk">
                        @forelse ($bentuks as $ben)
                        <tr id="index_{{$ben->id}}">
                            <td>{{ $loop->iteration }}.</td>
                            <td> {{$ben->nama}} </td>
                            <td> {{$ben->created_at}} </td>
                            <td>
                                <button class="btn btn-outline-danger btn-sm delete-button" title="hapus" 
                                data-toggle="modal" 
                                data-target="#deleteModal" 
                                data-bentuk-id="{{ $ben->id }}"
                                data-bentuk-name="{{ $ben->nama }}"><i class="fas fa-trash"></i></button>
                                <div class="dropdown mb-4 d-inline">
                                    <button
                                    class="btn btn-outline-primary dropdown-toggle btn-sm"
                                    type="button"
                                    id="dropdownMenuButton"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    data-bentuk-id="{{ $ben->id }}"
                                    data-bentuk-status="{{ $ben->status }}">
                                    {{ $ben->status }}
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
                    {{--@if(Session::has('success'))
                    <div class="alert alert-success data-dismiss alert-dismissible">
                        {{ Session::get('success') }}
                        @php
                        Session::forget('success');
                        @endphp
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @elseif (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                        @php
                        Session::forget('error');
                        @endphp
                    </div>
                    @endif
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
                    </div>--}}
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
@include ('components.modal-add-bentuk')
@include ('components.modal-delete-bentuk')
<x-alert-modal/>
<x-logout/>
<script>
    $(document).ready(function() {
        $(".container-fluid").on("click", ".dropdown-item[data-action='toggle-status']", function(){
            var button = $(this);
            var bentukId = button.closest('.dropdown').find('.dropdown-toggle').data('bentuk-id');
            var currentStatus = button.closest('.dropdown').find('.dropdown-toggle').data('bentuk-status');

            $.ajax({
                url: '/bentuk/change-status/' + bentukId,
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    if (response.success) {
                        // Update the UI with the new status
                        var newStatus = response.newStatus;
                        button.closest('.dropdown').find('.dropdown-toggle').data('bentuk-status', newStatus);
                        button.closest('.dropdown').find('.dropdown-toggle').text(newStatus);
                        $('#success-modal').modal('show');
                        $('#success-message').text(response.message);
                    }
                },
                error: function(response) {
                    $('#error-message').text('An error occurred.');
                    $('#error-modal').modal('show');
                }
            });
        });
    });
</script>
@endsection