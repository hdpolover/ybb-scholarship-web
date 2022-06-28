<!-- General JS Scripts -->
<script src="<?= base_url() ?>assets/modules/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/modules/popper.js"></script>
<script src="<?= base_url() ?>assets/modules/tooltip.js"></script>
<script src="<?= base_url() ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?= base_url() ?>assets/modules/moment.min.js"></script>
<script src="<?= base_url() ?>assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="<?= base_url() ?>assets/modules/jquery.sparkline.min.js"></script>
<script src="<?= base_url() ?>assets/modules/chart.min.js"></script>
<script src="<?= base_url() ?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>assets/modules/summernote/summernote-bs4.js"></script>
<script src="<?= base_url() ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

<!-- Page Specific JS File -->
<script src="<?= base_url() ?>assets/js/page/index.js"></script>

<!-- Load Data Table -->
<script src="<?php echo base_url() ?>assets/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/datatables-bs4/js/dataTables.bootstrap4.js"></script>


<!-- Template JS File -->
<script src="<?= base_url() ?>assets/js/scripts.js"></script>
<script src="<?= base_url() ?>assets/js/custom.js"></script>

<!-- lightgallery -->
<script src="<?= base_url() ?>assets/lightgallery/dist/js/lightgallery.js"></script>

<script>
  $(document).ready(function() {
    $("#data_tabel").DataTable({
      "language": {
        "search": "Pencarian",
        "lengthMenu": "Tampilkan _MENU_ baris data per halaman",
        "zeroRecords": "Belum ada data yang disimpan",
        "info": "Menampilkan baris _START_ sampai _END_ dari _TOTAL_ baris data",
        "infoEmpty": "Menampilkan 0 baris data",
        "paginate": {
          "first": "Pertama",
          "last": "Terakhir",
          "next": "Selanjutnya",
          "previous": "Sebelumnya"
        }
      }
    });
  });
</script>
<script>
  $(document).ready(function() {
    $("#data_tabel_tagihan").DataTable({
      "language": {
        "search": "Pencarian",
        "lengthMenu": "Tampilkan _MENU_ baris data per halaman",
        "zeroRecords": "Belum ada data yang disimpan",
        "info": "Menampilkan baris _START_ sampai _END_ dari _TOTAL_ baris data",
        "infoEmpty": "Menampilkan 0 baris data",
        "paginate": {
          "first": "Pertama",
          "last": "Terakhir",
          "next": "Selanjutnya",
          "previous": "Sebelumnya"
        }
      }
    });
  });
</script>
<script>
  $(document).ready(function() {
    $("#tabel1").DataTable({
      "language": {
        "search": "Pencarian",
        "lengthMenu": "Tampilkan _MENU_ baris data per halaman",
        "zeroRecords": "Belum ada data yang disimpan",
        "info": "Menampilkan baris _START_ sampai _END_ dari _TOTAL_ baris data",
        "infoEmpty": "Menampilkan 0 baris data",
        "paginate": {
          "first": "Pertama",
          "last": "Terakhir",
          "next": "Selanjutnya",
          "previous": "Sebelumnya"
        }
      }
    });
  });
</script>
<script>
  $(document).ready(function() {
    $("#tabel2").DataTable({
      "language": {
        "search": "Pencarian",
        "lengthMenu": "Tampilkan _MENU_ baris data per halaman",
        "zeroRecords": "Belum ada data yang disimpan",
        "info": "Menampilkan baris _START_ sampai _END_ dari _TOTAL_ baris data",
        "infoEmpty": "Menampilkan 0 baris data",
        "paginate": {
          "first": "Pertama",
          "last": "Terakhir",
          "next": "Selanjutnya",
          "previous": "Sebelumnya"
        }
      }
    });
  });
</script>
<script>
  $(document).ready(function() {
    $("#tabel3").DataTable({
      "language": {
        "search": "Pencarian",
        "lengthMenu": "Tampilkan _MENU_ baris data per halaman",
        "zeroRecords": "Belum ada data yang disimpan",
        "info": "Menampilkan baris _START_ sampai _END_ dari _TOTAL_ baris data",
        "infoEmpty": "Menampilkan 0 baris data",
        "paginate": {
          "first": "Pertama",
          "last": "Terakhir",
          "next": "Selanjutnya",
          "previous": "Sebelumnya"
        }
      }
    });
  });
</script>
<script>
  $(document).ready(function() {
    var span = 1;
    var prevTD = "";
    var prevTDVal = "";
    $("#data_tabel_biaya tr td:first-child").each(function() { //for each first td in every tr
      var $this = $(this);
      if ($this.text() == prevTDVal) { // check value of previous td text
        span++;
        if (prevTD != "") {
          prevTD.attr("rowspan", span); // add attribute to previous td
          $this.remove(); // remove current td
        }
      } else {
        prevTD = $this; // store current td 
        prevTDVal = $this.text();
        span = 1;
      }
    });
  });
</script>
<script>
  $(document).ready(function() {
    var span = 1;
    var prevTD = "";
    var prevTDVal = "";
    $("#data_tabel_tagihan tr td:nth-child(2)").each(function() { //for each first td in every tr
      var npwrd = $(this);
      $.ajax({
        type: 'GET',
        url: '<?= base_url('admin/data_tagihan/is_tunggakan') ?>',
        data: {
          npwrd: npwrd.text(),
        },
        success: function(response) {
          npwrd.append(response)
        },
        error: function(response) {
          console.log(response);
        }
      });
    });
  });
</script>
<script>
  lightGallery(document.getElementById('lightgallery-ktp'));
  lightGallery(document.getElementById('lightgallery-pbb'));
  lightGallery(document.getElementById('lightgallery-sk_kenkum_ham'));
  lightGallery(document.getElementById('lightgallery-sku_gampong'));
  lightGallery(document.getElementById('lightgallery-npwp'));
</script>

<script type="text/javascript">
  function bacaGambar(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#gambar_load').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#priview_gambar").change(function() {
    bacaGambar(this);
  });
</script>
<script>
  $(document).ready(function() {
    $('#id_kecamatan').change(function() {
      console.log('testttstt');
      const id_kecamatan = $(this).val();
      $.ajax({
        type: 'GET',
        url: '<?= base_url('admin/data_laporan/list_desa') ?>',
        data: {
          id_kecamatan: id_kecamatan
        },
        success: function(response) {
          $('#id_desa').html(response);
          console.log(response);
        },
        error: function(response) {
          console.log(response);
        }
      });
    })
  });
</script>
<script>
  // edit retribusi modal
  $(document).ready(function() {
    $(document).on('click', '#editRetribusi', function() {
      const idRetribusi = $(this).data('id');
      const namaRetribusi = $(this).data('nama');
      const idBidang = $(this).data('bidang');
      console.log(idBidang);

      $('#id_retribusi').val(idRetribusi);
      $('#nama_retribusi').val(namaRetribusi);

      $('#id_bidang option').each(function() {
        if ($(this).val() == idBidang) {
          $(this).prop("selected", true);
        }
      });

    });
  });
</script>
<script>
  // edit retribusi modal
  $(document).ready(function() {
    $(document).on('click', '#editBiaya', function() {
      const idBiayaPusat = $(this).data('idbiayapusat');
      const idBiayaDesa = $(this).data('idbiayadesa');
      const idJenisBiaya = $(this).data('idjenisbiaya');
      const namaJenis = $(this).data('namajenis');
      const jmlBiayaPusat = $(this).data('jmlbiayapusat');
      const jmlBiayaDesa = $(this).data('jmlbiayadesa');
      const idRetribusi = $(this).data('idretribusi');

      console.log(idRetribusi);

      $('#id_biaya_pusat').val(idBiayaPusat);
      $('#id_biaya_desa').val(idBiayaDesa);
      $('#id_jenis_biaya').val(idJenisBiaya);
      $('#nama_jenis').val(namaJenis);
      $('#jml_biaya_pusat').val(jmlBiayaPusat);
      $('#jml_biaya_desa').val(jmlBiayaDesa);

      $('#id_retribusi option').each(function() {
        if ($(this).val() == idRetribusi) {
          $(this).prop("selected", true);
        }
      });

    });
  });
</script>
</body>

</html>