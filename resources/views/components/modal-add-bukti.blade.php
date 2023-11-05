<!-- Add Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="buktiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="buktiLabel">Tambah Jenis Bukti inovasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="uploadForm">
                    @csrf
                    <div class="form-group">
                        <label for="name">Bukti inovasi (parameter)</label>
                        <input type="text" name="nama" class="form-control" id="name" required placeholder="Masukkan nama bukti inovasi" autocomplete="off">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama"></div>
                    </div>
                    <div class="form-group">
                        <label for="skor">Bobot</label>
                        <input type="number" step="any" name="bobot" class="form-control" id="skor" required>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-bobot"></div>  
                    </div>
                    <div class="form-group">
                        <label for="indikator">Indikator</label>
                        <select name="indikator" id="indikator" class="form-control" required>
                            <option value="">Pilih satuan indikator</option>
                            @foreach($indikators as $indikator)
                            <optgroup label="{{ $indikator->jenis }}">
                                <option value="{{ $indikator->id }}">{{ $indikator->nama }}</option>
                            </optgroup>
                            @endforeach
                        </select>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-indikator"></div>
                    </div>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button id="simpan-bukti" type="submit" class="btn btn-primary">Save</button>
                </form>
            </div> 
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('select').selectize({
            sortField: 'text'
        });
    });

    $('#uploadForm').submit(function (e) {
        e.preventDefault();
        
        var formData = new FormData(this);

        $.ajax({
            url: '/master/bukti',
            type: "POST",
            cache: false,
            contentType: false,
            data: formData,
            processData: false,
            success: function (response) {
                // var reloadUrl = '/master/bukti/create';
                
                // // Reload the table
                // $("#tabel-bukti").load(reloadUrl);

                let bukti = `
                <tr id="index_${response.data.id}">
                <td></td>
                <td>${response.data.nama}</td>
                <td>${response.data.bobot}</td>
                <td>${response.indikator}</td>
                <td>
                    <button class="btn btn-outline-danger btn-sm delete-button" title="hapus" data-toggle="modal" data-target="#deleteModal"
                    data-bukti-id="${response.data.id}"
                    data-bukti-name="${response.data.nama}"><i class="fas fa-trash"></i></button>
                    <div class="dropdown mb-4 d-inline">
                    <button
                        class="btn btn-outline-primary dropdown-toggle btn-sm"
                        type="button"
                        id="dropdownMenuButton"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        data-bukti-id="${response.data.id}"
                        data-bukti-status="${response.data.status}">
                        ${response.data.status}
                    </button>
                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                        <button class="dropdown-item" data-action="toggle-status">change status</button>
                    </div>
                    </div>
                </td>
                </tr>
                `;                
                //append to table
                $('#tabel-bukti').append(bukti);

                // Close modal and clear input fields
                $('#addCategory').modal('hide');
                $('#name').val('');
                $('#skor').val('');
                $('#indikator').val('');

                $('#success-modal').modal('show');
                $('#success-message').text(response.message);
                setTimeout(function() {
                    $('#success-modal').modal('hide');
                }, 3900);
            },
            error: function (error) {
                if (error.status === 422) {
                    $.each(error.responseJSON.errors, function (field, errors) {
                        let alertId = 'alert-' + field;
                        $('#' + alertId).html(errors[0]).removeClass('d-none').addClass('show');
                    });
                } else {
                    $('#error-message').text('An error occurred.');
                    $('#error-modal').modal('show');
                    console.error(error);
                }
            }
        });
    });

</script>