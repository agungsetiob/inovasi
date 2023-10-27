@extends('layouts.header')
@section('content')
<!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-dark">Indikator Inovasi</h1>
                    <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addCategory"><i class="fas fa-plus fa-sm text-white fa-flip"></i> Tambah Indikator</a>
                </div>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Indikator Inovasi</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless table-striped text-dark" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th width="50%">nama</th>
                                        <th>Jenis</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($indikators as $in)
                                    <tr id="index_{{$in->id}}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td> {{$in->nama}} </td>
                                        <td> {{$in->jenis}} </td>
                                        <td>
                                            <button class="btn btn-outline-danger btn-sm delete-button" title="hapus" 
                                            data-toggle="modal" 
                                            data-target="#deleteModal" 
                                            data-indikator-id="{{ $in->id }}"
                                            data-indikator-name="{{ $in->nama }}"><i class="fas fa-trash"></i></button>
                                            <div class="dropdown mb-4 d-inline">
                                                <button
                                                class="btn btn-outline-primary dropdown-toggle btn-sm"
                                                type="button"
                                                id="dropdownMenuButton"
                                                data-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                                data-indikator-id="{{ $in->id }}"
                                                data-indikator-status="{{ $in->status }}">
                                                {{ $in->status }}
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
                                    <div id="success-alert" class="alert alert-success alert-dismissible fade show d-none" role="alert">
                                        <span id="success-message"></span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div id="error-alert" class="alert alert-danger d-none">
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


<!-- Add Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Indikator inovasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('indikator.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Indikator inovasi</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" required placeholder="Masukkan indikator inovasi" value="{{old('nama')}}">
                        <label class="font-weight-bold" for="tahapan">Satuan indikator:</label>
                        <select name="jenis" id="jenis" class="form-control @error('jenis') is-invalid @enderror" required>
                            <option value="">Pilih satuan indikator</option>
                            <option value="sid" @selected(old('jenis') == 'sid')>Satuan Inovasi Daerah</option>
                            <option value="spd" @selected(old('jenis') == 'spd')>Satuan Pemerintah Daerah</option>
                        </select> 
                    </div>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div> 
        </div>
    </div>
</div>

<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>
<script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
<x-delete-master-indikator/>
<x-logout/>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on("click",".toggle-status-button",function(){
            var button = $(this);
            var indikatorId = button.closest('.dropdown').find('.dropdown-toggle').data('indikator-id');
            var currentStatus = button.closest('.dropdown').find('.dropdown-toggle').data('indikator-status');

            $.ajax({
                url: '/indikator/change-status/' + indikatorId,
                type: 'PUT',
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    if (response.success) {
                        var newStatus = response.newStatus;
                        button.closest('.dropdown').find('.dropdown-toggle').data('indikator-status', newStatus);
                        button.closest('.dropdown').find('.dropdown-toggle').text(newStatus);
                        $('#success-alert').removeClass('d-none').addClass('show');
                        $('#success-message').text(response.message);
                        $('#error-alert').addClass('d-none');
                        setTimeout(function() {
                            $('#success-alert').addClass('d-none').removeClass('show');
                        }, 3700);
                    }
                },
                error: function(response) {
                    $('#error-message').text('Error gagal merubah status');
                    $('#error-alert').removeClass('d-none').addClass('show');
                }
            });
        });
    });
</script>
@endsection