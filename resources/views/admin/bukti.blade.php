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
                            <th>No</th>
                            <th width="38%">Nama</th>
                            <th>Bobot</th>
                            <th width="35%">Indikator</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($buktis as $bukti)
                        <tr id="index_{{$bukti->id}}">
                            <td>{{ $loop->iteration }}</td>
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

<!-- Add Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Bukti inovasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bukti.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Bukti inovasi (parameter)</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="name" required placeholder="Masukkan nama bukti inovasi" value="{{old('nama')}}">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama"></div>  
                    </div>
                    <div class="form-group">
                        <label for="skor">Bobot</label>
                        <input type="number" step="any" name="bobot" class="form-control @error('bobot') is-invalid @enderror" id="skor" value="{{old('bobot')}}" required>   
                    </div>
                    <div class="form-group">
                        <label for="indikator">Indikator</label>
                        <select name="indikator" id="indikator" class="form-control @error('indikator') is-invalid @enderror" required>
                            <option value="">Pilih satuan indikator</option>
                            @foreach($indikators as $indikator)
                            <optgroup label="{{ $indikator->jenis }}">
                                <option value="{{ $indikator->id }}">{{ $indikator->nama }}</option>
                            </optgroup>
                            @endforeach
                        </select>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-klasifikasi"></div>
                    </div>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div> 
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>
<script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js" integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@include ('components.logout')
@include ('components.modal-delete-bukti')
<script type="text/javascript">
    $(document).ready(function() {
        $(".toggle-status-button").click(function() {
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
                        $('#success-alert').removeClass('d-none').addClass('show');
                        $('#success-message').text(response.message);
                        $('#error-alert').addClass('d-none');
                        setTimeout(function() {
                            $('#success-alert').addClass('d-none').removeClass('show');
                        }, 3700);
                    }
                },
                error: function(response) {
                    $('#error-message').text('Sebuah error terjadi');
                    $('#error-alert').removeClass('d-none').addClass('show');
                }
            });
        });
    });

    $(document).ready(function () {
        $('select').selectize({
            sortField: 'text'
        });
    });
</script>
@endsection