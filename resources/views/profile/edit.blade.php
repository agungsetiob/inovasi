@extends('layouts.header')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-dark">Edit Profile</h1>
    </div>
</div>
</div>
<!-- End of Main Content -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ url('profile/update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method ('PUT')
                        <div class="form-group">
                            <img style="width: 200px" src="{{ asset('storage/posts/'.$profile->image) }}" class="rounded img-fluid mx-auto d-block">
                        </div>

                        <div class="form-group">
                            <div class="input-group ">
                                <label class="input-group-btn">
                                    <span class="btny btn-outline-primary">
                                        Browse<input accept="image/*" id="uploadBtn" type="file" style="display: none;" multiple name="image">
                                    </span>
                                </label>
                                <input id="uploadFile" type="text" class="form-control @error('image') is-invalid @enderror" readonly placeholder="Choose an image">
                            </div>
                            @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror  
                        </div>
                        <script type="text/javascript">
                            document.getElementById("uploadBtn").onchange = function () {
                                document.getElementById("uploadFile").value = this.value;};
                            </script>

                            <div class="form-group">
                                <label class="font-weight-bold">Heading</label>
                                <input type="text" class="form-control @error('heading') is-invalid @enderror" name="heading" value="{{ old('heading', $profile->heading) }}" placeholder="Masukkan heading profile">

                                <!-- error message untuk title -->
                                @error('heading')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">About us</label>
                                <textarea rows="10" id="editor" class="editor form-control @error('about') is-invalid @enderror" name="about" placeholder="Masukkan visi, misi, dan profil">{{ old('about', $profile->about) }}</textarea>

                                <!-- error message untuk content -->
                                @error('profile')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Save</button>
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

<script src="https://cdn.tiny.cloud/1/9s1s817h0tyv1a4jhlghnqoofc647ifzh5zh6z1in2bqpjb9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
   tinymce.init({
     forced_root_block : false,
     selector: '.editor',
     plugins: 'code table lists autosave fullscreen media link',
     toolbar: 'undo redo | formatselect| bold italic underline| alignleft aligncenter alignright alignjustify | fontsize fontfamily | indent outdent | bullist numlist | code link | table | media image | fullscreen | text color',
     paste_as_text: true,
     image_title: true,
     automatic_uploads: true,
     file_picker_types: 'image',
     file_picker_callback: function (cb, value, meta) {
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');
      input.onchange = function () {
        var file = this.files[0];

        var reader = new FileReader();
        reader.onload = function () {
          var id = 'blobid' + (new Date()).getTime();
          var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
          var base64 = reader.result.split(',')[1];
          var blobInfo = blobCache.create(id, file, base64);
          blobCache.add(blobInfo);

          cb(blobInfo.blobUri(), { title: file.name });
        };
        reader.readAsDataURL(file);
      };

      input.click();
    },
  });
</script>

@endsection