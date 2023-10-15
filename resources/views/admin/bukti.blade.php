<!-- UI for Bukti inovasi -->
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
                            <th width="38%">Name</th>
                            <th>Bobot</th>
                            <th width="35%">Indikator</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($buktis as $bukti)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td> {{$bukti->nama}} </td>
                            <td> {{$bukti->bobot}} </td>
                            <td> {{$bukti->indikator->nama}} </td>
                            <td>
                                <button class="btn btn-outline-danger btn-sm" title="hapus" data-toggle="modal" data-target="#deleteModal{{$bukti->id}}"><i class="fas fa-trash"></i> Hapus</button>
                                <div class="dropdown mb-4 d-inline">
                                    <button class="btn btn-outline-primary dropdown-toggle btn-sm" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    {{$bukti->status}}
                                </button>
                                @if ($bukti->status == 'inactive')
                                <form method="POST" action="{{url('enable/bukti/'. $bukti->id)}}">
                                    @csrf
                                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                        <button class="dropdown-item">activate</button>
                                    </div>
                                </form>
                                @elseif ($bukti->status == 'active')
                                <form method="POST" action="{{url('disable/bukti/'. $bukti->id)}}">
                                    @csrf
                                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                        <button class="dropdown-item">deactivate</button>
                                    </div>
                                </form>
                                @endif
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
@foreach ($buktis as $bukti)
<div class="modal fade" id="deleteModal{{$bukti->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form method="POST" action="{{ route('bukti.destroy', $bukti->id) }}">
                    @csrf
                    @method ('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

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
                        <label for="name">Nama bukti inovasi</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="name" required placeholder="Masukkan nama bukti inovasi" value="{{old('nama')}}">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama"></div>  
                    </div>
                    <div class="form-group">
                        <label for="skor">Bobot</label>
                        <input type="number" name="bobot" class="form-control @error('bobot') is-invalid @enderror" id="skor" value="{{old('bobot')}}" required>   
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

<script type="text/javascript">
  $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });
</script>
@endsection