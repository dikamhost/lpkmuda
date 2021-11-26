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
            <div class="card-header">
              <button class="btn btn-success tambah"><i class="fas fa-plus"></i> Tambah</button>
            </div>
            <!-- /.card-header -->
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
                    <th class="text-center" style="width: 10%;">Aksi</th>
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
      "order": [
        [2, 'asc']
      ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
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
        {
          "data": "mbr_id",
          "render": function(data, type, row, meta) {
            var btn = `<button type="button" class="btn btn-warning btn-sm edit" data-id="` + data + `"><i class="fas fa-edit"></i></button>`;
            btn += `<button type="button" class="btn btn-danger btn-sm hapus" data-id="` + data + `"><i class="fas fa-trash"></i></button>`;
            return btn;
          },
          className: "text-center",
          orderable: false
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
  $(document).off("click", "#tb_user button.edit")
    .on("click", "#tb_user button.edit", function(e) {
      $.ajax({
        type: "POST",
        url: BASE_URL + "admin/members/getByID",
        dataType: "JSON",
        data: {
          mbr_id: $(this).data('id')
        },
        success: function(data) {
          if (data.status == 1) {
            data = data.data;
            getRole(data.mbr_group);
            $('input[name="mbr_id"]').val(data.mbr_id);
            $('input[name="mbr_name"]').val(data.mbr_name);
            $('input[name="mbr_username"]').val(data.mbr_username);
            $('input[name="mbr_email"]').val(data.mbr_email);
            $('#mbr_deskripsi').html(data.mbr_deskripsi);
            $('#mbr_deskripsi').val(data.mbr_deskripsi);
            $('input[name="mbr_twitter"]').val(data.mbr_twitter);
            $('input[name="mbr_facebook"]').val(data.mbr_facebook);
            $('input[name="mbr_instagram"]').val(data.mbr_instagram);
            if (data.mbr_foto) {
              var mbr_foto = "<?= STORAGEPATH ?>/member/" + data.mbr_foto;
            } else {
              var mbr_foto = "<?= STORAGEPATH ?>/no-image.jpg";
            }
            $('#blah-mbr_foto').attr("src", mbr_foto);
            $('#userModal').modal('show');
            $('#userModalTitle').html('<i class="fas fa-edit"></i> Edit Data Members');
            $(document).off("click", "#userModalSave").on("click", "#userModalSave", function(e) {
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
      getRole();
      $('#userModal').modal('show');
      $('#userModalTitle').html('<i class="fas fa-plus-circle"></i> Tambah Data Members');
      $(document).off("click", "#userModalSave").on("click", "#userModalSave", function(e) {
        simpan();
      });
    });
  $(document).off("click", "#tb_user button.hapus")
    .on("click", "#tb_user button.hapus", function(e) {
      $.ajax({
        type: "POST",
        url: BASE_URL + "admin/members/destroy",
        dataType: "JSON",
        data: {
          mbr_id: $(this).data('id')
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

  function getRole(akses = null) {
    $.ajax({
      type: "get",
      url: "<?php echo base_url('admin/members/getGroup') ?>",
      success: function(data) {
        data = JSON.parse(data);
        data = data.data;
        $('#mbr_group').html('<option value="">== Pilih Group ==</option>');
        $.each(data, function(i, val) {
          var t = `<option value="` + val.grp_id + `">` + val.grp_name + `</option>`;
          $('#mbr_group').append(t);
        });
        $('#mbr_group').val(akses);
      }
    });
  }

  function simpan() {
    var form_data = new FormData($('#form-members')[0]);
    var link = BASE_URL + 'admin/members/store';
    $.ajax({
      url: link,
      type: "POST",
      data: form_data,
      dataType: 'json',
      contentType: false,
      processData: false,
      success: function(data) {
        if (data.status == 1) {
          $('#userModal').modal('hide');
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
          $('#userModal').modal('hide');
          toastr.error(data.pesan);
        }
      }
    });
  }

  $(document).off("hidden.bs.modal", "#userModal")
    .on("hidden.bs.modal", "#userModal", function(e) {
      $('.text-invalid').html('');
      $('#userModalTitle').html('');
      $('input[name="mbr_id"]').val('');
      $('input[name="mbr_name"]').val('').removeClass("is-valid").removeClass("is-invalid");
      $('input[name="mbr_username"]').val('').removeClass("is-valid").removeClass("is-invalid");
      $('input[name="mbr_email"]').val('').removeClass("is-valid").removeClass("is-invalid");
      $('input[name="mbr_password"]').val('').removeClass("is-valid").removeClass("is-invalid");
      $('input[name="mbr_cpassword"]').val('').removeClass("is-valid").removeClass("is-invalid");
      $('input[name="mbr_foto"]').val('').removeClass("is-valid").removeClass("is-invalid");
      $('#mbr_group').val('').removeClass("is-valid").removeClass("is-invalid");
      $('#blah-mbr_foto').attr("src", '<?= STORAGEPATH ?>' + '/no-image.jpg');
      $('#mbr_deskripsi').html('').removeClass("is-valid").removeClass("is-invalid");
      $('input[name="mbr_twitter"]').val('').removeClass("is-valid").removeClass("is-invalid");
      $('input[name="mbr_facebook"]').val('').removeClass("is-valid").removeClass("is-invalid");
      $('input[name="mbr_instagram"]').val('').removeClass("is-valid").removeClass("is-invalid");
      $("#userModalSave").prop("onclick", null).off("click");
    });
</script>
<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" id="userModalDialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="userModalTitle"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="userModalBody">
        <form id="form-members">
            <div class="row">
               <div class="col-md-6">
                  <input type="hidden" name="mbr_id" value="<?= $_SESSION['system_members']['mbr_id']; ?>">
                  <div class="form-group">
                     <label>Nama Lengkap</label>
                     <input type="text" id="mbr_name" value="<?= $_SESSION['system_members']['mbr_name']; ?>" name="mbr_name" class="form-control" placeholder="Nama Lengkap">
                     <span class="text-invalid" id="mbr_name_error"></span>
                  </div>
                  <div class="form-group">
                     <label for="ttl">Tempat, Tanggal Lahir</label>
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tempat Lahir" value="<?= $_SESSION['system_members']['mbr_tempat_lahir'] ?>" name="mbr_tempat_lahir" id="mbr_tempat_lahir">
                        <div class="input-group-prepend px-2"></div>
                        <div class="input-group-prepend">
                           <input type="text" class="form-control" placeholder="dd-mm-yyyy" value="<?= to_tanggal($_SESSION['system_members']['mbr_tanggal_lahir']) ?>" name="mbr_tanggal_lahir" id="mbr_tanggal_lahir">
                        </div>
                     </div>
                     <span class="text-danger" id="mbr_tempat_lahir_error"></span>
                     <span class="text-danger" id="mbr_tanggal_lahir_error"></span>
                  </div>
                  <div class="form-group">
                     <label for="mbr_kota_asal">Kota Asal</label>
                     <input type="text" class="form-control" id="mbr_kota_asal" value="<?= $_SESSION['system_members']['mbr_kota_asal'] ?>" name="mbr_kota_asal" placeholder="Kota Asal">
                     <div class="text-danger" id="mbr_kota_asal_error"></div>
                  </div>
                  <div class="form-group">
                     <label>Username</label>
                     <input type="text" id="mbr_username" name="mbr_username" value="<?= $_SESSION['system_members']['mbr_username']; ?>" class="form-control" placeholder="Username">
                     <span class="text-invalid" id="mbr_username_error"></span>
                  </div>
                  <div class="form-group">
                     <label>Email</label>
                     <input type="text" id="mbr_email" name="mbr_email" value="<?= $_SESSION['system_members']['mbr_email']; ?>" class="form-control" placeholder="Username">
                     <span class="text-invalid" id="mbr_email_error"></span>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" id="mbr_password" name="mbr_password" class="form-control" placeholder="Password">
                     <span class="text-invalid" id="mbr_password_error"></span>
                  </div>
                  <div class="form-group">
                     <label>Ulangi Password</label>
                     <input type="password" id="mbr_cpassword" name="mbr_cpassword" class="form-control" placeholder="Ulangi Password">
                     <span class="text-invalid" id="mbr_cpassword_error"></span>
                  </div>
                  <?php
                  $foto = $_SESSION['system_members']['mbr_foto'];
                  if (!isset($foto)) {
                     $foto = STORAGEPATH . '/no-image.jpg';
                  } else {
                     $foto = STORAGEPATH . '/member/' . $foto;
                  }
                  ?>
                  <div class="form-group">
                     <label>Foto</label>
                     <div class="input-group">
                        <input onchange="readURL(this, 'mbr_foto');" name="mbr_foto" type="file" accept="image/gif, image/jpeg, image/png" id="mbr_foto">
                     </div>
                     <div class="invalid-feedback" id="mbr_foto_error"></div>
                     <div id="mbr_foto-display">
                        <img id="blah-mbr_foto" src="<?= $foto ?>" alt="Mengambil Foto ..." class="mt-2" style="height: 200px;">
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <button class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
               </div>
            </div>
         </form>
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="float: right;"><i class="fas fa-times-circle"></i> Close</button>
        <button type="button" class="btn btn-success" id="userModalSave"><i class="fas fa-save"></i> Simpan</button>
      </div>
    </div>
  </div>
</div>