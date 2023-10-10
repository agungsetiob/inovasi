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
                <form id="upload-bukti" action="{{url('upload/file')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="indikator_id" id="indikator_id">
                        <input type="hidden" class="form-control" id="proposal_id" name="proposal_id" value="{{$proposal->id}}">
                        <label for="indikator">Indikator</label>
                        <input type="text" id="indikator" class="form-control" readonly>
                        <label for="informasi">Deskripsi bukti</label>
                        <input type="text" name="informasi" id="informasi" class="form-control" required>
                        <label for="bukti">Informasi</label>
                        <select name="bukti_id" id="bukti" class="select form-control @error('bukti') is-invalid @enderror" required>
                            <option value="" disabled selected>Pilih bukti</option>
                            @foreach ($buktis as $bukti)
                            <option value="{{ $bukti->id }}" {{ old('bukti') == $bukti->id ? 'selected' : ''}}>{{ $bukti->nama }} - bobot {{ $bukti->bobot}}</option>
                            @endforeach
                        </select>
                        <label for="bFile">File bukti</label>
                        <div class="form-group">
                            <div class="input-group">
                                <label class="input-group-btn">
                                    <span class="btny btn-outline-primary">
                                        Browse<input accept="application/pdf" id="bFile" type="file" style="display: none;" name="file">
                                    </span>
                                </label>
                                <input id="uFile" type="text" class="form-control @error('file') is-invalid @enderror" readonly placeholder="Choose a .pdf file">
                            </div>  
                        </div>
                    </div>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button id="upload" type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div> 
        </div>
    </div>
</div>


<script>
    //button create post event
    $('body').on('click', '#btn-add', function () {

        let indikator_id = $(this).data('id');

        //fetch detail post with ajax
        $.ajax({
            url: `/bukti-dukung/add/${indikator_id}`,
            type: "GET",
            cache: false,
            success:function(response){
                    //fill data to form
                    $('#indikator_id').val(response.data.id);
                    $('#indikator').val(response.data.nama);
                    //$('#informasi').val(response.data2.informasi);

                    //open modal
                    $('#uploadFile').modal('show');

            }
        });
    });

    // $(document).ready(function () {
    //     $('#upload-bukti').submit(function (e) {
    //         e.preventDefault(); // Prevent the default form submission

    //         // Get form data
    //         var formData = new FormData(this);

    //         $.ajax({
    //             url: $(this).attr('action'), // Use the form's action attribute as the URL
    //             type: 'POST',
    //             data: formData,
    //             processData: false, // Prevent jQuery from processing the data
    //             contentType: false, // Set content type to false as we're using FormData
    //             success: function (response) {
    //                 // Handle success response here
    //                 console.log(response);
    //             },
    //             error: function (error) {
    //                 // Handle error response here
    //                 console.error(error);
    //             }
    //         });
    //     });
    // });

    //action update post
    // $('#upload-bukti').submit(function(e) {
    //     e.preventDefault();

    //     //define variable
    //     // let indikator_id = $('#indikator_id').val();
    //     // let informasi   = $('#informasi').val();
    //     // let proposal_id = $('#proposal_id').val();
    //     // let bukti_id    = $('#bukti').val();
    //     // let file        = $('#bFile').val();
    //     // let token   = $("meta[name='csrf-token']").attr("content");
    //     var formData = new FormData(this);
        
    //     //ajax
    //     $.ajax({

    //         url: `/upload/file`,
    //         type: "POST",
    //         cache: false,
    //         contentType: false,
    //         data: formData,
    //         processData: false,
    //         // data: {
    //         //     "indikator_id": indikator_id,
    //         //     "informasi": informasi,
    //         //     "proposal_id": proposal_id,
    //         //     "bukti_id": bukti_id,
    //         //     "file": file,
    //         //     "_token": token
    //         // },
    //         success:function(response){

    //             $(document).ready(function() {
    //               $('#dataTable').DataTable();
    //             });

    //             //data post
    //             let file = `
    //                 <tr id="index_${response.data.id}">
    //                     <td></td>
    //                     <td>${response.data.informasi}</td>
    //                     <td></td>
    //                     <td class="text-center">
    //                         <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
    //                         <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a></td>
    //                     </td>
    //                 </tr>
    //             `;
                
    //             //append to post data
    //             $('#tabel-file').after(file);

    //             //close modal
    //             $('#uploadFile').modal('hide');
    //             $('#informasi').val('');
    //             $('#bFile').val('');
                

    //         },
    //         error:function(error){
    //             console.error(error);
    //         }

    //     });

    // });

</script>