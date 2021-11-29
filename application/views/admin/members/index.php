<?php
function to_tanggal($tanggal)
{
  $tgl = explode('-', $tanggal);
  $yyyy = $tgl[0];
  $mm = $tgl[1];
  $dd = $tgl[2];
  return $dd . "-" . $mm . "-" . $yyyy;
} ?>
<style>
  #tb_user img {
    max-height: 5rem;
  }
</style>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><?= $title ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>" class="text-success">Dashboard</a></li>
            <li class="breadcrumb-item active"><?= $title ?></li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="tb_user" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th style="width:5%;">No</th>
                    <th class="text-center" style="max-width:3rem;">Foto</th>
                    <th class="text-center" style="width: 20%;">Nama</th>
                    <th class="text-center" style="width: 15%;">Email</th>
                    <th class="text-center" style="width: 15%;">Username</th>
                    <th class="text-center" style="width: 5%;">Aktif</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/admin/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/admin/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/admin/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/admin/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/admin/') ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/admin/') ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/admin/') ?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/admin/') ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/admin/') ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets/admin/') ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/admin/') ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/admin/') ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
  $('#mbr_tanggal_lahir').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'dd-mm-yyyy'
  });
  var tabel = null;
  $(document).ready(function() {
    tabel = $('#tb_user').DataTable({
      "processing": true,
      "responsive": true,
      "serverSide": true,
      language: table_language(),
      "autoWidth": false,
      "ordering": true, // Set true agar bisa di sorting
      "order": [], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
      "ajax": {
        "url": BASE_URL + "admin/members/view_data", // URL file untuk proses select datanya
        "type": "POST"
      },
      "deferRender": true,
      "aLengthMenu": [
        [10, 25, 50, 100],
        [10, 25, 50, 100, "All"]
      ],
      "columns": [{
          data: 'mbr_id',
          orderable: false,
          render: function(data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          },
          className: "text-center",
        },
        {
          data: "mbr_foto",
          orderable: false,
          render: function(data, type, row, meta) {
            if (data) {
              var foto = `<img src="<?= STORAGEPATH ?>/member/` + data + `">`;
            } else {
              var foto = `<img src="<?= STORAGEPATH ?>/no-image.jpg">`;
            }
            return foto;
          },
          className: "text-center",
        },
        {
          "data": "mbr_name"
        },
        {
          "data": "mbr_email"
        },
        {
          "data": "mbr_username"
        },
        {
          "data": "mbr_locked",
          "render": function(data, type, row, meta) {
            if (data == 1) {
              var btn = `<button type="button" class="btn btn-secondary btn-sm lock"  data-id="` + row.mbr_id + `" data-lock="` + data + `"><i class="fas fa-lock"></i></button>`;
            } else {
              var btn = `<button type="button" class="btn btn-success btn-sm lock"  data-id="` + row.mbr_id + `" data-lock="` + data + `"><i class="fas fa-lock-open"></i></button>`;
            }
            return btn;
          },
          className: "text-center",
        },
      ],
    });
  });
  $(document).off("click", "#tb_user button.lock")
    .on("click", "#tb_user button.lock", function(e) {
      $.ajax({
        type: "POST",
        url: BASE_URL + "admin/members/lock",
        dataType: "JSON",
        data: {
          mbr_id: $(this).data('id'),
          mbr_locked: $(this).data('lock')
        },
        success: function(data) {
          if (data.status == 1) {
            tabel.ajax.reload(null, true);
          } else {
            toastr.error(data.pesan);
          }
        }
      });
    });
</script>