@extends('layouts.header')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid overflow-auto panjang">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-dark">{{ $proposal->nama }}</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar File Bukti Dukung</h6>
            <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#uploadFile"><i class="fas fa-upload fa-sm text-white fa-bounce"></i> Upload File</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!-- <table class="table table-borderless table-striped" id="dataTable" width="100%" cellspacing="0"> -->
                    <table class="table table-borderless table-striped" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Indikator</th>
                            <th width="55%">Bukti</th>
                            <th>Bobot</th>
                            <th width="12%"></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Total</th>
                            <th></th>
                            <th>{{$totalBobot}}</th>
                        </tr>
                        <tr>
                            <td>* wajib diisi</td>
                        </tr>
                    </tfoot>
                    <tbody id="tabel-file">
                        @forelse ($files as $file)
                        <tr id="@foreach ($file->files()->where('proposal_id', $proposalId)->get() as $item)index_{{$item->id}}@endforeach">
                            <td>{{$file->nama}}</td>
                            <td>@foreach ($file->files()->where('proposal_id', $proposalId)->get() as $item) {{$item->bukti->nama}} @endforeach</td>
                            <td>@foreach ($file->files()->where('proposal_id', $proposalId)->get() as $item) {{$item->bukti->bobot}} @endforeach</td>
                            <td>
                                <a class="btn btn-outline-secondary btn-sm @forelse ($file->files()->where('proposal_id', $proposalId)->get() as $item) @empty d-none @endforelse" title="edit" href="javascript:void(0)" data-toggle="modal" data-target="#editModal{{$file->id}}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a class="btn btn-outline-success btn-sm @forelse ($file->files()->where('proposal_id', $proposalId)->get() as $item) @empty d-none @endforelse" title="download" href="@foreach ($file->files()->where('proposal_id', $proposalId)->get() as $item) {{url('/storage/docs/'. $item->file )}} @endforeach" target="_blank">
                                    <i class="fas fa-download"></i>
                                </a>
                                <button class="btn btn-outline-primary btn-sm @foreach ($file->files()->where('proposal_id', $proposalId)->get() as $item) @if ($item) d-none @endif @endforeach" data-id="{{$file->id}}" id="btn-add" title="upload" href="#" data-toggle="modal" data-target="#uploadFile">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">
                            Data dukung belum tersedia.
                        </div>
                        @endforelse
                        <div class="alert alert-success d-none">
                            
                        </div>
                        <div class="alert alert-danger d-none">
                            
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

<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
@include('components.modal-add-indikator')

<!-- delete Modal-->
{{--@foreach ($files as $file)
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Delete" below if you are sure to delete this data.</div>
            <div class="modal-footer">
                <button class="btn btn-success" type="button" data-dismiss="modal">Cancel</button>
                <form action="{{url('delete/docs', $file->id)}}" method="POST">
                    @csrf
                    @method ('delete')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach--}}

@include('components.modal-edit-indikator')
@include('components.logout')

<!-- Bootstrap core JavaScript-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<!-- Page level plugins -->
<script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

<!-- Page level custom scripts -->
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
<script type="text/javascript">

    document.getElementById('bFile').onchange = function () {
        document.getElementById('uFile').value = this.value;};
    document.getElementById('editFile').onchange = function () {
        document.getElementById('newFile').value = this.value;};

        $(document).ready(function () {
          $('.select').selectize({
              sortField: 'text'
          });
      });
</script>
  @endsection