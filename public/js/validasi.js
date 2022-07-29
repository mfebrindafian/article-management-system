var hiddenBtn = document.getElementById('file_berita');
var hiddenBtn1 = document.getElementById('foto_berita1');
var hiddenBtn2 = document.getElementById('foto_berita2');
var hiddenBtn3 = document.getElementById('foto_berita3');
var chooseBtn = document.getElementById('chooseBtn');
var chooseBtn2 = document.getElementById('chooseBtn2');
var chooseBtn3 = document.getElementById('chooseBtn3');
var chooseBtn4 = document.getElementById('chooseBtn4');

hiddenBtn.addEventListener('change', function () {
     if (hiddenBtn.files.length > 0) {
          chooseBtn.innerText = hiddenBtn.files[0].name;
     } else {
          chooseBtn.innerText = 'Pilih file word';
     }
});
hiddenBtn1.addEventListener('change', function () {
     if (hiddenBtn1.files.length > 0) {
          chooseBtn2.innerText = hiddenBtn1.files[0].name;
     } else {
          chooseBtn2.innerText = 'Foto 1';
     }
});
hiddenBtn2.addEventListener('change', function () {
     if (hiddenBtn2.files.length > 0) {
          chooseBtn3.innerText = hiddenBtn2.files[0].name;
     } else {
          chooseBtn3.innerText = 'Foto 2';
     }
});
hiddenBtn3.addEventListener('change', function () {
     if (hiddenBtn3.files.length > 0) {
          chooseBtn4.innerText = hiddenBtn3.files[0].name;
     } else {
          chooseBtn4.innerText = 'Foto 3';
     }
});

$('#btn-reset').on('click', function () {
     $('#chooseBtn').html('Pilih word file');
     $('#chooseBtn2').html('Foto 1');
     $('#chooseBtn3').html('Foto 2');
     $('#chooseBtn4').html('Foto 3');
});

$(document).ready(function () {
     $('#form-tambah').validate({
          rules: {
               judul: {
                    required: true,
               },
               nama_penulis: {
                    required: true,
               },
               satker: {
                    required: true,
               },
          },
          messages: {
               judul: {
                    required: 'Judul berita tidak boleh kosong!',
               },
               nama_penulis: {
                    required: 'Nama penulis tidak boleh kosong!',
               },
               satker: {
                    required: 'Silahkan pilih Satker',
               },
          },
     });
});
jQuery.validator.setDefaults({
     errorElement: 'span',
     errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
     },
     highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
     },
     unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
     },
});

$(document).on('input', '#file_berita', function () {
     $('#file_berita').parent().next().html('');
     if (this.files[0].size > 250000) {
          $('#file_berita').parent().next().html('<small class="text-red">Ukuran File Melebihi 250Kb!</small>');
          this.value = '';
          return false;
     }
     var pathFile = this.value;
     var ekstensiOk = /(\.docx|\.doc)$/i;
     if (!ekstensiOk.exec(pathFile)) {
          $('#file_berita').parent().next().html('<small class="text-red">Yang anda input bukan file word!</small>');
          this.value = '';
          return false;
     }
});
$(document).on('input', '.foto', function () {
     $('.foto-validasi').html('');
     if (this.files[0].size > 500000) {
          $('.foto-validasi').html('Ukuran ' + $(this).attr('id') + ' Melebihi 500Kb!');
          this.value = '';
          return false;
     }
     var pathFile = this.value;
     var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
     if (!ekstensiOk.exec(pathFile)) {
          $('.foto-validasi').html('Yang anda input bukan file foto!');
          this.value = '';
          return false;
     }
});
