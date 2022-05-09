<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/moment.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/simplebar.min.js"></script>
<script src="../assets/js/daterangepicker.js"></script>
<script src="../assets/js/jquery.stickOnScroll.js"></script>
<script src="../assets/js/tinycolor-min.js"></script>
<script src="../assets/js/config.js"></script>
<script src="../assets/js/d3.min.js"></script>
<script src="../assets/js/topojson.min.js"></script>
<script src="../assets/js/datamaps.all.min.js"></script>
<script src="../assets/js/datamaps-zoomto.js"></script>
<script src="../assets/js/datamaps.custom.js"></script>
<script src="../assets/js/Chart.min.js"></script>
<script src="../assets/js/gauge.min.js"></script>
<script src="../assets/js/jquery.sparkline.min.js"></script>
<script src="../assets/js/apexcharts.min.js"></script>
<script src="../assets/js/apexcharts.custom.js"></script>';
<script src='../assets/js/jquery.mask.min.js'></script>
<script src='../assets/js/select2.min.js'></script>
<script src='../assets/js/jquery.steps.min.js'></script>
<script src='../assets/js/jquery.validate.min.js'></script>
<script src='../assets/js/jquery.timepicker.js'></script>
<script src='../assets/js/dropzone.min.js'></script>
<script src='../assets/js/uppy.min.js'></script>
<script src='../assets/js/quill.min.js'></script>
<script src="../assets/js/jquery.dataTables.min.js"></script>
<script src="../assets/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/js/apps.js"></script>
<script src="../assets/js/jquery-3.5.1.js"></script>
<script src="../assets/js/js/editSpp.js"></script>
<script>
  $(document).ready(function(){
    $('#search-berita').on('keyup',function(){
      $.get('search.php?key='+$('#search-berita').val(),function(data){
        $('#search-page').html(data);
      });
    });
  });
  $(document).ready(function(){
    $('#search-kelas').on('keyup',function(){
      $.get('search.php?key='+$('#search-kelas').val(),function(data){
        $('#search-page').html(data);
      });
    });
  });
  $(document).ready(function(){
    $('#search-mapel').on('keyup',function(){
      $.get('search.php?key='+$('#search-mapel').val(),function(data){
        $('#search-page').html(data);
      });
    });
  });
  $(document).ready(function(){
    $('#search-guru').on('keyup',function(){
      $.get('search.php?key='+$('#search-guru').val(),function(data){
        $('#search-page').html(data);
      });
    });
  });
  $(document).ready(function(){
    $('#search-siswa').on('keyup',function(){
      $.get('search.php?key='+$('#search-siswa').val(),function(data){
        $('#search-page').html(data);
      });
    });
  });
  $(document).ready(function(){
    $('#search-absensi').on('keyup',function(){
      $.get('search.php?key='+$('#search-absensi').val(),function(data){
        $('#search-page').html(data);
      });
    });
  });
  $(document).ready(function(){
    $('#search-jadwal').on('keyup',function(){
      $.get('search.php?key='+$('#search-jadwal').val(),function(data){
        $('#search-page').html(data);
      });
    });
  });
  $(document).ready(function(){
    $('#search-akun').on('keyup',function(){
      $.get('search.php?key='+$('#search-akun').val(),function(data){
        $('#search-page').html(data);
      });
    });
  });
  $(document).ready(function(){
    $('#search-nilai').on('keyup',function(){
      $.get('search.php?key='+$('#search-nilai').val(),function(data){
        $('#search-page').html(data);
      });
    });
  });
</script>
<script>
  $('.custom-file-input').on('change', function(){
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });
</script>
<script>
  Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
  Chart.defaults.global.defaultFontColor = colors.mutedColor;
</script>
<script>
  CKEDITOR.replace('deskripsi');
  $('.select2').select2({
    theme: 'bootstrap4',
  });
  $('.select2-multi').select2({
    multiple: true,
    theme: 'bootstrap4',
  });
  $('.drgpicker').daterangepicker({
    singleDatePicker: true,
    timePicker: false,
    showDropdowns: true,
    locale: {
      format: 'MM/DD/YYYY'
    }
  });
  $('.time-input').timepicker({
    'scrollDefault': 'now',
    'zindex': '9999'
  });
  if ($('.datetimes').length) {
    $('.datetimes').daterangepicker({
      timePicker: true,
      startDate: moment().startOf('hour'),
      endDate: moment().startOf('hour').add(32, 'hour'),
      locale: {
        format: 'M/DD hh:mm A'
      }
    });
  }
  var start = moment().subtract(29, 'days');
  var end = moment();
  function cb(start, end) {
    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
  }
  $('#reportrange').daterangepicker({
    startDate: start,
    endDate: end,
    ranges: {
      'Today': [moment(), moment()],
      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    }
  }, cb);
  cb(start, end);
  $('.input-placeholder').mask("00/00/0000", {
    placeholder: "__/__/____"
  });
  $('.input-zip').mask('00000-000', {
    placeholder: "____-___"
  });
  $('.input-money').mask("#.##0,00", {
    reverse: true
  });
  $('.input-phoneus').mask('(000) 000-0000');
  $('.input-mixed').mask('AAA 000-S0S');
  $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
    translation: {
      'Z': {
        pattern: /[0-9]/,
        optional: true
      }
    },
    placeholder: "___.___.___.___"
  });
  var editor = document.getElementById('editor');
  if (editor) {
    var toolbarOptions = [
      [{
        'font': []
      }],
      [{
        'header': [1, 2, 3, 4, 5, 6, false]
      }],
      ['bold', 'italic', 'underline', 'strike'],
      ['blockquote', 'code-block'],
      [{
        'header': 1
      },
      {
        'header': 2
      }],
      [{
        'list': 'ordered'
      },
      {
        'list': 'bullet'
      }],
      [{
        'script': 'sub'
      },
      {
        'script': 'super'
      }],
      [{
        'indent': '-1'
      },
      {
        'indent': '+1'
      }],
      [{
        'direction': 'rtl'
      }],
      [{
        'color': []
      },
      {
        'background': []
      }],
      [{
        'align': []
      }],
      ['clean']
    ];
    var quill = new Quill(editor, {
      modules: {
        toolbar: toolbarOptions
      },
      theme: 'snow'
    });
  }
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      var forms = document.getElementsByClassName('needs-validation');
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>
<script>
  var uptarg = document.getElementById('drag-drop-area');
  if (uptarg) {
    var uppy = Uppy.Core().use(Uppy.Dashboard, {
      inline: true,
      target: uptarg,
      proudlyDisplayPoweredByUppy: false,
      theme: 'dark',
      width: 770,
      height: 210,
      plugins: ['Webcam']
    }).use(Uppy.Tus, {
      endpoint: 'https://master.tus.io/files/'
    });
    uppy.on('complete', (result) => {
      console.log('Upload complete! We’ve uploaded these files:', result.successful)
    });
  }
  $(document).ready(function() {
    $('#example').DataTable();
  });
  $(document).ready(function() {
    $('#example1').DataTable();
  });
  $(document).ready(function() {
    $('#example2').DataTable();
  });
  $(document).ready(function() {
    $('#example3').DataTable();
  });
</script>