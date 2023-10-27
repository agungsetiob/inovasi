<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">SKPD <span id="skpd-name" style="color: #0061f2;"></span> akan dihapus. <br>Tekan tombol hapus apabila anda sudah yakin.
            <div id="error-alert" class="alert alert-danger alert-dismissible fade show d-none" role="alert">
                <span id="error-message"></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-outline-secondary" type="button" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
            <button id="delete-skpd" class="btn btn-outline-danger" title="kirim"><i class="fa-solid fa-trash"></i> Hapus</button>
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        var skpdId;

        $(".delete-button").click(function() {
            skpdId = $(this).data("skpd-id");
            var skpdName = $(this).data("skpd-name");
            $("#skpd-name").text(skpdName);
        });

        $("#delete-skpd").click(function() {
            $.ajax({
                url: '/master/skpd/' + skpdId,
                type: 'DELETE',
                headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                success: function(response) {
                    if (response.success) {
                        $('#success-alert').removeClass('d-none').addClass('show');
                        $('#success-message').text(response.message);
                        $('#error-alert').addClass('d-none');
                        $('#index_' + skpdId).remove();
                        $('#deleteModal').modal('hide');
                        setTimeout(function() {
                            $('#success-alert').addClass('d-none').removeClass('show');
                        }, 3700);
                    }
                },
                error: function(response) {
                    $('#error-message').text('Gagal menghapus skpd inovasi');
                    $('#error-alert').removeClass('d-none').addClass('show');
                }
            });
        });
    });
</script>
