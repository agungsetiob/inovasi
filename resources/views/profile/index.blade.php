@extends('layouts.header')
@section('content')
<!-- Begin Page Content -->
@foreach ($profiles as $p)
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0">Kabupaten Tanah Bumbu</h1>
        <a href="{{url('setting/profile/'. $p->id)}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-pencil-alt fa-sm text-white fa-flip"></i> Update profil</a>
    </div>

</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    @if(Session::has('success'))
    <div class="alert alert-success">
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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$p->heading}}</h6>
        </div>
        <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Indikator</a>
        </li>
    </ul>
    </div>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <strong>Nama:</strong><br>
                John Doe
            </li>
            <li class="list-group-item">
                <strong>Alamat:</strong><br>
                Jl. Contoh No. 123
            </li>
            <li class="list-group-item">
                <strong>Email:</strong><br>
                john.doe@example.com
            </li>
            <li class="list-group-item">
                <strong>Nomor Telepon:</strong><br>
                (123) 456-7890
            </li>
        </ul>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="card-body">
            <div class="table-responsive">
                <div id="success-alert" class="alert alert-success d-none">
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
                <table class="table table-borderless table-striped" width="100%" cellspacing="0" id="files-table">
                    <thead>
                        <tr>
                            <th>Indikator</th>
                            <th width="55%">Informasi</th>
                            <th>Dokumen</th>
                            <th width="12%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{--@foreach ($proposal->indikators()->get() as $indikator)--}}
                        <tr id="{{--@foreach ($proposal->files()->get() as $item)index_{{$item->id}}@endforeach--}}">
                            <td>{{--$indikator->nama--}}</td>
                            <td>{{--@foreach ($indikator->files()->get() as $item) {{$item->bukti->nama}} @endforeach--}}</td>
                            <td>{{--@foreach ($indikator->files()->get() as $item) {{$item->bukti->bobot}} @endforeach--}}</td>
                            <td>
                                {{--<a class="btn btn-outline-secondary btn-sm @forelse ($indikator->files()->where('proposal_id', $proposalId)->get() as $item) @empty d-none @endforelse" title="edit" href="javascript:void(0)" data-toggle="modal" data-target="#editModal{{$indikator->id}}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a class="btn btn-outline-success btn-sm @forelse ($indikator->files()->where('proposal_id', $proposalId)->get() as $item) @empty d-none @endforelse" title="download" href="@foreach ($indikator->files()->where('proposal_id', $proposalId)->get() as $item) {{url('/storage/docs/'. $item->file )}} @endforeach" target="_blank">
                                    <i class="fas fa-download"></i>
                                </a>
                                <button class="btn btn-outline-primary btn-sm @foreach ($indikator->files()->where('proposal_id', $proposalId)->get() as $item) @if ($item) d-none @endif @endforeach" data-id="{{$indikator->id}}" id="btn-add" title="upload" href="#" data-toggle="modal" data-target="#uploadFile">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>--}}
                            </td>
                        </tr>
                        {{--@endforeach--}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endforeach

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

<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection