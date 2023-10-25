@extends('layouts.header')
@section('content')
<style type="text/css">

    nav > .nav.nav-tabs{

      border: none;
      color:#fff;
      background:#272e38;
      border-radius:0;

  }
  nav > div a.nav-item.nav-link,
  nav > div a.nav-item.nav-link.active
  {
      border: none;
      padding: 18px 25px;
      color:#fff;
      background:#272e38;
      border-radius:0;
  }

  nav > div a.nav-item.nav-link.active:after
  {
      content: "";
      position: relative;
      bottom: -60px;
      left: -5%;
      border: 15px solid transparent;
      border-top-color: #e74c3c ;
  }
  .tab-content{
      background: #fdfdfd;
      line-height: 25px;
      border: 1px solid #ddd;
      border-top:5px solid #e74c3c;
      border-bottom:5px solid #e74c3c;
      padding:30px 25px;
  }

  nav > div a.nav-item.nav-link:hover,
  nav > div a.nav-item.nav-link:focus
  {
      border: none;
      background: #e74c3c;
      color:#fff;
      border-radius:0;
      transition:background 0.20s linear;
  }
</style>
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
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profil</a>
                    <a class="nav-item nav-link" id="nav-indikator-tab" data-toggle="tab" href="#indikator" role="tab" aria-controls="indikator" aria-selected="false">Indikator</a>
                </div>
            </nav>
        </div>
        <div class="tab-content py-3 px-3 px-sm-0" id="myTabContent">
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="nav-profile-tab">
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
            <div class="tab-pane fade" id="indikator" role="tabpanel" aria-labelledby="nav-indikator-tab">
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
                                    <th width="12%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($profile->indikators()->get() as $indikator)
                                <tr id="@foreach ($indikator->files()->get() as $item)index_{{$item->id}}@endforeach">
                                    <td>{{$indikator->nama}}</td>
                                    <td>@foreach ($indikator->files()->get() as $item) {{$item->bukti->nama}} @endforeach</td>
                                    <td>
                                        @forelse ($indikator->files()->get() as $item)
                                        <a class="btn btn-outline-secondary btn-sm btn-edit" title="edit" href="javascript:void(0)" data-toggle="modal" data-target="#editSpd" 
                                        data-profile-id="{{$profile->id}}" 
                                        data-indikator-id="{{$indikator->id}}" 
                                        data-bukti-id="{{$item->bukti->id}}">
                                        <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-outline-success btn-sm" title="download" href="{{url('/storage/docs/'. $item->file )}}" target="_blank">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        @empty
                                        <button class="btn btn-outline-primary btn-sm btn-add" data-id="{{$indikator->id}}" title="upload" href="#" data-toggle="modal" data-target="#uploadFile">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        @endforelse
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

<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>
@include('components.modal-add-spd')
@include('components.modal-edit-spd')
@include ('components.logout')
@endsection