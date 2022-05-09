  //select data
  $(document).ready(function() {
    $('#bayar_spp').on('show.bs.modal', function(e) {
        var idx = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type: 'post',
            url: 'app/admin/reload/dataPembayaran.php',
            data: 'idx=' + idx,
            success: function(data) {
                $('.data-pembayaran').html(data); //menampilkan data ke dalam modal
            }
        });
    });
});
//end select data