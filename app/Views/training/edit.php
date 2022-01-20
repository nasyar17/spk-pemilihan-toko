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
                  <h4>Update Training</h4>
               </div>
               <div class="card-body">
                  <form action="/training/update/<?= $training['dt_id']; ?>" method="POST">
                     <?= csrf_field(); ?>
                     <input type="hidden" name="dt_id" value="<?= $training['dt_id']; ?>">
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="jenis_toko">Jenis Toko</label>
                        <div class="col-sm-12 col-md-7">
                           <select class="form-control selectric" name="jenis_toko" id="jenis_toko">
                              <?php foreach ($jenis_toko as $jt) : ?>
                                 <option value="<?= $jt['atribut_name']; ?>" <?= ($training['jenis_toko'] == $jt['atribut_name'] ? 'selected' : ''); ?>><?= $jt['atribut_name']; ?></option>
                              <?php endforeach; ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="lokasi">Lokasi</label>
                        <div class="col-sm-12 col-md-7">
                           <select class="form-control selectric" name="lokasi" id="lokasi">
                              <?php foreach ($lokasi as $lok) : ?>
                                 <option value="<?= $lok['atribut_name']; ?>" <?= ($training['lokasi'] == $lok['atribut_name'] ? 'selected' : ''); ?>><?= $lok['atribut_name']; ?></option>
                              <?php endforeach; ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="ukuran_toko">Ukuran Toko</label>
                        <div class="col-sm-12 col-md-7">
                           <select class="form-control selectric" name="ukuran_toko" id="ukuran_toko">
                              <?php foreach ($ukuran_toko as $ut) : ?>
                                 <option value="<?= $ut['atribut_name']; ?>" <?= ($training['ukuran_toko'] == $ut['atribut_name'] ? 'selected' : ''); ?>><?= $ut['atribut_name']; ?></option>
                              <?php endforeach; ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="keramaian_toko">Keramaian Toko</label>
                        <div class="col-sm-12 col-md-7">
                           <select class="form-control selectric" name="keramaian_toko" id="keramaian_toko">
                              <?php foreach ($keramaian_toko as $kt) : ?>
                                 <option value="<?= $kt['atribut_name']; ?>" <?= ($training['keramaian_toko'] == $kt['atribut_name'] ? 'selected' : ''); ?>><?= $kt['atribut_name']; ?></option>
                              <?php endforeach; ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="keramaian_sekitar">Keramaian Sekitar</label>
                        <div class="col-sm-12 col-md-7">
                           <select class="form-control selectric" name="keramaian_sekitar" id="keramaian_sekitar">
                              <?php foreach ($keramaian_sekitar as $ks) : ?>
                                 <option value="<?= $ks['atribut_name']; ?>" <?= ($training['keramaian_sekitar'] == $ks['atribut_name'] ? 'selected' : ''); ?>><?= $ks['atribut_name']; ?></option>
                              <?php endforeach; ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="jam_operasional">Jam Operasional</label>
                        <div class="col-sm-12 col-md-7">
                           <select class="form-control selectric" name="jam_operasional" id="jam_operasional">
                              <?php foreach ($jam_operasional as $jo) : ?>
                                 <option value="<?= $jo['atribut_name']; ?>" <?= ($training['jam_operasional'] == $jo['atribut_name'] ? 'selected' : ''); ?>><?= $jo['atribut_name']; ?></option>
                              <?php endforeach; ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="label">Label</label>
                        <div class="col-sm-12 col-md-7">
                           <select class="form-control selectric" name="label" id="label">
                              <option value="Profit" <?= ($training['label'] == 'Profit' ? 'selected' : ''); ?>>Profit</option>
                              <option value="Rugi" <?= ($training['label'] == 'Rugi' ? 'selected' : ''); ?>>Rugi</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                           <button type="submit" class="btn btn-warning">Update</button>
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