<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="section">

   <div class="section-header">
      <h1><?= $title; ?></h1>
   </div>

   <div class="section-body">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <h4>Tambah Testing</h4>
               </div>
               <div class="card-body">
                  <form action="/testing/calculate/<?= $toko['toko_id']; ?>" method="post">
                     <?= csrf_field(); ?>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="toko_nama">Nama Toko</label>
                        <div class="col-sm-12 col-md-7">
                           <input type="text" class="form-control" name="toko_nama" id="toko_nama" value="<?= $toko['toko_nama']; ?>" disabled>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="alamat">Alamat</label>
                        <div class="col-sm-12 col-md-7">
                           <textarea type="text" class="form-control" name="alamat" id="alamat" value="" readonly><?= $toko['alamat']; ?></textarea>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="jenis_toko">Jenis Toko</label>
                        <div class="col-sm-12 col-md-7">
                           <select class="form-control selectric" name="jenis_toko" id="jenis_toko" disabled>
                              <option value=""><?= $nilai[0]['atribut_name']; ?></option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="lokasi">Lokasi</label>
                        <div class="col-sm-12 col-md-7">
                           <select class="form-control selectric" name="lokasi" id="lokasi" disabled>
                              <option value=""><?= $nilai[1]['atribut_name']; ?></option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="ukuran_toko">Ukuran Toko</label>
                        <div class="col-sm-12 col-md-7">
                           <select class="form-control selectric" name="ukuran_toko" id="ukuran_toko" disabled>
                              <option value=""><?= $nilai[2]['atribut_name']; ?></option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="keramaian_toko">Keramaian Toko</label>
                        <div class="col-sm-12 col-md-7">
                           <select class="form-control selectric" name="keramaian_toko" id="keramaian_toko" disabled>
                              <option value=""><?= $nilai[3]['atribut_name']; ?></option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="keramaian_sekitar">Keramaian Sekitar</label>
                        <div class="col-sm-12 col-md-7">
                           <select class="form-control selectric" name="keramaian_sekitar" id="keramaian_sekitar" disabled>
                              <option value=""><?= $nilai[4]['atribut_name']; ?></option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="jam_operasional">Jam Operasional</label>
                        <div class="col-sm-12 col-md-7">
                           <select class="form-control selectric" name="jam_operasional" id="jam_operasional" disabled>
                              <option value=""><?= $nilai[5]['atribut_name']; ?></option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                           <button type="submit" class="btn btn-primary">Next</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?= $this->endSection(); ?>