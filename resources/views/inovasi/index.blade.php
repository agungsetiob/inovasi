@extends('layouts.header')
@section('content')
<div class="container-fluid" id="createForm">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-dark">Inovasi</h1>
        <a href="{{ route('inovasi.create') }}" class="btn btn-sm btn-primary shadow-sm {{ (request()->is('data/inovasi')) ? 'd-none' : '' }}"><i class="fas fa-plus fa-sm text-white fa-flip"></i> Add Proposal</a>
    </div>
    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Proposals</h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
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
                            <th width="13%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($proposals as $proposal)
                        <tr id="index_{{ $proposal->id }}">
                            <td> {{ $proposal->nama }} </td>
                            <td> {{ $proposal->skpd->nama }}</td>
                            <td> {{ date('d/m/Y', strtotime($proposal->ujicoba)) }} </td>
                            <td> {{ date('d/m/Y', strtotime($proposal->implementasi)) }} </td>
                            <td class="text-center">{{ $proposal->files->sum(function ($file) {return $file->bukti->bobot;}) }}</td>
                            <td class="text-center">
                                @switch($proposal->tahapan->nama)
                                @case('ujicoba')
                                <span class="badge bg-indigo">{{ $proposal->tahapan->nama }}</span>
                                @break
                                @case('penerapan')
                                <span class="badge bg-green">{{ $proposal->tahapan->nama }}</span>
                                @break
                                @case('inisiatif')
                                <span class="badge bg-orange">{{ $proposal->tahapan->nama }}</span>
                                @break
                                @endswitch
                            </td>
                            <td class="text-center"> 
                                <a href="{{url('bukti-dukung', $proposal->id)}}" class="btn btn-outline-primary btn-sm"><i class="fas fa-folder-closed"></i></a>
                            </td>
                            <td>
                                <a href="{{url('print/report', $proposal->id)}}" target="_blank" class="btn btn-outline-secondary btn-sm m-1" title="cetak"><i class="fas fa-file-alt"></i></a>
                                @if ($proposal->status === 'draft')
                                <button id="hapus-{{$proposal->id}}" class="delete-button btn btn-outline-danger btn-sm m-1" title="hapus" 
                                data-toggle="modal" 
                                data-target="#deleteModal" 
                                data-proposal-id="{{ $proposal->id }}"
                                data-proposal-name="{{$proposal->nama}}"><i class="fas fa-trash"></i></button>
                                <a id="edit-{{$proposal->id}}" href="{{route('inovasi.edit', $proposal->id)}}" class="btn btn-outline-success btn-sm m-1" title="edit"><i class="fas fa-pencil-alt" alt="edit"></i></a>
                                <button id="send-proposal-{{$proposal->id}}" 
                                    data-toggle="modal" 
                                    data-target="#sendModal"
                                    data-proposal-name="{{$proposal->nama}}"
                                    class="btn m-1 btn-outline-dark btn-sm" title="kirim"><i class="fas fa-paper-plane"></i></button>
                                @endif
                            </td>
                        </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Data is not available.
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
    <!-- Footer -->
    <x-footer/>
    <!-- End of Footer -->

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
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
<x-logout/>
@include ('components.modal-send-proposal')
@include ('components.modal-delete-proposal')
@endsection
