<!-- Add Modal -->
<div class="modal fade" id="uploadFile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('upload/file') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="proposal_id" value="{{$proposal->id}}">
                        <label for="indikator">Indikator</label>
                        <select name="indikator_id" id="indikator" class="select form-control @error('indikator') is-invalid @enderror" required>
                            <option value="" disabled selected>Pilih indikator</option>
                            @foreach ($indikators as $indikator)
                            <option value="{{ $indikator->id }}" {{ old('indikator') == $indikator->id ? 'selected' : ''}}>{{ $indikator->nama }}</option>
                            @endforeach
                        </select>
                        <label for="informasi">Informasi</label>
                        <input type="text" id="informasi" class="form-control" name="informasi" value="{{old('informasi')}}" placeholder="Masukkan informasi bukti dukung" required>
                        <label for="bukti">Bukti dukung</label>
                        <select name="bukti_id" id="bukti" class="select form-control @error('bukti') is-invalid @enderror" required>
                            <option value="" disabled selected>Pilih bukti</option>
                            @foreach ($buktis as $bukti)
                            <option value="{{ $bukti->id }}" {{ old('bukti') == $bukti->id ? 'selected' : ''}}>{{ $bukti->nama }} - bobot {{ $bukti->bobot}}</option>
                            @endforeach
                        </select>
                        <label for="bFile">Choose file</label>
                        <div class="form-group">
                            <div class="input-group">
                                <label class="input-group-btn">
                                    <span class="btny btn-outline-primary">
                                        Browse<input accept="application/pdf" id="bFile" type="file" style="display: none;" name="informasi">
                                    </span>
                                </label>
                                <input id="uFile" type="text" class="form-control @error('file') is-invalid @enderror" readonly placeholder="Choose a .pdf file">
                            </div>  
                        </div>
                    </div>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div> 
        </div>
    </div>
</div>