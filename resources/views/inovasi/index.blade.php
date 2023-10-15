@extends('layouts.header')
@section('content')
<div class="container-fluid">
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
                        @forelse ($proposals as $proposal)
                        <tr>
                            <td> {{ $proposal->nama }} </td>
                            <td> {{ $proposal->skpd->nama }}</td>
                            <td> {{ date('d/m/Y', strtotime($proposal->ujicoba)) }} </td>
                            <td> {{ date('d/m/Y', strtotime($proposal->implementasi)) }} </td>
                            <td>{{ $proposal->files->sum(function ($file) {return $file->bukti->bobot;}) }}</td>
                            <td>
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
                            <td> 
                                <a href="{{url('bukti-dukung', $proposal->id)}}" class="btn btn-outline-primary btn-sm"><i class="fas fa-folder-closed"></i></a>
                            </td>
                            <td>
                                <a href="{{url('print/report', $proposal->id)}}" target="_blank" class="btn btn-outline-secondary btn-sm" title="cetak"><i class="fas fa-file-alt"></i></a>
                                @if ($proposal->status === 'draft' && $proposal->user_id === auth()->user()->id)
                                <button class="btn btn-outline-danger btn-sm" title="hapus" data-toggle="modal" data-target="#deleteModal{{$proposal->id}}"><i class="fas fa-trash"></i></button>
                                <a href="{{route('inovasi.edit', $proposal->id)}}" class="btn btn-outline-success btn-sm" title="edit"><i class="fas fa-pencil-alt" alt="edit"></i></a>
                                <button id="send-proposal-{{$proposal->id}}" 
                                    data-toggle="modal" 
                                    data-target="#sendModal"
                                    data-proposal-name="{{$proposal->nama}}"
                                    class="btn btn-outline-dark btn-sm" title="kirim"><i class="fas fa-paper-plane"></i></button>
                                {{-- <button id="send-proposal" data-proposal-id="{{ $proposal->id }}" class="btn btn-outline-dark btn-sm" title="kirim"><i class="fa-solid fa-paper-plane"></i></button> --}}
                                @endif
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
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
@include ('components.logout')
@include ('components.modal-send-proposal')
@foreach ($proposals as $proposal)
<div class="modal fade" id="deleteModal{{$proposal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form method="POST" action="{{ route('inovasi.destroy', $proposal->id) }}">
                    @csrf
                    @method ('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endforeach

<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>
<script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
<script>
    $(document).ready(function() {
        var proposalId;

        $("button[id^='send-proposal-']").click(function() {
            var buttonId = $(this).attr("id");
            proposalId = buttonId.replace("send-proposal-", "");
            var proposalName = $(this).data("proposal-name");
            $("#proposal-name-modal").text(proposalName);
        });

        // Ketika tombol "Kirim" di modal diklik
        $("#send-proposal").click(function() {
            $.ajax({
                url: "/send/inovasi/" + proposalId,
                type: 'PUT',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success) {
                        $('#success-alert').removeClass('d-none').addClass('show');
                        $('#success-message').text('Berhasil mengirim proposal');
                        $('#error-alert').addClass('d-none');
                        $("#" + "send-proposal-" + proposalId).remove();
                        $('#sendModal').modal('hide');
                    }
                },
                error: function(response) {
                    $('#error-message').text('Gagal mengirim proposal');
                    $('#error-alert').removeClass('d-none').addClass('show');
                }
            });
        });
    });
</script>

<!-- <script>
    $(document).ready(function() {
        $("button[id^='send-proposal-']").click(function() {
            var buttonId = $(this).attr("id");
            var proposalId = buttonId.replace("send-proposal-", "");

            $.ajax({
                url: "/send/inovasi/" + proposalId,
                type: 'PUT',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success) {
                        $('#success-alert').removeClass('d-none').addClass('show');
                        $('#success-message').text('Berhasil mengirim proposal');
                        $('#error-alert').addClass('d-none');
                        $("#" + buttonId).remove();
                    }
                },
                error: function(response) {
                    $('#error-message').text('Gagal mengirim proposal');
                    $('#error-alert').removeClass('d-none').addClass('show');
                }
            });
        });
    });
</script> -->
<!-- delete modal script -->
{{--<script>
    function deletePost(id){
        var link = document.getElementById('deleteLink')
        link.href = "{{ url('posts')}}/" + id
        $('#deleteModal').modal('show')
    }
</script>--}}
@endsection