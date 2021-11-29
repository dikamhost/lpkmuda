<style>
   #tb_transfer img {
      max-height: 5rem;
   }
</style>
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
                  <div class="card-header">
                     <button class="btn btn-success tambah"><i class="fas fa-plus"></i> Tambah</button>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="tb_transfer" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th style="width:5%;">No</th>
                              <th class="text-center" style="width: 20%;">Aksi</th>
                              <th class="text-center" style="max-width:3rem;">Nama Pembayaran</th>
                              <th class="text-center" style="width: 30%;">Nomor Transfer</th>
                              <th class="text-center" style="width: 30%;">Atas Nama</th>
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
   var tabel = null;
   $(document).ready(function() {
      tabel = $('#tb_transfer').DataTable({
         "processing": true,
         "responsive": true,
         "serverSide": true,
         language: table_language(),
         "autoWidth": false,
         "ordering": true, // Set true agar bisa di sorting
         "order": [], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
         "ajax": {
            "url": BASE_URL + "admin/transfer/view_data", // URL file untuk proses select datanya
            "type": "POST"
         },
         "deferRender": true,
         "aLengthMenu": [
            [10, 25, 50, 100],
            [10, 25, 50, 100, "All"]
         ],
         "columns": [{
               data: 'trf_id',
               orderable: false,
               render: function(data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
               },
               className: "text-center",
            },
            {
               "data": "trf_id",
               "render": function(data, type, row, meta) {
                  var btn = ``;
                  if (row.trf_locked == 1) {
                     btn += `<button type="button" class="ml-1 btn btn-secondary btn-sm lock"  data-id="` + row.trf_id + `" data-lock="` + row.trf_locked + `"><i class="fas fa-lock" title="Aktifkan"></i></button>`;
                  } else {
                     btn += `<button type="button" class="ml-1 btn btn-success btn-sm lock"  data-id="` + row.trf_id + `" data-lock="` + row.trf_locked + `"><i class="fas fa-lock-open" title="Kunci"></i></button>`;
                  }
                  btn += `<button type="button" class="ml-1 btn btn-warning btn-sm edit" data-id="` + row.trf_id + `" title="Edit"><i class="fas fa-edit"></i></button>`;
                  btn += `<button type="button" class="ml-1 btn btn-danger btn-sm hapus" data-id="` + row.trf_id + `" title="Hapus"><i class="fas fa-trash"></i></button>`;
                  return btn;
               },
               className: "text-center",
               orderable: false
            },
            {
               "data": "trf_nama"
            },
            {
               "data": "trf_value"
            },
            {
               "data": "trf_an"
            },
         ],
      });
   });
   $(document).off("click", "#tb_transfer button.lock")
      .on("click", "#tb_transfer button.lock", function(e) {
         $.ajax({
            type: "POST",
            url: BASE_URL + "admin/transfer/lock",
            dataType: "JSON",
            data: {
               trf_id: $(this).data('id'),
               trf_locked: $(this).data('lock')
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
   $(document).off("click", "#tb_transfer button.edit")
      .on("click", "#tb_transfer button.edit", function(e) {
         $.ajax({
            type: "POST",
            url: BASE_URL + "admin/transfer/getByID",
            dataType: "JSON",
            data: {
               trf_id: $(this).data('id')
            },
            success: function(data) {
               if (data.status == 1) {
                  data = data.data;
                  $('input[name="trf_id"]').val(data.trf_id);
                  $('input[name="trf_nama"]').val(data.trf_nama);
                  $('input[name="trf_value"]').val(data.trf_value);
                  $('input[name="trf_an"]').val(data.trf_an);
                  $('#dataModal').modal('show');
                  $('#dataModalTitle').html('<i class="fas fa-edit"></i> Edit Data Pembayaran');
                  $(document).off("click", "#dataModalSave").on("click", "#dataModalSave", function(e) {
                     simpan();
                  });
               } else {
                  toastr.error(data.pesan);
               }
            }
         });
      });
   $(document).off("click", "button.tambah")
      .on("click", "button.tambah", function(e) {
         $('#dataModal').modal('show');
         $('#dataModalTitle').html('<i class="fas fa-plus-circle"></i> Tambah Data Pembayaran');
         $(document).off("click", "#dataModalSave").on("click", "#dataModalSave", function(e) {
            simpan();
         });
      });
   $(document).off("click", "#tb_transfer button.hapus")
      .on("click", "#tb_transfer button.hapus", function(e) {
         $.ajax({
            type: "POST",
            url: BASE_URL + "admin/transfer/destroy",
            dataType: "JSON",
            data: {
               trf_id: $(this).data('id')
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

   function simpan() {
      var form_data = new FormData($('#form-data')[0]);
      var link = BASE_URL + 'admin/transfer/store';
      $.ajax({
         url: link,
         type: "POST",
         data: form_data,
         dataType: 'json',
         contentType: false,
         processData: false,
         success: function(data) {
            if (data.status == 1) {
               $('#dataModal').modal('hide');
               toastr.success(data.pesan);
               tabel.ajax.reload(null, true);
            } else if (data.status == 3) {
               $.each(data.pesan, function(i, item) {
                  $('#' + i + '_error').html(item);
                  $('#' + i + '_error').show();
                  if (item) {
                     $('#' + i).removeClass("is-valid").addClass("is-invalid");
                  } else {
                     $('#' + i).removeClass("is-invalid").addClass("is-valid");
                  }
               });
            } else {
               $('#dataModal').modal('hide');
               toastr.error(data.pesan);
            }
         }
      });
   }

   $(document).off("hidden.bs.modal", "#dataModal")
      .on("hidden.bs.modal", "#dataModal", function(e) {
         $('.text-invalid').html('');
         $('#dataModalTitle').html('');
         $('input[name="trf_id"]').val('');
         $('input[name="trf_nama"]').val('').removeClass("is-valid").removeClass("is-invalid");
         $('input[name="trf_value"]').val('').removeClass("is-valid").removeClass("is-invalid");
         $('input[name="trf_an"]').val('').removeClass("is-valid").removeClass("is-invalid");
         $("#dataModalSave").prop("onclick", null).off("click");
      });
</script>

<!-- Modal -->
<div class="modal fade" id="dataModal" role="dialog" aria-labelledby="dataModalTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" id="dataModalDialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="dataModalTitle"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body" id="dataModalBody">
            <form id="form-data">
               <div class="row">
                  <div class="col-md-12">
                     <input type="hidden" name="trf_id" value="">
                     <div class="form-group">
                        <label>Nama Pembayaran</label>
                        <input type="text" id="trf_nama" value="" name="trf_nama" class="form-control" placeholder="Nama Pembayaran">
                        <span class="text-invalid" id="trf_nama_error"></span>
                     </div>
                     <div class="form-group">
                        <label>Nomor Pembayaran</label>
                        <input type="text" id="trf_value" value="" name="trf_value" class="form-control" placeholder="Nomor Pembayaran">
                        <span class="text-invalid" id="trf_value_error"></span>
                     </div>
                     <div class="form-group">
                        <label>Atas Nama</label>
                        <input type="text" id="trf_an" value="" name="trf_an" class="form-control" placeholder="Atas Nama">
                        <span class="text-invalid" id="trf_an_error"></span>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer text-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="float: right;"><i class="fas fa-times-circle"></i> Close</button>
            <button type="button" class="btn btn-success" id="dataModalSave"><i class="fas fa-save"></i> Simpan</button>
         </div>
      </div>
   </div>
</div>