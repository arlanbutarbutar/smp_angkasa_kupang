  //select data
  $(document).ready(function() {
    $('#editSpp').on('show.bs.modal', function(e) {
        var idx = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type: 'post',
            url: 'app/admin/reload/dataSpp.php',
            data: 'idx=' + idx,
            success: function(data) {
                $('.data-spp').html(data); //menampilkan data ke dalam modal
            }
        });
    });
});
//end select data