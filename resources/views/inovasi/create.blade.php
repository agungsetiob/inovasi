@extends('layouts.header-create')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-dark">Create Proposal</h1>
    </div>
</div>
</div>
<!-- End of Main Content -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="input-group ">
                                <label class="input-group-btn" for="uploadBtn">
                                    <span class="btny btn-outline-primary">
                                        Browse<input accept="image/*" id="uploadBtn" type="file" style="display: none;" multiple name="logo">
                                    </span>
                                </label>
                                <input id="uploadFile" type="text" class="form-control @error('logo') is-invalid @enderror" readonly placeholder="Choose an image logo">
                            </div>
                            @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror  
                        </div>
                        <script type="text/javascript">
                            document.getElementById("uploadBtn").onchange = function (){
                                document.getElementById("uploadFile").value = this.value;
                            }
                        </script>

                        <div class="form-group">
                            <label class="font-weight-bold" for="nama">Nama inovasi:</label>
                            <input id="nama" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan nama inovasi">
                            
                            <!-- error message untuk title -->
                            @error('title')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" for="skpd">Dibuat oleh:</label>
                            <input id="skpd" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan nama skpd pembuat inovasi">
                            
                            <!-- error message untuk title -->
                            @error('title')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="row g-3">
                                <div class="col">
                                    <label class="font-weight-bold" for="tahapan">Tahapan inovasi:</label>
                                    <select name="category" id="tahapan" class="form-control @error('category') is-invalid @enderror" required>
                                        <option value="" disabled selected>Pilih jenis inovasi</option>
                                        @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ old('category') == $cat->id ? 'selected' : ''}}>{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="font-weight-bold">Inisiator inovasi:</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan nama pembuat inovasi">

                                    <!-- error message untuk title -->
                                    @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row g-3">
                                <div class="col">
                                    <label class="font-weight-bold" for="category">Jenis inovasi:</label>
                                    <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" required>
                                        <option value="" disabled selected>Pilih jenis inovasi</option>
                                        @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ old('category') == $cat->id ? 'selected' : ''}}>{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="font-weight-bold">Bentuk inovasi:</label>
                                    <select name="category" id="" class="form-control @error('category') is-invalid @enderror" required>
                                        <option value="" disabled selected>Pilih bentuk inovasi</option>
                                        @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ old('category') == $cat->id ? 'selected' : ''}}>{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Urusan inovasi daerah:</label>
                            <select name="category" id="" class="form-control @error('category') is-invalid @enderror" required>
                                <option value="" disabled selected>Pilih urusan inovasi</option>
                                @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category') == $cat->id ? 'selected' : ''}}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Rancang bangun:</label>
                            <textarea rows="7" id="" class="editor form-control @error('content') is-invalid @enderror" name="content" rows="5" placeholder="Masukkan rancang bangun dan pokok perubahan yang dilakukan">{{ old('content') }}</textarea>
                            
                            <!-- error message untuk content -->
                            @error('content')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Tujuan inovasi:</label>
                            <input type="text" class="editor form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan tujuan pembuatan inovasi Daerah">
                            
                            <!-- error message untuk title -->
                            @error('title')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Manfaat yang diperoleh:</label>
                            <textarea rows="7" class="editor form-control @error('content') is-invalid @enderror" name="content" placeholder="Masukkan manfaat dari inovasi yang dilakukan">{{ old('content') }}</textarea>
                            
                            <!-- error message untuk title -->
                            @error('title')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Hasil inovasi:</label>
                            <textarea rows="7" class="editor form-control @error('content') is-invalid @enderror" name="content" placeholder="Masukkan hasil dari inovasi yang dilakukan">{{ old('content') }}</textarea>
                            
                            <!-- error message untuk content -->
                            @error('content')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="row g-3">
                                <div class="col">
                                    <label class="font-weight-bold">Waktu ujicoba:</label>
                                    <input type="date" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan waktu uji coba inovasi">

                                    <!-- error message untuk title -->
                                    @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label class="font-weight-bold">Waktu implementasi:</label>
                                    <input type="date" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan waktu implementasi inovasi">

                                    <!-- error message untuk title -->
                                    @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label class="font-weight-bold">Anggaran:</label>
                                    <input type="number" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan anggaran inovasi">

                                    <!-- error message untuk title -->
                                    @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">

                        </div>

                        <button type="submit" class="btn btn-md btn-primary">Publish</button>
                        <button type="reset" class="btn btn-md btn-warning" disabled>Draft</button>

                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
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
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>
@endsection