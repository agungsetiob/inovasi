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
                                        <th></th>
                                        <th width="50%">nama</th>
                                        <th>Jenis</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="tabel-indikator">
                                    @forelse ($indikators as $in)
                                    <tr id="index_{{$in->id}}">
                                        <td>{{ $loop->iteration }}.</td>
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
                                    <!-- <div id="success-alert" class="alert alert-success alert-dismissible fade show d-none" role="alert">
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
                                    </div> -->
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
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Indikator inovasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#{{ route('indikator.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Indikator inovasi</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan indikator inovasi">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama"></div>
                        <label class="font-weight-bold" for="jenis">Satuan indikator:</label>
                        <select name="jenis" id="jenis" class="form-control" required>
                            <option value="">Pilih satuan indikator</option>
                            <option value="sid" @selected(old('jenis') == 'sid')>Satuan Inovasi Daerah</option>
                            <option value="spd" @selected(old('jenis') == 'spd')>Satuan Pemerintah Daerah</option>
                        </select>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-jenis"></div>
                    </div>
                    <button id="store" type="button" class="btn btn-primary">Save</button>
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
<x-alert-modal/>
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
                        $('#success-modal').modal('show');
                        $('#success-message').text(response.message);
                        setTimeout(function() {
                            $('#success-modal').modal('hide');
                        }, 3700);
                    }
                },
                error: function(response) {
                    $('#error-message').text('Error gagal merubah status');
                    $('#error-modal').modal('show');
                }
            });
        });
    });

    $('#store').click(function(e) {
        e.preventDefault();

        //define variable
        let nama   = $("#nama").val();
        let jenis   = $("#jenis").val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({
            url: `/master/indikator`,
            type: "POST",
            cache: false,
            data: {
                "nama": nama,
                "jenis": jenis,
                "_token": token
            },
            success:function(response){
                //data indikator
                $('#success-modal').modal('show');
                $('#success-message').text(response.message);

                let indikator = `
                <tr id="index_${response.data.id}">
                <td>${response.data.id}</td>
                <td width="50%">${response.data.nama}</td>
                <td>${response.data.jenis}</td>
                <td>
                    <button class="btn btn-outline-danger btn-sm delete-button" title="hapus" data-toggle="modal" data-target="#deleteModal"
                        data-indikator-id="${response.data.id}"
                        data-indikator-name="${response.data.nama}"><i class="fas fa-trash"></i></button>
                    <div class="dropdown mb-4 d-inline">
                        <button
                            class="btn btn-outline-primary dropdown-toggle btn-sm"
                            type="button"
                            id="dropdownMenuButton"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            data-indikator-id="${response.data.id}"
                            data-indikator-status="${response.data.status}">
                            ${response.data.status}
                        </button>
                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                        <button class="dropdown-item" data-action="toggle-status">change status</button>
                    </div>
                    </div>
                </td>
                </tr>
                `;                
                //append to table
                $('#tabel-indikator').append(indikator);
                
                //clear form
                $('#nama').val('');
                $('#jenis').val('');
                $('#addCategory').modal('hide');
                
            },
            error:function(error){

                if (error.status === 422) {
                    $.each(error.responseJSON.errors, function (field, errors) {
                        let alertId = 'alert-' + field;
                        $('#' + alertId).html(errors[0]).removeClass('d-none').addClass('d-block');
                    });
                } else {
                    $('#error-message').text('An error occurred.');
                    $('#error-modal').modal('show');
                }

            }
        });
    });
</script>
@endsection