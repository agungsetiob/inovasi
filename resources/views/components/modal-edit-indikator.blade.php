{{--edit indikator modal--}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah bukti</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data" id="updateForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" class="form-control" name="indikator_id" id="indikator_id_edit">
                    <input type="hidden" class="form-control" name="file_id" id="file_id">
                    <label for="indikator_edit">Indikator</label>
                    <div class="form-group">
                        <input type="text" id="indikator_edit" class="form-control" readonly>
                    </div>
                    <label for="informasi_edit">Deskripsi bukti</label>
                    <div class="form-group">
                        <input type="text" name="informasi" id="informasi_edit" class="form-control">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-informasi-edit"></div>
                    </div>
                    <label for="bukti_edit">Informasi</label>
                    <div class="form-group">
                        <select name="bukti" id="bukti_edit" class="select form-control selectized">
                            <option value="">Pilih bukti</option>
                        </select>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-bukti-edit"></div>
                    </div>
                    <label for="editFile">File bukti</label>
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-btn">
                                <span class="btny btn-outline-primary">
                                    Browse<input accept=".png, .jpg, .jpeg, .pdf" id="editFile" type="file" style="display: none;" name="file">
                                </span>
                            </label>
                            <input id="newFile" type="text" class="form-control" readonly placeholder="Choose a file">
                        </div> 
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-file"></div> 
                    </div>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button id="upload" type="submit" class="btn btn-primary">Upload</button>
                    <button id="loading" type="submit" class="btn btn-primary d-none" disabled><i class="fa-solid fa-circle-notch fa-spin"></i></button>
                </form>
            </div> 
        </div>
    </div>
</div>
<script type="text/javascript">
    document.getElementById('editFile').onchange = function () {
        document.getElementById('newFile').value = this.value;
    }

    $('body').on('click', '.btn-edit', function () {
        var selectize = $('#bukti_edit')[0].selectize;
        if (selectize) {
            selectize.destroy();
        }
        let indikator_id = $(this).data('indikator-id');
        let proposal_id = $(this).data('proposal-id');
        let indikator_nama = $(this).data('indikator-nama');
        let informasi = $(this).data('file-informasi');
        let file_id = $(this).data('file-id');
        let bukti_id = $(this).data('bukti-id');

        $('#indikator_id_edit').val(indikator_id);
        $('#indikator_edit').val(indikator_nama);
        $('#informasi_edit').val(informasi);
        $('#file_id').val(file_id);

        var buktiEditSelect = $('#bukti_edit');
        buktiEditSelect.empty();
        var buktiData = bukti_id;

        $.ajax({
            url: `/bukti-dukung/data/${proposal_id}/${indikator_id}`,
            type: "GET",
            cache: false,
            success: function (response) {
                $.each(response.bukti, function (index, bukti) {
                    var option = $('<option></option>');
                    option.attr('value', bukti.id);
                    option.text(bukti.nama + ' (bobot: ' + bukti.bobot + ')');

                    if (bukti.id == buktiData) {
                        option.attr('selected', 'selected');
                    }

                    buktiEditSelect.append(option);
                });

                $('#bukti_edit').selectize({
                    sortField: 'text'
                });
            }
        });
    });

    $('#updateForm').submit(function (e) {
        e.preventDefault();
        $('#upload').addClass('d-none');
        $('#loading').removeClass('d-none');

        var file_id = $('#file_id').val();
        var formData = new FormData(this);

        $.ajax({
            url: "/bukti-dukung/edit/" + file_id,
            type: "POST",
            cache: false,
            contentType: false,
            data: formData,
            processData: false,
            success: function (response) {
                var id = $('#proposal_id').val();
                var reloadUrl = '{{ url("/bukti-dukung") }}/' + id;

                $("#files-table").load(reloadUrl + " #files-table");

                $('#editModal').modal('hide');
                $('#informasi_edit').val('');
                $('#bukti_edit').val('');
                $('#editFile').val('');
                $('#newFile').val('');

                $('#success-modal').modal('show');
                $('#success-message').text(response.message);
                setTimeout(function() {
                    $('#success-modal').modal('hide');
                }, 3900);
                $('#upload').removeClass('d-none');
                $('#loading').addClass('d-none');
            },
            error: function (error) {
                if (error.status === 422) {
                    $('#upload').removeClass('d-none');
                    $('#loading').addClass('d-none');
                    $.each(error.responseJSON.errors, function (field, errors) {
                        let alertId = 'alert-' + field + '-edit';
                        $('#' + alertId).html(errors[0]).removeClass('d-none').addClass('d-block');
                    });

                } else {
                    $('#error-message').text(error.status + ' ' + error.responseJSON.message);
                    $('#error-modal').modal('show');
                    $('#upload').removeClass('d-none');
                    $('#loading').addClass('d-none');
                }
            }
        });
    });
</script>