@extends('layouts.header')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0">Kabupaten Tanah Bumbu</h1>
        <a href="#" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#updateProfile"><i class="fa-solid fa-user-secret"></i></i> Update Profile</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
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
                    <strong>Nama Pemda:</strong><br>
                    {{$profile->nama}}
                </li>
                <li class="list-group-item">
                    <strong>SKPD yang menangani:</strong><br>
                    {{$profile->skpd}}
                </li>
                <li class="list-group-item">
                    <strong>Alamat:</strong><br>
                    {{$profile->alamat}}
                </li>
                <li class="list-group-item">
                    <strong>Email:</strong><br>
                    {{$profile->email}}
                </li>
                <li class="list-group-item">
                    <strong>Nomor Telepon:</strong><br>
                    {{$profile->telp}}
                </li>
                <li class="list-group-item">
                    <strong>Nama Admin:</strong><br>
                    {{$profile->admin}}
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
                                <th width="57%">Informasi</th>
                                <!-- <th>Dokumen</th> -->
                                <th width="12%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profile->indikators()->get() as $indikator)
                            <tr id="@foreach ($indikator->files()->get() as $item)index_{{$item->id}}@endforeach">
                                <td>{{$indikator->nama}}</td>
                                <td>@foreach ($indikator->files()->get() as $item) {{$item->bukti->nama}} @endforeach</td>
                                {{--<td>@foreach ($indikator->files()->get() as $item) {{$item->bukti->bobot}} @endforeach</td>--}}
                                <td>
                                    <a class="btn btn-outline-secondary btn-sm @forelse ($indikator->files()->get() as $item) @empty d-none @endforelse" title="edit" href="javascript:void(0)" data-toggle="modal" data-target="#editModal{{$indikator->id}}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a class="btn btn-outline-success btn-sm @forelse ($indikator->files()->get() as $item) @empty d-none @endforelse" title="download" href="@foreach ($indikator->files()->get() as $item) {{url('/storage/docs/'. $item->file )}} @endforeach" target="_blank">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <button class="btn btn-outline-primary btn-sm @foreach ($indikator->files()->get() as $item) @if ($item) d-none @endif @endforeach" data-id="{{$indikator->id}}" id="btn-add" title="upload" href="#" data-toggle="modal" data-target="#uploadFile">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
@include ('components.logout')

<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>
@include('components.modal-add-spd')
@endsection