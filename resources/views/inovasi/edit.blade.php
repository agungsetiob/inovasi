@extends('layouts.header-create')
@section('content')
<div class="container-fluid overflow-auto panjang">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-dark">Edit Proposal</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('inovasi.update', $inovasi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="font-weight-bold" for="nama">Nama inovasi:</label>
                            <input id="nama" type="text" class="form-control @error('title') is-invalid @enderror" name="nama" value="{{ old('nama', $inovasi->nama) }}" placeholder="Masukkan nama inovasi">
                            
                            <!-- error message untuk title -->
                            @error('nama')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="row g-3">
                                <div class="col">
                                    <label class="font-weight-bold" for="tahapan">Tahapan inovasi:</label>
                                    <select name="tahapan" id="tahapan" class="form-control @error('tahapan') is-invalid @enderror" required>
                                        <option value="" disabled selected>Pilih tahapan</option>
                                        @foreach ($tahapans as $tahap)
                                        <option value="{{ $tahap->id }}" @selected($inovasi->tahapan_id == $tahap->id)>{{ $tahap->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('tahapan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label class="font-weight-bold" for="inisiator">Inisiator inovasi:</label>
                                    <select name="inisiator" id="inisiator" class="form-control @error('inisiator') is-invalid @enderror" required>
                                        <option value="">Pilih inisiator</option>
                                        @foreach ($inisiators as $inisiator)
                                        <option value="{{ $inisiator->id }}" @selected($inovasi->inisiator_id == $inisiator->id)>{{ $inisiator->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('inisiator')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label class="font-weight-bold" for="tematik">Tematik:</label>
                                    <select name="tematik" id="tematik" class="form-control @error('tematik') is-invalid @enderror" required>
                                        <option value="" disabled selected>Pilih tematik</option>
                                        @foreach ($tematiks as $tema)
                                        <option value="{{ $tema->id }}" @selected($inovasi->tematik_id == $tema->id)>{{ $tema->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('tematik')
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
                                        <option value="{{ $cat->id }}" @selected($inovasi->category_id == $cat->id)>{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label class="font-weight-bold" for="bentuk">Bentuk inovasi:</label>
                                    <select name="bentuk" id="bentuk" class="form-control @error('bentuk') is-invalid @enderror" required>
                                        <option value="" disabled selected>Pilih bentuk inovasi</option>
                                        @foreach ($bentuks as $ben)
                                        <option value="{{ $ben->id }}" @selected($inovasi->bentuk_id == $ben->id)>{{ $ben->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('bentuk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="urusan">Urusan inovasi daerah:</label>
                            <select name="urusans[]" id="urusan" class="form-control @error('urusan') is-invalid @enderror"required multiple>
                                <option value="">Pilih urusan inovasi</option>
                                @foreach ($options as $klasifikasiId => $klasifikasiData)
                                <optgroup class="font-weight-bold" label="{{ $klasifikasiData['label'] }}">
                                    @foreach ($klasifikasiData['children'] as $urusanId => $urusanName)
                                    @php
                                        $selectedUrusansArray = $selectedUrusans->pluck('id')->toArray();
                                    @endphp
                                    <option value="{{ $urusanId }}" {{ in_array($urusanId, old('urusans', $selectedUrusansArray)) ? 'selected' : '' }}>
                                        {{ $urusanName }}
                                    </option>
                                    @endforeach
                                </optgroup>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" for="rancang">Rancang bangun:</label>
                            <textarea rows="7" id="rancang" class="editor form-control @error('rancang_bangun') is-invalid @enderror" name="rancang_bangun" rows="5" placeholder="Masukkan rancang bangun dan pokok perubahan yang dilakukan">{{ old('rancang_bangun', $inovasi->rancang_bangun) }}</textarea>
                            
                            <!-- error message untuk content -->
                            @error('rancang_bangun')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" for="tujuan">Tujuan inovasi:</label>
                            <input id="tujuan" type="text" class="editor form-control @error('tujuan') is-invalid @enderror" name="tujuan" value="{{ old('tujuan', $inovasi->tujuan) }}" placeholder="Masukkan tujuan pembuatan inovasi Daerah">
                            
                            <!-- error message untuk title -->
                            @error('tujuan')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" for="manfaat">Manfaat yang diperoleh:</label>
                            <textarea id="manfaat" rows="7" class="editor form-control @error('manfaat') is-invalid @enderror" name="manfaat" placeholder="Masukkan manfaat dari inovasi yang dilakukan">{{ old('manfaat', $inovasi->manfaat) }}</textarea>
                            
                            <!-- error message untuk title -->
                            @error('manfaat')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" for="hasil">Hasil inovasi:</label>
                            <textarea id="hasil" rows="7" class="editor form-control @error('hasil') is-invalid @enderror" name="hasil" placeholder="Masukkan hasil dari inovasi yang dilakukan">{{ old('hasil', $inovasi->hasil) }}</textarea>
                            
                            <!-- error message untuk content -->
                            @error('hasil')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="row g-3">
                                <div class="col">
                                    <label class="font-weight-bold" for="ujicoba">Waktu ujicoba:</label>
                                    <input id="ujicoba" type="date" class="form-control @error('ujicoba') is-invalid @enderror" name="ujicoba" value="{{ old('ujicoba', $inovasi->ujicoba) }}" placeholder="Masukkan waktu uji coba inovasi">
                                    <!-- error message untuk title -->
                                    @error('ujicoba')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label class="font-weight-bold" for="implementasi">Waktu implementasi:</label>
                                    <input id="implementasi" type="date" class="form-control @error('implementasi') is-invalid @enderror" name="implementasi" value="{{ old('implementasi', $inovasi->implementasi) }}" placeholder="Masukkan waktu implementasi inovasi">
                                    <!-- error message untuk title -->
                                    @error('implementasi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label class="font-weight-bold" for="uploadBtn">Profil:</label>
                                    <div class="input-group "> 
                                        <label class="input-group-btn">
                                            <span class="btny btn-outline-primary">
                                                Browse<input accept="application/pdf" id="uploadBtn" type="file" style="display: none;" name="profil">
                                            </span>
                                        </label>
                                        <input id="uploadFile" type="text" class="form-control @error('profil') is-invalid @enderror" readonly placeholder="Choose a file">
                                    </div>
                                    @error('profil')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <script type="text/javascript">
                                        document.getElementById("uploadBtn").onchange = function (){
                                            document.getElementById("uploadFile").value = this.value;
                                        }
                                    </script>
                                </div>
                                <div class="col">
                                    <label class="font-weight-bold" for="uploadAnggaran">Anggaran:</label>
                                    <div class="input-group "> 
                                        <label class="input-group-btn">
                                            <span class="btny btn-outline-primary">
                                                Browse<input accept="application/pdf" id="uploadAnggaran" type="file" style="display: none;" name="anggaran">
                                            </span>
                                        </label>
                                        <input id="fileAnggaran" type="text" class="form-control @error('anggaran') is-invalid @enderror" readonly placeholder="Choose a file">
                                    </div>
                                    @error('profil')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <script type="text/javascript">
                                        document.getElementById("uploadAnggaran").onchange = function (){
                                            document.getElementById("fileAnggaran").value = this.value;
                                        }
                                    </script>

                                    <!-- error message untuk title -->
                                    @error('anggaran')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row g-3">
                                <div class="col d-none">
                                    <label class="font-weight-bold" for="skpd">Dibuat oleh:</label>
                                    <select name="skpd" id="skpd" class="form-control @error('skpd') is-invalid @enderror" required>
                                        <option value="{{Auth::user()->skpd->id}}" selected>{{Auth::user()->skpd->nama}}</option>
                                    </select>
                                    
                                    <!-- error message untuk title -->
                                    @error('skpd')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
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
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
@include ('components.logout')

<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js" integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });
  ClassicEditor
  .create( document.querySelector( '#rancang' ) )
  ClassicEditor
  .create( document.querySelector( '#manfaat' ) )
  ClassicEditor
  .create( document.querySelector( '#hasil' ) )
  .then( editor => {
    console.log( editor );
    } )
      .catch( error => {
        console.error( error );
    } );
</script>
@endsection