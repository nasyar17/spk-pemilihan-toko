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
                  <div class="table-responsive">
                     <table class="table table-striped table-sm" id="tokoNotActiveTable">
                        <thead>
                           <tr class="text-center">
                              <th>#</th>
                              <th>Toko ID</th>
                              <th>Nama Toko</th>
                              <th>Alamat</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $i = 1 ?>
                           <?php foreach ($toko as $row) : ?>
                              <tr class="text-center">
                                 <td class="align-middle"><?= $i++; ?></td>
                                 <td class="align-middle"><?= $row['toko_id']; ?></td>
                                 <td class="text-left align-middle"><?= $row['toko_nama']; ?></td>
                                 <td class="text-left align-middle"><?= $row['alamat']; ?></td>
                                 <td class="align-middle">
                                    <a href="/toko/toActive/0/<?= $row['toko_id']; ?>" class="btn btn-warning active-btn"><i class="fas fa-plus"></i> Activate</a>
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