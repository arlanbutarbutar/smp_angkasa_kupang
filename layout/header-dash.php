<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title><?= $_SESSION['page-name']?> - SMP Angkasa Penfui Kupang</title>
<link rel="stylesheet" href="../assets/css/bootstrap.css">
<link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../assets/css/simplebar.css">
<link rel="stylesheet" href="../assets/css/overpass.css">
<link rel="stylesheet" href="../assets/css/feather.css">
<link rel="stylesheet" href="../assets/css/select2.css">
<link rel="stylesheet" href="../assets/css/dropzone.css">
<link rel="stylesheet" href="../assets/css/uppy.min.css">
<link rel="stylesheet" href="../assets/css/jquery.steps.css">
<link rel="stylesheet" href="../assets/css/jquery.timepicker.css">
<link rel="stylesheet" href="../assets/css/quill.snow.css">
<link rel="stylesheet" href="../assets/css/daterangepicker.css">
<link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="../assets/css/app-light.css" id="lightTheme">
<link rel="stylesheet" href="../assets/css/app-dark.css" id="darkTheme" disabled>
<link rel="stylesheet" href="../assets/fontawesome-free/css/all.min.css">
<script src="../assets/js/iconify.min.js"></script>
<script src="../assets/ckeditor/ckeditor.js"></script>
<script>
  // screen layout
  function printContent(el) {
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
</script>

