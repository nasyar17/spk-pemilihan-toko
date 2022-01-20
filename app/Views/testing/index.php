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
               <!-- <div class="card-header">
                  <h4>Perhitungan</h4>
               </div> -->
               <div class="card-body">
                  <div class="row">
                     <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <a href="/testing/addCriteria">
                           <div class="card card-statistic-1 bg-primary">
                              <div class="card-icon bg-white">
                                 <i class="fas fa-store text-primary"></i>
                              </div>
                              <div class="card-wrap">
                                 <div class="card-header">
                                    <!-- <h4 class="text-white">Tambah Data Toko Baru</h4> -->
                                 </div>
                                 <div class="card-body text-white">
                                    Tambah Data Toko Baru
                                 </div>
                              </div>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="table-responsive">
                     <table class="table table-striped table-sm" id="tokoTesting">
                        <thead>
                           <tr class="text-center">
                              <th>#</th>
                              <th>ID Toko</th>
                              <th>Nama Toko</th>
                              <th>Alamat</th>
                              <th>Sudah Pernah Diuji ?</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $i = 1 ?>
                           <?php foreach ($toko as $row) : ?>
                              <tr class="text-center align-middle">
                                 <td class="align-middle"><?= $i++; ?></td>
                                 <td class="align-middle"><?= $row['toko_id']; ?></td>
                                 <td class="align-middle text-left"><?= $row['toko_nama']; ?></td>
                                 <td class="align-middle text-left"><?= $row['alamat']; ?></td>
                                 <td class="align-middle">
                                    <?php if ($row['tested'] == 1) : ?>
                                       <div class="badge badge-success">Sudah</div>
                                    <?php else : ?>
                                       <div class="badge badge-danger">Belum</div>
                                    <?php endif; ?>
                                 </td>
                                 <?php if ($row['tested'] == 0) : ?>
                                    <td class="align-middle">
                                       <a href="testing/addCriteria/<?= $row['toko_id']; ?>" class="btn btn-primary">Hitung</a>
                                    </td>
                                 <?php else : ?>
                                    <td class="align-middle">
                                       <a href="testing/addCriteria/<?= $row['toko_id']; ?>" class="btn btn-primary delete-btn">Hitung</a>
                                    </td>
                                 <?php endif; ?>

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