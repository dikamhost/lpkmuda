<div class="content-wrapper">
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12 text-center my-5">
               <img class="mb-3" src="<?= base_url('/assets/images/selesai.jpg') ?>" style="width: 50%; min-width: 13rem;" alt="No Result">
               <h4>Selesai belajar !!</h4>
               <button onclick="cetak('<?= $kejuruan['kjr_id']; ?>')" class="btn btn-danger px-3"><i class="fa fa-award"></i> Cetak Sertifikat</button>
            </div>
         </div>
      </div>
   </section>
</div>
<script>
   function cetak(kjr_id) {
      var link = BASE_URL + 'member/sertifikat/store';
      $.ajax({
         url: link,
         type: "POST",
         data: {
            kjr_id: kjr_id,
         },
         dataType: 'json',
         success: function(data) {
            if (data.status == 1) {
               window.location.href = BASE_URL + "storage/sertifikat/" + data.link;
            } else {
               Swal.fire({
                  icon: 'error',
                  title: data.pesan,
                  showConfirmButton: false,
                  timer: 1500
               });
            }
         }
      });
   }
</script>