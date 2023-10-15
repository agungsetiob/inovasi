<!-- Edit Modal -->
@foreach ($files as $file)
<div class="modal fade" id="editModal{{$file->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input type="text" id="indikator" class="form-control" name="indikator_id" value="{{old('indikator_id', $file->nama)}}"readonly>
                        <label for="informasi">Informasi</label>
                        <input type="text" id="informasi" class="form-control" name="informasi" value="@foreach ($file->files()->where('proposal_id', $proposalId)->get() as $item){{old('informasi', $item->informasi)}} @endforeach" placeholder="Masukkan informasi bukti dukung" required>
                        <label for="bukti">Bukti dukung</label>
                        <select name="bukti" id="bukti" class="select form-control @error('bukti') is-invalid @enderror" required>
                            <option value="" disabled selected>Pilih bukti</option>
                            @foreach ($buktis as $bukti)
                            <option value="{{ $bukti->id }}" {{ old('bukti') == $bukti->id ? 'selected' : ''}}>{{ $bukti->nama }} - bobot {{ $bukti->bobot}}</option>
                            @endforeach
                        </select>
                        <label for="editFile">Choose file</label>
                        <div class="form-group">
                            <div class="input-group">
                                <label class="input-group-btn">
                                    <span class="btny btn-outline-primary">
                                        Browse<input accept="application/pdf" id="editFile" type="file" style="display: none;" name="informasi">
                                    </span>
                                </label>
                                <input id="newFile" type="text" class="form-control @error('file') is-invalid @enderror" readonly placeholder="Choose a .pdf file">
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
@endforeach