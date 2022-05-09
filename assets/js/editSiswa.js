  //select data
  $(document).ready(function() {
    $('#editSiswa').on('show.bs.modal', function(e) {
        var idx = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type: 'post',
            url: 'app/admin/reload/dataSiswa.php',
            data: 'idx=' + idx,
            success: function(data) {
                $('.data-siswa').html(data); //menampilkan data ke dalam modal
            }
        });
    });
});
//end select data