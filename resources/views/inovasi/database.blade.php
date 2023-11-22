@extends('layouts.header')
@section('content')
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-dark">Inovasi</h1>
            </div>
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
                                    <th>Skor</th>
                                    <th width="7%">Tahapan</th>
                                    <th width="4%">Bukti Dukung</th>
                                    <th width="16%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- server side datatable here -->
                            </tbody>
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
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <!-- Footer -->
    <x-footer/>

</div>
<!-- End of Content Wrapper -->
</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>
<script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<x-logout/>
@include ('components.modal-return-proposal')
<script type="text/javascript">
    var dataTable = $('#dataTable').DataTable({
        ajax: {
            url: '/api/database/inovasi',
            dataSrc: 'data',
            processing: true,
            serverSide: true,
        },
        columns: [
            { data: 'proposal.nama' },
            { data: 'skpd' },
            { data: 'ujicoba' },
            { data: 'implementasi' },
            { data: 'skor' },
            { 
                data: 'tahapan',
                render: function (data, type, row) {
                    // Apply badge styling based on the value of tahapan
                    var badgeClass = '';
                    if (data == 'ujicoba') {
                        badgeClass = 'bg-indigo';
                    } else if (data == 'penerapan') {
                        badgeClass = 'bg-green';
                    } else if (data == 'inisiatif') {
                        badgeClass = 'bg-orange';
                    }

                    return '<span class="badge ' + badgeClass + '">' + data + '</span>';
                }
            },
            { 
                data: 'proposal.id',
                render: function (data, type, row) {
                    // Create a link for "Bukti Dukung" based on the proposal id
                    return '<a href="{{url("bukti-dukung")}}/' + data + '" class="btn btn-outline-primary btn-sm"><i class="fas fa-folder-closed"></i></a>';
                }
            },
            { 
                data: 'proposal.id',
                render: function (data, type, row) {
                    // Create links for "Cetak", "Hapus", "Edit", and "Kirim" based on the proposal id and status
                    var buttonsHtml = '<a href="{{url("print/report")}}/' + data + '" target="_blank" class="btn btn-outline-secondary btn-sm mr-1" title="Cetak"><i class="fas fa-file-alt"></i></a>';
                        buttonsHtml += '<button id="send-proposal-' + row.id + '" data-proposal-id="'+ data +'" data-toggle="modal" data-target="#sendModal" data-proposal-name="' + row.proposal.nama + '" class="return-proposal btn btn-outline-warning btn-sm" title="kembalikan"><i class="fa-solid fa-ban"></i></button>';

                    return buttonsHtml;
                }
            },
            ],
        // other DataTable options...
    });
</script>
@endsection