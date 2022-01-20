<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="section">

   <div class="section-header">
      <h1><?= $title; ?></h1>
   </div>

   <div class="section-body">

      <div class="row">
         <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
               <!-- <div class="card-header">
                  <h4>Simple Table</h4>
               </div> -->
               <div class="card-body">
                  <a href="/training/add" class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i> Add Training</a>
                  <div class="table-responsive">
                     <table class="table table-striped table-sm" id="trainingTable">
                        <thead>
                           <tr class="text-center">
                              <th>#</th>
                              <th>ID</th>
                              <th>Jenis Toko</th>
                              <th>Lokasi</th>
                              <th>Ukuran Toko</th>
                              <th>Keramaian Toko</th>
                              <th>Keramaian Sekitar</th>
                              <th>Jam Operasional</th>
                              <th>Label</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $i = 1 ?>
                           <?php foreach ($training as $t) : ?>
                              <tr class="text-center">
                                 <td class="align-middle"><?= $i++; ?></td>
                                 <td class="align-middle"><?= $t['dt_id']; ?></td>
                                 <td class="text-left align-middle"><?= $t['jenis_toko']; ?></td>
                                 <td class="align-middle"><?= $t['lokasi']; ?></td>
                                 <td class="align-middle"><?= $t['ukuran_toko']; ?></td>
                                 <td class="align-middle"><?= $t['keramaian_toko']; ?></td>
                                 <td class="align-middle"><?= $t['keramaian_sekitar']; ?></td>
                                 <td class="align-middle"><?= $t['jam_operasional']; ?></td>
                                 <td class="align-middle">
                                    <div class="badge <?= ($t['label'] == 'Profit' ? 'badge-success' : 'badge-danger'); ?>"><?= $t['label']; ?></div>
                                 </td>
                                 <td class="align-middle">
                                    <a href="/training/edit/<?= $t['dt_id']; ?>" class="btn btn-warning"><i class="fas fa-edit test"></i> Edit</a>

                                    <form action="/training/<?= $t['dt_id']; ?>" method="POST" class="d-inline" name="form<?= $t['dt_id']; ?>">
                                       <?= csrf_field(); ?>
                                       <input type="hidden" name="_method" value="DELETE">
                                       <button type="submit" class="btn btn-danger delete-btn" id="<?= $t['dt_id']; ?>"><i class="fas fa-trash"></i> Delete</button>
                                    </form>
                                 </td>
                              </tr>
                           <?php endforeach; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>
</section>
<?= $this->endSection(); ?>