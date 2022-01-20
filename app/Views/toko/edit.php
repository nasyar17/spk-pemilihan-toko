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
                  <h4>Update Toko</h4>
               </div>
               <div class="card-body">
                  <form action="/toko/update/<?= $toko['toko_id']; ?>">
                     <?= csrf_field(); ?>
                     <div class="form-group row mb-4">
                        <input type="hidden" name="toko_id" value="<?= $toko['toko_id']; ?>">
                        <input type="hidden" name="nilai_id_awal" value="<?= $nilai[0]['nilai_id']; ?>">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="toko_nama">Nama Toko</label>
                        <div class="col-sm-12 col-md-7">
                           <input type="text" class="form-control <?= ($validation->hasError('toko_nama') ? 'is-invalid' : ''); ?>" name="toko_nama" id="toko_nama" autofocus value="<?= (old('toko_nama')) ? old('toko_nama') : $toko['toko_nama'] ?>">
                           <div class="invalid-feedback">
                              <?= $validation->getError('toko_nama'); ?>
                           </div>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="alamat">Alamat</label>
                        <div class="col-sm-12 col-md-7">
                           <textarea type="text" class="form-control <?= ($validation->hasError('alamat') ? 'is-invalid' : ''); ?>" name="alamat" id="alamat" value=""><?= (old('alamat')) ? old('alamat') : $toko['alamat'] ?></textarea>
                           <div class="invalid-feedback">
                              <?= $validation->getError('alamat'); ?>
                           </div>
                        </div>
                     </div>


                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="jenis_toko">Jenis Toko</label>
                        <div class="col-sm-12 col-md-7">
                           <select class="form-control selectric" name="jenis_toko" id="jenis_toko">
                              <?php foreach ($jenis_toko as $row) : ?>
                                 <option value="<?= $row['atribut_id']; ?>" <?= ($nilai[0]['atribut_id'] == $row['atribut_id'] ? 'selected' : ''); ?>><?= $row['atribut_name']; ?></option>
                              <?php endforeach; ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="lokasi">Lokasi</label>
                        <div class="col-sm-12 col-md-7">
                           <select class="form-control selectric" name="lokasi" id="lokasi">
                              <?php foreach ($lokasi as $row) : ?>
                                 <option value="<?= $row['atribut_id']; ?>" <?= ($nilai[1]['atribut_id'] == $row['atribut_id'] ? 'selected' : ''); ?>><?= $row['atribut_name']; ?></option>
                              <?php endforeach; ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="ukuran_toko">Ukuran Toko</label>
                        <div class="col-sm-12 col-md-7">
                           <select class="form-control selectric" name="ukuran_toko" id="ukuran_toko">
                              <?php foreach ($ukuran_toko as $row) : ?>
                                 <option value="<?= $row['atribut_id']; ?>" <?= ($nilai[2]['atribut_id'] == $row['atribut_id'] ? 'selected' : ''); ?>><?= $row['atribut_name']; ?></option>
                              <?php endforeach; ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="keramaian_toko">Keramaian Toko</label>
                        <div class="col-sm-12 col-md-7">
                           <select class="form-control selectric" name="keramaian_toko" id="keramaian_toko">
                              <?php foreach ($keramaian_toko as $row) : ?>
                                 <option value="<?= $row['atribut_id']; ?>" <?= ($nilai[3]['atribut_id'] == $row['atribut_id'] ? 'selected' : ''); ?>><?= $row['atribut_name']; ?></option>
                              <?php endforeach; ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="keramaian_sekitar">Keramaian Sekitar</label>
                        <div class="col-sm-12 col-md-7">
                           <select class="form-control selectric" name="keramaian_sekitar" id="keramaian_sekitar">
                              <?php foreach ($keramaian_sekitar as $row) : ?>
                                 <option value="<?= $row['atribut_id']; ?>" <?= ($nilai[4]['atribut_id'] == $row['atribut_id'] ? 'selected' : ''); ?>><?= $row['atribut_name']; ?></option>
                              <?php endforeach; ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="jam_operasional">Jam Operasional</label>
                        <div class="col-sm-12 col-md-7">
                           <select class="form-control selectric" name="jam_operasional" id="jam_operasional">
                              <?php foreach ($jam_operasional as $row) : ?>
                                 <option value="<?= $row['atribut_id']; ?>" <?= ($nilai[5]['atribut_id'] == $row['atribut_id'] ? 'selected' : ''); ?>><?= $row['atribut_name']; ?></option>
                              <?php endforeach; ?>
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